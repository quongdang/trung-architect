<?php
class Category{
 
    // database connection and table name
    private $conn;
    private $table_name = "categories";
 
    // object properties
    public $id;
	public $category_vn;
	public $category_en;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
	
	// read projects
	function read(){
	 
		// select all query
		$query = "SELECT
					p.id, p.category_vn, p.category_en
				FROM
					" . $this->table_name . " p
				ORDER BY
					p.id ASC";
	 
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
					category_vn=:category_vn,
					category_en=:category_en";
	 
		// prepare query
		$stmt = $this->conn->prepare($query);
	 
		// sanitize
		$this->category_en=htmlspecialchars(strip_tags($this->category_en));
		$this->category_vn=htmlspecialchars(strip_tags($this->category_vn));
	 
		// bind values
		$stmt->bindParam(":category_vn", $this->category_vn);
		$stmt->bindParam(":category_en", $this->category_en);
	 
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
					p.id, p.category_vn, p.category_en
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
		$this->category_vn = $row['category_vn'];
        $this->category_en = $row['category_en'];
	}
	
	// update the project
	function update(){
	 
		// update query
		$query = "UPDATE
					" . $this->table_name . "
				SET
					category_vn=:category_vn,
					category_en=:category_en
				WHERE
					id = :id";
	 
		// prepare query statement
		$stmt = $this->conn->prepare($query);
	 
		// sanitize
		$this->category_vn=htmlspecialchars(strip_tags($this->category_vn));
        $this->category_en=htmlspecialchars(strip_tags($this->category_en));
		$this->id=htmlspecialchars(strip_tags($this->id));
	 
		// bind new values
		$stmt->bindParam(":category_vn", $this->category_vn);
        $stmt->bindParam(":category_en", $this->category_en);
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
	
	// search projects
	function search($keywords){
	 
		// select all query
		$query = "SELECT
					p.id, p.category_vn, p.category_en
				FROM
					" . $this->table_name . " p
				WHERE
					p.category_vn LIKE ? 
					OR p.category_en LIKE ? 
				ORDER BY
					p.created DESC";
	 
		// prepare query statement
		$stmt = $this->conn->prepare($query);
	 
		// sanitize
		$keywords=htmlspecialchars(strip_tags($keywords));
		$keywords = "%{$keywords}%";
	 
		// bind
		$stmt->bindParam(1, $keywords);
		$stmt->bindParam(2, $keywords);
	 
		// execute query
		$stmt->execute();
	 
		return $stmt;
	}
}