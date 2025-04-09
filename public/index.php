<?php
define('BASE_PATH', realpath(dirname(__FILE__) . '/../'));

// Include necessary controllers
require_once BASE_PATH . '/config/database.php';
require_once BASE_PATH . '/controllers/BookController.php';
require_once BASE_PATH . '/controllers/UserController.php';
require_once BASE_PATH . '/controllers/AdminController.php';

// Simple router setup
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($request) {
    case '/' :
    case '' :
        require BASE_PATH . '/views/books/list.php';
        break;
    case '/book':
        $bookController = new BookController();
        if (isset($_GET['id'])) {
            $bookController->showBookDetails($_GET['id']);
        } else {
            header("HTTP/1.0 404 Not Found");
            require BASE_PATH . '/views/404.php';
        }
        break;
    case '/login':
        require BASE_PATH . '/views/users/login.php';
        break;
    case '/register':
        require BASE_PATH . '/views/users/register.php';
        break;
    case '/profile':
        $userController = new UserController();
        require BASE_PATH . '/views/users/profile.php';
        break;
    case '/add-book':
        $adminController = new AdminController();
        require BASE_PATH . '/views/admin/add_book.php';
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        require BASE_PATH . '/views/404.php';
        break;
}