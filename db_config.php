<?php
// Configuration for Database
$host = 'localhost';
$db_name = 'mr'; // The name you used in phpMyAdmin
$username = 'root';            // Default XAMPP username
$password = '';                // Default XAMPP password (empty)

try {
    // Create a new PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8mb4", $username, $password);
    
    // Set error mode to exception to catch connection issues
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Set default fetch mode to associative array
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // If connection fails, stop and show error
    die("Database Connection Failed: " . $e->getMessage());
}
?>