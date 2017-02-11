<?php

include_once 'database.php';

class Books {
    
    /**
     * @var Database
     */
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    public function getBooks($page) {
        return $this->db->getAllBooks($page);
    }
    
    public function getSingleBook($id) {
        return $this->db->getBook($id);
    }
    
    public function getPageCount() {
        return $this->db->getPageCount();
    }
    
}

?>