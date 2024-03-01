<?php 
require_once'db_connect.php';
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
    function insert($data){
        require_once('db_connect.php');
        $sql = "INSERT INTO Posts (title,content,image) VALUES ('".$data['code']."','".$data['name']."','".$data['mobile']."','".$data['email']."','".$data['address']."','".md5($data['password'])."')";
        $result = $conn->query($sql);
        return $result;
    }

    
}
?>