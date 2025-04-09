<?php
require_once 'database.php';

// Path to the SQL file
$sqlFilePath = __DIR__ . '/../database/schema.sql';

try {
    // Get database connection
    $pdo = getDatabaseConnection();

    // Read the entire SQL file
    $sql = file_get_contents($sqlFilePath);

    if ($sql === false) {
        throw new Exception("Unable to read the SQL file.");
    }

    // Execute the SQL commands from the file
    $pdo->exec($sql);

    echo "Database tables created successfully.\n";
} catch (Exception $e) {
    // Handle potential errors here
    echo "An error occurred while setting up the database: " . $e->getMessage() . "\n";
}
?>
