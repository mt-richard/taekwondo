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

        // login function
        function login($email, $password) {
            try {
                $query = "SELECT * FROM users WHERE email = ?";
                $stm = $this->db->prepare($query);
                $stm->execute([$email]);
                $user = $stm->fetch(PDO::FETCH_ASSOC);
        
                if ($user && ($password == $user['password'])) {
                    session_start();
                    $_SESSION['username'] = $user['username'];
                    return ["message" => "Login successful", "status" => 1, "user" => $user];
                } else {
                    return ["message" => "Invalid email or password", "status" => 0];
                }
            } catch (PDOException $e) {
                return ["message" => $e->getMessage(), "status" => 0];
            }
        }
        
    
        // inserting data into db table
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
            
        
        // updating data in db table
            function update($table, $data, $id) {
                try {
                    $query = "UPDATE ".$table." SET ";
                    $i = 0;
                    $values = [];
                    foreach ($data as $field => $value) {
                        $query .= $i == 0 ? $field."=?" : ",".$field."=?";
                        array_push($values, $value);
                        $i++;
                    }
                    $query .= " WHERE id=?";
                    array_push($values, $id);
                    $stm = $this->db->prepare($query);
                    $stm->execute($values);

                    return ["status" => "success", "message" => "Record updated successfully"];
                } catch (PDOException $e) {
                    return ["status" => "error", "message" => $e->getMessage()];
                }
            }

        // retrieve all data
        function getAll($table){
            try {
                $stm = $this->db->prepare("SELECT * FROM " . $table . " ORDER BY createdat DESC");
                $stm->execute();
                $stm->setFetchMode(PDO::FETCH_ASSOC);
                return $stm->fetchAll();
            } catch (Exception $th) {
                return $th->getMessage();
            }
        }

        // latest champion
        function getChampion(){
            try {
                $stm = $this->db->prepare("SELECT * FROM champions ORDER BY `period` DESC, `createdat`  DESC LIMIT 1");
                $stm->execute();
                $champion = $stm->fetch(PDO::FETCH_ASSOC);
                return $champion;
            } catch (Exception $th) {
                return $th->getMessage();
            }
        }

        // latest events
        function getlatestEvent(){
            try {
                $stm = $this->db->prepare("SELECT * FROM events ORDER BY `event_date`  DESC LIMIT 1");
                $stm->execute();
                $event = $stm->fetch(PDO::FETCH_ASSOC);
                return $event;
            } catch (Exception $th) {
                return $th->getMessage();
            }
        }
        // get all events
        function getEvents($table) {
            try {
                $stm = $this->db->prepare("SELECT * FROM " . $table . " ORDER BY event_date DESC, CASE WHEN event_date < NOW() THEN 1 ELSE 0 END, createdat DESC");
                $stm->execute();
                $stm->setFetchMode(PDO::FETCH_ASSOC);
                return $stm->fetchAll();
            } catch (Exception $th) {
                return $th->getMessage();
            }
        }
        
      
        
        // latest news
        function getOverview(){
            try {
                $stm = $this->db->prepare("SELECT * FROM overview ORDER BY `createdat`  DESC LIMIT 3");
                $stm->execute();
                $result = $stm->fetch(PDO::FETCH_ASSOC);
                return $result;
            } catch (Exception $th) {
                return $th->getMessage();
            }
        }

        // Get user by ID 
        function getByid($table, $id) {
            try {
                $stm = $this->db->prepare("SELECT * FROM " . $table . " WHERE id = :id");
                $stm->bindParam(':id', $id, PDO::PARAM_INT);
                $stm->execute();
                $result = $stm->fetch(PDO::FETCH_ASSOC);
                return $result;
            } catch (Exception $th) {
                return $th->getMessage();
            }
        }
        
       // Get News by state 
       function getNews($table, $state, $limit) {
            try {
                $stm = $this->db->prepare("SELECT * FROM $table WHERE state = :state ORDER BY createdat DESC LIMIT :limit");
                $stm->bindParam(':limit', $limit, PDO::PARAM_INT);
                $stm->bindParam(':state', $state);
                $stm->execute();
                $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } catch (PDOException $th) {
                return $th->getMessage();
            }
        }

        // Get Hot News 
        function getHotNews() {
            try {
                $stm = $this->db->prepare("SELECT * FROM news WHERE state = 'HOT' ORDER BY createdat DESC LIMIT 1");
                $stm->execute();
                $new = $stm->fetch(PDO::FETCH_ASSOC); 
                return $new;
            } catch (PDOException $th) {
                return $th->getMessage();
            }
        }

        // all news
        function getAllNews() {
            try {
                $stm = $this->db->prepare("SELECT * FROM  news ORDER BY createdat DESC");
                $stm->execute();
                $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } catch (Exception $th) {
                return $th->getMessage();
            }
        }
        // latest comment
        function getComments($id){
            try {
                $stm = $this->db->prepare("SELECT * FROM comments WHERE news_id = :id ORDER BY `createdat`  DESC LIMIT 2");
                $stm->bindParam(':id', $id, PDO::PARAM_INT);
                $stm->execute();
                $stm->setFetchMode(PDO::FETCH_ASSOC);
                return $stm->fetchAll();
            } catch (Exception $th) {
                return $th->getMessage();
            }
        }

        //  count total rows
        function countTotal($table) {
            try {
                $stm = $this->db->prepare("SELECT COUNT(*) as total FROM $table ");
                $stm->execute();
                $result = $stm->fetch(PDO::FETCH_ASSOC);
                return $result['total'];
            } catch (PDOException $th) {
                return 0; 
            }
        }

        // delete
        function destroy($table, $id) {
            try {
                $stm = $this->db->prepare("DELETE FROM ".$table." WHERE id = :id");
                $stm->bindParam(':id', $id, PDO::PARAM_INT);
                $stm->execute();
                return "Record deleted successfully.";
            } catch (Exception $th) {
                return "Error deleting record: " . $th->getMessage();
            }
        }
        
}


?>