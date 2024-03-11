<?php

class User{
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function check($email, $pass) {
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
}

?>
