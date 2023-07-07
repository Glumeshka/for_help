<?php
namespace App;

use App\core\Route;

session_start();

require_once 'core' . DIRECTORY_SEPARATOR . 'Config.php';
// require_once 'core' . DIRECTORY_SEPARATOR . 'model.php'; 
// require_once 'core' . DIRECTORY_SEPARATOR . 'view.php'; 
// require_once 'core' . DIRECTORY_SEPARATOR . 'controller.php'; 
// require_once 'core' . DIRECTORY_SEPARATOR . 'route.php'; 
Route::start(); // запускаем маршрутизатор