<?php
header('Content-Type: application/json');
$conn = new mysqli("localhost","root","","snackshop");
if($conn->connect_error){ http_response_code(500); echo json_encode(['ok'=>false]); exit; }

$data = json_decode(file_get_contents('php://input'), true);
$page = isset($data['page']) ? $data['page'] : $_SERVER['REQUEST_URI'];
$userAgent = isset($data['userAgent']) ? $data['userAgent'] : ($_SERVER['HTTP_USER_AGENT'] ?? '');
$ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';

$stmt = $conn->prepare("INSERT INTO visitors (ip_address, user_agent, page_url) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $ip, $userAgent, $page);
$stmt->execute();
$stmt->close();
$conn->close();
echo json_encode(['ok'=>true]);
?>
