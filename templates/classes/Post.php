<?php


class Post extends Database
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }



    public function getAllPost()
    {
        $sql = $this->db->query("SELECT * FROM post ORDER BY pid DESC");
        $stmt = $this->db->execute($sql);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
        
    }
    public function getPerPost($start,$per)
    {
        $sql = $this->db->query("SELECT * FROM post ORDER BY pid  LIMIT $start,$per ");
        $stmt = $this->db->execute($sql);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
        
    }
    public function getAllPostByCategory($category)
    {
        $sql = $this->db->query("SELECT * FROM post WHERE category=:category ");
        $this->db->bind(':category', $category);
        $stmt = $this->db->execute($sql);
        $row = $stmt->fetchALL(PDO::FETCH_ASSOC);        
        return $row;
        
    }

    public function getPostById($pid)
    {
        $sql = $this->db->query("SELECT * FROM post WHERE pid=:pid");
        $this->db->bind(':pid', $pid);
        $stmt = $this->db->execute($sql);
        $row = $stmt->fetchALL(PDO::FETCH_ASSOC); 
        
        return $row;
    }
    public function getRecent()
    {
        $sql = $this->db->query("SELECT * FROM post ORDER BY pid DESC LIMIT 3");
        $stmt = $this->db->execute($sql);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
    public function getPostByJoin($pid, $id)
    {
        $sql = $this->db->query("SELECT * FROM `post`INNER JOIN users ON post.id = :id where pid=:pid ");
       
        $this->db->bind(':pid', $pid);
        $this->db->bind(':id', $id);
       
        $stmt = $this->db->execute($sql);
        $row = $stmt->fetchALL(PDO::FETCH_ASSOC);   
           
        return $row;
    }
    public function getPostByUsername($pid)
    {
        $stmt = $this->db->query("SELECT * FROM post WHERE pid=:pid");
        $this->db->bind(':pid', $pid);
        return $stmt;
    }
    public function addPost($data)
    {
        $this->db->query("INSERT INTO post(author,title,description,short,category,id,images) VALUES(:author,:title,:description,:short,:category,:id,:images)");
        $this->db->bind(':author', $data['author']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':short', $data['short']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':images', $data['images']);

        return $this->db->execute();
    }
    public function updatePost($data)
    {
        $this->db->query("UPDATE post SET author=:author,title=:title,description=:description,short=:short,category=:category,id=:id,images=:images WHERE pid=:pid");
        $this->db->bind(':author', $data['author']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':short', $data['short']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':images', $data['images']);
        $this->db->bind(':pid', $data['pid']);

        return $this->db->execute();
    }

    public function deletePost($pid)
    {
        $stmt = $this->db->query("DELETE FROM post WHERE pid=:pid");

        $this->db->bind(':pid', $pid);

        return $this->db->execute();
    }

    public function rowCount()
    {
        return $this->db->rowCount();
    }
}
