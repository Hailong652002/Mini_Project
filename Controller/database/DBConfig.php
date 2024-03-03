<?php 
class Database{
    private $hostname='localhost';
    private $username='root';
    private $pass='';
    private $dbname='miniproject';

    private $conn = NULL;
    private $result = NULL;

    public function connect(){
        $this->conn = new mysqli($this->hostname,$this->username,$this->pass,$this->dbname);
        if(!$this->conn){
            echo"ket noi that bai";
            exit();
        }
        else {
            mysqli_set_charset($this->conn,'utf8');
        }
        return $this->conn;
    }

    public function execute($sql){
        $this->result = $this->conn->querry($sql);
        return $this->result;
    }

    public function getData(){
        if($this->result){
            $data = mysqli_fetch_array($this->result);
        }
        else{
            $data = 0;
        }
        return $data;
    }

    public function getAllData(){
        if(!$this->result){
            $data = 0;
        }
        else{
            while ($datas = $this->getData()){
                $data[] = $datas;
            }
        }
        return $data;
    }

    public function InsertData($title, $content, $images){
        $sql = "INSERT INTO posts(idposts,title,content,images) Values(null,$title,$content,$images)";
        return $this->execute($sql);
    }

    public function UpdateData($id,$title, $content, $images){
        $sql = "UPDATE posts SET title = '$title', content = '$content', images = '$images' where idposts = '$id'";
        return $this->execute($sql);
    }

    public function Delete($id){
        $sql ="DELETE FROM posts WHERE idposts = '$id'";
        return $this->execute($sql);
    }
}
?>