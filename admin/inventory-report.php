<div id="inventory-option" style="<?php echo ($reportType == 'inventory') ? 'display: block;' : 'display: none;'; ?>">
    <div class="content p-4 pt-0 mt-0">
        <div class="col-12 col-md-6">
            <p class="fw-bold fs-2 mb-0">October 1, 2024 - October 31, 2024</p>
            <p class="fw-light fs-4 mb-0">Report Generated: November 10, 2024</p>
        </div>

        <p class="fw-bold mt-2 mb-0 fs-2">Overview:</p>
        <div class="container-fluid px-0">
            <div class="row">
                <div class="col-md-4">
                    <div class="card p-4 m-3">
                        <div class="card-info">
                            <p class="fw-light m-0">Total Products:</p>
                            <p class="fs-2 fw-bold m-0">30</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 m-3">
                        <div class="card-info">
                            <p class="fw-light m-0">Total Current Stock Quantity:</p>
                            <p class="fs-2 fw-bold m-0">50</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 m-3">
                        <div class="card-info">
                            <p class="fw-light m-0">Total Value:</p>
                            <p class="fs-2 fw-bold m-0">₱5,000,000</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card p-4 m-3">
                        <div class="card-info">
                            <p class="fw-light m-0">Restock Completed:</p>
                            <p class="fs-2 fw-bold m-0">2</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 m-3">
                        <div class="card-info">
                            <p class="fw-light m-0">Processed Restocks:</p>
                            <p class="fs-2 fw-bold m-0">3</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 m-3">
                        <div class="card-info">
                            <p class="fw-light m-0">Pending Restocks:</p>
                            <p class="fs-2 fw-bold m-0">3</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content table-responsive p-4 pt-2">
        <div class="col-12 col-md-6">
            <h1 class="fw-bold fs-2">Current Inventory Stocks:</h1>
        </div>
        <table id="current-inv-stocks-table" class="table table-hover fs-6">
            <thead>
                <tr>
                    <th scope="col">PRODUCT ID</th>
                    <th scope="col">PRODUCT NAME</th>
                    <th scope="col">CATEGORY</th>
                    <th scope="col">BRAND</th>
                    <th scope="col">SKU</th>
                    <th scope="col">UPC</th>
                    <th scope="col">MATERIAL</th>
                    <th scope="col">COLOR</th>
                    <th scope="col">CONDITION</th>
                    <th scope="col">QUANTITY</th>
                    <th scope="col">UNIT PRICE</th>
                    <th scope="col">TOTAL AMOUNT</th>
                </tr>
            </thead>
            <tbody class="fw-light">
                <tr>
                    <td>1001</td>
                    <td>Mini Frances Leather Handbag</td>
                    <td>Shoulder Bag</td>
                    <td>Chanel</td>
                    <td>CF-1001</td>
                    <td>123456789012</td>
                    <td>Leather</td>
                    <td>Black</td>
                    <td>---</td>
                    <td>3</td>
                    <td>350,000</td>
                    <td>350,000</td>
                </tr>
            </tbody>
            <tfoot class="fw-light">
                <tr>
                    <td colspan="12">
                        <div class="d-flex justify-content-between small">
                            <span>Showing 1 to 1 of 1 results</span>
                            <span> Next <i class="fa-solid fa-chevron-right fa-2xs" style="color: #000000;"></i></span>
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="content table-responsive p-4 pt-0">
        <div class="col-12 col-md-6">
            <h1 class="fw-bold fs-2">Incoming Stocks:</h1>
        </div>
        <table id="incoming-stocks-table" class="table table-hover fs-6">
            <thead>
                <tr>
                    <th scope="col">PRODUCT NAME</th>
                    <th scope="col">BRAND</th>
                    <th scope="col">MATERIAL</th>
                    <th scope="col">COLOR</th>
                    <th scope="col">QUANTITY</th>
                    <th scope="col">UNIT PRICE</th>
                    <th scope="col">TOTAL PRICE</th>
                    <th scope="col">DELIVERY DATE</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">REFERENCE NUMBER</th>
                </tr>
            </thead>
            <tbody class="fw-light">
                <tr>
                    <td>Mini Frances Leather Handbag</td>
                    <td>Chanel</td>
                    <td>Leather</td>
                    <td>Black</td>
                    <td>6</td>
                    <td>350,000</td>
                    <td>350,000</td>
                    <td>2024-02-22</td>
                    <td>---</td>
                    <td>123456789</td>
                </tr>
            </tbody>
            <tfoot class="fw-light">
                <tr>
                    <td colspan="12">
                        <div class="d-flex justify-content-between small">
                            <span>Showing 1 to 1 of 1 results</span>
                            <span> Next <i class="fa-solid fa-chevron-right fa-2xs" style="color: #000000;"></i></span>
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>