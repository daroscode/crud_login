<?php

session_start();

$dbname = 'crud_login';
$dbuser = 'root';
$dbpass = '';
$dbhost = 'localhost';
$db = null;

try {
    $db = new PDO("mysql:dbname=" . $dbname . ";host=" . $dbhost, $dbuser, $dbpass);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}

