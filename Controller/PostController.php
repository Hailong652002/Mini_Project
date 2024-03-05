<?php 
include './Model/Posts.php';
if(isset($_GET['action'])){
	$action = $_GET['action'];
}
else
	$action='';

switch($action){
	case 'add':{
        $error = '';
            if (isset($_POST['add_post'])) {
                 $title = $_POST['title'];
                 $content = $_POST['content'];
                 $images = $_POST['image'];
                    if (empty($title) || empty($content)) {
                        $error = "title và content không được để trống";
                    }
                    else {
                     $post = new posts();
                     $postArr = [
                         'title' => $title,
                         'content' => $content,
                         'images' => $images
                     ];
                    $isInsert = $post->insert($postArr);
                    if ($isInsert) {
                        $_SESSION['success'] = "Thêm mới thành công";
                    }
                    else {
                        $_SESSION['error'] = "Thêm mới thất bại";
                    }
                    header("Location: index.php?Controller=post&action=list");
                    exit();
                 }
            }
		require_once('View/post/add.php');
		break;
	}
	case'edit':{
        if (!isset($_GET['id'])) {
            $_SESSION['error'] = "Tham số không hợp lệ";
            header("Location: /Mini_Project/?Controller=post&action=list");
            return;
        }
        if (!is_numeric($_GET['id'])) {
            $_SESSION['error'] = "Id phải là số";
            header("Location: /Mini_Project/?Controller=post&action=list");
            return;
        }
        $id = $_GET['id'];
        //gọi model để lấy ra đối tượng sách theo id
        $postModel = new Posts();
        $posts = $postModel->getPostById($id);
        //xử lý submit form, lặp lại thao tác khi submit lúc thêm mới
        $error = '';
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $images = $_POST['image'];
            //check validate dữ liệu
            if (empty($title) || empty($content)) {
                $error = "title và content không được để trống";
            }
            else {
                $postModel = new Posts();
                $postArr = [
                    'idposts' => $id,
                    'title' => $title,
                    'content' => $content,
                    'image' => $images
                ];
                //print_r($postArr);
                
                $postModel->update($postArr);
               
               
            }
        }
        require_once('View/post/edit.php');
        break;
	}

    case'delete':{
        $id = $_GET['id'];
        if (!is_numeric($id)) {
            header("Location: index.php?Controller=post&action=list");
            exit();
        }
        $post = new Posts();
        $queryDelete = "DELETE FROM posts WHERE idposts = $id";
        $isDelete = $post->delete($id);
        if ($isDelete) {
            //chuyển hướng về trang liệt kê danh sách
            //tạo session thông báo mesage
            $_SESSION['success'] = "Xóa bản ghi #$id thành công";
        }
        else {
            //báo lỗi
            $_SESSION['error'] = "Xóa bản ghi #$id thất bại";
        }
        header("Location: index.php?Controller=post&action=list");
        break;
    }
    default:
        $Posts = new Posts();
        $posts = $Posts->index();
        require_once('View/post/list.php');
        break;
}
?>