<?php 
	require_once('Model/User.php');
	class UserController
	{	
        private $model;
		public function __construct(){
			require_once 'Model/db_connect.php';
			$this->model = new User($conn);
		}
        public function login(){//timt < or khong o thi
			
			if ($this->model->checktoken()){//neu van dang dang nhap(remberme) va muon vao login and vao. xoa côkie di
				
				//$_SESSION['logged_in'] = true;//tiep tuc phien lam viec
				if (!isset($_SESSION['logged_in'])){
					$this->model->createsswithr();

				}
				header('location: index.php?Controller=post&action=index');

			}elseif(isset($_SESSION['logged_in'])){//neu k dung remember ma muon vao trang login
				header('location: index.php?Controller=post&action=index');	
			}else{
				if (isset($_COOKIE['remember_me'])){
					setcookie('remember_me', '', time() - 3600, '/');	
				}
				unset($_SESSION['logged_in']);
				require_once('View/login.php');
			}
		}
		public function check(){
			
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
						
						//$_SESSION['logged_in'] = true;
						$this->model->createss($email);

						$this->model->createtoken($email);
						header('location: index.php?Controller=post&action=index');
						
					}else{
						//$_SESSION['logged_in'] = true;
						$this->model->createss($email);

						header('location: index.php?Controller=post&action=index');


					}
				}else{
					setcookie('msg','Sai tài khoản hoặc mật khẩu',time()+1);
					header('location: index.php?mod=user&act=login');
				}
			}
		}
		public function logout(){
			//setcookie('email', '', time() - 3600);
			if (isset($_COOKIE['remember_me'])){
				$this->model->deletetoken($email);

			}
			unset($_SESSION['logged_in']);
			header('location: index.php?mod=user&act=login');
		}
		
    }
?>