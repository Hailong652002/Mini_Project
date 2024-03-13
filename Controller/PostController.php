<?php 

require_once 'Model/Posts.php';
class PostController{
    
    public function index() {
        require_once 'Model/db_connect.php';
        //
        if(isset($_COOKIE['remember_me'])){ 
            $sql = "SELECT * FROM users WHERE token = :token and timet> NOW()";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':token', $token);
            $token=$_COOKIE['remember_me'];
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if($data) {
                //
                $postModel = new Posts($conn);
                $posts = $postModel->list();
                require_once 'View/post/list.php';
            //
            }else{
                if (isset($_COOKIE['remember_me'])){
					setcookie('remember_me', '', time() - 3600, '/');	
				}
				unset($_SESSION['logged_in']);
                require_once 'View/login.php';
                }
        }else{
        //
        $postModel = new Posts($conn);
        $posts = $postModel->list();
        require_once 'View/post/list.php';}
    }

    public function add() {
        require_once 'Model/db_connect.php';
        if(isset($_COOKIE['remember_me'])){ 
            $sql = "SELECT * FROM users WHERE token = :token and timet> NOW()";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':token', $token);
            $token=$_COOKIE['remember_me'];
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if($data) {
                
              //  
              $error = '';
              if (isset($_POST['add_post'])) {
                  $title = $_POST['title'];
                  $content = $_POST['content'];
                  $images = $_POST['image'];
                  if (empty($title) || empty($content)) {
                      $error = "Title và content không được để trống";
                  }
                  else {
                      $postModel = new Posts($conn);
                      $postArr = [
                          'title' => $title,
                          'content' => $content,
                          'images' => $images
                      ];
                      $postModel->insert($postArr);
                      $_SESSION['success'] = "Thêm mới thành công";
                      header("Location: index.php?Controller=post&action=index");
                      exit();
                  }
              }
              require_once('View/post/add.php');
            //
            }else{
                require_once 'View/login.php';
                }
        }else{

        //
        $error = '';
        if (isset($_POST['add_post'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $images = $_POST['image'];
            if (empty($title) || empty($content)) {
                $error = "Title và content không được để trống";
            }
            else {
                $postModel = new Posts($conn);
                $postArr = [
                    'title' => $title,
                    'content' => $content,
                    'images' => $images
                ];
                $postModel->insert($postArr);
                $_SESSION['success'] = "Thêm mới thành công";
                header("Location: index.php?Controller=post&action=index");
                exit();
            }
        }
        require_once('View/post/add.php');}
        //
    }

    public function edit() {
        require_once 'Model/db_connect.php';
        //
        if(isset($_COOKIE['remember_me'])){ 
            $sql = "SELECT * FROM users WHERE token = :token and timet> NOW()";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':token', $token);
            $token=$_COOKIE['remember_me'];
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if($data) {
                //
                if (!isset($_GET['id'])) {
                    $_SESSION['error'] = "Tham số không hợp lệ";
                    header("Location: index.php?controller=post&action=index");
                    return;
                }
                if (!is_numeric($_GET['id'])) {
                    $_SESSION['error'] = "Id phải là số";
                    header("Location: index.php?controller=post&action=index");
                    return;
                }
                $id = $_GET['id'];
                $postModel = new Posts($conn);
                $post = $postModel->getPostById($id);
        
                $error = '';
                if (isset($_POST['submit'])) {
                    $title = $_POST['title'];
                    $content = $_POST['content'];
                    $images = $_POST['image'];
                            
                    if (empty($title) || empty($content)) {
                        $error = "Title và content không được để trống";
                    }
                    else {
                        $postArr = [
                            'idposts' => $id,
                            'title' => $title,
                            'content' => $content,
                            'images' => $images
                        ];
                        $postModel->update($postArr);
                        $_SESSION['success'] = "Update bản ghi #$id thành công";
                        header("Location: index.php?Controller=post&action=index");
                        exit();
                    }
                }
                require_once 'View/post/edit.php';
            //
            }else{
                require_once 'View/login.php';
                }
        }else{
        //
        if (!isset($_GET['id'])) {
            $_SESSION['error'] = "Tham số không hợp lệ";
            header("Location: index.php?controller=post&action=index");
            return;
        }
        if (!is_numeric($_GET['id'])) {
            $_SESSION['error'] = "Id phải là số";
            header("Location: index.php?controller=post&action=index");
            return;
        }
        $id = $_GET['id'];
        $postModel = new Posts($conn);
        $post = $postModel->getPostById($id);

        $error = '';
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $images = $_POST['image'];
                    
            if (empty($title) || empty($content)) {
                $error = "Title và content không được để trống";
            }
            else {
                $postArr = [
                    'idposts' => $id,
                    'title' => $title,
                    'content' => $content,
                    'images' => $images
                ];
                $postModel->update($postArr);
                $_SESSION['success'] = "Update bản ghi #$id thành công";
                header("Location: index.php?Controller=post&action=index");
                exit();
            }
        }
        require_once 'View/post/edit.php';
    }
    }

    public function delete() {
        require_once 'Model/db_connect.php';
          //
          if(isset($_COOKIE['remember_me'])){ 
            $sql = "SELECT * FROM users WHERE token = :token and timet> NOW()";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':token', $token);
            $token=$_COOKIE['remember_me'];
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if($data) {
                //
                if (!isset($_GET['id'])) {
                    $_SESSION['error'] = "Tham số không hợp lệ";
                    header("Location: index.php?Controller=post&action=index");
                    exit();
                }
                $id = $_GET['id'];
                if (!is_numeric($id)) {
                    header("Location: index.php?Controller=post&action=index");
                    exit();
                }
                $postModel = new Posts($conn);
                $isDelete = $postModel->delete($id);
                if ($isDelete) {
                    $_SESSION['success'] = "Xóa bản ghi #$id thành công";    
                }
                else {
                    $_SESSION['error'] = "Xóa bản ghi #$id thất bại";    
                }
                header("Location: index.php?Controller=post&action=index");
                exit();
            //
            }else{
                require_once 'View/login.php';
                }
        }else{
            //
        if (!isset($_GET['id'])) {
            $_SESSION['error'] = "Tham số không hợp lệ";
            header("Location: index.php?Controller=post&action=index");
            exit();
        }
        $id = $_GET['id'];
        if (!is_numeric($id)) {
            header("Location: index.php?Controller=post&action=index");
            exit();
        }
        $postModel = new Posts($conn);
        $isDelete = $postModel->delete($id);
        if ($isDelete) {
            $_SESSION['success'] = "Xóa bản ghi #$id thành công";    
        }
        else {
            $_SESSION['error'] = "Xóa bản ghi #$id thất bại";    
        }
        header("Location: index.php?Controller=post&action=index");
        exit();
    }
    }
}
?>