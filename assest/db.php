<?php

if (!defined('DB_SERVER')) {
    // Database credentials
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'blog');

    try {
        // Attempt to connect to MySQL database
        $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Assign the connection object to a global variable
        $GLOBALS['conn'] = $pdo;
    } catch (PDOException $e) {
        // Handle connection errors
        $GLOBALS['e'] = $e;
        die("ERROR: Could not connect. " . $e->getMessage());
    }
}
