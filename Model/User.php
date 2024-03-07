<?php 			
	
	class User{
        
		function check($email,$pass){
			require_once('db_connect.php');//đổi logic sng controllẻ
			$sql = "SELECT * FROM users WHERE email='".$email."'";
			$data = $conn->query($sql)->fetch_assoc();
            if($data){
                if (password_verify($pass, $data['password'])) {//
                    return true;
                } else {
                    // Mật khẩu sai, trả về false
                    return false;
                }
            }else{
				return false;
			}
		}
        

	}
 ?>