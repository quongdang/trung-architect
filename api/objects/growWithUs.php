<?php
class GrowWithUs{
 
    // database connection and table name
    private $conn;
    private $table_name = "grow_with_us";
 
    // object properties
    public $id;
	public $title_vn;
    public $title_en;
    public $content_vn;
    public $content_en;
    public $created;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
	
	// read projects
	function read(){
	 
		// select all query
		$query = "  SELECT
                        p.id, p.title_vn, p.title_en,
                        p.content_vn, p.content_en,
                        p.created
				    FROM " . $this->table_name . " p
				    ORDER BY p.created DESC";
	 
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
					title_vn=:title_vn, 
					title_en=:title_en,
					content_vn=:content_vn,
					content_en=:content_en,
					created=:created";
	 
		// prepare query
		$stmt = $this->conn->prepare($query);
	 
		// sanitize
		$this->title_vn=htmlspecialchars(strip_tags($this->title_vn));
		$this->title_en=htmlspecialchars(strip_tags($this->title_en));
		$this->content_vn=htmlspecialchars(strip_tags($this->content_vn));
		$this->content_en=htmlspecialchars(strip_tags($this->content_en));
		$this->created=htmlspecialchars(strip_tags($this->created));
	 
		// bind values
		$stmt->bindParam(":title_vn", $this->title_vn);
		$stmt->bindParam(":title_en", $this->title_en);
		$stmt->bindParam(":content_vn", $this->content_vn);
		$stmt->bindParam(":content_en", $this->content_en);
		$stmt->bindParam(":created", $this->created);

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
					p.id, p.title_vn, p.title_en, 
					p.content_vn, p.content_en,
					p.created
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
		$this->title_vn = $row['title_vn'];
		$this->title_en = $row['title_en'];
		$this->content_vn = $row['content_vn'];
		$this->content_en = $row['content_en'];
		$this->created = $row['created'];
	}
	
	// update the project
	function update(){
	 
		// update query
		$query = "UPDATE
					" . $this->table_name . "
				SET
					title_vn=:title_vn, 
					title_en=:title_en,
					content_vn=:content_vn,
					content_en=:content_en
				WHERE
					id = :id";
	 
		// prepare query statement
		$stmt = $this->conn->prepare($query);
	 
		// sanitize
		$this->title_vn=htmlspecialchars(strip_tags($this->title_vn));
		$this->title_en=htmlspecialchars(strip_tags($this->title_en));
		$this->content_vn=htmlspecialchars(strip_tags($this->content_vn));
		$this->content_en=htmlspecialchars(strip_tags($this->content_en));
		$this->id=htmlspecialchars(strip_tags($this->id));
	 
		// bind new values
		$stmt->bindParam(":title_vn", $this->title_vn);
		$stmt->bindParam(":title_en", $this->title_en);
		$stmt->bindParam(":content_vn", $this->content_vn);
		$stmt->bindParam(":content_en", $this->content_en);
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
					p.id, p.title_vn, p.title_en,
					p.content_vn, p.content_en,
					p.created
				FROM
					" . $this->table_name . " p
				WHERE
					p.title_vn LIKE ? 
					OR p.title_en LIKE ? 
					OR p.content_vn LIKE ?
					OR p.content_en LIKE ?
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
		$stmt->bindParam(3, $keywords);
		$stmt->bindParam(4, $keywords);
	 
		// execute query
		$stmt->execute();
	 
		return $stmt;
	}

	// used to get latest data
	function readLast(){
	 
		// query to read single record
		$query = "SELECT 
					p.id, p.title_vn, p.title_en, 
					p.content_vn, p.content_en,
					p.created
				FROM
					" . $this->table_name . " p
				ORDER BY p.created DESC 
				LIMIT
					0,1";
	 
		// prepare query statement
		$stmt = $this->conn->prepare( $query );
	 
		// execute query
		$stmt->execute();
	 
		// get retrieved row
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
	 
		// set values to object properties
		$this->id = $row['id'];
		$this->title_vn = $row['title_vn'];
		$this->title_en = $row['title_en'];
		$this->content_vn = $row['content_vn'];
		$this->content_en = $row['content_en'];
		$this->created = $row['created'];
	}
}