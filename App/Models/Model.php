<?php


namespace App\Models;


use Config\Db;

abstract class Model
{
    const TABLE = '';
    public $id;

    /**
     * @return mixed
     */
    public static function FindAll()
    {
        /** @var $db \Config\Db */
        $db = Db::getInstance();
        return $db->query('SELECT * FROM ' . static::TABLE,
            static::class);
    }

    public static function findById($id)
    {
        /** @var \Config\Db $db */
        $db = Db::getInstance();
        $result = $db->query('SELECT * FROM ' . static::TABLE . ' WHERE id =' . $id . ' LIMIT 1', static::class);
        return reset($result);
    }

    protected function isNew()
    {
        return (empty($this->id));
    }

    public function insert()
    {
        if (!$this->isNew()) {
            return;
        }
        $to_str = [];
        $to_bind = [];
        foreach ($this as $key => $value) {
            if ('id' == $key) {
                continue;
            } else {
                $to_str[] = $key;
                $to_bind[':' . $key] = $value;
            }
        }
        $sql = 'INSERT INTO ' . static::TABLE . ' (' .
            implode(',', $to_str) . ') VALUES (' . implode(',', array_keys($to_bind)) . ')';

        /** @var $db \Config\Db */
        $db = Db::getInstance();
        $db->execute($sql, $to_bind);
        $this->id = $db->getLastId();

    }

    public function update()
    {
        $to_bind = [];
        $out_string = '';
        foreach ($this as $key => $value) {
            if ('id' == $key) {
                $to_bind[':' . $key] = $value;
            } else {
                $out_string .= $key . ' = :' . $key . ', ';
                $to_bind[':' . $key] = $value;
            }
        }
        $out_string = rtrim($out_string, ', ');
        $sql = 'UPDATE ' . static::TABLE . ' SET ' . $out_string . ' WHERE id = :id';
        /** @var \Config\Db $db */
        $db = Db::getInstance();
        $db->execute($sql, $to_bind);
    }

    public function save()
    {
        (!$this->isNew()) ? $this->update() : $this->insert();

    }

    public function delete()
    {
        $sql = 'DELETE FROM '.static::TABLE.' WHERE id = '.$this->id;
        /** @var \Config\Db $db */
        $db = Db::getInstance();
        $db->execute($sql);

    }

}
