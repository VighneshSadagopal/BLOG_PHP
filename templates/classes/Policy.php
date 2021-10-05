<?php


class Policy extends Database
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

   public function getStatus(){
        $sql=$this->db->query("SELECT * from policy where status='unchecked'");
     
        $stmt=$this->db->execute($sql);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $data[] = $row;
       
        return $row;

     
   }
   public function authenticate($data){
    $this->db->query("INSERT INTO `policy`(`name`, `message`, `id`, `status`) VALUES (:name,:message,:id,:status)");
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':message', $data['message']);
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':status', $data['status']);

    return $this->db->execute();
   }


   public function deleteStatus($id){
    $sql=$this->db->query("DELETE from  policy where id=:id");
    $this->db->bind(':id',$id);

    $stmt=$this->db->execute($sql);
   

 
}
   public function rowCount()
   {
       return $this->db->rowCount();
   }
   public function updatePolicy($id)
   {
       $this->db->query("UPDATE `policy` SET `status`='checked' WHERE id=:id");
       $this->db->bind(':id',$id);

       return $this->db->execute();
   }
  
}
