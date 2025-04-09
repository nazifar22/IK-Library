<?php
require_once '../helpers/validation.php';
require_once '../models/User.php';
require_once '../config/database.php';

// Start or resume a session
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';

    // Validate inputs
    if ($password !== $confirmPassword) {
        $error = 'Passwords do not match.';
        header('Location: register.php?error=' . urlencode($error));
        exit;
    }
    if (!validateEmail($email) || !validateUsername($username) || !validatePassword($password)) {
        $error = 'Invalid input data. Please check your entries.';
        header('Location: register.php?error=' . urlencode($error));
        exit;
    }

    // Initialize the User model with database connection
    $userModel = new User(getDatabaseConnection());

    // Check if username or email already exists
    if ($userModel->getUserByUsername($username) || $userModel->getUserByEmail($email)) {
        $error = 'Username or email already exists.';
        header('Location: register.php?error=' . urlencode($error));
        exit;
    }

    // Hash password and create user
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $userModel->createUser($username, $email, $hashedPassword);

    // Optionally log the user in and redirect to profile page
    header('Location: /profile');
    exit;
} else {
    // Not a POST request: redirect back to the registration form
    header('Location: /register');
    exit;
}
