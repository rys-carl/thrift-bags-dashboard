<?php
if ($reportType == 'inventory') {
    // Fetch inventory overview
    $overviewQuery = "SELECT 
        COUNT(DISTINCT product_id) as total_products,
        SUM(quantity) as total_stock,
        SUM(price * quantity) as total_value
    FROM products";
    $overviewResult = $conn->query($overviewQuery);
    $overview = $overviewResult->fetch_assoc();

    // Fetch restock information
    $restockQuery = "SELECT 
        SUM(CASE WHEN restock_delivery_status = 'Delivered' THEN 1 ELSE 0 END) as completed_restocks,
        SUM(CASE WHEN restock_delivery_status = 'In transit' THEN 1 ELSE 0 END) as processed_restocks,
        SUM(CASE WHEN restock_delivery_status = 'Pending' THEN 1 ELSE 0 END) as pending_restocks
    FROM restock";
    $restockResult = $conn->query($restockQuery);
    $restock = $restockResult->fetch_assoc();

    // Fetch current inventory stocks with pagination
    $offset = ($page - 1) * $itemsPerPage;
    $inventoryQuery = "SELECT p.*, 
        COALESCE(SUM(oi.quantity), 0) as sold_quantity
    FROM products p
    LEFT JOIN order_items oi ON p.product_id = oi.product_id
    LEFT JOIN orders o ON oi.order_id = o.order_id
    WHERE o.order_date BETWEEN ? AND ? OR o.order_date IS NULL
    GROUP BY p.product_id
    LIMIT ? OFFSET ?";
    $stmt = $conn->prepare($inventoryQuery);
    $stmt->bind_param("ssii", $startDate, $endDate, $itemsPerPage, $offset);
    $stmt->execute();
    $inventoryResult = $stmt->get_result();

    // Get total number of products for pagination
    $totalProductsQuery = "SELECT COUNT(*) as total FROM products";
    $totalProductsResult = $conn->query($totalProductsQuery);
    $totalProducts = $totalProductsResult->fetch_assoc()['total'];
    $totalPages = ceil($totalProducts / $itemsPerPage);

    // Fetch incoming stocks
    $incomingStocksQuery = "SELECT p.name, p.brand, p.material, p.color, r.*
    FROM restock r
    JOIN products p ON r.product_id = p.product_id
    WHERE r.restock_delivery_status != 'Delivered'
    LIMIT ? OFFSET ?";
    $stmt = $conn->prepare($incomingStocksQuery);
    $stmt->bind_param("ii", $itemsPerPage, $offset);
    $stmt->execute();
    $incomingStocksResult = $stmt->get_result();
?>

<div id="inventory-option">
    <div class="content p-4 pt-0 mt-0">
        <div class="col-12 col-md-6">
            <p class="fw-bold fs-2 mb-0"><?php echo date('F j, Y', strtotime($startDate)); ?> -
                <?php echo date('F j, Y', strtotime($endDate)); ?></p>
            <p class="fw-light fs-4 mb-0">Report Generated: <?php echo date('F j, Y'); ?></p>
        </div>

        <p class="fw-bold mt-2 mb-0 fs-2">Overview:</p>
        <div class="container-fluid px-0">
            <div class="row">
                <div class="col-md-4">
                    <div class="card p-4 m-3">
                        <div class="card-info">
                            <p class="fw-light m-0">Total Products:</p>
                            <p class="fs-2 fw-bold m-0"><?php echo $overview['total_products']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 m-3">
                        <div class="card-info">
                            <p class="fw-light m-0">Total Current Stock Quantity:</p>
                            <p class="fs-2 fw-bold m-0"><?php echo $overview['total_stock']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 m-3">
                        <div class="card-info">
                            <p class="fw-light m-0">Total Value:</p>
                            <p class="fs-2 fw-bold m-0">₱<?php echo number_format($overview['total_value'], 2); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card p-4 m-3">
                        <div class="card-info">
                            <p class="fw-light m-0">Restock Completed:</p>
                            <p class="fs-2 fw-bold m-0"><?php echo $restock['completed_restocks']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 m-3">
                        <div class="card-info">
                            <p class="fw-light m-0">Processed Restocks:</p>
                            <p class="fs-2 fw-bold m-0"><?php echo $restock['processed_restocks']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 m-3">
                        <div class="card-info">
                            <p class="fw-light m-0">Pending Restocks:</p>
                            <p class="fs-2 fw-bold m-0"><?php echo $restock['pending_restocks']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content table-responsive p-4 pt-2">
        <div class="col-12 col-md-6">
            <h1 class="fw-bold fs-2">Current Inventory Stocks:</h1>
        </div>
        <table id="current-inv-stocks-table" class="table table-hover fs-6">
            <thead>
                <tr>
                    <th scope="col">PRODUCT ID</th>
                    <th scope="col">PRODUCT NAME</th>
                    <th scope="col">CATEGORY</th>
                    <th scope="col">BRAND</th>
                    <th scope="col">SKU</th>
                    <th scope="col">UPC</th>
                    <th scope="col">MATERIAL</th>
                    <th scope="col">COLOR</th>
                    <th scope="col">CONDITION</th>
                    <th scope="col">QUANTITY</th>
                    <th scope="col">UNIT PRICE</th>
                    <th scope="col">TOTAL AMOUNT</th>
                </tr>
            </thead>
            <tbody class="fw-light">
                <?php while ($row = $inventoryResult->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['brand']; ?></td>
                    <td><?php echo $row['sku']; ?></td>
                    <td><?php echo $row['upc']; ?></td>
                    <td><?php echo $row['material']; ?></td>
                    <td><?php echo $row['color']; ?></td>
                    <td><?php echo $row['conditions']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td>₱<?php echo number_format($row['price'], 2); ?></td>
                    <td>₱<?php echo number_format($row['price'] * $row['quantity'], 2); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
            <tfoot class="fw-light">
                <tr>
                    <td colspan="12">
                        <div class="d-flex justify-content-between small">
                            <span>Showing <?php echo $offset + 1; ?> to
                                <?php echo min($offset + $itemsPerPage, $totalProducts); ?> of
                                <?php echo $totalProducts; ?> results</span>
                            <span>
                                <?php if ($page > 1): ?>
                                <a
                                    href="?filter=inventory&page=<?php echo $page - 1; ?>&items-filter=<?php echo $itemsPerPage; ?>">Previous</a>
                                <?php endif; ?>
                                <?php if ($page < $totalPages): ?>
                                <a
                                    href="?filter=inventory&page=<?php echo $page + 1; ?>&items-filter=<?php echo $itemsPerPage; ?>">Next</a>
                                <?php endif; ?>
                            </span>
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="content table-responsive p-4 pt-0">
        <div class="col-12 col-md-6">
            <h1 class="fw-bold fs-2">Incoming Stocks:</h1>
        </div>
        <table id="incoming-stocks-table" class="table table-hover fs-6">
            <thead>
                <tr>
                    <th scope="col">PRODUCT NAME</th>
                    <th scope="col">BRAND</th>
                    <th scope="col">MATERIAL</th>
                    <th scope="col">COLOR</th>
                    <th scope="col">QUANTITY</th>
                    <th scope="col">DELIVERY DATE</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">REFERENCE NUMBER</th>
                </tr>
            </thead>
            <tbody class="fw-light">
                <?php while ($row = $incomingStocksResult->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['brand']; ?></td>
                    <td><?php echo $row['material']; ?></td>
                    <td><?php echo $row['color']; ?></td>
                    <td><?php echo $row['restock_quantity']; ?></td>
                    <td><?php echo $row['restock_delivery_date']; ?></td>
                    <td><?php echo $row['restock_delivery_status']; ?></td>
                    <td><?php echo $row['delivery_reference_number']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<?php } ?>