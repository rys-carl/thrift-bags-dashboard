<?php
include '../partials/admin-header.php';
include '../database/dbconnect.php';

// Pagination
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$itemsPerPage = 10;
$offset = ($page - 1) * $itemsPerPage;

// Search functionality
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
$searchCondition = $search ? "WHERE user_firstname LIKE '%$search%' OR user_lastname LIKE '%$search%' OR email LIKE '%$search%'" : "";

// Fetch users
$usersQuery = "SELECT * FROM users $searchCondition LIMIT $itemsPerPage OFFSET $offset";
$usersResult = $conn->query($usersQuery);

// Get total number of users for pagination
$totalUsersQuery = "SELECT COUNT(*) as total FROM users $searchCondition";
$totalUsersResult = $conn->query($totalUsersQuery);
$totalUsers = $totalUsersResult->fetch_assoc()['total'];
$totalPages = ceil($totalUsers / $itemsPerPage);
?>

<main class="p-2 px-4">
    <section id="accounts">
        <div class="content p-4">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <h1 class="fw-bold mb-0">Accounts</h1>
                </div>
            </div>

            <div class="row align-items-center mt-3">
                <div class="search-bar col-auto">
                    <form action="" method="get" class="d-flex">
                        <input type="text" name="search" class="form-control me-2" placeholder="Type your search here"
                            value="<?php echo htmlspecialchars($search); ?>" style="width: 280px;">
                        <button type="submit" class="btn btn-dark"> <i class="fa-solid fa-magnifying-glass">
                            </i></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="content table-responsive p-4 pt-2">
            <table class="table table-hover fs-6" id="accounts-table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">FIRST NAME</th>
                        <th scope="col">LAST NAME</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">DATE CREATED</th>
                    </tr>
                </thead>
                <tbody class="fw-light">
                    <?php while ($row = $usersResult->fetch_assoc()): ?>
                    <tr style="cursor: pointer;" data-user-id="<?php echo $row['user_id']; ?>">
                        <th scope="row"><?php echo $row['user_id']; ?></th>
                        <td><?php echo htmlspecialchars($row['user_firstname']); ?></td>
                        <td><?php echo htmlspecialchars($row['user_lastname']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo $row['date_created']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
                <tfoot class="fw-light">
                    <tr>
                        <td colspan="5">
                            <div class="d-flex justify-content-between small">
                                <span>Showing <?php echo $offset + 1; ?> to
                                    <?php echo min($offset + $itemsPerPage, $totalUsers); ?> of
                                    <?php echo $totalUsers; ?> results</span>
                                <span>
                                    <?php if ($page > 1): ?>
                                    <a
                                        href="?page=<?php echo $page - 1; ?>&search=<?php echo urlencode($search); ?>">Previous</a>
                                    <?php endif; ?>
                                    <?php if ($page < $totalPages): ?>
                                    <a href="?page=<?php echo $page + 1; ?>&search=<?php echo urlencode($search); ?>">Next
                                        <i class="fa-solid fa-chevron-right fa-2xs" style="color: #000000;"></i></a>
                                    <?php endif; ?>
                                </span>
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
</main>

<!-- User details Modal -->
<div class="modal fade" id="user-modal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="false">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: none;">
                <h5 class="modal-title fw-bold fs-3" id="userModalLabel">User Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body pt-0">
                <div class="container">
                    <p class="my-0" id="user-first-name"><strong>First Name:</strong> <span></span></p>
                    <p class="my-0" id="user-last-name"><strong>Last Name:</strong> <span></span></p>
                    <p class="my-0" id="user-email"><strong>Email:</strong> <span></span></p>
                    <p class="my-0" id="user-phone"><strong>Phone Number:</strong> <span></span></p>
                    <p class="my-0" id="user-date-created"><strong>Date Created:</strong> <span></span></p>
                </div>

                <h5 class="mt-4">Past Orders:</h5>
                <div class="table-responsive">
                    <table class="table table-bordered" style="min-width: 1000px;">
                        <thead>
                            <tr>
                                <th scope="col">Order Number</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total Amount</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Delivered Date</th>
                                <th scope="col">Order Status</th>
                            </tr>
                        </thead>
                        <tbody id="past-orders">
                            <!-- Past orders will be populated here -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const userRows = document.querySelectorAll('#accounts-table tbody tr');
    const userModal = new bootstrap.Modal(document.getElementById('user-modal'));

    userRows.forEach(row => {
        row.addEventListener('click', function() {
            const userId = this.getAttribute('data-user-id');
            fetchUserDetails(userId);
        });
    });

    function fetchUserDetails(userId) {
        fetch(`get-user-details.php?id=${userId}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    updateUserModal(data.user, data.orders);
                    userModal.show();
                } else {
                    alert('Error fetching user details');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while fetching user details');
            });
    }

    function updateUserModal(user, orders) {
        document.querySelector('#user-first-name span').textContent = user.user_firstname;
        document.querySelector('#user-last-name span').textContent = user.user_lastname;
        document.querySelector('#user-email span').textContent = user.email;
        document.querySelector('#user-phone span').textContent = user.phone_number || '---';
        document.querySelector('#user-date-created span').textContent = user.date_created;

        const pastOrdersBody = document.getElementById('past-orders');
        pastOrdersBody.innerHTML = '';

        if (orders.length === 0) {
            pastOrdersBody.innerHTML = '<tr><td colspan="7" class="text-center">No orders found</td></tr>';
        } else {
            orders.forEach(order => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${order.order_id}</td>
                    <td>${order.product_name}</td>
                    <td>${order.quantity}</td>
                    <td>₱${parseFloat(order.total_amount).toFixed(2)}</td>
                    <td>${order.order_date}</td>
                    <td>${order.delivered_date || '---'}</td>
                    <td>${order.order_status}</td>
                `;
                pastOrdersBody.appendChild(row);
            });
        }
    }
});
</script>

<?php include '../partials/admin-footer.php'; ?>