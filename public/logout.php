<?php
require_once '../helpers/authentication.php';

// Log out the user
logoutUser();

// Redirect to login page
header('Location: /login');
exit();