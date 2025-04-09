<?php
require_once realpath(dirname(__FILE__) . '/../../public/index.php');
$title = "Add New Book";
$cssFile = "admin/add_book.css";
include BASE_PATH . '/views/header.php';
?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Add a New Book</h1>
    <form action="/add_book_processor.php" method="post">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" class="form-control" id="author" name="author" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="cover_image">Cover Image URL:</label>
            <input type="url" class="form-control" id="cover_image" name="cover_image" required>
        </div>
        <div class="form-group">
            <label for="year_of_publication">Year of Publication:</label>
            <input type="number" class="form-control" id="year_of_publication" name="year_of_publication" required>
        </div>
        <div class="form-group">
            <label for="source_planet">Source Planet:</label>
            <input type="text" class="form-control" id="source_planet" name="source_planet" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Add Book</button>
    </form>
</div>

<?php include BASE_PATH . '/views/footer.php'; ?>
