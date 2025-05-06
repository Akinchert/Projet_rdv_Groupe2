<?php
require 'db.php';
require 'utils.php';

$token = $_GET['token'];
$user = getUserFromToken($pdo, $token);

// Lister les créneaux disponibles
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $pdo->query("SELECT * FROM time_slots WHERE is_booked = 0");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}

// Réserver un créneau
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $slot_id = $data['time_slot_id'];

    $pdo->beginTransaction();
    $stmt = $pdo->prepare("UPDATE time_slots SET is_booked = 1 WHERE id = ? AND is_booked = 0");
    $stmt->execute([$slot_id]);

    if ($stmt->rowCount()) {
        $stmt = $pdo->prepare("INSERT INTO reservations (user_id, time_slot_id) VALUES (?, ?)");
        $stmt->execute([$user['id'], $slot_id]);
        $pdo->commit();
        echo json_encode(["success" => true]);
    } else {
        $pdo->rollBack();
        echo json_encode(["error" => "Créneau déjà réservé"]);
    }
}
?>