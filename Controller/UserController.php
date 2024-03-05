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
			if (isset($_COOKIE['user_id'])){
				require_once('View/d.php');

			}else{			require_once('View/login.php');

				}
		}
		function find(){
			
			$email = $_POST['email'];
			$pass = $_POST['password'];
			
			//validate
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				setcookie('msg','Email không hợp lệ',time()+1);
				header('location: index.php?mod=user&act=login');	
			} else {//matkhau
				if($this->model->find($email,$pass)){
					if (isset($_POST["myCheckbox"])) {
						setcookie('user_id', $email, time() + (3600 * 24 * 7));
						require_once('View/d.php');
					}else{
						require_once('View/d.php');

					}
				}else{
					setcookie('msg','Sai tài khoản hoặc mật khẩu',time()+1);
					header('location: index.php?mod=user&act=login');
				}
			}
		}
		function logout(){
			setcookie('user_id', '', time() - 3600);
			header('location: index.php?mod=user&act=login');
		}
		
    }
?>