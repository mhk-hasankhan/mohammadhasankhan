<?php
header('Content-Type: application/json');
require_once '../db.php';

$data = json_decode(file_get_contents("php://input"));

if (!$data->name || !$data->email) {
    echo json_encode(['message' => 'Name and Email are required']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO contacts (name, email, phone) VALUES (?, ?, ?)");
    $stmt->execute([$data->name, $data->email, $data->phone]);
    echo json_encode(['message' => 'Contact added successfully']);
} catch (Exception $e) {
    echo json_encode(['message' => 'Error: ' . $e->getMessage()]);
}
?>
