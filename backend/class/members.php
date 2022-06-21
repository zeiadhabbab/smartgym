<?php
//create rest api php mysql
    class Member{

        private $conn;

        private $db_table = "members";

        public $id;
        public $member_name;
        public $email_address;
        public $picture;
        public $phone;
        public $joined_at;

        public function __construct($db){
            $this->conn = $db;
        }

        public function getMembers(){
            $sqlQuery = "SELECT id, name, email, picture, phone, joined_at FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        public function createMember(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                    name = :name, 
                    email = :email, 
                    picture = :picture, 
                    phone = :phone, 
                    joined_at = :joined_at";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->member_name=htmlspecialchars(strip_tags($this->member_name));
            $this->email_address=htmlspecialchars(strip_tags($this->email_address));
            $this->phone=htmlspecialchars(strip_tags($this->phone));
            $this->picture=htmlspecialchars(strip_tags($this->picture));
            $this->joined_at=htmlspecialchars(strip_tags($this->joined_at));
        
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":phone", $this->phone);
            $stmt->bindParam(":picture", $this->picture);
            $stmt->bindParam(":joined_at", $this->joined_at);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        public function getSingleMember(){
            $sqlQuery = "SELECT
                        id, 
                        name, 
                        email, 
                        phone, 
                        picture, 
                        joined_at
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       id = ?
                    LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
           
            if($dataRow){
                $this->name = $dataRow['name'];
                $this->email = $dataRow['email'];
                $this->phone = $dataRow['phone'];
                $this->picture = $dataRow['picture'];
                $this->joined_at = $dataRow['joined_at'];
            }else{
                $this->name = null;
            }
            
   
        }        

        public function updateMember(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                    name = :name, 
                    email = :email, 
                    phone = :phone, 
                    picture = :picture, 
                    joined_at = :joined_at
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->phone=htmlspecialchars(strip_tags($this->phone));
            $this->picture=htmlspecialchars(strip_tags($this->picture));
            $this->joined_at=htmlspecialchars(strip_tags($this->joined_at));
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":phone", $this->phone);
            $stmt->bindParam(":picture", $this->picture);
            $stmt->bindParam(":joined_at", $this->joined_at);
            $stmt->bindParam(":id", $this->id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        function deleteMember(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }

    }
?>