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
