<?php
ob_start();
include '../partials/admin-header.php';
include '../database/dbconnect.php';

$current_year = date('Y');
$next_year = $current_year + 1;
$years = [$current_year, $next_year];
$months = range(1, 12);
$quotas = [];
$success_message = '';
$error_message = '';

// Fetch existing quotas
$stmt = $conn->prepare("SELECT year, month, quota_amount FROM monthly_quota WHERE year IN (?, ?)");
$stmt->bind_param("ii", $current_year, $next_year);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $quotas[$row['year']][$row['month']] = $row['quota_amount'];
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn->begin_transaction();
    try {
        foreach ($years as $year) {
            foreach ($months as $month) {
                $quota_amount = isset($_POST["quota_{$year}_{$month}"]) ? floatval($_POST["quota_{$year}_{$month}"]) : 0;
                
                $stmt = $conn->prepare("INSERT INTO monthly_quota (year, month, quota_amount) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE quota_amount = ?");
                $stmt->bind_param("iidd", $year, $month, $quota_amount, $quota_amount);
                $stmt->execute();
            }
        }
        $conn->commit();
        $success_message = "Monthly quotas have been updated successfully.";
        
        // Refresh quotas after update
        $stmt = $conn->prepare("SELECT year, month, quota_amount FROM monthly_quota WHERE year IN (?, ?)");
        $stmt->bind_param("ii", $current_year, $next_year);
        $stmt->execute();
        $result = $stmt->get_result();
        $quotas = [];
        while ($row = $result->fetch_assoc()) {
            $quotas[$row['year']][$row['month']] = $row['quota_amount'];
        }
    } catch (Exception $e) {
        $conn->rollback();
        $error_message = "Error updating monthly quotas: " . $e->getMessage();
    }
}
?>

<main class="p-2 px-4">
    <section id="monthly-quota">
        <div class="content p-4">
            <h1 class="fw-bold mb-0">Edit Monthly Quota</h1>

            <?php if ($success_message): ?>
            <div class="alert alert-success mt-3" role="alert">
                <?php echo $success_message; ?>
            </div>
            <?php endif; ?>

            <?php if ($error_message): ?>
            <div class="alert alert-danger mt-3" role="alert">
                <?php echo $error_message; ?>
            </div>
            <?php endif; ?>

            <form action="" method="post">
                <?php foreach ($years as $year): ?>
                <h2 class="mt-4"><?php echo $year; ?></h2>
                <div class="row mt-4">
                    <?php foreach ($months as $month): ?>
                    <div class="col-md-3 mb-3">
                        <label for="quota_<?php echo $year; ?>_<?php echo $month; ?>" class="form-label fw-bold">
                            <?php echo date('F', mktime(0, 0, 0, $month, 1)); ?> <?php echo $year; ?>
                        </label>
                        <input type="number" step="0.01" class="form-control"
                            id="quota_<?php echo $year; ?>_<?php echo $month; ?>"
                            name="quota_<?php echo $year; ?>_<?php echo $month; ?>"
                            value="<?php echo isset($quotas[$year][$month]) ? number_format($quotas[$year][$month], 2, '.', '') : '0.00'; ?>"
                            required>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endforeach; ?>

                <div class="row mt-5">
                    <div class="col text-end">
                        <a href="./dashboard.php" class="btn btn-light me-2">Back</a>
                        <input type="submit" class="btn btn-dark" name="submit" value="Save Monthly Quotas">
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>

<?php 
$conn->close();
include '../partials/admin-footer.php';
ob_end_flush();
?>