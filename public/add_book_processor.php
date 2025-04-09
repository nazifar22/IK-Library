<?php
require_once '../models/Book.php';
require_once '../config/database.php';
require_once '../helpers/authentication.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isUserLoggedIn() && $_SESSION['role'] === 'admin') {
    $title = $_POST['title'] ?? '';
    $author = $_POST['author'] ?? '';
    $description = $_POST['description'] ?? '';
    $cover_image = $_POST['cover_image'] ?? '';
    $year_of_publication = $_POST['year_of_publication'] ?? '';
    $source_planet = $_POST['source_planet'] ?? '';

    // Initialize the Book model with database connection
    $bookModel = new Book(getDatabaseConnection());

    // Add the book to the database
    $bookModel->addBook($title, $author, $description, $cover_image, $year_of_publication, $source_planet);

    // Redirect to a success page or book list
    header('Location: /');
    exit;
} else {
    // Not a POST request or not logged in as admin
    header('Location: /login');
    exit;
}