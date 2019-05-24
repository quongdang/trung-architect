<?php
class FirebaseToken{
 
    // database connection and table name
    private $conn;
    private $table_name = "firebase_token";
 
    // object properties
    public $id;
	public $fcmToken;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
	
	// read projects
	function read(){
	 
		// select all query
		$query = "  SELECT
                        p.id, p.fcmToken
				    FROM " . $this->table_name . " p
				    ORDER BY p.id DESC";
	 
		// prepare query statement
		$stmt = $this->conn->prepare($query);
	 
		// execute query
		$stmt->execute();
	 
		return $stmt;
	}
	
	// create project
	function create(){
	 
		// query to insert record
		$query = "INSERT INTO
					" . $this->table_name . "
				SET
                    fcmToken=:fcmToken";
	 
		// prepare query
		$stmt = $this->conn->prepare($query);
	 
		// sanitize
		$this->fcmToken=htmlspecialchars(strip_tags($this->fcmToken));
	 
		// bind values
		$stmt->bindParam(":fcmToken", $this->fcmToken);

		// execute query
		if($stmt->execute()){
			return true;
		}
	 
		return false;
		 
	}
	
	// used when filling up the update project form
	function readOne(){
	 
		// query to read single record
		$query = "SELECT 
					p.id, p.fcmToken
				FROM
					" . $this->table_name . " p
				WHERE
					p.id = ?
				LIMIT
					0,1";
	 
		// prepare query statement
		$stmt = $this->conn->prepare( $query );
	 
		// bind id of project to be updated
		$stmt->bindParam(1, $this->id);
	 
		// execute query
		$stmt->execute();
	 
		// get retrieved row
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
	 
		// set values to object properties
		$this->fcmToken = $row['fcmToken'];
	}
	
	// update the project
	function update(){
	 
		// update query
		$query = "UPDATE
					" . $this->table_name . "
				SET
                    fcmToken=:fcmToken
				WHERE
					id = :id";
	 
		// prepare query statement
		$stmt = $this->conn->prepare($query);
	 
		// sanitize
		$this->fcmToken=htmlspecialchars(strip_tags($this->fcmToken));
		$this->id=htmlspecialchars(strip_tags($this->id));
	 
		// bind new values
		$stmt->bindParam(":fcmToken", $this->fcmToken);
		$stmt->bindParam(":id", $this->id);
	 
		// execute the query
		if($stmt->execute()){
			return true;
		}
	 
		return false;
	}
	
	// delete the project
	function delete(){
	 
		// delete query
		$query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
	 
		// prepare query
		$stmt = $this->conn->prepare($query);
	 
		// sanitize
		$this->id=htmlspecialchars(strip_tags($this->id));
	 
		// bind id of record to delete
		$stmt->bindParam(1, $this->id);
	 
		// execute query
		if($stmt->execute()){
			return true;
		}
	 
		return false;		 
	}	
}