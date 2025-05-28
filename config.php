<?php
$host = 'sql309.byetcluster.com';
$dbname = 'if0_39022788_leafcraft';
$user = 'if0_39022788';
$pass = 'h5GuGsdz5Qt81';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>