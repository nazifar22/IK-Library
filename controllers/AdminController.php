<?php
require_once '../models/Book.php';
require_once '../config/database.php';

class AdminController {
    private $bookModel;

    public function __construct() {
        $this->bookModel = new Book(getDatabaseConnection());
    }

    public function addBook($title, $author, $description, $coverImage, $yearOfPublication, $sourcePlanet, $averageRating) {
        // Add validation and authentication checks if needed
        return $this->bookModel->addBook($title, $author, $description, $coverImage, $yearOfPublication, $sourcePlanet, $averageRating);
    }
}
