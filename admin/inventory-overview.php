<?php include '../partials/admin-header.php'; ?>

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
                                <button class="btn dropdown-toggle btn-sm border border-dark-subtle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">Items per page</button>
                                <ul class="dropdown-menu border border-dark-subtle" aria-labelledby="dropdownMenuButton">
                                    <li><button class="dropdown-item" type="submit" name="items-filter" value="10-items">10 items per page</button></li>
                                    <li><button class="dropdown-item" type="submit" name="items-filter" value="15-items">15 items per page</button></li>
                                    <li><button class="dropdown-item" type="submit" name="items-filter" value="20-items">20 items per page</button></li>
                                    <li><button class="dropdown-item" type="submit" name="items-filter" value="25-items">25 items per page</button></li>
                                    <li><button class="dropdown-item" type="submit" name="items-filter" value="30-items">30 items per page</button></li>
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
                                    <p class="fs-2 fw-bold m-0">1234</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card p-2">
                                <div class="card-info">
                                    <p class="fw-light m-0">Total Inventory Price:</p>
                                    <p class="fs-2 fw-bold m-0">₱128,264,968</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center mt-3">
                    <div class="search-bar col-auto">
                        <form action="" method="get" class="d-flex">
                            <input type="text" name="search" class="form-control me-2"
                                placeholder="Type your search here" value="" style="width: 280px;">
                            <button type="submit" class="btn btn-dark"> <i class="fa-solid fa-magnifying-glass"> </i></button>
                        </form>
                    </div>
                    <div class="col-auto ms-auto">
                        <a href="./add-product.php" class="btn btn-success mt-3 mt-sm-0 fw-medium">Add Item</a>
                    </div>
                </div>
            </div>

            <!-- Placeholder Table -->
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
                        <tr onclick="window.location='./product-details.php';" style="cursor: pointer;">
                            <th scope="row">1</th>
                            <td>Mini Frances Leather Handbag</td>
                            <td>Burberry</td>
                            <td>A</td>
                            <td>Handbag</td>
                            <td>Black</td>
                            <td>123456</td>
                            <td>Sold</td>
                            <td><a href="./edit-details.php" class="text-black fw-semibold">Edit</a></td>
                        </tr>
                        <tr onclick="window.location='./product-details.php';" style="cursor: pointer;">
                            <th scope="row">2</th>
                            <td>Mini Frances Leather Handbag</td>
                            <td>Burberry</td>
                            <td>A</td>
                            <td>Handbag</td>
                            <td>Black</td>
                            <td>123456</td>
                            <td>Sold</td>
                            <td><a href="./edit-details.php" class="text-black fw-semibold">Edit</a></td>
                        </tr>
                        <tr onclick="window.location='./product-details.php';" style="cursor: pointer;">
                            <th scope="row">3</th>
                            <td>Mini Frances Leather Handbag</td>
                            <td>Burberry</td>
                            <td>A</td>
                            <td>Handbag</td>
                            <td>Black</td>
                            <td>123456</td>
                            <td>Sold</td>
                            <td><a href="./edit-details.php" class="text-black fw-semibold">Edit</a></td>
                        </tr>
                    </tbody>
                    <tfoot class="fw-light">
                        <tr>
                            <td colspan="9">
                                <div class="d-flex justify-content-between small">
                                    <span>Showing 1 to 3 of 3 results</span>
                                    <span> Next <i class="fa-solid fa-chevron-right fa-2xs" style="color: #000000;"></i></span>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>
    </main>

<?php include '../partials/admin-footer.php'; ?>