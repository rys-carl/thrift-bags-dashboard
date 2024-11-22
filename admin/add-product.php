<?php
ob_start();
include '../partials/admin-header.php';
include '../database/dbconnect.php';
session_start(); // Start the session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process form submission
    $name = $_POST['product-name'];
    $brand = $_POST['brand-name'];
    $sku = $_POST['sku'];
    $upc = $_POST['upc'];
    $category = $_POST['category'];
    $color = $_POST['color'];
    $condition = $_POST['condition'];
    $material = $_POST['material'];
    $description = $_POST['description'];
    $quantity = $_POST['inventory-qty'];
    $normal_threshold = $_POST['normal-threshold'];
    $low_threshold = $_POST['low-threshold'];
    $price = $_POST['price'];
    $image_url = $_POST['image-url'];

    // Assuming admin_id is 1 for now. In a real application, you'd get this from the session.
    $admin_id = 1;

    $stmt = $conn->prepare("INSERT INTO products (admin_id, name, category, brand, price, quantity, conditions, material, description, sku, upc, color, low_threshold, normal_threshold) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssiissssiii", $admin_id, $name, $category, $brand, $price, $quantity, $condition, $material, $description, $sku, $upc, $color, $low_threshold, $normal_threshold);
    
    if ($stmt->execute()) {
        $product_id = $conn->insert_id;
        
        // Insert image URL if provided
        if (!empty($image_url)) {
            $image_stmt = $conn->prepare("INSERT INTO product_images (product_id, image_url) VALUES (?, ?)");
            $image_stmt->bind_param("is", $product_id, $image_url);
            $image_stmt->execute();
        }
        
        // Set a session variable to show the success modal
        $_SESSION['show_success_modal'] = true;
        $_SESSION['new_product_id'] = $product_id;

        // Redirect to the same page to prevent form resubmission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error adding product: " . $conn->error;
    }
}
?>

<main class="p-2 px-4">
    <section id="add-product">
        <div class="content p-4">
            <h1 class="fw-bold mb-0">Add New Product</h1>

            <form action="" method="post">
                <div class="row mt-4">
                    <div class="col-md-3">
                        <label for="product-name" class="form-label fw-bold">Product Name</label>
                        <input type="text" class="form-control" id="product-name" name="product-name">
                    </div>
                    <div class="col-md-3">
                        <label for="brand-name" class="form-label fw-bold">Brand Name</label>
                        <input type="text" class="form-control" id="brand-name" name="brand-name">
                    </div>
                    <div class="col-md-3">
                        <label for="sku" class="form-label fw-bold">SKU</label>
                        <input type="text" class="form-control" id="sku" name="sku">
                    </div>
                    <div class="col-md-3">
                        <label for="upc" class="form-label fw-bold">UPC</label>
                        <input type="text" class="form-control" id="upc" name="upc">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="category" class="form-label fw-bold">Category</label>
                        <input type="text" class="form-control" id="category" name="category">
                    </div>
                    <div class="col-md-3">
                        <label for="color" class="form-label fw-bold">Color</label>
                        <input type="text" class="form-control" id="color" name="color">
                    </div>
                    <div class="col-md-3">
                        <label for="condition" class="form-label fw-bold">Condition</label>
                        <input type="text" class="form-control" id="condition" name="condition">
                    </div>
                    <div class="col-md-3">
                        <label for="material" class="form-label fw-bold">Material</label>
                        <input type="text" class="form-control" id="material" name="material">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <label for="description" class="form-label fw-bold">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="inventory-qty" class="form-label fw-bold">Inventory Qty</label>
                        <input type="number" class="form-control" id="inventory-qty" name="inventory-qty">
                    </div>
                    <div class="col-md-3">
                        <label for="normal-threshold" class="form-label fw-bold">Normal Threshold Qty</label>
                        <input type="number" class="form-control" id="normal-threshold" name="normal-threshold">
                    </div>
                    <div class="col-md-3">
                        <label for="low-threshold" class="form-label fw-bold">Low Threshold Qty</label>
                        <input type="number" class="form-control" id="low-threshold" name="low-threshold">
                    </div>
                    <div class="col-md-3">
                        <label for="price" class="form-label fw-bold">Price</label>
                        <input type="number" class="form-control" id="price" name="price">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="image-url" class="form-label fw-bold">Image URL</label>
                        <input type="url" class="form-control" id="image-url" name="image-url">
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col text-end">
                        <button type="button" class="btn btn-light me-2" data-bs-toggle="modal"
                            data-bs-target="#cancelConfirmModal">Cancel</button>
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                            data-bs-target="#confirm-modal">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>

<!-- Confirmation Modal -->
<div class="custom-modal modal fade" id="confirm-modal" tabindex="-1" aria-labelledby="confirmModalLabel"
    aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="modal-header justify-content-center pb-1" style="border-bottom: none;">
                <h5 class="modal-title text-success text-center fw-light" id="confirmModalLabel">CONFIRM PRODUCT
                    DETAILS?</h5>
            </div>
            <div class="modal-body text-center">
                Are these details correct?
            </div>
            <div class="modal-footer justify-content-center text-center pt-1" style="border-top: none;">
                <form action="" method="post">
                    <input type="hidden" name="product-id" value="">
                    <button type="submit" class="btn btn-success me-3" id="confirmEdit">Save</button>
                    <button type="button" class="btn btn-danger ms-3" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Added Successful Modal -->
<div class="custom-modal modal fade" id="edit-success" tabindex="-1" aria-labelledby="addedSuccessfulModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="modal-header justify-content-center pb-1" style="border-bottom: none;">
                <h5 class="modal-title text-success text-center fs-3 fw-light" id="addedSuccessfulModalLabel">PRODUCT
                    ADDED</h5>
            </div>
            <div class="modal-body text-center">
                The product has been successfully added!
            </div>
            <div class="modal-footer justify-content-center text center pt-1" style="border-top: none;">
                <a href="./inventory-overview.php" class="btn btn-dark">Go to Inventory</a>
            </div>
        </div>
    </div>
</div>

<!-- Cancel Confirmation Modal -->
<div class="modal fade" id="cancelConfirmModal" tabindex="-1" aria-labelledby="cancelConfirmModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelConfirmModalLabel">Confirm Cancel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to cancel? Any unsaved changes will be lost.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Stay</button>
                <a href="./inventory-overview.php" class="btn btn-primary">Leave</a>
            </div>
        </div>
    </div>
</div>

<?php 
$conn->close();
include '../partials/admin-footer.php';
ob_end_flush();
?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const confirmEditBtn = document.getElementById('confirmEdit');

    confirmEditBtn.addEventListener('click', function(e) {
        e.preventDefault();
        form.submit();
    });

    <?php if (isset($_SESSION['show_success_modal']) && $_SESSION['show_success_modal']): ?>
    var editSuccessModal = new bootstrap.Modal(document.getElementById('edit-success'));
    editSuccessModal.show();
    <?php
    // Clear the session variables
    unset($_SESSION['show_success_modal']);
    unset($_SESSION['new_product_id']);
    endif;
    ?>
});
</script>