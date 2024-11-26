<?php
include '../database/dbconnect.php';

header('Content-Type: application/json');

function sendJsonResponse($success, $message = '', $data = null) {
    echo json_encode([
        'success' => $success,
        'message' => $message,
        'data' => $data
    ]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendJsonResponse(false, 'Invalid request method');
}

try {
    $restockId = isset($_POST['restock_id']) ? intval($_POST['restock_id']) : 0;
    $productId = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']);
    $trackingNo = $conn->real_escape_string($_POST['tracking_no']);
    $status = $conn->real_escape_string($_POST['status']);
    $deliveryDate = $conn->real_escape_string($_POST['delivery_date']);

    if ($restockId > 0) {
        // Update existing restock
        $stmt = $conn->prepare("UPDATE restock SET 
                                restock_quantity = ?, 
                                restock_delivery_date = ?, 
                                restock_delivery_status = ?, 
                                delivery_reference_number = ?
                                WHERE restock_id = ?");
        if (!$stmt) {
            throw new Exception("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("isssi", $quantity, $deliveryDate, $status, $trackingNo, $restockId);
    } else {
        // Insert new restock
        $adminId = 1; // Replace with actual admin ID from session
        $stmt = $conn->prepare("INSERT INTO restock 
                                (product_id, admin_id, restock_quantity, restock_delivery_date, restock_delivery_status, delivery_reference_number) 
                                VALUES (?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            throw new Exception("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("iiisss", $productId, $adminId, $quantity, $deliveryDate, $status, $trackingNo);
    }

    if (!$stmt->execute()) {
        throw new Exception("Execute failed: " . $stmt->error);
    }

    if ($status === 'Delivered') {
        // Update product quantity
        $updateProductStmt = $conn->prepare("UPDATE products SET quantity = quantity + ? WHERE product_id = ?");
        if (!$updateProductStmt) {
            throw new Exception("Prepare failed for product update: " . $conn->error);
        }
        $updateProductStmt->bind_param("ii", $quantity, $productId);
        if (!$updateProductStmt->execute()) {
            throw new Exception("Execute failed for product update: " . $updateProductStmt->error);
        }
    }

    sendJsonResponse(true, 'Restock updated successfully');

} catch (Exception $e) {
    sendJsonResponse(false, 'Error: ' . $e->getMessage());
}

$conn->close();
?>