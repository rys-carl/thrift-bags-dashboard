<?php include '../partials/admin-header.php';?>

    <main class="p-2 px-4">
        <section id="orders">
            <div class="content p-4 pb-2">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        <h1 class="fw-bold mb-0">Order List</h1>
                    </div>

                    <div class="col-12 col-md-6 d-flex justify-content-md-end justify-content-start mt-2 mt-md-0">
                        <form action=" " method="get">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle btn-sm border border-dark-subtle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">Select Date</button>
                                <ul class="dropdown-menu border border-dark-subtle" aria-labelledby="dropdownMenuButton">
                                    <li><button class="dropdown-item" type="submit" name="date-filter" value="today">Today</button></li>
                                    <li><button class="dropdown-item" type="submit" name="date-filter" value="this-week">This Week</button></li>
                                    <li><button class="dropdown-item" type="submit" name="date-filter" value="last-week">Last Week</button></li>
                                    <li><button class="dropdown-item" type="submit" name="date-filter" value="this-month">This Month</button></li>
                                    <li><button class="dropdown-item" type="submit" name="date-filter" value="last-month">Last Month</button></li>
                                    <li><button class="dropdown-item" type="submit" name="date-filter" value="this-quarter">This Quarter</button><li>
                                    <li><button class="dropdown-item" type="submit" name="date-filter" value="this-year">This Year</button></li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- <div class="content p-4 py-2">
                <p class="mb-2 fs-4 fw-medium">Order status</p>
            </div> -->

            <div class="content table-responsive p-4 pt-2">
                <table class="table table-hover fs-6">
                    <thead>
                        <tr>
                            <th scope="col">COSTUMER NAME</th>
                            <th scope="col">ADDRESS</th>
                            <th scope="col">SHIPPING ADDRESS</th>
                            <th scope="col">PRODUCT NAME</th>
                            <th scope="col">QUANTITY</th>
                            <th scope="col">PAYMENT METHOD</th>
                            <th scope="col">TOTAL</th>
                            <th scope="col">STATUS</th>
                        </tr>
                    </thead>
                    <tbody class="fw-light">
                        <tr>
                            <th scope="row">Mark Jason</th>
                            <td>San Pablo City Laguna</td>
                            <td>Door to door</td>
                            <td>Trift Bag1</td>
                            <td>1</td>
                            <td>Gcash</td>
                            <td>$1069.50</td>
                            <td>
                                <div class="dropdown">
                                    <form method="post" action=" ">
                                        <button class="btn dropdown-toggle btn-sm border border-dark-subtle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            Select Status
                                        </button>
                                        <ul class="dropdown-menu border border-dark-subtle" aria-labelledby="dropdownMenuButton">
                                            <input type="hidden" name="item_id" value="your_item_id_here">
                                            <li><button class="dropdown-item btn" type="submit" name="status" value="Approved">Approved</button></li>
                                            <li><button class="dropdown-item btn" type="submit" name="status" value="Pending">Pending</button></li>
                                            <li><button class="dropdown-item btn" type="submit" name="status" value="Declined">Declined</button></li>
                                        </ul>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Jeric Arias</th>
                            <td>San Pablo City Laguna</td>
                            <td>Pickup</td>
                            <td>Trift Bag2</td>
                            <td>2</td>
                            <td>Credit Card</td>
                            <td>$3,199.50</td>
                            <td>
                                <div class="dropdown">
                                    <form method="post" action=" ">
                                        <button class="btn dropdown-toggle btn-sm border border-dark-subtle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            Select Status
                                        </button>
                                        <ul class="dropdown-menu border border-dark-subtle" aria-labelledby="dropdownMenuButton">
                                            <input type="hidden" name=" " value=" ">
                                            <li><button class="dropdown-item btn" type="submit" name="status" value="Approved">Approved</button></li>
                                            <li><button class="dropdown-item btn" type="submit" name="status" value="Pending">Pending</button></li>
                                            <li><button class="dropdown-item btn" type="submit" name="status" value="Declined">Declined</button></li>
                                        </ul>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot class="fw-light">
                        <tr>
                            <td colspan="8">
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

<?php include '../partials/admin-footer.php';?>