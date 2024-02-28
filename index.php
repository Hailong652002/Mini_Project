<?php 
$mod = isset($_GET['mod'])?$_GET['mod']:'user';
$act = isset($_GET['act'])?$_GET['act']:'login';

switch ($mod) {
    case 'user':
    require_once('Controller/UserController.php');
    $user_controller=new UserController();
    
    switch ($act) {
		case 'login':
					// echo "<br>Trang login.";
		$user_controller->login();
		break;
		
		default:
		echo "<br>không có gì hết.";
		break;
	}
    break;
}
?>