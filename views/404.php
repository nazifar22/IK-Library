<?php
require_once realpath(dirname(__FILE__) . '/../public/index.php');
$title = "Page Not Found";
include BASE_PATH . '/views/header.php';
?>

<div class="container text-center mt-5">
    <h1 class="display-1">404</h1>
    <h2 class="mb-4">Page Not Found</h2>
    <p class="lead">Sorry, the page you are looking for does not exist.</p>
    <a href="/" class="btn btn-primary mt-3">Go to Home</a>
</div>

<?php include BASE_PATH . '/views/footer.php'; ?>
