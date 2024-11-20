<?php
include '../partials/admin-header.php';
include '../database/dbconnect.php';

$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($product_id > 0) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if (!$product) {
        echo "Product not found.";
        exit;
    }

    // Fetch product image
    $image_stmt = $conn->prepare("SELECT image_url FROM product_images WHERE product_id = ? LIMIT 1");
    $image_stmt->bind_param("i", $product_id);
    $image_stmt->execute();
    $image_result = $image_stmt->get_result();
    $image = $image_result->fetch_assoc();
} else {
    echo "Invalid product ID.";
    exit;
}
?>

<main class="p-2 px-4">
    <section id="product-details">
        <div class="content p-4">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <h1 class="fw-bold mb-0">Product Details</h1>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-4 mb-4">
                    <div class="col-auto">
                        <img src="<?php echo $image ? $image['image_url'] : '../assets/img/placeholder-item.png'; ?>"
                            class="img-fluid border" alt="Product Image">
                    </div>
                </div>

                <div class="col-md-8 mb-4">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="product-name" class="form-label fw-bold">Product Name</label>
                            <input type="text" class="form-control bg-white" id="product-name"
                                value="<?php echo htmlspecialchars($product['name']); ?>" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="brand-name" class="form-label fw-bold">Brand Name</label>
                            <input type="text" class="form-control bg-white" id="brand-name"
                                value="<?php echo htmlspecialchars($product['brand']); ?>" disabled>
                        </div>
                    </div>
                    <div class="row mt-2 gx-1">
                        <div class="col mb-3">
                            <label for="description" class="form-label fw-bold">Description</label>
                            <textarea class="form-control bg-white" id="description" rows="4"
                                disabled><?php echo htmlspecialchars($product['description']); ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="category" class="form-label fw-bold">Category</label>
                            <input type="text" class="form-control bg-white" id="category"
                                value="<?php echo htmlspecialchars($product['category']); ?>" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="condition" class="form-label fw-bold">Condition</label>
                            <input type="text" class="form-control bg-white" id="condition"
                                value="<?php echo htmlspecialchars($product['conditions']); ?>" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="color" class="form-label fw-bold">Color</label>
                            <input type="text" class="form-control bg-white" id="color"
                                value="<?php echo htmlspecialchars($product['color']); ?>" disabled>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="material" class="form-label fw-bold">Material</label>
                            <input type="text" class="form-control bg-white" id="material"
                                value="<?php echo htmlspecialchars($product['material']); ?>" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="product-id" class="form-label fw-bold">Product ID</label>
                    <input type="number" class="form-control bg-white" id="product-id"
                        value="<?php echo $product['product_id']; ?>" disabled>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="sku" class="form-label fw-bold">SKU</label>
                    <input type="text" class="form-control bg-white" id="sku"
                        value="<?php echo htmlspecialchars($product['sku']); ?>" disabled>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="upc" class="form-label fw-bold">UPC</label>
                    <input type="text" class="form-control bg-white" id="upc" value="<?php echo $product['upc']; ?>"
                        disabled>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="price" class="form-label fw-bold">Price</label>
                    <input type="number" class="form-control bg-white" id="price"
                        value="<?php echo $product['price']; ?>" disabled>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="inventory-qty" class="form-label fw-bold">Inventory Qty</label>
                    <input type="number" class="form-control bg-white" id="inventory-qty"
                        value="<?php echo $product['quantity']; ?>" disabled>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="normal-threshold" class="form-label fw-bold">Normal Threshold</label>
                    <input type="number" class="form-control bg-white" id="normal-threshold"
                        value="<?php echo $product['normal_threshold']; ?>" disabled>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="low-threshold" class="form-label fw-bold">Low Threshold</label>
                    <input type="number" class="form-control bg-white" id="low-threshold"
                        value="<?php echo $product['low_threshold']; ?>" disabled>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="status" class="form-label fw-bold">Status</label>
                    <input type="text" class="form-control bg-white" id="status"
                        value="<?php echo $product['quantity'] > 0 ? 'In Stock' : 'Out of Stock'; ?>" disabled>
                </div>
                <div class="col-md-3 ms-auto d-flex align-items-end justify-content-md-end">
                    <a href="./inventory-overview.php" class="btn btn-sm btn-light me-2"
                        style="width: 120px;">Cancel</a>
                    <a href="./edit-details.php?id=<?php echo $product_id; ?>" class="btn btn-dark btn-sm fw-medium"
                        style="width: 120px;">Edit</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php 
$conn->close();
include '../partials/admin-footer.php';
?>