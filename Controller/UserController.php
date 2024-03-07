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
			if (isset($_COOKIE['email'])){//neu van dang dang nhap(remberme) va muon vao login
				
				$_SESSION['logged_in'] = true;//tiep tuc phien lam viec
				header('location: index.php?Controller=post&action=');

			}elseif($_SESSION['logged_in']){//neu k dung remember ma muon vao trang login
				header('location: index.php?Controller=post&action=');

				
				}else{
					require_once('View/login.php');
					}
		}
		function check(){
			
			$email = $_POST['email'];
			$pass = $_POST['password'];
			
			//validate
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				setcookie('msg','Email không hợp lệ',time()+1);
				header('location: index.php?mod=user&act=login');	
			} else {//matkhau
				if($this->model->check($email,$pass)){
					if (isset($_POST["myCheckbox"])) {
						setcookie('email', $email, time() + (3600 * 24 * 7));
						$_SESSION['logged_in'] = true;
						header('location: index.php?Controller=post&action=');
						
					}else{
						$_SESSION['logged_in'] = true;
						header('location: index.php?Controller=post&action=');


					}
				}else{
					setcookie('msg','Sai tài khoản hoặc mật khẩu',time()+1);
					
				}
			}
		}
		function logout(){
			setcookie('email', '', time() - 3600);
			$_SESSION['logged_in'] = false;
			header('location: index.php?mod=user&act=login');
		}
		
    }
?>