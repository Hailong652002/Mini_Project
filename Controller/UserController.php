<?php 
	require_once('Model/User.php');
	class UserController
	{	
        var $model;
		function __construct(){
			$this->model = new User();
		}
        function login(){
			//$data = $this->model->All();
			require_once('View/login.php');
		}
		function find(){
			$email = $_POST['email'];
			$pass = $_POST['password'];
			
			if($this->model->find($email,$pass)){
				require_once('View/d.php');
			}else{

			require_once('View/login.php');
			}
		}
    }
?>