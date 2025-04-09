<?php
session_start();

/**
 * Logs in the user by setting session data.
 *
 * @param array $user An associative array with user data (typically retrieved from the database).
 */
function loginUser($user) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['logged_in'] = true;
    $_SESSION['role'] = $user['role'];
}

/**
 * Checks if the user is currently logged in.
 *
 * @return bool True if user is logged in, false otherwise.
 */
function isUserLoggedIn() {
    return !empty($_SESSION['logged_in']);
}

/**
 * Logs out the user by clearing the session.
 */
function logoutUser() {
    session_destroy();
    $_SESSION = [];
}

/**
 * Verifies the user's password against the hashed password stored in the database.
 *
 * @param string $inputPassword The password input by the user.
 * @param string $storedHash The hashed password stored in the database.
 * @return bool True if the passwords match, false otherwise.
 */
function verifyPassword($inputPassword, $storedHash) {
    return password_verify($inputPassword, $storedHash);
}

/**
 * Check if the user is authenticated.
 *
 * @return bool True if user is authenticated, false otherwise.
 */
function isAuthenticated() {
    return isset($_SESSION['user_id']);
}
