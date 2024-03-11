<?php 
	require_once('Model/User.php');
	class UserController
	{	
        private $model;
		function __construct(){
			require_once 'Model/db_connect.php';
			$this->model = new User($conn);
		}
        function login(){//timt < or khong o thi
			
			if (isset($_COOKIE['remember_me']) && $this->model->checktoken()){//neu van dang dang nhap(remberme) va muon vao login and vao. xoa côkie di
				
				$_SESSION['logged_in'] = true;//tiep tuc phien lam viec
				header('location: index.php?Controller=post&action=index');

			}elseif($_SESSION['logged_in']){//neu k dung remember ma muon vao trang login
				header('location: index.php?Controller=post&action=index');

				
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
						//setcookie('email', $email, time() + (3600 * 24 * 7));
						
						$_SESSION['logged_in'] = true;
						$this->model->createtoken($email);
						header('location: index.php?Controller=post&action=index');
						
					}else{
						$_SESSION['logged_in'] = true;
						header('location: index.php?Controller=post&action=index');


					}
				}else{
					setcookie('msg','Sai tài khoản hoặc mật khẩu',time()+1);
					header('location: index.php?mod=user&act=login');
				}
			}
		}
		function logout(){
			//setcookie('email', '', time() - 3600);
			if (isset($_COOKIE['remember_me'])){
				$this->model->deletetoken($email);

			}

			$_SESSION['logged_in'] = false;
			header('location: index.php?mod=user&act=login');
		}
		
    }
?>