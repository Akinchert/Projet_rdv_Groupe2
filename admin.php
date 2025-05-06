<?php
require 'db.php';
require 'utils.php';

$token = $_GET['token'];
$user = getUserFromToken($pdo, $token);
// if ($user['role'] !== 'admin') {
//     http_response_code(403);
//     exit;
// }

$data = json_decode(file_get_contents("php://input"), true);
$stmt = $pdo->prepare("INSERT INTO time_slots (date, start_time, end_time) VALUES (?, ?, ?)");
$stmt->execute([$data['date'], $data['start_time'], $data['end_time']]);
echo json_encode(["success" => true]);
?>