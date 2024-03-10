<?php 

class Posts{
    public $id;
    public $title;
    public $content;
    public $image;
/*
    public function connectDb() {
        $connection = mysqli_connect(DB_HOST,
            DB_USERNAME, DB_PASSWORD, DB_NAME);
        if (!$connection) {
            die("Không thể kết nối. Lỗi: " .mysqli_connect_error());
        }
        return $connection;
    }

    public function closeDb($conn) {
        mysqli_close($conn);
    }
*/
    public function index() {
    require_once'db_connect.php';
    $querySelect = "SELECT * FROM posts";
    $results = mysqli_query($conn, $querySelect);
    $posts = [];
    if (mysqli_num_rows($results) > 0) {
        $posts = mysqli_fetch_all($results, MYSQLI_ASSOC);
    }
    mysqli_close($conn);
    return $posts;
    }

    public function getPostById($id) {
    require_once('db_connect.php');
    $querySelect = "SELECT * FROM posts WHERE idposts=$id";
    $results = mysqli_query($conn, $querySelect);
    $posts = [];
    if (mysqli_num_rows($results) > 0) {
        $posts = mysqli_fetch_all($results, MYSQLI_ASSOC);
        $post = $posts[0];
    }
    
    return $post;
    }

    public function update($posts = []) {
        require_once('db_connect.php');
        $queryUpdate = "UPDATE posts 
    SET `title` = '{$posts['title']}',`content` = '{$posts['content']}',`images` = '{$posts['image']}'  WHERE `idposts` = {$posts['idposts']}";
        $isUpdate = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);
        return $isUpdate;
    }

    public function delete($id) {
        require_once('db_connect.php');
        $queryDelete = "DELETE FROM posts WHERE idposts = $id";
        $isDelete = mysqli_query($conn, $queryDelete);
        mysqli_close($conn);
        return $isDelete;
    }

    function insert($data){
        require_once('db_connect.php');
        $sql = "INSERT INTO posts(title,content,images) 
        VALUES ('".$data['title']."','".$data['content']."','".$data['images']."')";
        $conn->query($sql);
        mysqli_close($conn);
    }

    
}
?>