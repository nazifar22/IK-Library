<?php
// Define the path to the SQLite database file
define('DATABASE_FILE', __DIR__ . '/../database/catalogue.db');

// echo "Trying to connect to the database at: " . DATABASE_FILE . "\n";

// Function to get the PDO database connection
function getDatabaseConnection() {
    // Create a DSN (Data Source Name) for the connection
    $dsn = "sqlite:" . DATABASE_FILE;

    try {
        // Create a new PDO connection object
        $pdo = new PDO($dsn);

        // Set error mode to Exception to handle any connection errors
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Enable exceptions on fetch errors
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        // Set default fetch mode to FETCH_ASSOC for associative arrays
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo;
    } catch (PDOException $e) {
        // Handle and log the error appropriately
        error_log("Database connection failed: " . $e->getMessage());
        die("Database connection error. Please check the log.");
    }
}
?>