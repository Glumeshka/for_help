<?php
namespace App\controllers;
require_once MODEL . 'LogonModel.php';
use App\core\Controller;
use App\core\View;
use App\models\LogonModel;

class Logon extends Controller
{
    public function __construct()
    {
        $this->model = new LogonModel();
        $this->view = new View();
    }
    public function index()
    {
        $this->pageData['title'] = "Авторизация";
        if(!empty($_POST))
        {
            if(!$this->logon())
            {
                $this->pageData['error'] = "Неправильный логин или пароль!";
            }
        }

        $this->view->render('logon.phtml', 'template.phtml', $this->pageData); 
    }

    public function logon()
    {
        if(!$this->model->checkUser())
        {
            return false;
        }
    }
}