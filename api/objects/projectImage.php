<?php
class ProjectImage{
 
    // database connection and table name
    private $conn;
    private $table_name = "project_image";
 
    // object properties
    public $id;
	public $projectId;
    public $image_link;
    public $description_vn;
    public $description_en;
    public $display;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
	
	// read projects
	function read(){
	 
		// select all query
		$query = "SELECT
					p.id, p.project_id, p.image_link, 
                    p.description_vn, p.description_en, p.display
				FROM
					" . $this->table_name . " p
				ORDER BY
					p.id asc";
	 
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
					project_id=:project_id,
					image_link=:image_link,
                    description_vn=:description_vn,
                    description_en=:description_en,
					display=:display";
	 
		// prepare query
		$stmt = $this->conn->prepare($query);
	 
		// sanitize
		$this->project_id=htmlspecialchars(strip_tags($this->project_id));
        $this->image_link=htmlspecialchars(strip_tags($this->image_link));
        $this->description_vn=htmlspecialchars(strip_tags($this->description_vn));
        $this->description_en=htmlspecialchars(strip_tags($this->description_en));
		$this->display=htmlspecialchars(strip_tags($this->display));
		
		error_log("Create project Image!", 0);
        error_log($this->project_id, 0);
        error_log($this->image_link, 0);
        error_log($this->description_vn, 0);
        error_log($this->description_en, 0);
        error_log($this->display, 0);
	 
		// bind values
		$stmt->bindParam(":project_id", $this->project_id);
        $stmt->bindParam(":image_link", $this->image_link);
        $stmt->bindParam(":description_vn", $this->description_vn);
        $stmt->bindParam(":description_en", $this->description_en);
        $stmt->bindParam(":display", $this->display);
		// execute query
		if($stmt->execute()){
			$this->id = $this->conn->lastInsertId();
			return true;
		}
		return false;
		 
	}
	
	// used when filling up the update project form
	function readOne(){
	 
		// query to read single record
		$query = "SELECT
					p.id, p.project_id, p.image_link, 
                    p.description_vn, p.description_en, p.display
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
		$this->project_id = $row['project_id'];
        $this->image_link = $row['image_link'];
        $this->description_vn = $row['description_vn'];
        $this->description_en = $row['description_en'];
        $this->display = $row['display'];
	}
	
	// used when filling up the update project form
	function readByProjectId(){
	 
		// query to read single record
		$query = "SELECT
					p.id, p.project_id, p.image_link, 
                    p.description_vn, p.description_en, p.display
				FROM
					" . $this->table_name . " p
				WHERE
					p.project_id = ?";
	 
		// prepare query statement
		$stmt = $this->conn->prepare( $query );
	 
		// bind id of project to be updated
		$stmt->bindParam(1, $this->project_id);
	 
		// execute query
		$stmt->execute();
	 
		return $stmt;
	}
	
	// update the project
	function update(){
	 
		// update query
		$query = "UPDATE
					" . $this->table_name . "
				SET					
                    project_id=:project_id,
                    image_link=:image_link,
                    description_vn=:description_vn,
                    description_en=:description_en,
                    display=:display
				WHERE
					id = :id";
	 
		// prepare query statement
		$stmt = $this->conn->prepare($query);
	 
		// sanitize
		$this->project_id=htmlspecialchars(strip_tags($this->project_id));
        $this->image_link=htmlspecialchars(strip_tags($this->image_link));
        $this->description_vn=htmlspecialchars(strip_tags($this->description_vn));
        $this->description_en=htmlspecialchars(strip_tags($this->description_en));
        $this->display=htmlspecialchars(strip_tags($this->display));
		$this->id=htmlspecialchars(strip_tags($this->id));
	 
		// bind new values
		$stmt->bindParam(":project_id", $this->project_id);
        $stmt->bindParam(":image_link", $this->image_link);
        $stmt->bindParam(":description_vn", $this->description_vn);
        $stmt->bindParam(":description_en", $this->description_en);
        $stmt->bindParam(":display", $this->display);
		$stmt->bindParam(":id", $this->id);
	 
		// execute the query
		if($stmt->execute()){
			return true;
		}
	 
		return false;
	}
	
	// delete the project image
	function deleteByProjectId(){
	 
		// delete query
		$query = "DELETE FROM " . $this->table_name . " WHERE project_id = ?";
	 
		// prepare query
		$stmt = $this->conn->prepare($query);
	 
		// sanitize
		$this->id=htmlspecialchars(strip_tags($this->project_id));
	 
		// bind id of record to delete
		$stmt->bindParam(1, $this->id);
	 
		// execute query
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

	// used when filling up the update project form
	function readByProjectIdToArray(){
	 
		// query to read single record
		$query = "SELECT
					p.id, p.project_id, p.image_link, 
                    p.description_vn, p.description_en, p.display
				FROM
					" . $this->table_name . " p
				WHERE
					p.project_id = ?";
	 
		// prepare query statement
		$stmt = $this->conn->prepare( $query );
	 
		// bind id of project to be updated
		$stmt->bindParam(1, $this->project_id);
	 
		// execute query
		$stmt->execute();
	 
		$num = $stmt->rowCount();
 
		// check if more than 0 record found
		if($num>0){
		
			// projectImages array
			$projectImages_arr=array();
		
			// retrieve our table contents
			// fetch() is faster than fetchAll()
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				// extract row
				// this will make $row['name'] to
				// just $name only
				extract($row);
		
				$projectImage_item=array(
					"id" => $id,
					"project_id" => $project_id,
					"image_link" => $image_link,
					"description_vn" => $description_vn,
					"description_en" => $description_en,
					"display" => $display
				);
		
				array_push($projectImages_arr, $projectImage_item);
			}
		
			return ($projectImages_arr);
		}
		return array();
	}
}