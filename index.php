<?php 
// $mod = isset($_GET['mod'])?$_GET['mod']:'user';
// $act = isset($_GET['act'])?$_GET['act']:'login';

// switch ($mod) {
//     case 'user':
//     require_once('Controller/UserController.php');
//     $user_controller=new UserController();
    
//     switch ($act) {
// 		case 'login':
// 					// echo "<br>Trang login.";
// 		$user_controller->login();
// 		break;
// 		case 'find':
// 			// echo "<br>check.";
// 		$user_controller->find();
// 		break;
// 		default:
// 		echo "<br>không có gì hết.";
// 		break;
// 	}
//     break;
// }
session_start();
$controller = isset($_GET['controller'])
	? $_GET['controller'] : 'posts';
	$action = isset($_GET['action']) ? $_GET['action'] : 'index';
	$controller = ucfirst($controller);
	$fileController = $controller . "Controller.php";
	$pathController = "Controller/$fileController";
	print_r($pathController);
	if (!file_exists($pathController)) {
		die("Trang bạn tìm không tồn tại");
	}
	require_once "$pathController";
	$classController = $controller."Controller";
	$object = new $classController();
	if (!method_exists($object, $action)) {
		die("Phương thức $action
		 không tồn tại trong class $classController");
	}
	$object->$action();
?>