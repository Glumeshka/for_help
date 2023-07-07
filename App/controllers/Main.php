<?php
namespace App\controllers;
require_once MODEL . 'MainModel.php';
use App\core\Controller;
use App\core\View;
use App\models\MainModel;


class Main extends Controller
{
    public function __construct()
    {
        $this->model = new MainModel();
        $this->view = new View();
    }

    public function index()
    {
        $this->pageData['title'] = "Галерея";
        // получить фотки и их описание и загнать в массив в отрисовке
        $this->view->render('main.phtml', 'template.phtml', $this->pageData);
    }
}