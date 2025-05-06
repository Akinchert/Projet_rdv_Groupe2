<?php
function getUserFromToken($pdo, $token) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE password = ?");
    $stmt->execute([$token]); // Simpliﬁé pour démonstration
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>