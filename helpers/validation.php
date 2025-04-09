<?php

/**
 * Validates an email address.
 * 
 * @param string $email The email to validate.
 * @return bool True if the email is valid, false otherwise.
 */
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Validates a password based on given criteria.
 * 
 * @param string $password The password to validate.
 * @return bool True if the password meets all criteria, false otherwise.
 */
function validatePassword($password) {
    // Example criteria: at least 8 characters, includes at least one number and one letter
    return preg_match('/^(?=.*\d)(?=.*[a-zA-Z]).{8,}$/', $password);
}

/**
 * Validates a username.
 * 
 * @param string $username The username to validate.
 * @return bool True if the username is valid, false otherwise.
 */
function validateUsername($username) {
    // Criteria: Only alphanumeric characters, 3-20 characters long
    return preg_match('/^[a-zA-Z0-9]{3,20}$/', $username);
}