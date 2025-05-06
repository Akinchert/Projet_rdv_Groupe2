<?php
require 'db.php';
$password = password_hash("admin123", PASSWORD_DEFAULT);
$stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
$stmt->execute(["Admin", "admin@example.com", $password, "admin"]);
echo "Admin créé.";
?>
