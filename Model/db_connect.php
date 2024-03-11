<?php
// Khai báo thông tin kết nối
$host = "localhost";
$dbname = "miniproject";
$username = "root";
$password = "";

// Tạo kết nối PDO
try {
  $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Lỗi kết nối: " . $e->getMessage();
  die();
}
?>