<?php

class Posts{
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function list() {
        $querySelect = "SELECT * FROM posts";
        $stmt = $this->conn->query($querySelect);
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
    }

    public function getPostById($id) {
        $querySelect = "SELECT * FROM posts WHERE idposts = :id";
        $stmt = $this->conn->prepare($querySelect);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
        return $post;
    }

    public function update($posts = []) {
        $queryUpdate = "UPDATE posts 
                        SET title = :title, content = :content, images = :image
                        WHERE idposts = :id";
        $stmt = $this->conn->prepare($queryUpdate);
        $stmt->bindParam(':title', $posts['title']);
        $stmt->bindParam(':content', $posts['content']);
        $stmt->bindParam(':image', $posts['image']);
        $stmt->bindParam(':id', $posts['idposts']);
        $isUpdate = $stmt->execute();
        return $isUpdate;
    }

    public function delete($id) {
        $queryDelete = "DELETE FROM posts WHERE idposts = :id";
        $stmt = $this->conn->prepare($queryDelete);
        $stmt->bindParam(':id', $id);
        $isDelete = $stmt->execute();
        return $isDelete;
    }

    public function insert($data){
        $sql = "INSERT INTO posts(title, content, images) 
                VALUES (:title, :content, :images)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':content', $data['content']);
        $stmt->bindParam(':images', $data['images']);
        $stmt->execute();
    }
}

?>
