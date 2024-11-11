<?php include '../partials/admin-header.php'; ?>

    <main class="p-2 px-4">
        <section id="restock">
            <div class="content p-4 pb-0">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        <h1 class="fw-bold mb-0">Pending Restock</h1>
                    </div>
                </div>

                <div class="container-fluid mt-2" id="pending-restock" style="max-height: 200px; overflow-y: auto;">
                    <ul class="list-unstyled">
                        <li class="list-group-item list-group-item-secondary rounded-pill my-2 p-2 px-4 d-flex justify-content-between align-items-center">Product 1 is low on stock.
                            <input type="button" class="btn btn-success btn-sm fw-semibold" data-bs-toggle="modal" data-bs-target="#restock-edit-modal" value="RESTOCK">
                        </li>
                        <li class="list-group-item list-group-item-secondary rounded-pill my-2 p-2 px-4 d-flex justify-content-between align-items-center">Product 2 is low on stock.
                            <input type="button" class="btn btn-success btn-sm fw-semibold" data-bs-toggle="modal" data-bs-target="#restock-edit-modal" value="RESTOCK">
                        </li>
                        <li class="list-group-item list-group-item-secondary rounded-pill my-2 p-2 px-4 d-flex justify-content-between align-items-center">Product 3 is low on stock.
                            <input type="button" class="btn btn-success btn-sm fw-semibold" data-bs-toggle="modal" data-bs-target="#restock-edit-modal" value="RESTOCK">
                        </li>
                        <li class="list-group-item list-group-item-secondary rounded-pill my-2 p-2 px-4 d-flex justify-content-between align-items-center">Product 4 is low on stock.
                            <input type="button" class="btn btn-success btn-sm fw-semibold" data-bs-toggle="modal" data-bs-target="#restock-edit-modal" value="RESTOCK">
                        </li>
                        </li>
                    </ul>
                </div>

                <hr class="border border-dark border-2 mt-2" style="opacity: 1;">
            </div>

            <div class="content p-4 pt-2">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        <h1 class="fw-bold mb-0">Restock Tracker</h1>
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
                </div>
            </div>

            <div class="content table-responsive p-4 pt-2">
                <table class="table table-hover fs-6">
                    <thead>
                        <tr>
                            <th scope="col">RESTOCK ID</th>
                            <th scope="col">PRODUCT ID</th>
                            <th scope="col">ADMIN ID</th>
                            <th scope="col">QUANTITY</th>
                            <th scope="col">DELIVERY DATE</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">REFERENCE NO.</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="fw-light">
                        <tr>
                            <td>1</td>
                            <td>1001</td>
                            <td>3</td>
                            <td>1</td>
                            <td>2024-02-22</td>
                            <td>Delivered</td>
                            <td>REF123456</td>
                            <td class="text-black fw-semibold text-decoration-underline" data-bs-toggle="modal" data-bs-target="#restock-edit-modal" style="cursor: pointer;">Edit</a></td>
                        </tr>
                    </tbody>
                    <tfoot class="fw-light">
                        <tr>
                            <td colspan="8">
                                <div class="d-flex justify-content-between small">
                                    <span>Showing 1 to 1 of 1 results</span>
                                    <span> Next <i class="fa-solid fa-chevron-right fa-2xs" style="color: #000000;"></i></span>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- Restock Edit modal -->
            <div class="custom-modal modal fade" id="restock-edit-modal" tabindex="-1" aria-labelledby="restockModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content p-1">
                        <div class="modal-header justify-content-center pb-1" style="border-bottom: none;">
                            <h5 class="modal-title text-dark text-center fs-3 fw-bold" id="restockModalLabel">Restock Edit</h5>
                        </div>
                        <div class="modal-body mx-5">
                            <form action=" " method="post">
                                <div class="mb-2 d-flex align-items-baseline">
                                    <label for="product-name" class="form-label fw-bold me-2">Product Name:</label>
                                    <span id="product-name" class="item-name">Product Name</span>
                                </div>
                                <div class="mb-2 d-flex align-items-center">
                                    <label for="quantity" class="form-label fw-bold me-2">Quantity:</label>
                                    <input type="number" class="form-control w-50" id="quantity" required>
                                </div>
                                <div class="mb-2 d-flex align-items-center">
                                    <label for="tracking-no" class="form-label fw-bold me-2">Tracking Number:</label>
                                    <input type="text" class="form-control w-50" id="tracking-no" required>
                                </div>
                                <div class="mb-2 d-flex align-items-center">
                                    <label for="status" class="form-label fw-bold me-2">Status:</label>
                                    <select class="form-select w-50" id="status" required>
                                        <option value="delivered">Delivered</option>
                                        <option value="in-transit">In Transit</option>
                                        <option value="pending">Pending</option>
                                    </select>
                                </div>
                                <div class="mb-2 d-flex align-items-center">
                                    <label for="delivery-date" class="form-label fw-bold me-2">Delivery Date:</label>
                                    <input type="date" class="form-control w-50" id="delivery-date" required>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer pt-1" style="border-top: none;">
                            <input type="hidden" name="product-id" value="">
                            <!-- NOTE: Change "type=button" to "type=submit" -->
                            <button type="button" class="btn btn-light" id="confirmEdit" data-bs-toggle="modal" data-bs-target="#edit-success">Save</button>
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php include '../partials/admin-footer.php'; ?>