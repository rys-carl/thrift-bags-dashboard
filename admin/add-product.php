<?php include '../partials/admin-header.php';?>

    <main class="p-2 px-4">
        <section id="add-product"> 
            <div class="content p-4">
                <h1 class="fw-bold mb-0">Add New Product</h1>

                <form action="" method="post">
                    <div class="row mt-4">
                        <div class="col-md-3">
                            <label for="product-name" class="form-label fw-bold">Product Name</label>
                            <input type="text" class="form-control" id="product-name" name="product-name" placeholder="Enter product name">
                        </div>
                        <div class="col-md-3">
                            <label for="brand-name" class="form-label fw-bold">Brand Name</label>
                            <input type="text" class="form-control" id="brand-name" name="brand-name" placeholder="Enter brand name">
                        </div>
                        <div class="col-md-3">
                            <label for="sku" class="form-label fw-bold">SKU</label>
                            <input type="text" class="form-control" id="sku" name="sku" placeholder="Enter SKU">
                        </div>
                        <div class="col-md-3">
                            <label for="upc" class="form-label fw-bold">UPC</label>
                            <input type="text" class="form-control" id="upc" name="upc" placeholder="Enter UPC">
                        </div>
                    </div>
        
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="bag-type" class="form-label fw-bold">Bag Type</label>
                            <input type="text" class="form-control" id="bag-type" name="bag-type" placeholder="Enter bag type">
                        </div>
                        <div class="col-md-3">
                            <label for="color" class="form-label fw-bold">Color</label>
                            <input type="text" class="form-control" id="color" name="color" placeholder="Enter color">
                        </div>
                        <div class="col-md-3">
                            <label for="condition" class="form-label fw-bold">Condition</label>
                            <input type="text" class="form-control" id="condition" name="condition" placeholder="Enter condition">
                        </div>
                        <div class="col-md-3">
                            <label for="status" class="form-label fw-bold">Status</label>
                            <input type="text" class="form-control" id="status" name="status" placeholder="Enter status">
                        </div>
                    </div>
        
                    <div class="row mt-3">
                        <div class="col-12">
                            <label for="description" class="form-label fw-bold">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter product description"></textarea>
                        </div>
                    </div>
        
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="consignor" class="form-label fw-bold">Consignor</label>
                            <input type="text" class="form-control" id="consignor" name="consignor" placeholder="Enter consignor">
                        </div>
                        <div class="col-md-3">
                            <label for="consignor-price" class="form-label fw-bold">Consignor's Price</label>
                            <input type="number" class="form-control" id="consignor-price" name="consignor-price" placeholder="Enter consignor's price">
                        </div>
                        <div class="col-md-3">
                            <label for="arrival-date" class="form-label fw-bold">Date of Arrival</label>
                            <input type="date" class="form-control" id="arrival-date" name="arrival-date">
                        </div>
                        <div class="col-md-3">
                            <label for="date-sold" class="form-label fw-bold">Date Sold</label>
                            <input type="date" class="form-control" id="date-sold" name="date-sold">
                        </div>
                    </div>
        
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="inventory-city" class="form-label fw-bold">Inventory City</label>
                            <input type="text" class="form-control" id="inventory-city" name="inventory-city" placeholder="Enter inventory city">
                        </div>
                        <div class="col-md-3">
                            <label for="srp" class="form-label fw-bold">SRP</label>
                            <input type="number" class="form-control" id="srp" name="srp" placeholder="Enter SRP">
                        </div>
                        <div class="col-md-3">
                            <label for="normal-threshold" class="form-label fw-bold">Normal Threshold Qty</label>
                            <input type="number" class="form-control" id="normal-threshold" name="normal-threshold" placeholder="Enter normal threshold qty">
                        </div>
                        <div class="col-md-3">
                            <label for="low-threshold" class="form-label fw-bold">Low Threshold Qty</label>
                            <input type="number" class="form-control" id="low-threshold" name="low-threshold" placeholder="Enter low threshold qty">
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
                            <a href="./inventory-overview.php" class="btn btn-light me-2">Cancel</a>
                            <!-- NOTE: Change "type=button" to "type=submit" -->
                            <input type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#confirm-modal" value="Save">
                        </div>
                    </div>
                </form>
            </div>

            
            <!-- Confirmation Modal -->
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

            <!-- Added Successful Modal -->
            <div class="custom-modal modal fade" id="edit-success" tabindex="-1" aria-labelledby="addedSuccessfulModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content p-3">
                        <div class="modal-header justify-content-center pb-1" style="border-bottom: none;">
                            <h5 class="modal-title text-success text-center fs-3 fw-light" id="addedSuccessfulModalLabel">PRODUCT ADDED</h5>
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

        </section>
    </main>

<?php include '../partials/admin-footer.php';?>