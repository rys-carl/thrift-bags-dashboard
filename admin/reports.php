<?php include '../partials/admin-header.php'; ?>

    <main class="p-2 px-4">
        <section id="reports">
            <div class="content p-4">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        <h1 class="fw-bold mb-0">Reports</h1>
                    </div>

                    <div class="mt-4">
                        <form action="" method="get">
                            <div class="input-group mb-3">
                                <select class="form-select" name="filter" aria-label="Select filter">
                                    <option value="" selected>Choose Report Type</option>
                                    <option value="sales">Sales</option>
                                    <option value="inventory">Inventory</option>
                                    <option value="restock-delivery">Restock & Delivery</option>
                                    <option value="cancel">Cancel</option>
                                    <option value="return-refund">Return & Refund</option>
                                </select>
                                <div class="ms-auto">
                                <button type="submit" class="btn btn-dark fw-medium ms-3">Generate</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>        
            </div>

            <!-- Sales table format -->
            <div class="content table-responsive p-4 pt-2" style="display: none;">
                <table id="sales-table" class="table table-hover fs-6">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">PAYMENT ID</th>
                            <th scope="col">ORDER ID</th>
                            <th scope="col">ADMIN ID</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">ADMIN CONFIRMATION</th>
                            <th scope="col">TOTAL AMOUNT</th>
                            <th scope="col">TRANSACTION DATE</th>
                            <th scope="col">SETTLEMENT DATE</th>
                            <th scope="col">DISPUTE RESOLVED BY</th>
                            <th scope="col">VERIFIED BY</th>
                        </tr>
                    </thead>
                    <tbody class="fw-light">
                        <tr>
                            <th scope="row">1</th>
                        </tr>
                    </tbody>
                    <tfoot class="fw-light">
                        <tr>
                            <td colspan="11">
                                <div class="d-flex justify-content-between small">
                                    <span>Showing 1 to 1 of 1 results</span>
                                    <span> Next <i class="fa-solid fa-chevron-right fa-2xs" style="color: #000000;"></i></span>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>


            <!-- Inventory table format -->
            <div class="content table-responsive p-4 pt-2" style="display: none;">
                <table id="inventory-table" class="table table-hover fs-6">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">PRODUCT NAME</th>
                            <th scope="col">CATEGORY</th>
                            <th scope="col">BRAND</th>
                            <th scope="col">PRICE</th>
                            <th scope="col">QUANTITY</th>
                            <th scope="col">CONDITION</th>
                            <th scope="col">MATERIAL</th>
                            <th scope="col">DESCRIPTION</th>
                            <th scope="col">SKU</th>
                            <th scope="col">UPC</th>
                            <th scope="col">COLOR</th>
                        </tr>
                    </thead>
                    <tbody class="fw-light">
                        <tr>
                            <th scope="row">1</th>
                            <td>Mini Frances Leather Handbag</td>
                            <td>Shoulder Bag</td>
                            <td>Chanel</td>
                            <td>350,000</td>
                            <td>3</td>
                            <td>A</td>
                            <td>Leather</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab sequi porro deserunt laudantium cum quis minima, unde dolorum asperiores accusamus ipsa sed debitis delectus magnam veritatis animi perspiciatis aliquam? Itaque!</td>
                            <td>CF-1001</td>
                            <td>123456789012</td>
                            <td>Black</td>
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


            <!-- Restock & Delivery table format -->
            <div class="content table-responsive p-4 pt-2" style="display: none;">
                <table id="restock-delivery-table" class="table table-hover fs-6">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">PRODUCT ID</th>
                            <th scope="col">ADMIN ID</th>
                            <th scope="col">QUANTITY</th>
                            <th scope="col">DATE</th>
                            <th scope="col">DELIVERY DATE</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">REFERENCE NUMBER</th>
                        </tr>
                    </thead>
                    <tbody class="fw-light">
                        <tr>
                            <th scope="row">1</th>
                            <td>1001</td>
                            <td>3</td>
                            <td>3</td>
                            <td>2024-02-22</td>
                            <td>2024-02-22</td>
                            <td>Delivered</td>
                            <td>REF123456</td>
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


            <!-- Cancel table format -->
            <div class="content table-responsive p-4 pt-2" style="display: none;">
                <table id="cancel-table" class="table table-hover fs-6">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">ORDER ID</th>
                            <th scope="col">ADMIN ID</th>
                            <th scope="col">REASON</th>
                            <th scope="col">CANCEL STATUS</th>
                            <th scope="col">REQUEST DATE</th>
                            <th scope="col">APPROVAL DATE</th>
                            <th scope="col">APPROVED BY</th>
                        </tr>
                    </thead>
                    <tbody class="fw-light">
                        <tr>
                            <th scope="row">1</th>
                            <td>1001</td>
                            <td>3</td>
                            <td>Not Satisfied</td>
                            <td>---</td>
                            <td>2024-02-22</td>
                            <td>2024-02-22</td>
                            <td>John Smith</td>
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


            <!-- Return table format -->
            <div class="content table-responsive p-4 pt-2" style="display: none;">
                <table id="return-table" class="table table-hover fs-6">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">ORDER ID</th>
                            <th scope="col">ADMIN ID</th>
                            <th scope="col">REASON</th>
                            <th scope="col">RETURN STATUS</th>
                            <th scope="col">REQUEST DATE</th>
                            <th scope="col">PICKUP DATE</th>
                            <th scope="col">DELIVERY DATE</th>
                            <th scope="col">DELIVERED DATE</th>
                        </tr>
                    </thead>
                    <tbody class="fw-light">
                        <tr>
                            <th scope="row">1</th>
                            <td>1001</td>
                            <td>3</td>
                            <td>Not Satisfied</td>
                            <td>---</td>
                            <td>2024-02-22</td>
                            <td>2024-02-22</td>
                            <td>2024-02-22</td>
                            <td>2024-02-22</td>
                        </tr>
                    </tbody>
                    <tfoot class="fw-light">
                        <tr>
                            <td colspan="9">
                                <div class="d-flex justify-content-between small">
                                    <span>Showing 1 to 1 of 1 results</span>
                                    <span> Next <i class="fa-solid fa-chevron-right fa-2xs" style="color: #000000;"></i></span>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>


            <!-- Refund table format -->
            <div class="content table-responsive p-4 pt-2" style="display: none;">
                <table id="refund-table" class="table table-hover fs-6">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">REFUND ID</th>
                            <th scope="col">ADMIN ID</th>
                            <th scope="col">AMOUNT</th>
                            <th scope="col">REFUND DATE</th>
                            <th scope="col">METHOD</th>
                            <th scope="col">REFUND STATUS</th>
                        </tr>
                    </thead>
                    <tbody class="fw-light">
                        <tr>
                            <th scope="row">1</th>
                            <td>1001</td>
                            <td>3</td>
                            <td>000</td>
                            <td>2024-02-22</td>
                            <td>Online Banking</td>
                            <td>---</td>
                        </tr>
                    </tbody>
                    <tfoot class="fw-light">
                        <tr>
                            <td colspan="7">
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

<?php include '../partials/admin-footer.php'; ?>