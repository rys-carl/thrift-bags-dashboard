<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard (Prototype)</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header class="navbar bg-black text-white p-3" id="main-header">
        <div class="container-fluid">
            <button class="btn text-white" id="hamburger-menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions" aria-label="Toggle menu">
                <i class="fas fa-bars fa-2xl"></i>
            </button>
            <div class="d-flex ms-auto" id="notification">
                <button class="btn text-white me-3" data-bs-toggle="modal" data-bs-target="#notification-modal">
                    <i class="fas fa-bell fa-xl"></i>
                </button>
                <button class="btn text-white" id="profile">
                    <i class="fa-regular fa-circle-user fa-2xl"></i>
                </button>
            </div>
        </div>

        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel" style="width: 16rem;">
            <div class="offcanvas-header">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mt-0 pt-0">
                <ul class="list-unstyled">
                    <li class="dropdown sidebar-item">
                        <a href="../admin/dashboard.php" class="text-dark d-flex align-items-center" style="width: 100%;">
                            <i class="fa-solid fa-chart-line mx-2" style="color: #000000;"></i>Dashboard
                        </a>
                    </li>

                    <li class="dropdown sidebar-item">
                        <a href="#" class="text-dark dropdown-toggle" id="inventoryDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-boxes-stacked mx-2" style="color: #000000;"></i>Inventory
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end mt-2 p-0" aria-labelledby="inventoryDropdown" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);">
                            <li><a class="dropdown-item" href="../admin/inventory-overview.php">Overview</a></li>
                            <li><a class="dropdown-item" href="../admin/restock.php">Restock</a></li>
                        </ul>
                    </li>

                    <li class="dropdown sidebar-item">
                        <a href="../admin/orders.php" class="text-dark d-flex align-items-center" style="width: 100%;">
                            <i class="fa-solid fa-cart-shopping mx-2" style="color: #000000;"></i>Orders
                        </a>
                    </li>
                    <li class="dropdown sidebar-item">
                        <a href=" " class="text-dark d-flex align-items-center" style="width: 100%;">
                            <i class="fa-solid fa-user-group mx-2" style="color: #000000;"></i>Accounts
                        </a>
                    </li>
                    <li class="dropdown sidebar-item">
                        <a href="../admin/reports.php" class="text-dark d-flex align-items-center" style="width: 100%;">
                            <i class="fa-solid fa-chart-bar mx-2" style="color: #000000;"></i>Reports
                        </a>
                    </li>

                    <!-- <li class="dropdown sidebar-item">
                        <a href="#" class="text-dark dropdown-toggle" id="inventoryDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-chart-bar mx-2" style="color: #000000;"></i>Reports
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end mt-2 p-0" aria-labelledby="inventoryDropdown">
                            <li><a class="dropdown-item" href="../admin/report.php">Sales</a></li>
                            <li><a class="dropdown-item" href="../admin/report.php">Inventory Report</a></li>
                            <li><a class="dropdown-item" href="../admin/report.php">Delivery</a></li>
                            <li><a class="dropdown-item" href="../admin/report.php">Cancel</a></li>
                            <li><a class="dropdown-item" href="../admin/report.php">Refund</a></li>
                        </ul>
                    </li> -->
                </ul>
            </div>
        </div>
    </header>

    <?php include '/xampp/htdocs/thriftbags/partials/admin-notif-modal.php';?>