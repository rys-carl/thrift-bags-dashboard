<?php
include '../partials/admin-header.php';

// Connect to database
include '../database/dbconnect.php';

// Get the selected number of items per page
$items_per_page = isset($_GET['items-filter']) ? intval($_GET['items-filter']) : 10;

// Get the current page number
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Calculate the offset for the SQL query
$offset = ($page - 1) * $items_per_page;

// Retrieve the search query
$search_query = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

// Fetch sum of (quantity * price) from the database
$inventory_sql = "SELECT SUM(quantity * price) AS total_inventory_price, SUM(quantity) as total_inventory_quantity FROM products";
$inventory_result = $conn->query($inventory_sql);

$total_inventory_price = 0;
$total_inventory_quantity = 0;
if ($inventory_result->num_rows > 0) {
    while($row = $inventory_result->fetch_assoc()) {
        $total_inventory_price = $row['total_inventory_price'];
        $total_inventory_quantity = $row['total_inventory_quantity'];
    }
} else {
    echo "0 results";
}

// Fetch total number of products for pagination
$total_products_sql = "SELECT COUNT(*) as total_products FROM products WHERE (name LIKE '%$search_query%' 
                OR brand LIKE '%$search_query%' 
                OR category LIKE '%$search_query%' 
                OR conditions LIKE '%$search_query%')";
$total_products_result = $conn->query($total_products_sql);
$total_products = $total_products_result->fetch_assoc()['total_products'];

// Fetch data for the current page
$product_sql = "SELECT product_id, name, category, brand, price, quantity, conditions, color, low_threshold, normal_threshold 
                FROM products 
                WHERE (name LIKE '%$search_query%' 
                OR brand LIKE '%$search_query%' 
                OR category LIKE '%$search_query%' 
                OR conditions LIKE '%$search_query%' 
                OR color LIKE '%$search_query%')
                LIMIT $items_per_page OFFSET $offset";
$product_result = $conn->query($product_sql);
if ($product_result === false) {
    die("Error: " . $conn->error);
}

?>

<main class="p-2 px-4">
    <section id="inventory">
        <div class="content p-4">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <h1 class="fw-bold mb-0">Store Inventory</h1>
                </div>

                <div class="col-12 col-md-6 d-flex justify-content-md-end justify-content-start mt-2 mt-md-0">
                    <form action=" " method="get">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle btn-sm border border-dark-subtle" type="button"
                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">Items per
                                page</button>
                            <ul class="dropdown-menu border border-dark-subtle" aria-labelledby="dropdownMenuButton">
                                <li><button class="dropdown-item" type="submit" name="items-filter" value="10">10
                                        items per page</button></li>
                                <li><button class="dropdown-item" type="submit" name="items-filter" value="15">15
                                        items per page</button></li>
                                <li><button class="dropdown-item" type="submit" name="items-filter" value="20">20
                                        items per page</button></li>
                                <li><button class="dropdown-item" type="submit" name="items-filter" value="25">25
                                        items per page</button></li>
                                <li><button class="dropdown-item" type="submit" name="items-filter" value="30">30
                                        items per page</button></li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>

            <div class="cards">
                <div class="row g-3 mt-1">
                    <div class="col-md-6">
                        <div class="card p-2">
                            <div class="card-info">
                                <p class="fw-light m-0">Total Inventory Quantity:</p>
                                <p class="fs-2 fw-bold m-0"> <?php echo number_format($total_inventory_quantity); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card p-2">
                            <div class="card-info">
                                <p class="fw-light m-0">Total Inventory Price:</p>
                                <p class="fs-2 fw-bold m-0">₱<?php echo number_format($total_inventory_price, 2); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mt-3">
                <div class="search-bar col-auto">
                    <form action="" method="get" class="d-flex">
                        <input type="text" name="search" class="form-control me-2" placeholder="Type your search here"
                            value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
                            style="width: 280px;">
                        <button type="submit" class="btn btn-dark"> <i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <div class="col-auto ms-auto">
                    <a href="./add-product.php" class="btn btn-success mt-3 mt-sm-0 fw-medium">Add Item</a>
                </div>
            </div>

        </div>

        <!-- Store Inventory Table -->
        <div class="content table-responsive p-4 pt-2">
            <table class="table table-hover fs-6">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">PRODUCT NAME</th>
                        <th scope="col">BRAND</th>
                        <th scope="col">CONDITION</th>
                        <th scope="col">BAG TYPE</th>
                        <th scope="col">COLOR</th>
                        <th scope="col">PRICE</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody class="fw-light">
                    <?php
                if ($product_result->num_rows > 0) {
                    // Output data of each row
                    while($row = $product_result->fetch_assoc()) {
                        // Determine the status based on quantity, low_threshold, and normal_threshold
                        if ($row['quantity'] == 0) {
                            $status = "No stock";
                        } elseif ($row['quantity'] <= $row['low_threshold']) {
                            $status = "Low stock";
                        } elseif ($row['quantity'] > $row['low_threshold'] && $row['quantity'] <= $row['normal_threshold']) {
                            $status = "In stock";
                        } else {
                            $status = "In stock"; // Default status if above conditions aren't met
                        }

                        echo "<tr onclick=\"window.location='./product-details.php?id=".$row['product_id']."';\" style=\"cursor: pointer;\">";
                        echo "<th scope=\"row\">".$row['product_id']."</th>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['brand']."</td>";
                        echo "<td>".$row['conditions']."</td>";
                        echo "<td>".$row['category']."</td>";
                        echo "<td>".$row['color']."</td>";
                        echo "<td>".$row['price']."</td>";
                        echo "<td>".$status."</td>";
                        echo "<td><a href=\"./edit-details.php?id=".$row['product_id']."\" class=\"text-black fw-semibold\">Edit</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No results found</td></tr>";
                }
                ?>
                </tbody>
                <tfoot class="fw-light">
                    <tr>
                        <td colspan="9">
                            <div class="d-flex justify-content-between small">
                                <span>Showing <?php echo ($offset + 1); ?> to
                                    <?php echo min($offset + $items_per_page, $total_products); ?> of
                                    <?php echo $total_products; ?> results</span>
                                <span>
                                    <?php if ($page > 1): ?>
                                    <a href="?page=<?php echo $page - 1; ?>&items-filter=<?php echo $items_per_page; ?>"
                                        class="btn btn-outline-dark btn-sm">Previous</a>
                                    <?php endif; ?>
                                    <?php if ($offset + $items_per_page < $total_products): ?>
                                    <a href="?page=<?php echo $page + 1; ?>&items-filter=<?php echo $items_per_page; ?>"
                                        class="btn btn-outline-dark btn-sm">Next</a>
                                    <?php endif; ?>
                                </span>
                            </div>
                        </td>
                    </tr>
                </tfoot>


            </table>
        </div>
    </section>
</main>

<?php $conn->close(); ?>

<?php include '../partials/admin-footer.php'; ?>