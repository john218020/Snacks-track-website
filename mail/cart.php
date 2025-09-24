<?php
header('Content-Type: application/json');
$conn = new mysqli("localhost","root","","snackshop");
if($conn->connect_error){ http_response_code(500); echo json_encode(['ok'=>false]); exit; }

$data = json_decode(file_get_contents('php://input'), true);
$productId = isset($data['productId']) ? (int)$data['productId'] : 0;
$action = isset($data['action']) ? $data['action'] : 'add';
$ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';

$stmt = $conn->prepare("INSERT INTO cart_actions (product_id, action, ip_address) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $productId, $action, $ip);
$stmt->execute();
$stmt->close();
$conn->close();
echo json_encode(['ok'=>true]);
?>

