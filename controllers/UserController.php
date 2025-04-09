<?php
require_once '../models/User.php';
require_once '../helpers/authentication.php';
require_once '../helpers/validation.php';
require_once '../config/database.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User(getDatabaseConnection());
    }

    public function register($username, $email, $password, $confirmPassword) {
        if ($password !== $confirmPassword) {
            return "Passwords do not match.";
        }
        if (!validateEmail($email) || !validateUsername($username) || !validatePassword($password)) {
            return "Invalid data provided.";
        }
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        return $this->userModel->createUser($username, $email, $hashedPassword);
    }

    public function login($username, $password) {
        $user = $this->userModel->getUserByUsername($username);
        if ($user && verifyPassword($password, $user['password_hash'])) {
            loginUser($user);
            return true;
        }
        return false;
    }

    public function logout() {
        logoutUser();
    }
}
