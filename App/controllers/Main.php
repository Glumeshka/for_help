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
        $images = $this->model->getGallery();
        $this->pageData['title'] = "Галерея";
        $this->pageData['images'] = $images;
        // получить фотки и их описание и загнать в массив в отрисовке
        $this->view->render('main.phtml', 'template.phtml', $this->pageData);
    }

    public function logout()
    {
        session_destroy();
        header("Location: /");
    }
}