<?php include '../partials/admin-header.php';?>

    <main class="p-2 px-4">
        <section id="dashboard">
            <div class="content p-4 pb-2">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        <h1 class="fw-bold mb-0">Dashboard</h1>
                    </div>
    
                    <div class="col-12 col-md-6 d-flex justify-content-md-end justify-content-start mt-2 mt-md-0">
                        <a href="./monthly-quota.php" class="btn btn-dark btn-sm me-2">Edit Monthly Quota</a>
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

            <div class="content p-4 py-2">
                <p class="mb-2 fs-4 fw-medium">Sales Status</p>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card p-4 m-3">
                                <div class="card-info">
                                    <p class="fw-light m-0">Today's Total SRP:</p>
                                    <p class="fs-2 fw-bold m-0">₱135,000.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card p-4 m-3">
                                <div class="card-info">
                                    <p class="fw-light m-0">Today's Net Sales:</p>
                                    <p class="fs-2 fw-bold m-0">₱123,456,789.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card p-4 m-3">
                                <div class="card-info">
                                    <p class="fw-light m-0">Total Inventory SRP</p>
                                    <p class="fs-2 fw-bold m-0">₱123,456,789.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card p-4 m-3">
                                <div class="card-info">
                                    <p class="fw-light m-0">Monthly Quota (October 2024):</p>
                                    <p class="fs-2 fw-bold m-0">₱12,000,000.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card p-4 m-3">
                                <div class="card-info">
                                    <p class="fw-light m-0">Today's Items Sold:</p>
                                    <p class="fs-2 fw-bold m-0">10</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </section>
    </main>

<?php include '../partials/admin-footer.php';?>