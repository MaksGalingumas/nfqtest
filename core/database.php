<?php

class Database {
    
    private $dbName = 'knygos';
    private $user = 'root';
    private $password = '';
    private $host = 'localhost';
    
    private $perPage = 10;
    
    private $connection;
    
    public function __construct() {
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->dbName);
    }
    
    public function getAllBooks($page = 1)
    {
        $offset = --$page * $this->perPage;
        $result = $this->connection->query("SELECT * FROM books LIMIT ".$offset.", ".$this->perPage);
        
        $books = [];
        
        while ($myrow = $result->fetch_array(MYSQLI_ASSOC)) {
            $books[] = $myrow;
        }
        
        return $books;
    }
    
    public function getBook($id) {
        $result = $this->connection->query("SELECT * FROM books WHERE id = " . $id);
        
        return $result->fetch_array(MYSQLI_ASSOC);
    }
    
    public function searchByTitle($title) {
        $result = $this->connection->query("SELECT * FROM books WHERE title LIKE '%" .
            $this->connection->escape_string($title) . "%'");
        
        while ($myrow = $result->fetch_array(MYSQLI_ASSOC)) {
            $books[] = $myrow;
        }
        
        return $books;
    }
    
    public function getPageCount()
    {
        $result = $this->connection->query("SELECT COUNT(*) AS total FROM books");
        
        $count = $result->fetch_row();
        $count = (int)array_pop($count);
        
        $pageCount = ceil($count/$this->perPage);
        
        return $pageCount;
    }
    
}

