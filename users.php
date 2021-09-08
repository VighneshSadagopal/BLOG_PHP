<?php
require_once('database.php');

class Users
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllUsers()
    {
        $stmt = $this->db->query("SELECT * FROM users");
        return $stmt;
    }

    public function getUserById($id)
    {
        $stmt = $this->db->query("SELECT * FROM users WHERE id=:id");
        $this->db->bind(':id', $id);

        return $stmt;
    }
    public function login($email, $password)
    {
        $sql = $this->db->query("SELECT * FROM users WHERE email=:email AND password=:password");

        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password);


        $stmt = $this->db->execute($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $data[] = $row;
        
        return $data;

        // while(){
        //   
        // }



    }
    public function getUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email=:email";
        $this->db->bind(':email', $email);
        $stmt = $this->db->execute($sql);
       $row = $stmt->fetch();
            $data[] = $row;
            return $data;
        
    }


    public function addUser($data)
    {
        $this->db->query("INSERT INTO `users`(`username`, `email`, `password`, `your`, `usertype`, `dob`) VALUES (:username,:email,:password,:your,:usertype,:dob)");
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':your', $data['your']);
        $this->db->bind(':usertype', $data['usertype']);
        $this->db->bind(':dob', $data['dob']);

        return $this->db->execute();
    }
    public function updateUser($data)
    {
        $this->db->query("UPDATE `users` SET `username`=:username,`email`=:email,`password`=:password,`your`=:your,`usertype`=:usertype,`dob`=:dob WHERE `id`=:id");
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['passoword']);
        $this->db->bind(':your', $data['your']);
        $this->db->bind(':usertype', $data['usertype']);
        $this->db->bind(':dob', $data['dob']);
        $this->db->bind(':id', $data['id']);

        return $this->db->execute();
    }

    public function deleteUser($id)
    {
        $this->db->query("DELETE FROM users WHERE id=:id");

        $this->db->bind(':id', $id);

        return $this->db->execute();
    }

    public function rowCount()
    {
        return $this->db->rowCount();
    }
}
