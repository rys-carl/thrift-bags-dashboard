<?php
include '../partials/admin-header.php';
include '../database/dbconnect.php';

// Initialize variables
$reportType = isset($_GET['filter']) ? $_GET['filter'] : '';
$itemsPerPage = isset($_GET['items-filter']) ? intval($_GET['items-filter']) : 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Date range handling
$startDate = isset($_GET['start-date']) ? $_GET['start-date'] : date('Y-m-d', strtotime('-30 days'));
$endDate = isset($_GET['end-date']) ? $_GET['end-date'] : date('Y-m-d');

if (isset($_GET['days-filter'])) {
    switch ($_GET['days-filter']) {
        case '7-days':
            $startDate = date('Y-m-d', strtotime('-7 days'));
            break;
        case '30-days':
            $startDate = date('Y-m-d', strtotime('-30 days'));
            break;
        case '90-days':
            $startDate = date('Y-m-d', strtotime('-90 days'));
            break;
    }
}

?>

<main class="p-2 px-4">
    <section id="reports">
        <div class="content p-4">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <h1 class="fw-bold mb-0">Reports</h1>
                </div>

                <div class="col-12 col-md-6 d-flex justify-content-md-end justify-content-start mt-2 mt-md-0">
                    <form action="" method="get">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle btn-sm border border-dark-subtle" type="button"
                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $itemsPerPage; ?> items per page
                            </button>
                            <ul class="dropdown-menu border border-dark-subtle" aria-labelledby="dropdownMenuButton">
                                <li><button class="dropdown-item" type="submit" name="items-filter" value="10">10 items
                                        per page</button></li>
                                <li><button class="dropdown-item" type="submit" name="items-filter" value="15">15 items
                                        per page</button></li>
                                <li><button class="dropdown-item" type="submit" name="items-filter" value="20">20 items
                                        per page</button></li>
                                <li><button class="dropdown-item" type="submit" name="items-filter" value="25">25 items
                                        per page</button></li>
                                <li><button class="dropdown-item" type="submit" name="items-filter" value="30">30 items
                                        per page</button></li>
                            </ul>
                        </div>
                    </form>
                </div>

                <div class="mt-4">
                    <form action="" method="get" id="report-form">
                        <input type="hidden" name="filter" value="<?php echo $reportType; ?>">
                        <input type="hidden" name="items-filter" value="<?php echo $itemsPerPage; ?>">
                        <div class="dropdown mb-3">
                            <button class="btn dropdown-toggle btn-sm border border-dark-subtle fw-bold"
                                style="width: 100px;" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                aria-expanded="false">Scope</button>
                            <ul class="dropdown-menu border border-dark-subtle" aria-labelledby="dropdownMenuButton">
                                <li><button class="dropdown-item" type="submit" name="days-filter" value="7-days">7 days
                                        ago</button></li>
                                <li><button class="dropdown-item" type="submit" name="days-filter" value="30-days">30
                                        days ago</button></li>
                                <li><button class="dropdown-item" type="submit" name="days-filter" value="90-days">90
                                        days ago</button></li>
                                <li><button class="dropdown-item" type="button" id="custom-btn" name="days-filter"
                                        value="custom">Custom</button></li>
                            </ul>
                        </div>

                        <div id="custom-dates" style="display: none;">
                            <div class="mb-3 d-flex gap-2">
                                <div>
                                    <label for="start-date" class="form-label small fw-bold">Start Date:</label>
                                    <input type="date" class="form-control form-control-sm" id="start-date"
                                        name="start-date" value="<?php echo $startDate; ?>">
                                </div>
                                <div>
                                    <label for="end-date" class="form-label small fw-bold">End Date:</label>
                                    <input type="date" class="form-control form-control-sm" id="end-date"
                                        name="end-date" value="<?php echo $endDate; ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-dark">Apply Custom Date Range</button>
                        </div>
                    </form>

                    <form action="" method="get" class="mt-3">
                        <div class="input-group">
                            <select class="form-select fw-bold border border-dark-subtle" name="filter"
                                aria-label="Select filter">
                                <option value="" <?php echo $reportType == '' ? 'selected' : ''; ?>>Choose Report Type
                                </option>
                                <option value="inventory" <?php echo $reportType == 'inventory' ? 'selected' : ''; ?>>
                                    Inventory</option>
                                <option value="sales" <?php echo $reportType == 'sales' ? 'selected' : ''; ?>>Sales
                                </option>
                            </select>
                            <div class="ms-auto">
                                <button type="submit" class="btn btn-dark fw-medium ms-3">Generate</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php
        if ($reportType == 'inventory') {
            include './inventory-report.php';
        } elseif ($reportType == 'sales') {
            include './sales-report.php';
        }
        ?>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const customBtn = document.getElementById('custom-btn');
    const customDates = document.getElementById('custom-dates');

    customBtn.addEventListener('click', function() {
        customDates.style.display = customDates.style.display === 'none' ? 'block' : 'none';
    });
});
</script>

<?php include '../partials/admin-footer.php'; ?>