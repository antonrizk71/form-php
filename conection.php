<?php
$dsn = "mysql:host=localhost;dbname=depi";
$user = 'root';
$pass = '';

try {
    $con = new PDO($dsn, $user, $pass);
    // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
