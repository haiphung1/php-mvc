<?php

namespace Models;

require_once 'BaseModel.php';

use Exception;

class DetailModel extends BaseModel
{
    protected $table = 'details';
    private $fillable = ['id', 'title', 'content'];

    public function fill($dataArr) {
        foreach ($this->fillable as $col) {
            $this->{$col} = $dataArr[$col];
        }
    }

    public function insert()
    {
        try {
            $insertQuery = "insert into $this->table (title, content) values ('$this->title', '$this->content')";
            $stmt = $this->connect->prepare($insertQuery);
            $stmt->execute();

            return true;
        } catch (Exception $ex) {
            var_dump($ex->getMessage());

            return false;
        }
    }

    public function update($arr)
    {
        try {
            $insertQuery = "update $this->table set id = '$arr->id', title = '$arr->title', content = '$arr->content' 
                where id = '$arr->id'";
            $stmt = $this->connect->prepare($insertQuery);
            $stmt->execute();

            return true;
        } catch (Exception $ex) {
            var_dump($ex->getMessage());

            return false;
        }
    }

}