<?php
include '../partials/admin-header.php';
include '../database/dbconnect.php';

// Function to get date range based on filter
function getDateRange($filter) {
    $end_date = date('Y-m-d');
    switch ($filter) {
        case 'today':
            $start_date = $end_date;
            break;
        case 'this-week':
            $start_date = date('Y-m-d', strtotime('last monday'));
            break;
        case 'last-week':
            $start_date = date('Y-m-d', strtotime('-2 week last monday'));
            $end_date = date('Y-m-d', strtotime('-1 week last sunday'));
            break;
        case 'this-month':
            $start_date = date('Y-m-01');
            break;
        case 'last-month':
            $start_date = date('Y-m-01', strtotime('last month'));
            $end_date = date('Y-m-t', strtotime('last month'));
            break;
        case 'this-quarter':
            $start_date = date('Y-m-d', strtotime(date('Y') . '-' . (floor((date('n') - 1) / 3) * 3 + 1) . '-01'));
            break;
        case 'this-year':
            $start_date = date('Y-01-01');
            break;
        default:
            $start_date = $end_date;
    }
    return [$start_date, $end_date];
}

$date_filter = isset($_GET['date-filter']) ? $_GET['date-filter'] : 'today';
list($start_date, $end_date) = getDateRange($date_filter);

// Fetch metrics from database
$stmt = $conn->prepare("
    SELECT 
        SUM(total_amount) AS total_srp,
        SUM(total_amount - shipping_cost) AS net_sales,
        COUNT(DISTINCT order_id) AS orders_count,
        SUM((SELECT SUM(quantity) FROM order_items WHERE order_items.order_id = orders.order_id)) AS items_sold
    FROM orders 
    WHERE order_date BETWEEN ? AND ?
");
$stmt->bind_param("ss", $start_date, $end_date);
$stmt->execute();
$result = $stmt->get_result();
$metrics = $result->fetch_assoc();

// Fetch total inventory SRP
$inventory_stmt = $conn->prepare("SELECT SUM(price * quantity) AS total_inventory_srp FROM products");
$inventory_stmt->execute();
$inventory_result = $inventory_stmt->get_result();
$inventory_metrics = $inventory_result->fetch_assoc();

// Fetch monthly quota
$quota_stmt = $conn->prepare("SELECT SUM(total_amount) AS current_sales FROM orders WHERE DATE_FORMAT(order_date, '%Y-%m') = ?");
$current_month = date('Y-m');
$quota_stmt->bind_param("s", $current_month);
$quota_stmt->execute();
$quota_result = $quota_stmt->get_result();
$current_sales = $quota_result->fetch_assoc()['current_sales'];

// Since there's no monthly_quota table, we'll use a fixed value for demonstration
$monthly_quota = 1000000; // 1 million

$conn->close();
?>

<main class="p-2 px-4">
    <section id="dashboard">
        <div class="content p-4 pb-2">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <h1 class="fw-bold mb-0">Dashboard</h1>
                </div>

                <div class="col-12 col-md-6 d-flex justify-content-md-end justify-content-start mt-2 mt-md-0">
                    <a href="./monthly-quota.php" class="btn btn-dark btn-sm me-2">Edit Monthly Quota</a>
                    <form action="" method="get">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle btn-sm border border-dark-subtle" type="button"
                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo ucwords(str_replace('-', ' ', $date_filter)); ?>
                            </button>
                            <ul class="dropdown-menu border border-dark-subtle" aria-labelledby="dropdownMenuButton">
                                <li><button class="dropdown-item" type="submit" name="date-filter"
                                        value="today">Today</button></li>
                                <li><button class="dropdown-item" type="submit" name="date-filter"
                                        value="this-week">This Week</button></li>
                                <li><button class="dropdown-item" type="submit" name="date-filter"
                                        value="last-week">Last Week</button></li>
                                <li><button class="dropdown-item" type="submit" name="date-filter"
                                        value="this-month">This Month</button></li>
                                <li><button class="dropdown-item" type="submit" name="date-filter"
                                        value="last-month">Last Month</button></li>
                                <li><button class="dropdown-item" type="submit" name="date-filter"
                                        value="this-quarter">This Quarter</button></li>
                                <li><button class="dropdown-item" type="submit" name="date-filter"
                                        value="this-year">This Year</button></li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="content p-4 py-2">
            <p class="mb-2 fs-4 fw-medium">Sales Status</p>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card p-4 m-3">
                            <div class="card-info">
                                <p class="fw-light m-0">Total Sales
                                    (<?php echo ucwords(str_replace('-', ' ', $date_filter)); ?>):</p>
                                <p class="fs-2 fw-bold m-0">₱<?php echo number_format($metrics['total_srp'], 2); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card p-4 m-3">
                            <div class="card-info">
                                <p class="fw-light m-0">Net Sales
                                    (<?php echo ucwords(str_replace('-', ' ', $date_filter)); ?>):</p>
                                <p class="fs-2 fw-bold m-0">₱<?php echo number_format($metrics['net_sales'], 2); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card p-4 m-3">
                            <div class="card-info">
                                <p class="fw-light m-0">Total Inventory Value</p>
                                <p class="fs-2 fw-bold m-0">
                                    ₱<?php echo number_format($inventory_metrics['total_inventory_srp'], 2); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card p-4 m-3">
                            <div class="card-info">
                                <p class="fw-light m-0">Monthly Quota Progress (<?php echo date('F Y'); ?>):</p>
                                <p class="fs-2 fw-bold m-0">₱<?php echo number_format($current_sales, 2); ?> /
                                    ₱<?php echo number_format($monthly_quota, 2); ?></p>
                                <div class="progress mt-2">
                                    <div class="progress-bar" role="progressbar"
                                        style="width: <?php echo min(($current_sales / $monthly_quota) * 100, 100); ?>%;"
                                        aria-valuenow="<?php echo ($current_sales / $monthly_quota) * 100; ?>"
                                        aria-valuemin="0" aria-valuemax="100">
                                        <?php echo round(($current_sales / $monthly_quota) * 100, 1); ?>%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card p-4 m-3">
                            <div class="card-info">
                                <p class="fw-light m-0">Orders
                                    (<?php echo ucwords(str_replace('-', ' ', $date_filter)); ?>):</p>
                                <p class="fs-2 fw-bold m-0"><?php echo $metrics['orders_count']; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card p-4 m-3">
                            <div class="card-info">
                                <p class="fw-light m-0">Items Sold
                                    (<?php echo ucwords(str_replace('-', ' ', $date_filter)); ?>):</p>
                                <p class="fs-2 fw-bold m-0"><?php echo $metrics['items_sold']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const dateFilter = document.getElementById('dropdownMenuButton');
    const dropdownItems = document.querySelectorAll('.dropdown-item');

    dropdownItems.forEach(item => {
        item.addEventListener('click', function() {
            dateFilter.textContent = this.textContent;
        });
    });
});
</script>

<?php include '../partials/admin-footer.php';?>