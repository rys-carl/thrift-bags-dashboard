<?php include '../partials/admin-header.php'; ?>

    <main class="p-2 px-4">
        <section id="accounts">
            <div class="content p-4">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        <h1 class="fw-bold mb-0">Accounts</h1>
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
                <table class="table table-hover fs-6" id="accounts-table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">FIRST NAME</th>
                            <th scope="col">LAST NAME</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">DATE CREATED</th>
                        </tr>
                    </thead>
                    <tbody class="fw-light">
                        <tr style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#customer-modal">
                            <th scope="row">1</th>
                            <td>Jane</td>
                            <td>Doe</td>
                            <td>janedoe@email.com</td>
                            <td>2024-11-11</td>
                        </tr>
                    </tbody>
                    <tfoot class="fw-light">
                        <tr>
                            <td colspan="5">
                                <div class="d-flex justify-content-between small">
                                    <span>Showing 1 to 1 of 1 results</span>
                                    <span> Next <i class="fa-solid fa-chevron-right fa-2xs" style="color: #000000;"></i></span>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>
    </main>

    <!-- User details Modal -->
    <div class="modal fade" id="customer-modal" tabindex="-1" aria-labelledby="customerModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: none;">
                    <h5 class="modal-title fw-bold fs-3" id="customerModalLabel">Customer Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body pt-0">

                    <!-- Placeholder details -->
                    <div class="container">
                        <p class="my-0" id="customer-first-name"><strong>First Name:</strong> Jane</p>
                        <p class="my-0" id="customer-last-name"><strong>Last Name:</strong> Doe</p>
                        <p class="my-0" id="customer-email"><strong>Email:</strong> janedoe@email.com</p>
                        <p class="my-0" id="customer-phone"><strong>Phone Number:</strong> --- </p>
                        <p class="my-0" id="customer-date-created"><strong>Date Created:</strong> 2024-10-14</p>
                    </div>

                    <!-- Placeholder table -->
                    <h5 class="mt-4">Past Orders:</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered" style="min-width: 1000px;">
                            <thead>
                                <tr>
                                    <th scope="col">Order Number</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total Amount</th>
                                    <th scope="col">Order Date</th>
                                    <th scope="col">Delivered Date</th>
                                    <th scope="col">Deliver Status</th>
                                </tr>
                            </thead>
                            <tbody id="past-orders">
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mini Frances Leather Handbag</td>
                                    <td>1</td>
                                    <td>₱500</td>
                                    <td>2024-10-15</td>
                                    <td>2024-10-20</td>
                                    <td>Delivered</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<?php include '../partials/admin-footer.php'; ?>