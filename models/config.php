<?php

$dns = 'mysql:host=localhost;dbname=portfolio';
$username = 'root';
$password = '';

try {
    $db = new PDO($dns, $username, $password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

