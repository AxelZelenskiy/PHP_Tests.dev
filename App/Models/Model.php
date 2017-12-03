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
    public static function findAll()
    {
        /** @var $db \Config\Db */
        $db = Db::getInstance();
        return $db->query('SELECT * FROM ' . static::TABLE,
            static::class);
    }

    public static function findOneById($id)
    {
        /** @var \Config\Db $db */
        $db = Db::getInstance();
        $result = $db->query('SELECT * FROM ' . static::TABLE . ' WHERE id =' . $id . ' LIMIT 1', static::class);
        return reset($result);
    }

    public static function findAllById($id)
    {
        /** @var \Config\Db $db */
        $db = Db::getInstance();
        $result = $db->query('SELECT * FROM ' . static::TABLE . ' WHERE id = :id', static::class, [':id' => $id]);
        return reset($result);
    }

    public static function findAllByParam($param = [])
    {
        if (!empty($param)) {
            $array_length = count($param);
            $param_string = '';
            foreach ($param as $key => $value) {
                if (($array_length - 1) > 0) {
                    $param_string .= $key . " =:" . $key . ' , ';
                    $array_length--;
                } else {
                    $param_string .= $key . " =:" . $key;
                }
            }
            /** @var \Config\Db $db */
            $db = Db::getInstance();
            $result = $db->query('SELECT * FROM ' . static::TABLE . ' WHERE ' . $param_string, static::class, $param);
            return $result;
        } else {
            return false;
        }
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
        if (!$this->isNew()) {
            echo "new row";
            $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id = ' . $this->id;
            /** @var \Config\Db $db */
            $db = Db::getInstance();
            $db->execute($sql);
        } else {
            echo "exit program";
            return;
        }

    }

}
