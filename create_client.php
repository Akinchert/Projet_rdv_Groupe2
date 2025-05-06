<?php
require 'db.php';
$password = password_hash("client123", PASSWORD_DEFAULT);
$stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
$stmt->execute(["Client", "client@example.com", $password, "client"]);
echo "Client créé.";
?>