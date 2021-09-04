<?php 
    require_once('database.php');

 class Post{
    public $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function execute()
    {
        return $this->db->execute();
    }
    
    public function getAllPost(){
        $stmt=$this->db->query("SELECT * FROM post");
        return $stmt;
    }

    public function getPostById($pid){
        $stmt=$this->db->query("SELECT * FROM post WHERE pid=:pid");
        $this->db->bind(':pid',$pid);
        return $stmt;

    }
    public function getPostByJoin($pid,$id){
        $stmt=$this->db->query("SELECT * FROM `post`INNER JOIN users ON post.id = :id where pid=:pid ");
        $this->db->bind(':pid',$pid);
        $this->db->bind(':id',$id);
        return $stmt;

    }
    public function addPost($data){
         $this->db->query("INSERT INTO post(author,title,description,short,category,id,images) VALUES(:author,:title,:description,:short,:category,:id,:images)");
        $this->db->bind(':author',$data['author']);
        $this->db->bind(':title',$data['title']);
        $this->db->bind(':description',$data['description']);
        $this->db->bind(':short',$data['short']);
        $this->db->bind(':category',$data['category']);
        $this->db->bind(':id',$data['id']);
        $this->db->bind(':images',$data['images']);
        
        return $this->db->execute();

    }
    public function updatePost($data){
        $this->db->query("UPDATE post SET author=:author,title=:title,description=:description,short=:short,category=:category,id=:id,images=:images WHERE pid=:pid");
        $this->db->bind(':author',$data['author']);
        $this->db->bind(':title',$data['title']);
        $this->db->bind(':description',$data['description']);
        $this->db->bind(':short',$data['short']);
        $this->db->bind(':category',$data['category']);
        $this->db->bind(':id',$data['id']);
        $this->db->bind(':images',$data['images']);
        $this->db->bind(':pid',$data['pid']);
        
        return $this->db->execute();
       
    }

    public function deletePost($pid){
        $stmt= $this->db->query("DELETE FROM post WHERE pid=:pid");
      
        $this->db->bind(':pid',$pid);
        
        return $this->db->execute();
    
    }
   
    public function rowCount()
    {
        return $this->db->rowCount();
    }
    public function fetch()
    {
        return $this->fetch(PDO::FETCH_ASSOC);
    }
 }
   
?>