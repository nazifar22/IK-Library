## Flowchart

[Start]
   |
   v
[Define Database Schema (schema.sql)]
   |
   v
[Set Up Database Configuration (database.php)]
   |
   v
[Develop Models]
   |
   +-->[Book.php]
   |
   +-->[User.php]
   |
   +-->[Review.php]
   |
   v
[Implement Helpers]
   |
   +-->[validation.php]
   |
   +-->[authentication.php]
   |
   v
[Develop Controllers]
   |
   +-->[BookController.php]
   |
   +-->[UserController.php]
   |
   +-->[AdminController.php]
   |
   v
[Create Views]
   |
   +-->[books/list.php]
   |
   +-->[books/detail.php]
   |
   +-->[users/profile.php]
   |
   +-->[users/login.php]
   |
   +-->[users/register.php]
   |
   +-->[admin/add_book.php]
   |
   v
[Set Up Public Entry Point]
   |
   +-->[index.php]
   |
   +-->[.htaccess]
   |
   v
[End]





## Description:

Database Setup

/database/schema.sql: Define the SQL schema for the database, including tables for books, users, reviews, and any necessary relationships.

Configuration

/config/database.php: Set up the database connection configuration.

Models

/models/Book.php: Create the Book model to handle book-related data operations.
/models/User.php: Create the User model to handle user-related data operations.
/models/Review.php: Create the Review model to handle review-related data operations.

Helpers

/helpers/validation.php: Implement data validation functions.
/helpers/authentication.php: Implement user authentication functions.

Controllers

/controllers/BookController.php: Handle actions related to books (e.g., listing books, viewing book details).
/controllers/UserController.php: Handle user actions (e.g., registration, login, profile management).
/controllers/AdminController.php: Handle admin actions (e.g., adding new books).

Views

/views/books/list.php: Create the main page listing all books.
/views/books/detail.php: Create the book details page.
/views/users/profile.php: Create the user profile page.
/views/users/login.php: Create the login page.
/views/users/register.php: Create the registration page.
/views/admin/add_book.php: Create the page for admin to add new books.

Public Entry Point

/public/index.php: Set up the entry point of the application, route requests to appropriate controllers.
/public/.htaccess: Set up URL rewriting rules to direct requests to the index.php file.