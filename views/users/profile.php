<?php
require_once realpath(dirname(__FILE__) . '/../../public/index.php');
require_once BASE_PATH . '/helpers/authentication.php';

$title = "Profile";
$cssFile = "users/profile.css";
include BASE_PATH . '/views/header.php';

if (!isUserLoggedIn()) {
    header('Location: /login');
    exit();
}

// // Debugging: Print session data
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Welcome, <?= htmlspecialchars($_SESSION['username'] ?? 'Guest') ?></h2>
                </div>
                <div class="card-body text-center">
                    <p class="card-text"><strong>Email:</strong> <?= htmlspecialchars($_SESSION['email'] ?? 'Not provided') ?></p>
                    <p class="card-text"><strong>Role:</strong> <?= htmlspecialchars($_SESSION['role'] ?? 'User') ?></p>
                    <a href="/logout.php" class="btn btn-danger mt-3">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include BASE_PATH . '/views/footer.php'; ?>
