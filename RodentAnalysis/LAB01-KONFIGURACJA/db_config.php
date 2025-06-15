<?php
$host = 'db';    
$port = 5432;      
$db   = 'mydb';
$user = 'myuser';
$pass = 'MojeHaslo';

$dsn = "pgsql:host=$host;port=$port;dbname=$db;";
try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Błąd połączenia z bazą: " . $e->getMessage());
}
