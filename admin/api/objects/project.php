<?php
class Project{
 
    // database connection and table name
    private $conn;
    private $table_name = "projects";
 
    // object properties
    public $id;
	public $image0;
    public $image1;
    public $image2;
    public $image3;
    public $title_vn;
	public $title_en;
	public $subtitle_vn;
	public $subtitle_en;
	public $content_vn;
	public $content_en;
    public $category_id;
	public $category_vn;
	public $category_en;
    public $created;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
	
	// read projects
	function read(){
	 
		// select all query
		$query = "SELECT
					c.category_vn, c.category_en, 
					p.id, p.title_vn, p.title_en,
					p.subtitle_vn, p.subtitle_en, 
					p.content_vn, p.content_en,
					p.created, p.category_id, 
					p.image0, p.image1, 
					p.image2, p.image3
				FROM
					" . $this->table_name . " p
					LEFT JOIN
						categories c
							ON p.category_id = c.id
				ORDER BY
					p.created DESC";
	 
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
					image0=:image0,
					image1=:image1,
					image2=:image2,
					image3=:image3,
					title_vn=:title_vn, 
					title_en=:title_en,
					subtitle_vn=:subtitle_vn,
					subtitle_en=:subtitle_en,
					content_vn=:content_vn,
					content_en=:content_en,
					category_id=:category_id, 
					created=:created";
	 
		// prepare query
		$stmt = $this->conn->prepare($query);
	 
		// sanitize
		$this->image0=htmlspecialchars(strip_tags($this->image0));
        $this->image1=htmlspecialchars(strip_tags($this->image1));
        $this->image2=htmlspecialchars(strip_tags($this->image2));
        $this->image3=htmlspecialchars(strip_tags($this->image3));
		$this->title_vn=htmlspecialchars(strip_tags($this->title_vn));
		$this->title_en=htmlspecialchars(strip_tags($this->title_en));
		$this->subtitle_vn=htmlspecialchars(strip_tags($this->subtitle_vn));
		$this->subtitle_en=htmlspecialchars(strip_tags($this->subtitle_en));
		$this->content_vn=htmlspecialchars(strip_tags($this->content_vn));
		$this->content_en=htmlspecialchars(strip_tags($this->content_en));
		$this->category_id=htmlspecialchars(strip_tags($this->category_id));
		$this->created=htmlspecialchars(strip_tags($this->created));
	 
		// bind values
		$stmt->bindParam(":image0", $this->image0);
        $stmt->bindParam(":image1", $this->image1);
        $stmt->bindParam(":image2", $this->image2);
        $stmt->bindParam(":image3", $this->image3);
		$stmt->bindParam(":title_vn", $this->title_vn);
		$stmt->bindParam(":title_en", $this->title_en);
		$stmt->bindParam(":subtitle_vn", $this->subtitle_vn);
		$stmt->bindParam(":subtitle_en", $this->subtitle_en);
		$stmt->bindParam(":content_vn", $this->content_vn);
		$stmt->bindParam(":content_en", $this->content_en);
		$stmt->bindParam(":category_id", $this->category_id);
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
					c.category_vn, c.category_en, 
					p.id, p.title_vn, p.title_en,
					p.subtitle_vn, p.subtitle_en, 
					p.content_vn, p.content_en,
					p.created, p.category_id, 
					p.image0, p.image1,
					p.image2, p.image3
				FROM
					" . $this->table_name . " p
					LEFT JOIN
						categories c
							ON p.category_id = c.id
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
		$this->image0 = $row['image0'];
        $this->image1 = $row['image1'];
        $this->image2 = $row['image2'];
        $this->image3 = $row['image3'];
		$this->title_vn = $row['title_vn'];
		$this->title_en = $row['title_en'];
		$this->subtitle_vn = $row['subtitle_vn'];
		$this->subtitle_en = $row['subtitle_en'];
		$this->content_vn = $row['content_vn'];
		$this->content_en = $row['content_en'];
		$this->category_id = $row['category_id'];
		$this->created = $row['created'];
	}
	
	// update the project
	function update(){
	 
		// update query
		$query = "UPDATE
					" . $this->table_name . "
				SET
					image0=:image0,
					image1=:image1,
					image2=:image2,
					image3=:image3,
					title_vn=:title_vn, 
					title_en=:title_en,
					subtitle_vn=:subtitle_vn,
					subtitle_en=:subtitle_en,
					content_vn=:content_vn,
					content_en=:content_en,
					category_id=:category_id
				WHERE
					id = :id";
	 
		// prepare query statement
		$stmt = $this->conn->prepare($query);
	 
		// sanitize
		$this->image0=htmlspecialchars(strip_tags($this->image0));
        $this->image1=htmlspecialchars(strip_tags($this->image1));
        $this->image2=htmlspecialchars(strip_tags($this->image2));
        $this->image3=htmlspecialchars(strip_tags($this->image3));
		$this->title_vn=htmlspecialchars(strip_tags($this->title_vn));
		$this->title_en=htmlspecialchars(strip_tags($this->title_en));
		$this->subtitle_vn=htmlspecialchars(strip_tags($this->subtitle_vn));
		$this->subtitle_en=htmlspecialchars(strip_tags($this->subtitle_en));
		$this->content_vn=htmlspecialchars(strip_tags($this->content_vn));
		$this->content_en=htmlspecialchars(strip_tags($this->content_en));
		$this->category_id=htmlspecialchars(strip_tags($this->category_id));
		$this->id=htmlspecialchars(strip_tags($this->id));
	 
		// bind new values
		$stmt->bindParam(":image0", $this->image0);
        $stmt->bindParam(":image1", $this->image1);
        $stmt->bindParam(":image2", $this->image2);
        $stmt->bindParam(":image3", $this->image3);
		$stmt->bindParam(":title_vn", $this->title_vn);
		$stmt->bindParam(":title_en", $this->title_en);
		$stmt->bindParam(":subtitle_vn", $this->subtitle_vn);
		$stmt->bindParam(":subtitle_en", $this->subtitle_en);
		$stmt->bindParam(":content_vn", $this->content_vn);
		$stmt->bindParam(":content_en", $this->content_en);
		$stmt->bindParam(":category_id", $this->category_id);
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
					c.category_vn, c.category_en, 
					p.id, p.title_vn, p.title_en,
					p.subtitle_vn, p.subtitle_en, 
					p.content_vn, p.content_en,
					p.created, p.category_id, p.image
				FROM
					" . $this->table_name . " p
					LEFT JOIN
						categories c
							ON p.category_id = c.id
				WHERE
					p.title_vn LIKE ? 
					OR p.title_en LIKE ? 
					OR p.subtitle_vn LIKE ?
					OR p.subtitle_en LIKE ?
					OR p.content_vn LIKE ?
					OR p.content_en LIKE ?
					OR c.category_vn LIKE ?
					OR c.category_en LIKE ?
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
		$stmt->bindParam(5, $keywords);
		$stmt->bindParam(6, $keywords);
		$stmt->bindParam(7, $keywords);
		$stmt->bindParam(8, $keywords);
	 
		// execute query
		$stmt->execute();
	 
		return $stmt;
	}
}