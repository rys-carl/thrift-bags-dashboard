<?php include '../partials/admin-header.php';?>

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
                            <img src="../assets/img/placeholder-item.png" class="img-fluid border" alt="Product Image">
                        </div>
                        <div class="row mt-2 gx-1">
                            <div class="col-4 col-md-4">
                                <img src="../assets/img/placeholder-item.png" class="img-fluid border" alt="Product Image">
                            </div>
                            <div class="col-4 col-md-4">
                                <img src="../assets/img/placeholder-item.png" class="img-fluid border" alt="Product Image">
                            </div>
                            <div class="col-4 col-md-4">
                                <img src="../assets/img/placeholder-item.png" class="img-fluid border" alt="Product Image">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8 mb-4">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="product-name" class="form-label fw-bold">Product Name</label>
                                <input type="text" class="form-control" id="product-name" value="Bag Name" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="brand-name" class="form-label fw-bold">Brand Name</label>
                                <input type="text" class="form-control" id="brand-name" value="Bag Brand" readonly>
                            </div>
                        </div>
                        <div class="row mt-2 gx-1">
                            <div class="col mb-3">
                                <label for="description" class="form-label fw-bold">Description</label>
                                <textarea class="form-control" id="description" rows="4" readonly>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur maiores hic aut doloribus nulla. Sit iusto impedit est commodi ab. Adipisci, non aperiam! Perferendis repudiandae, autem reprehenderit natus laboriosam assumenda.</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="category" class="form-label fw-bold">Category</label>
                                <input type="text" class="form-control" id="category" value="A" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="condition" class="form-label fw-bold">Condition</label>
                                <input type="text" class="form-control" id="condition" value="A" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="color" class="form-label fw-bold">Color</label>
                                <input type="text" class="form-control" id="color" value="Black" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="srp" class="form-label fw-bold">SRP</label>
                                <input type="number" class="form-control" id="srp" value="123456789" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="inventory-qty" class="form-label fw-bold">Inventory Qty</label>
                        <input type="number" class="form-control" id="inventory-qty" value="0" readonly>
                    </div>
                    
                    <div class="col-md-3 mb-3">
                        <label for="normal-threshold" class="form-label fw-bold">Normal Threshold</label>
                        <input type="number" class="form-control" id="normal-threshold" value="5" readonly>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="low-threshold" class="form-label fw-bold">Low Threshold</label>
                        <input type="number" class="form-control" id="low-threshold" value="2" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="status" class="form-label fw-bold">Status</label>
                        <input type="text" class="form-control" id="status" value="Sold" readonly>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="arrival-date" class="form-label fw-bold">Date of Arrival</label>
                        <input type="date" class="form-control" id="arrival-date" value="2024-10-18" readonly>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="date-sold" class="form-label fw-bold">Date Sold</label>
                        <input type="date" class="form-control" id="date-sold" value="2024-10-18" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="sku" class="form-label fw-bold">SKU</label>
                        <input type="text" class="form-control" id="sku" value="123456789" readonly>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="upc" class="form-label fw-bold">UPC</label>
                        <input type="text" class="form-control" id="upc" value="123456789" readonly>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="product-id" class="form-label fw-bold">Product ID</label>
                        <input type="number" class="form-control" id="product-id" value="1" readonly>
                    </div>
                    <div class="col-md-3 d-flex align-items-end justify-content-md-end">
                        <a href="./edit-details.php" class="btn btn-dark btn-sm me-2 fw-medium" style="width: 120px;">Edit</a>
                    </div>
                </div>   
            </div>
        </section>        
    </main>

<?php include '../partials/admin-footer.php';?>