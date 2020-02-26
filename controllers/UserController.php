<?php

namespace Controllers;

use Models\UserModel;

require_once './models/UserModel.php';

class UserController
{
    public function formLogin()
    {
        if ($_SESSION == true || $_COOKIE == true) {
            header('location: ' . BASE_URL);
        } else {
            include_once './views/login.php';
        }
    }

    public function login()
    {
        $model = new UserModel();
        $requestData = $_POST;

        if ($requestData['saveme']) {
            setcookie("username", $requestData['username'], time() + 6000);
        }

        $model->fill($requestData);
        $msg = $model->checkLogin($model);

       if ($msg == true) {
           $_SESSION['username'] = $model->username;
           header('location: ' . BASE_URL);
           die;
       } else {
           $err = 'Login failed';

           include_once './views/login.php';
       }
    }

    public function logout()
    {
        session_destroy();

        if ($_COOKIE == true ) {
            setcookie("username", $_COOKIE['username'], time() - 10000);
        }
        header('location: ' . BASE_URL . 'login');
        die;
    }
}