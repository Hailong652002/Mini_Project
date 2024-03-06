<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!----======== CSS ======== -->
        <link rel="stylesheet" href="./Public/css/style1.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <!----===== Boxicons CSS ===== -->
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>   <!--<title>Dashboard Sidebar Menu</title>--> 
    </head>
<body>
	
</body>
</html>

<?php 

	
	switch ($mod) {
	    case 'user':
	    require_once('Controller/UserController.php');
	    $user_controller=new UserController();

	    switch ($act) {
			case 'login':
						// echo "<br>Trang login.";
			$user_controller->login();
			break;
			case 'find':
				// echo "<br>check.";
			$user_controller->find();
			break;
			//dangxuat
			case 'logout':
			$user_controller->logout();
			break;
			default:
			echo "<br>không có gì hết.";
			break;
		}
	    break;

		}

// session_start();
// $controller = isset($_GET['controller'])
// 	? $_GET['controller'] : 'posts';
// 	$action = isset($_GET['action']) ? $_GET['action'] : 'index';
// 	$controller = ucfirst($controller);
// 	$fileController = $controller . "Controller.php";
// 	$pathController = "Controller/$fileController";
// 	print_r($pathController);
// 	if (!file_exists($pathController)) {
// 		die("Trang bạn tìm không tồn tại");
// 	}
// 	require_once "$pathController";
// 	$classController = $controller."Controller";
// 	$object = new $classController();
// 	if (!method_exists($object, $action)) {
// 		die("Phương thức $action
// 		 không tồn tại trong class $classController");
// 	}
// 	$object->$action();



if(isset($_GET['Controller'])){
	$controller = $_GET['Controller'];
}
else
	$controller='';

switch($controller){
	case 'post':{
		require_once('Controller/PostController.php');
		break;
	}
}
?>
