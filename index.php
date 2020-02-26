<?php

session_start();

require_once './controllers/HomeController.php';
require_once './controllers/UserController.php';
require_once './commons/utils.php';

use Controllers\HomeController;
use Controllers\UserController;

$url = isset($_GET['url']) == true ? $_GET['url'] : "/";

switch ($url) {
    case '/':
        $ctr = new HomeController();
        $ctr->index();
        break;
    case 'add-form':
        $ctr = new HomeController();
        $ctr->addForm();
        break;
    case 'save-form':
        $ctr = new HomeController();
        $ctr->saveForm();
        break;
    case 'edit-form':
        $ctr = new HomeController();
        $ctr->editForm();
        break;
    case 'save-edit-form':
        $ctr = new HomeController();
        $ctr->saveEdit();
        break;
    case 'remove-detail':
        $ctr = new HomeController();
        $ctr->delete();
        break;
    case 'login':
        $ctr = new UserController();
        $ctr->formLogin();
        break;
    case 'logout':
        $ctr = new UserController();
        $ctr->logout();
        break;
    case 'click-login':
        $ctr = new UserController();
        $ctr->login();
        break;
    default:
        break;
}
