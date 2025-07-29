<?php
class Member{
    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function addMember($name, $parentId){
        $stmt = $this->conn->prepare("INSERT INTO Members (Name, ParentId) VALUES (?, ?)");
        return $stmt->execute([$name, $parentId]);
    }

    public function getMembers(){
        $stmt = $this->conn->prepare("SELECT * FROM Members");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>