<?php 			
	
	class User{
        /*
		function All(){
			require_once('db_connect.php');
			$data = array();
			$sql = "SELECT * FROM employees";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}
*/
		function find($email,$pass){
			require_once('db_connect.php');
			$sql = "SELECT * FROM users WHERE email='".$email."'";
			$data = $conn->query($sql);
            if ($data->num_rows > 0) {
                // Email tồn tại trong cơ sở dữ liệu
                echo '<script>alert("Email đã tồn tại!")</script>';
                return true;
            } else {
                // Email không tồn tại trong cơ sở dữ liệu
                return false;
            }
            /*
            if($data){
                if ($data['password']==$pass) {//password_verify($pass, $data['password'])
                    return true;
                } else {
                    // Mật khẩu sai, trả về false
                    return false;
                }
            }*/
            //ko co email
			//return false;
		}
        
/*
		function insert($data){
			require_once('db_connect.php');
			$sql = "INSERT INTO employees (code,name,mobile,email,address,password) VALUES ('".$data['code']."','".$data['name']."','".$data['mobile']."','".$data['email']."','".$data['address']."','".md5($data['password'])."')";
			$result = $conn->query($sql);
			return $result;
		}
		function update($data){
			require_once('db_connect.php');
			$sql = "UPDATE employees SET name='".$data['name']."',mobile='".$data['mobile']."',email='".$data['email']."',address='".$data['address']."' WHERE code='".$data['code']."'";
			$result = $conn->query($sql);
			return $result;
		}

		function delete($data){
			require_once('db_connect.php');
			$sql = "DELETE FROM employees WHERE code='".$data."'";
			$result = $conn->query($sql);
			return $result;
		}
        */
	}
 ?>