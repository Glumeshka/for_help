<?php
namespace App\controllers;

use App\core\Controller;

class Image extends Controller 
{ 
    public function index() 
    {
        $this->pageData['title'] = "Картинка";
        $this->view->render('image.phtml', 'template.phtml', $this->pageData); 
    } 
}