
<?php 
require_once realpath(dirname(__FILE__) . '/../../public/index.php');
require_once BASE_PATH . '/controllers/BookController.php';

$title = $book['title'];
include BASE_PATH . '/views/header.php'; 

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <img src="<?= htmlspecialchars($book['cover_image']) ?>" class="img-fluid rounded mb-3" alt="<?= htmlspecialchars($book['title']) ?>">
        </div>
        <div class="col-md-8">
            <h1 class="display-4"><?= htmlspecialchars($book['title']) ?></h1>
            <p class="lead">Author: <strong><?= htmlspecialchars($book['author']) ?></strong></p>
            <p><strong>Description:</strong></p>
            <p><?= htmlspecialchars($book['description']) ?></p>
            <p><strong>Year of Publication:</strong> <?= htmlspecialchars($book['year_of_publication']) ?></p>
            <p><strong>Source Planet:</strong> <?= htmlspecialchars($book['source_planet']) ?></p>
            <a href="/" class="btn btn-primary">Back to Book List</a>
        </div>
    </div>
</div>

<?php include BASE_PATH . '/views/footer.php'; ?>
