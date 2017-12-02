<?php

namespace Config;

use App\Traits\Singleton;


class Db
{
    use Singleton;
    protected $dbh;

    protected function __construct()
    {
        try {
            $this->dbh = new \PDO('mysql:host=localhost;dbname=phptests', 'root', '');
        } catch (\PDOException $exception) {
            $ss = '<pre>';
            $se = '</pre>';
            die ($ss . $exception->getMessage() . $se . $ss . $exception->getFile() . $se . $ss . $exception->getLine() . $se);
        }
    }

    public function execute($sql, $arr = [])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($arr);
    }


    public function query($sql, $class_name, $arr = [])
    {
        $sth = $this->dbh->prepare($sql);
        $result = $sth->execute($arr);
        if (false !== $result) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class_name);
        }
        return [];
    }

    public function getLastId()
    {
        return $this->dbh->lastInsertId();
    }


}