<?php
include '../database/dbconnect.php';

header('Content-Type: application/json');

if (isset($_GET['id'])) {
    $userId = intval($_GET['id']);

    // Fetch user details
    $userQuery = "SELECT * FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($userQuery);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $userResult = $stmt->get_result();
    $user = $userResult->fetch_assoc();

    // Fetch user orders
    $ordersQuery = "SELECT o.order_id, p.name as product_name, oi.quantity, o.total_amount, o.order_date, o.delivered_date, o.order_status
                    FROM orders o
                    JOIN order_items oi ON o.order_id = oi.order_id
                    JOIN products p ON oi.product_id = p.product_id
                    WHERE o.user_id = ?
                    ORDER BY o.order_date DESC";
    $stmt = $conn->prepare($ordersQuery);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $ordersResult = $stmt->get_result();
    $orders = $ordersResult->fetch_all(MYSQLI_ASSOC);

    echo json_encode([
        'success' => true,
        'user' => $user,
        'orders' => $orders
    ]);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}

$conn->close();