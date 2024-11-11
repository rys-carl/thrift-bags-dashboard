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
                        <a href=" " class="text-dark d-flex align-items-center" style="width: 100%;">
                            <i class="fa-solid fa-cart-shopping mx-2" style="color: #000000;"></i>Orders
                        </a>
                    </li>
                    <li class="dropdown sidebar-item">
                        <a href="../admin/accounts.php" class="text-dark d-flex align-items-center" style="width: 100%;">
                            <i class="fa-solid fa-user-group mx-2" style="color: #000000;"></i>Accounts
                        </a>
                    </li>
                    <li class="dropdown sidebar-item">
                        <a href="../admin/reports.php" class="text-dark d-flex align-items-center" style="width: 100%;">
                            <i class="fa-solid fa-chart-bar mx-2" style="color: #000000;"></i>Reports
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>


    <!-- Notification Modal -->
    <div class="modal fade" id="notification-modal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: none;">
                    <h5 class="modal-title fw-bold fs-3" id="notificationModalLabel">Notifications</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <!-- Placeholder notifs -->
                    <ul class="list-group p-0">
                        <li class="list-group-item fw-medium d-flex align-items-end notif-content">
                            <div class="flex-grow-1">
                                <div class="fw-bold">
                                    <i class="fa-solid fa-bell" style="color: #000000;"></i>
                                    New Order Received
                                </div>
                                <div class="text-muted">Order #123456789 placed by John Doe </div>
                                <a href="" class="fw-bold text-decoration-none text-dark">[View Order]</a>
                            </div>
                            <div class="text-muted fst-italic text-end small">Just now</div>
                        </li>

                        <li class="list-group-item fw-medium d-flex align-items-end notif-content">
                            <div class="flex-grow-1">
                                <div class="fw-bold text-warning">
                                    <i class="fa-solid fa-bell" style="color: #FFD43B;"></i>
                                    Low Stock Alert
                                </div>
                                <div class="text-muted">Only 2 units left of Mini Frances Leather Handbag</div>
                                <a href="" class="fw-bold text-decoration-none text-dark">[View Order]</a>
                            </div>
                            <div class="text-muted fst-italic text-end small">5 minutes ago</div>
                        </li>

                        <li class="list-group-item fw-medium d-flex align-items-end notif-content">
                            <div class="flex-grow-1">
                                <div class="fw-bold text-danger">
                                    <i class="fa-solid fa-triangle-exclamation" style="color: #E50505;"></i>
                                    Out of Stock Alert
                                </div>
                                <div class="text-muted">Mini Frances Leather Handbag is out of stock</div>
                                <a href="" class="fw-bold text-decoration-none text-dark">[View Order]</a>
                            </div>
                            <div class="text-muted fst-italic text-end small">10 minutes ago</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>