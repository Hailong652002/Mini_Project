<?php

class User{
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function check($email, $pass) {
        require_once 'db_connect.php';
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($data) {
            if (password_verify($pass, $data['password'])) {
                // Mật khẩu đúng, trả về true
                return true;
            } else {
                // Mật khẩu sai, trả về false
                return false;
            }
        } else {
            // Không tìm thấy người dùng, trả về false
            return false;
        }
    }
    public function createtoken($email){
        require_once('db_connect.php');

        //
        $sql = "UPDATE users SET token = :token, timet=:timet WHERE email = :email";
        $stmt = $this->conn->prepare($sql);

        // Gán giá trị cho các tham số
        $stmt->bindParam(":token", $token);
        $stmt->bindParam(":timet", $timet);
        $stmt->bindParam(":email", $email);

        // Cập nhật dữ liệu
        
        $token = bin2hex(random_bytes(32));
		$timet = date('Y-m-d H:i:s', time() + 3600 * 24 * 30); // 30 ngày
        $stmt->execute();
        setcookie('remember_me', $token, time() + 3600 * 24 * 30, '/');

    }
    public function deletetoken(){
        require_once('db_connect.php');
        $sql = "UPDATE users SET token = :token, timet=:timet WHERE token = :token2";

        $stmt = $this->conn->prepare($sql);

        // Gán giá trị cho các tham số
        $stmt->bindParam(":token", $token);
        $stmt->bindParam(":timet", $timet);
        $stmt->bindParam(":token2",$token2);

        $token = NULL;
        $timet = NULL;
        $token2 = $_COOKIE['remember_me'] ;
        $stmt->execute();      
        setcookie('remember_me', '', time() - 3600, '/');

        }
    public function checktoken(){
        require_once('db_connect.php');
        if (isset($_COOKIE['remember_me'])){
             $sql = "SELECT * FROM users WHERE token = :token and timet> NOW()";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':token', $token);
            $token=$_COOKIE['remember_me'];
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if($data) {
                return true;
            }else{
                return false;
                }
        }else{
            return false;
        }
       
    }
    public function createss($email){
        $_SESSION['logged_in'] =password_hash($email, PASSWORD_DEFAULT);

    }
    public function createsswithr(){
        require_once('db_connect.php');
        $sql = "SELECT * FROM users WHERE token = :token";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':token', $token);
        $token=$_COOKIE['remember_me'];
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['logged_in'] =password_hash($data['email'], PASSWORD_DEFAULT);
    }
}

?>
