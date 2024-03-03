<?php 
    require_once('Model/Posts.php');
    class postscontroller{
        public function index() {
            echo "<h1>Trang liệt kê sách</h1>";
            $Posts = new Posts();
            $p = $Posts->index();
            header("Location: View/index.php");
        }

        public function add() {
            $error = '';
            if (isset($_GET['submit'])) {
                $title = $_GET['title'];
                $content = $_GET['content'];
                $images = $_GET['images'];
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
                    header("Location: index.php?Controller=GET&action=index");
                    exit();
                }
            }
            //gọi view
            require_once 'views/index.php';
        }

    }

?>