<?php
namespace App\controllers;
require_once MODEL . 'ImageModel.php';
use App\core\Controller;
use App\core\View;
use App\models\ImageModel;

class Upload extends Controller
{ 
    public function __construct()
    {
        $this->model = new ImageModel();
        $this->view = new View();
    }

    public function index()
    {
        $this->pageData['title'] = "Загрузка картинок";
        if(!empty($_POST))
        {
            if(!$this->upload())
            {
                $this->pageData['error'] = "Ошибка при загрузке файлов!";
            }
        }
        $this->view->render('upload.phtml', 'template.phtml', $this->pageData); 
    }

    public function upload()
    {
        if(!$this->model->uploadImage())
        {
            return false;
        }
    }
}