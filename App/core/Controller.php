<?php

namespace App\core;

class Controller
{
	protected $model;
	protected $view;
	protected $pageData = [];
	
	function __construct()
	{
		$this->view = new View();
		$this->model = new Model();
	}

	public function index()
	{

	}

}
