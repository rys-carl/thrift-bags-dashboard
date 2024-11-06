<?php include '../partials/admin-header.php';?>

    <main class="p-2 px-4">
        <section id="add-return"> 
            <div class="content p-4">
                <h1 class="fw-bold mb-0">Return Item</h1>
                
                <form action="" method="post">
                    <div class="row mt-4">
                        <div class="col-md-3">
                            <label for="order-number" class="form-label fw-bold">Order Number</label>
                            <input type="number" class="form-control" id="order-number" name="order-number" placeholder="Enter order number">
                        </div>
                        <div class="col-md-3">
                            <label for="product-name" class="form-label fw-bold">Product Name</label>
                            <input type="text" class="form-control" id="product-name" name="product-name" placeholder="Enter product name">
                        </div>
                        <div class="col-md-3">
                            <label for="date-submit" class="form-label fw-bold">Date Submitted</label>
                            <input type="date" class="form-control" id="date-submit" name="date-submit" placeholder="Enter date submitted">
                        </div>
                        <div class="col-md-3">
                            <label for="status" class="form-label fw-bold">Status</label>
                            <input type="text" class="form-control" id="status" name="status" placeholder="Enter Status">
                        </div>
                    </div>
        
                    <div class="row mt-3">
                        <div class="col-12 col-md-3">
                            <label for="brandSelect" class="form-label">Description</label>
                                <select class="form-select border border-dark-subtle" id="descriptionSelect" name="description">
                                    <option selected>Select Description</option>
                                    <option value="damaged">Damaged</option>
                                    <option value="change">Change of Mind</option>
                                    <option value="unsatisfied">Unsatisfied with Item</option>
                                </select>
                        </div>
                        <div class="col-md-3">
                            <label for="approve" class="form-label fw-bold">Approved By:</label>
                            <input type="text" class="form-control" id="approve" name="approve" placeholder="Approved by whom?">
                        </div>
                    </div>
        
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="image-upload" class="form-label fw-bold">Image</label>
                            <input type="file" class="form-control" id="image-upload" name="image-upload">
                        </div>
                    </div>
        
                    <div class="row mt-5">
                        <div class="col text-end">
                            <a href="./returned-items.php" class="btn btn-light me-2">Cancel</a>
                            <!-- NOTE: Change "type=button" to "type=submit" -->
                            <input type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#confirm-modal" value="Save">
                        </div>
                    </div>
                </form>
            </div>


            <!-- Edit Confirmation Modal -->
            <div class="custom-modal modal fade" id="confirm-modal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="false">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content p-3">
                        <div class="modal-header justify-content-center pb-1" style="border-bottom: none;">
                            <h5 class="modal-title text-success text-center fw-light" id="confirmModalLabel">CONFIRM PRODUCT DETAILS?</h5>
                        </div>
                        <div class="modal-body text-center">
                            Are these details correct?
                        </div>
                        <div class="modal-footer justify-content-center text-center pt-1" style="border-top: none;">
                            <form action=" " method="post">
                                <input type="hidden" name="product-id" value="">
                                <!-- NOTE: Change "type=button" to "type=submit" -->
                                <button type="button" class="btn btn-success me-3" id="confirmEdit" data-bs-toggle="modal" data-bs-target="#edit-success">Save</button>
                                <button type="button" class="btn btn-danger ms-3" data-bs-dismiss="modal">Cancel</button> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Successful Modal -->
            <div class="custom-modal modal fade" id="edit-success" tabindex="-1" aria-labelledby="editSuccessfulModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content p-3">
                        <div class="modal-header justify-content-center pb-1" style="border-bottom: none;">
                            <h5 class="modal-title text-success text-center fs-3 fw-light" id="editSuccessfulModalLabel">RETURN DETAILS SAVED</h5>
                        </div>
                        <div class="modal-body text-center">
                            Product return details saved successfully!
                        </div>
                        <div class="modal-footer justify-content-center text center pt-1" style="border-top: none;">
                            <a href="./returned-items.php" class="btn btn-dark">Go Back</a>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>

<?php include '../partials/admin-footer.php';?>