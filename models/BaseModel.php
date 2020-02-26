<?php

namespace Models;

use PDO;

class BaseModel
{
    function __construct()
    {
        $host = "localhost";
        $dbname = "php-test";
        $dbusername = "admin";
        $dbpass = "admin";
        $this->connect = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",
            $dbusername, $dbpass);
    }

    public static function getAll()
    {
        $model = new static();
        $sql = "select * from " . $model->table;
        $stmt = $model->connect->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($model));

        return $data;
    }

    public static function delete($id)
    {
        $model = new static();
        $sql = "delete from " . $model->table . " where id = $id";
        $stmt = $model->connect->prepare($sql);
        $stmt->execute();

        return true;
    }

    public static function findOne($id){
        $model = new static();
        $sql = "select * from " . $model->table . " where id = $id";
        $stmt = $model->connect->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($model));

        return $data[0];
    }
}