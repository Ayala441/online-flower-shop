<?php
$host = 'localhost';
$dbname = 'flower_shop_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Қателерді шығару режимін қосу
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Дерекқорға қосылу қатесі: " . $e->getMessage());
}
?>