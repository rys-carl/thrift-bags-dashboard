<div id="sales-option" style="<?php echo ($reportType == 'sales') ? 'display: block;' : 'display: none;'; ?>">
    <div class="content p-4 pt-0 mt-0">
        <div class="col-12 col-md-6">
            <p class="fw-bold fs-2 mb-0">October 1, 2024 - October 31, 2024</p>
            <p class="fw-light fs-4 mb-0">Report Generated: November 10, 2024</p>
        </div>

        <p class="fw-bold mt-2 mb-0 fs-2">Sales Overview:</p>
        <div class="container-fluid px-0">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-3">
                    <div class="card p-4 m-3">
                        <div class="card-info">
                            <p class="fw-light m-0">Total Orders:</p>
                            <p class="fs-2 fw-bold m-0">4</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-lg-3">
                    <div class="card p-4 m-3">
                        <div class="card-info">
                            <p class="fw-light m-0">Total Sales:</p>
                            <p class="fs-2 fw-bold m-0">₱135,000.00</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-lg-3">
                    <div class="card p-4 m-3">
                        <div class="card-info">
                            <p class="fw-light m-0">Total Shipping Cost:</p>
                            <p class="fs-2 fw-bold m-0">₱300</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-lg-3">
                    <div class="card p-4 m-3">
                        <div class="card-info">
                            <p class="fw-light m-0">Free Shipping Orders:</p>
                            <p class="fs-2 fw-bold m-0">1</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-3">
                    <div class="card p-4 m-3">
                        <div class="card-info">
                            <p class="fw-light m-0">Total Reveneu:</p>
                            <p class="fs-2 fw-bold m-0">₱160,000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-lg-3">
                    <div class="card p-4 m-3">
                        <div class="card-info">
                            <p class="fw-light m-0">Total Quantity Sold:</p>
                            <p class="fs-2 fw-bold m-0">5</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-lg-3">
                    <div class="card p-4 m-3">
                        <div class="card-info">
                            <p class="fw-light m-0">Total Cancel:</p>
                            <p class="fs-2 fw-bold m-0">0</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-lg-3">
                    <div class="card p-4 m-3">
                        <div class="card-info">
                            <p class="fw-light m-0">Total Return/Refund:</p>
                            <p class="fs-2 fw-bold m-0">1</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content table-responsive p-4 pt-2">
        <div class="col-12 col-md-6">
            <h1 class="fw-bold fs-2">Sales Breakdown by Product:</h1>
        </div>
        <table id="sales-breakdown-table" class="table table-hover fs-6">
            <thead>
                <tr>
                    <th scope="col">PRODUCT ID</th>
                    <th scope="col">PRODUCT NAME</th>
                    <th scope="col">QUANTITY SOLD</th>
                    <th scope="col">UNIT PRICE</th>
                    <th scope="col">TOTAL AMOUNT</th>
                </tr>
            </thead>
            <tbody class="fw-light">
                <tr>
                    <td>1001</td>
                    <td>Mini Frances Leather Handbag</td>
                    <td>3</td>
                    <td>350,000</td>
                    <td>350,000</td>
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

    <div class="content table-responsive p-4 pt-0">
        <div class="col-12 col-md-6">
            <h1 class="fw-bold fs-2">Transaction Summary:</h1>
        </div>
        <table id="transaction-summ-table" class="table table-hover fs-6">
            <thead>
                <tr>
                    <th scope="col">TRANSACTION TYPE</th>
                    <th scope="col">NAME OF TRANSACTION</th>
                    <th scope="col">TOTAL AMOUNT</th>
                </tr>
            </thead>
            <tbody class="fw-light">
                <tr>
                    <td>Payment</td>
                    <td>---</td>
                    <td>₱ 200,000</td>
                </tr>
            </tbody>
            <tfoot class="fw-light">
                <tr>
                    <td colspan="3">
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
            <h1 class="fw-bold fs-2">Return/Refund Details:</h1>
        </div>
        <table id="return-refund-table" class="table table-hover fs-6">
            <thead>
                <tr>
                    <th scope="col">ORDER ID</th>
                    <th scope="col">REASON</th>
                    <th scope="col">RETURN DATE</th>
                    <th scope="col">REFUND AMOUNT</th>
                </tr>
            </thead>
            <tbody class="fw-light">
                <tr>
                    <td>ORD010</td>
                    <td>Changed my mind</td>
                    <td>2024-10-30</td>
                    <td>₱ 200,000</td>
                </tr>
            </tbody>
            <tfoot class="fw-light">
                <tr>
                    <td colspan="4">
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