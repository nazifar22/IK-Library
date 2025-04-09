<?php
require_once '../config/database.php';
require_once '../models/User.php';
require_once '../helpers/authentication.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Initialize the User model with database connection
    $userModel = new User(getDatabaseConnection());

    // Fetch user by username
    $user = $userModel->getUserByUsername($username);

    // Verify password and handle login
    if ($user && verifyPassword($password, $user['password_hash'])) {
        loginUser($user);

        // Debugging: Check if email is set in session
        echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';
        
        header('Location: /profile');
        exit;
    } else {
        // Authentication failed: handle error
        $error = 'Invalid username or password.';
        header('Location: /login?error=' . urlencode($error));
        exit;
    }
} else {
    // Not a POST request: redirect back to login form
    header('Location: /login');
    exit;
}
