<?php
require_once realpath(dirname(__FILE__) . '/../../public/index.php');
require_once BASE_PATH . '/controllers/BookController.php';
$title = "Book List";
include BASE_PATH . '/views/header.php';

$bookController = new BookController();
$books = $bookController->listBooks();
?>

<h1 class="text-center my-4">Book List</h1>
<div class="row">
    <?php foreach ($books as $book): ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="<?= htmlspecialchars($book['cover_image']) ?>" class="card-img-top" alt="Cover image of <?= htmlspecialchars($book['title']) ?>">
                <div class="card-body">
                    <h5 class="card-title"><a href="/book?id=<?= htmlspecialchars($book['id']) ?>"><?= htmlspecialchars($book['title']) ?></a></h5>
                    <p class="card-text">Author: <?= htmlspecialchars($book['author']) ?></p>
                    <p class="card-text"><?= htmlspecialchars($book['description']) ?></p>
                </div>
                <div class="card-footer">
                    <a href="/book?id=<?= htmlspecialchars($book['id']) ?>" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php include BASE_PATH . '/views/footer.php'; ?>
