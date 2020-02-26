<?php

namespace Models;

use PDO;

require_once 'BaseModel.php';

class UserModel extends BaseModel
{
    protected $table = 'users';

    private $fillable = ['username', 'password'];

    public function fill($dataArr) {
        foreach ($this->fillable as $col) {
            $this->{$col} = $dataArr[$col];
        }
    }

    public function checkLogin($arr)
    {
        $password = md5($arr->password);
        $model = new static();
        $sql = "select count(*) as total from $this->table where username = '$arr->username' and password = '$password'";
        $stmt = $model->connect->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($model));

        if ($data[0]->total) {
            return true;
        } else {
            return false;
        }

    }
}