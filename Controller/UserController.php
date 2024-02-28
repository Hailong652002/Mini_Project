<?php 
	//require_once('Model/User.php');
	class UserController
	{	
        var $model;
		function __construct(){
			//$this->model = new User();
		}
        function login(){
			$data = $this->model->All();
			require_once('View/login.php');
		}
    }
?>