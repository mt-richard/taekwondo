<?php

require_once('config.php');
class dbconnection {
    protected $db;
    public function __construct(){
        $this->db = new PDO(DB_DRIVER.":host=".DB_HOST.";dbname=".DB_NAME,
        DB_USER,DB_PWD,[PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    function login($email, $password) {
        try {
            $query = "SELECT * FROM users WHERE email = ?";
            $stm = $this->db->prepare($query);
            $stm->execute([$email]);
            $user = $stm->fetch(PDO::FETCH_ASSOC);
    
            if ($user && ($password == $user['password'])) {
                return ["message" => "Login successful", "status" => 1, "user" => $user];
            } else {
                return ["message" => "Invalid email or password", "status" => 0];
            }
        } catch (PDOException $e) {
            return ["message" => $e->getMessage(), "status" => 0];
        }
    }
    
    

    function save($table, $data){
        try {
            $query = "INSERT INTO ".$table."(";
            $i =0;
            $ph ="";
            $values =[];
            foreach($data as $field => $value){
                $query .= $i==0? $field:",".$field;
                $ph .= $i==0? "?": ",?";
                array_push($values, $value);
                $i++;
            }
            $query .= ")values(".$ph.")";
            $stm = $this->db->prepare($query);
            $stm->execute($values);
            $lastInsertId = intval($this->db->lastInsertId());
            
            return ["status" => "success", "message" => "Record added successfully", "id" => $lastInsertId];
        } catch (PDOException $e) {
            return ["status" => "error", "message" => $e->getMessage()];
        }
    }
    
    
    function getAll($table){
        try {
            $stm = $this->db->prepare("SELECT * FROM ".$table);
            $stm->execute();
            $stm->setFetchMode(PDO::FETCH_ASSOC);
            return $stm->fetchAll();
        } catch (Exception $th) {
            return $th.getMessage();
        }
    }

    function destroy($table, $id){
        try {
            $stm = $this->db->prepare("DELETE FROM ".$table."WHERE id=".$id);
            $stm->execute($id);

            // return $stm->fetchAll();
        } catch (Exception $th) {
            return $th.getMessage();
        }
    }
        
}


?>