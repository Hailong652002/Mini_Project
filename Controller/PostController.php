<?php 

require_once 'Model/Posts.php';
class PostController{
    /**
     * Liệt kê các sách đang có trên hệ thống
     */
    public function index() {
        echo "<h1>Trang liệt kê sách</h1>";
        //gọi view để hiển thị dữ liệu
        //gọi view thực chất là nhúng file view vào
        //gọi file luôn phải nhớ là đứng tại
//        vị trí file index gốc của ứng dụng
        $post = new Posts();
        $posts = $post->index();
//        print_r($books);
        require_once 'View/post/list.php';
    }

    public function add() {
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
                        //header("Location: index.php?Controller=post&action=list");
                        }
                    else {
                        $_SESSION['error'] = "Thêm mới thất bại";
                        header("Location: index.php?Controller=post&action=list");
                        }
                           
                }
            }
        require_once('View/post/add.php');
    }

    public function edit() {
        //lấy ra thông tin sách dựa theo id đã gắn trên url
        //xử lý validate cho trường hợp id truyền lên không hợp lệ
        if (!isset($_GET['id'])) {
            $_SESSION['error'] = "Tham số không hợp lệ";
            header("Location: index.php?controller=book&action=index");
            return;
        }
        if (!is_numeric($_GET['id'])) {
            $_SESSION['error'] = "Id phải là số";
            header("Location: index.php?controller=book&action=index");
            return;
        }
        $id = $_GET['id'];
        //gọi model để lấy ra đối tượng sách theo id
        $postModel = new Posts();
        $post = $postModel->getPostById($id);

        //xử lý submit form, lặp lại thao tác khi submit lúc thêm mới
        $error = '';
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $images = $_POST['image'];
                    
            if (empty($title) || empty($content)) {
                $error = "title và content không được để trống";
                }
            else {
                //xử lý update dữ liệu vào hệ thống
                $postModel = new Posts();
                $postArr = [
                    'title' => $title,
                    'content' => $content,
                    'images' => $images
                ];
                $isUpdate = $postModel->update($postArr);
                if ($isUpdate) {
                    $_SESSION['success'] = "Update bản ghi #$id thành công";
                }
                else {
                    $_SESSION['error'] = "Update bản ghi #$id thất bại";
                }
                header("Location: index.php?Controller=post&action=list");
                exit();
            }
        }
        //truyền ra view
        require_once 'View/post/edit.php';
    }

    public function delete() {
        $id = $_GET['id'];
        if (!is_numeric($id)) {
            header("Location: index.php?Controller=post&action=list");
            exit();
            }
            $post = new Posts();
            $queryDelete = "DELETE FROM posts WHERE idposts = $id";
            $isDelete = $post->delete($id);
            if ($isDelete) {
                $_SESSION['success'] = "Xóa bản ghi #$id thành công";    
                }
            else {
                $_SESSION['error'] = "Xóa bản ghi #$id thất bại";    
                }
                header("Location: index.php?Controller=post&action=list");
                break;

    }
}
// include './Model/Posts.php';
// if(isset($_GET['action'])){
// 	$action = $_GET['action'];
// }
// else
// 	$action='';

// switch($action){
// 	case 'add':{
//         $error = '';
//             if (isset($_POST['add_post'])) {
//                  $title = $_POST['title'];
//                  $content = $_POST['content'];
//                  $images = $_POST['image'];
//                     if (empty($title) || empty($content)) {
//                         $error = "title và content không được để trống";
//                     }
//                     else {
//                      $post = new posts();
//                      $postArr = [
//                          'title' => $title,
//                          'content' => $content,
//                          'images' => $images
//                      ];
//                     $isInsert = $post->insert($postArr);
//                     if ($isInsert) {
//                         $_SESSION['success'] = "Thêm mới thành công";
//                         //header("Location: index.php?Controller=post&action=list");
//                     }
//                     else {
//                         $_SESSION['error'] = "Thêm mới thất bại";
//                         header("Location: index.php?Controller=post&action=list");
//                     }
                   
//                  }
//             }
// 		require_once('View/post/add.php');
// 		break;
// 	}
// 	case'edit':{  
//         if (!isset($_GET['id'])) {
//             $_SESSION['error'] = "Tham số không hợp lệ";
//             header("Location: index.php?Controller=post&action=list");
//             return;
//         }
//         if (!is_numeric($_GET['id'])) {
//             $_SESSION['error'] = "Id phải là số";
//             header("Location: index.php?Controller=post&action=list");
//             return;
//         }
//         $id = $_GET['id'];
//         //gọi model để lấy ra đối tượng sách theo id
//         $postModel = new Posts();
//         $posts = $postModel->getPostById($id);
//         //xử lý submit form, lặp lại thao tác khi submit lúc thêm mới
//         $error = '';
//         if (isset($_POST['submit'])) {
//             $title = $_POST['title'];
//             $content = $_POST['content'];
//             $images = $_POST['image'];
//             //check validate dữ liệu
//             if (empty($title) || empty($content)) {
//                 $error = "title và content không được để trống";
//             }
//             else {
//                 //$postModel = new Posts();
//                 $postArr = [
//                     'idposts' => $id,
//                     'title' => $title,
//                     'content' => $content,
//                     'image' => $images
//                 ];
//                 //print_r($postArr);
                
//                 $sql = "UPDATE posts 
//                 SET `title` = '{$postArr['title']}',`content` = '{$postArr['content']}',`images` = '{$postArr['image']}'  WHERE `idposts` = $id";
//                 //$postModel->update($postArr);
//                 echo $sql;
//                 $conn->query($sql);
//                 echo "1";
//                 mysqli_close($conn);
               
//             }
//         }
//         require_once('View/post/edit.php'); 
//         break;
// 	}

//     case'delete':{
//         $id = $_GET['id'];
//         if (!is_numeric($id)) {
//             header("Location: index.php?Controller=post&action=list");
//             exit();
//         }
//         $post = new Posts();
//         $queryDelete = "DELETE FROM posts WHERE idposts = $id";
//         $isDelete = $post->delete($id);
//         if ($isDelete) {
//             //chuyển hướng về trang liệt kê danh sách
//             //tạo session thông báo mesage
//             $_SESSION['success'] = "Xóa bản ghi #$id thành công";
            
//         }
//         else {
//             //báo lỗi
//             $_SESSION['error'] = "Xóa bản ghi #$id thất bại";
            
//         }
//         header("Location: index.php?Controller=post&action=list");
//         break;
//     }
//     default:
//         $Posts = new Posts();
//         $posts = $Posts->index();
//         require_once('View/post/list.php');
//         break;
// }
?>