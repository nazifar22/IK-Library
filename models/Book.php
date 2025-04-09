<?php

class Book {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function getAllBooks() {
        $stmt = $this->db->prepare("SELECT * FROM books");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getBookById($id) {
        $stmt = $this->db->prepare("SELECT * FROM books WHERE id = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addBook($title, $author, $description, $cover_image, $year_of_publication, $source_planet) {
        $stmt = $this->db->prepare("INSERT INTO books (title, author, description, cover_image, year_of_publication, source_planet) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $title);
        $stmt->bindParam(2, $author);
        $stmt->bindParam(3, $description);
        $stmt->bindParam(4, $cover_image);
        $stmt->bindParam(5, $year_of_publication);
        $stmt->bindParam(6, $source_planet);
        $stmt->execute();
        return $this->db->lastInsertId();
    }
}