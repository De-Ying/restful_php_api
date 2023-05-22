<?php

class Post {
    private $conn;

    // POST properties
    public $id;
    public $title;
    public $description;

    // Connect DB
    public function __construct($db) 
    {
        $this->conn = $db;
    }

    // Read Data
    public function read()
    {
        $query = "SELECT * FROM posts ORDER BY id DESC";
        $stmt = $this->conn->prepare($query); // prepare ~ mysqli
        $stmt->execute();
        return $stmt;
    }

    // Show Data
    public function show() // $id
    {
        $query = "SELECT * FROM posts WHERE id=? LIMIT 1";
        $stmt = $this->conn->prepare($query); // prepare ~ mysqli
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->title = $row['title'];
        $this->description = $row['description'];
    }

    // Create Data 
    public function create()
    {
        $query = "INSERT INTO posts SET title=:title, description=:description";
        $stmt = $this->conn->prepare($query);
        
        // Clean Data
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->description = htmlspecialchars(strip_tags($this->description));

        // Bind Data
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':description', $this->description);

        if ($stmt->execute()) {
            return true;
        }

        printf("Error %s.\n", $stmt->error);
        return false;

    }

    // Create Data 
    public function update()
    {
        $query = "UPDATE posts SET title=:title, description=:description WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        
        // Clean Data
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->id = $this->id;

        // Bind Data
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        printf("Error %s.\n", $stmt->error);
        return false;
    }

    // Delete Data
    public function delete()
    {
        $query = "DELETE FROM posts WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        
        // Clean Data
        $this->id = $this->id;

        // Bind Data
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        printf("Error %s.\n", $stmt->error);
        return false;
    }

}