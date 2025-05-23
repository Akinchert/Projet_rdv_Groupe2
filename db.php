<?php
// $pdo = new PDO("mysql:host=localhost;dbname=appointments", "root", "");
// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<?php
$host = getenv("mysql.railway.internal");
$db   = getenv("appointments");
$user = getenv("root");
$pass = getenv("irzxqzYcmmRunLnYZkIQjhTSvWMmadIt");

$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>