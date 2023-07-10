<?php
namespace App\controllers;
require_once MODEL . 'ImageModel.php';
require_once MODEL . 'CommentModel.php';
use App\core\Controller;
use App\core\View;
use App\models\ImageModel;
use App\models\CommentModel;


class Image extends Controller
{
    public function __construct()
    {
        $this->imageModel = new ImageModel();
        $this->commentModel = new CommentModel();
        $this->view = new View();
    }

    public function index($idImage)
    {
        $this->pageData['title'] = "Картинка " . $idImage; 
        $this->pageData['image'] = $this->imageModel->getImage($idImage);
        $this->view->render('image.phtml', 'template.phtml', $this->pageData); 
    }

    public function delImage($idImage)
    {

    }

    public function addComment($idImage)
    {

    }

    public function delComment($idImage)
    {

    }

    public function uppComment($idImage)
    {

    }
}