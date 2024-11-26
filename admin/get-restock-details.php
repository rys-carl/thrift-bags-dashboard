<?php
include '../database/dbconnect.php';

header('Content-Type: application/json');

if (isset($_GET['id'])) {
    $restockId = intval($_GET['id']);
    
    $stmt = $conn->prepare("SELECT r.*, p.name as product_name 
                            FROM restock r 
                            JOIN products p ON r.product_id = p.product_id 
                            WHERE r.restock_id = ?");
    $stmt->bind_param("i", $restockId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        echo json_encode($row);
    } else {
        echo json_encode(['error' => 'Restock not found']);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}

$conn->close();