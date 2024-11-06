<?php include '../partials/admin-header.php'; ?>

    <main class="p-2 px-4">
        <section id="inventory-report">
            <div class="content p-4">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        <h1 class="fw-bold mb-0">Inventory Report</h1>
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

                <form action="" method="post">
                    <div class="row align-items-end">
                        <div class="col-4 col-md col-sm-3 col-xs-12">
                            <label for="categorySelect" class="form-label"></label>
                            <select class="form-select border border-dark-subtle" id="categorySelect" name="category">
                                <option selected>Category</option>
                                <option value="shoulderbag">Shoulder Bag</option>
                                <option value="handbag">Hand Bag</option>
                                <option value="totebag">Tote Bag</option>
                                <option value="crossbody">Crossbody Bag</option>
                                <option value="backpack">Backpack</option>
                                <option value="tophandle">Top Handle Bag</option>
                                <option value="hobobog">Hobo Bag</option>
                                <option value="satchel">Satchel</option>
                            </select>
                        </div>
                        <div class="col-4 col-md col-sm-3 col-xs-12">
                            <label for="brandSelect" class="form-label"></label>
                            <select class="form-select border border-dark-subtle" id="brandSelect" name="brand">
                                <option selected>Brand</option>
                                <option value="x">Brand X</option>
                            </select>
                        </div>
                        <div class="col-4 col-md col-sm-3 col-xs-12">
                            <label for="priceRangeSelect" class="form-label"></label>
                            <select class="form-select border border-dark-subtle" id="priceRangeSelect" name="price_range">
                                <option selected>Price Range</option>
                                <option value="0-50">₱0 - ₱50</option>
                                <option value="51-100">₱51 - ₱100</option>
                            </select>
                        </div>
                        <div class="col-4 col-md col-sm-3 col-xs-12">
                            <label for="quantitySelect" class="form-label"></label>
                            <select class="form-select border border-dark-subtle" id="quantitySelect" name="quantity">
                                <option selected>Quantity</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <div class="col-4 col-md col-sm-3 col-xs-12">
                            <label for="conditionSelect" class="form-label"></label>
                            <select class="form-select border border-dark-subtle" id="conditionSelect" name="condition">
                                <option selected>Condition</option>
                                <option value="a">A</option>
                                <option value="b">B</option>
                                <option value="c">C</option>
                            </select>
                        </div>
                        <div class="col-4 col-md col-sm-3 col-xs-12">
                            <label for="conditionSelect" class="form-label"></label>
                            <select class="form-select border border-dark-subtle" id="conditionSelect" name="condition">
                                <option selected>Material</option>
                                <option value="leather">Leather</option>
                                <option value="faux">Faux Leather</option>
                                <option value="nylon">Nylon</option>
                                <option value="canvas">Canvas</option>
                            </select>
                        </div>
                        <div class="col-12 col-md ms-auto">
                            <button type="submit" class="btn btn-dark fw-medium mt-3 mt-sm-3">Generate</button>
                        </div>
                    </div>
                </form>
            </div>


            <div class="content table-responsive p-4 pt-2">
                <table class="table table-hover fs-6">
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
                        <tr onclick="window.location='./product-details.php';" style="cursor: pointer;">
                            <th scope="row">1</th>
                            <td>Mini Frances Leather Handbag</td>
                            <td>Shoulder Bag</td>
                            <td>Chanel</td>
                            <td>350,000</td>
                            <td>3</td>
                            <td>A</td>
                            <td>Leather</td>
                            <td>AAAAAA</td>
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
        </section>
    </main>

<?php include '../partials/admin-footer.php'; ?>