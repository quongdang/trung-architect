<?php
class Project{
 
    // database connection and table name
    private $conn;
    private $table_name = "users";
 
    // object properties
    public $id;
    public $user_name;
	public $user_pass;
	public $user_email;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }	
	// used when filling up the update project form
	function validate(){	 
		// query to read single record
		$query = "SELECT
					p.user_name
				FROM
					" . $this->table_name . " p
					LEFT JOIN
						categories c
							ON p.category_id = c.id
				WHERE p.user_name = ?
				  AND p.user_pass = ?
				LIMIT
					0,1";
	 
		// prepare query statement
		$stmt = $this->conn->prepare( $query );
	 
		// bind id of project to be updated
		$stmt->bindParam(1, $this->user_name);
		$stmt->bindParam(1, $this->user_pass);
	 
		// execute query
		$stmt->execute();
	 
		// get retrieved row
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
	 
		// set values to object properties
		$this->user_name = $row['user_name'];
	}
}