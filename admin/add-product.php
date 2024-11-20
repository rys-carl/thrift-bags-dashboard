<?php
include '../partials/admin-header.php';
include '../database/dbconnect.php';

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
        
        header("Location: product-details.php?id=" . $product_id);
        exit;
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
                        <input type="text" class="form-control" id="product-name" name="product-name" required>
                    </div>
                    <div class="col-md-3">
                        <label for="brand-name" class="form-label fw-bold">Brand Name</label>
                        <input type="text" class="form-control" id="brand-name" name="brand-name" required>
                    </div>
                    <div class="col-md-3">
                        <label for="sku" class="form-label fw-bold">SKU</label>
                        <input type="text" class="form-control" id="sku" name="sku" required>
                    </div>
                    <div class="col-md-3">
                        <label for="upc" class="form-label fw-bold">UPC</label>
                        <input type="text" class="form-control" id="upc" name="upc" required>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="category" class="form-label fw-bold">Category</label>
                        <input type="text" class="form-control" id="category" name="category" required>
                    </div>
                    <div class="col-md-3">
                        <label for="color" class="form-label fw-bold">Color</label>
                        <input type="text" class="form-control" id="color" name="color" required>
                    </div>
                    <div class="col-md-3">
                        <label for="condition" class="form-label fw-bold">Condition</label>
                        <input type="text" class="form-control" id="condition" name="condition" required>
                    </div>
                    <div class="col-md-3">
                        <label for="material" class="form-label fw-bold">Material</label>
                        <input type="text" class="form-control" id="material" name="material" required>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <label for="description" class="form-label fw-bold">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="inventory-qty" class="form-label fw-bold">Inventory Qty</label>
                        <input type="number" class="form-control" id="inventory-qty" name="inventory-qty" required>
                    </div>
                    <div class="col-md-3">
                        <label for="normal-threshold" class="form-label fw-bold">Normal Threshold Qty</label>
                        <input type="number" class="form-control" id="normal-threshold" name="normal-threshold"
                            required>
                    </div>
                    <div class="col-md-3">
                        <label for="low-threshold" class="form-label fw-bold">Low Threshold Qty</label>
                        <input type="number" class="form-control" id="low-threshold" name="low-threshold" required>
                    </div>
                    <div class="col-md-3">
                        <label for="price" class="form-label fw-bold">Price</label>
                        <input type="number" class="form-control" id="price" name="price" required>
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
                        <a href="./inventory-overview.php" class="btn btn-light me-2">Cancel</a>
                        <input type="submit" class="btn btn-dark" value="Save">
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>

<?php 
$conn->close();
include '../partials/admin-footer.php';
?>