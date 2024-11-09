// for dynamic Status under add-product & edit-details.php
function updateStatus() {
    const inventoryQty = parseInt(document.getElementById('inventory-qty').value) || 0;
    const normalThreshold = parseInt(document.getElementById('normal-threshold').value) || 0;
    const lowThreshold = parseInt(document.getElementById('low-threshold').value) || 0;
    const statusField = document.getElementById('status');

    if (inventoryQty <= lowThreshold) {
        statusField.value = "Out of Stock";
    } else if (inventoryQty <= normalThreshold) {
        statusField.value = "Low Stock";
    } else {
        statusField.value = "In Stock";
    }
}