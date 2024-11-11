<?php include '../partials/admin-header.php'; ?>

    <main class="p-2 px-4">
        <section id="reports">
            <div class="content p-4">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        <h1 class="fw-bold mb-0">Reports</h1>
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

                    <div class="mt-4">
                        <form action=" " method="get">
                            <div class="dropdown mb-3">
                                <button class="btn dropdown-toggle btn-sm border border-dark-subtle fw-bold" style="width: 100px;" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">Scope</button>
                                <ul class="dropdown-menu border border-dark-subtle" aria-labelledby="dropdownMenuButton">
                                    <li><button class="dropdown-item" type="submit" name="days-filter" value="7-days">7 days ago</button></li>
                                    <li><button class="dropdown-item" type="submit" name="days-filter" value="30-days">30 days ago</button></li>
                                    <li><button class="dropdown-item" type="submit" name="days-filter" value="90-days">90 days ago</button></li>
                                    <li><button class="dropdown-item" type="button" id="custom-btn" name="days-filter" value="custom">Custom</button></li>
                                </ul>
                            </div>

                            <div id="custom-dates" style="display: none;">
                                <div class="mb-3 d-flex gap-2">
                                    <div>
                                        <label for="start-date" class="form-label small fw-bold">Start Date:</label>
                                        <input type="date" class="form-control form-control-sm" id="start-date" name="start-date">
                                    </div>
                                    <div>
                                        <label for="end-date" class="form-label small fw-bold">End Date:</label>
                                        <input type="date" class="form-control form-control-sm" id="end-date" name="end-date">
                                    </div>
                                </div>
                            </div>
                        </form>

                        <form action="" method="get">
                            <div class="input-group">
                                <select class="form-select fw-bold border border-dark-subtle" name="filter" aria-label="Select filter">
                                    <option value="" selected>Choose Report Type</option>
                                    <option value="inventory">Inventory</option>
                                    <option value="sales">Sales</option>
                                </select>
                                <div class="ms-auto">
                                    <button type="submit" class="btn btn-dark fw-medium ms-3">Generate</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>        
            </div>

            <?php $reportType = isset($_GET['filter']) ? $_GET['filter'] : ''; ?>
            
            <?php include './inventory-report.php'; ?>
            <?php include './sales-report.php'; ?>
        </section>
    </main>

<?php include '../partials/admin-footer.php'; ?>