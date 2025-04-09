<?php
require_once '../models/Book.php';
require_once '../config/database.php';

class BookController {
    private $bookModel;

    public function __construct() {
        $this->bookModel = new Book(getDatabaseConnection());
    }

    public function listBooks() {
        return $this->bookModel->getAllBooks();
    }

    public function showBookDetails($id) {
        $book = $this->bookModel->getBookById($id);
        if ($book) {
            require BASE_PATH . '/views/books/detail.php';
        } else {
            header("HTTP/1.0 404 Not Found");
            require BASE_PATH . '/views/404.php';
        }
    }
}
