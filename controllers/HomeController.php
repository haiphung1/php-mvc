<?php

namespace Controllers;

use Models\DetailModel;

require_once './models/DetailModel.php';

class HomeController
{
    public function index()
    {
        if ($_COOKIE['username'] == true || $_SESSION['username'] == true ) {
            $list = DetailModel::getAll();

            include_once './views/index.php';
        } else {
            include_once './views/login.php';
        }
    }

    public function addForm()
    {
        if ($_COOKIE['username'] == true || $_SESSION['username'] == true ) {
            include_once './views/addForm.php';
        } else {
            include_once './views/login.php';
        }
    }

    public function saveForm()
    {
        if ($_POST['title'] == "") {
            $errtitle = "Required title";

            include_once './views/addForm.php';
        } else if ($_POST['content'] == "") {
            $errcontent = "Required content";

            include_once './views/addForm.php';
        } else {
            $model = new DetailModel();
            $requestData = $_POST;
            $model->fill($requestData);

            $msg = $model->insert() == true ? "success" : "fail!";
            header("location: " . BASE_URL . "?msg=$msg");
            die;
        }
    }

    public function editForm()
    {
        if ($_COOKIE['username'] == true || $_SESSION['username'] == true ) {
            $item = DetailModel::findOne($_GET['id']);

            include_once './views/editForm.php';
        } else {
            include_once './views/login.php';
        }
    }

    public function saveEdit()
    {
        if ($_POST['title'] == "") {
            $errtitle = "Required title";

            include_once './views/addForm.php';
        } else if ($_POST['content'] == "") {
            $errcontent = "Required content";

            include_once './views/addForm.php';
        } else {
            $model = new DetailModel();
            $requestData = $_POST;
            $model->fill($requestData);

            $msg = $model->update($model) == true ? "success" : "fail!";
            header("location: " . BASE_URL . "?msg=$msg");
            die;
        }
    }

    public function delete()
    {
        DetailModel::delete($_GET['id']);
        header("location: " . BASE_URL . "?messages=success");
        die;
    }
}