<?php
/**
 * Configuration for database connection
 *
 */
$host = "127.0.0.1";
$username = "root";
$password = "sqlpassword";
$dbname = "project"; // will use later
$dsn = "mysql:host=$host;dbname=$dbname"; // will use later
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);