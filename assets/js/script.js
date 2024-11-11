// for dynamic Status under add-product & edit-details.php
function updateStatus() {
    const inventoryQty = parseInt(document.getElementById('inventory-qty').value) || 0;
    const normalThreshold = parseInt(document.getElementById('normal-threshold').value) || 0;
    const lowThreshold = parseInt(document.getElementById('low-threshold').value) || 0;
    const statusField = document.getElementById('status');

    if (inventoryQty === 0) {
        statusField.value = "Out of Stock";
    } else if (inventoryQty <= lowThreshold) {
        statusField.value = "Low Stock";
    } else {
        statusField.value = "In Stock";
    }
}

// for Custom option under reports.php
const customBtn = document.getElementById('custom-btn');
const customDatesDiv = document.getElementById('custom-dates');

customBtn.addEventListener('click', function () {
    if (customDatesDiv.style.display === 'none') {
        customDatesDiv.style.display = 'block';
    } else {
        customDatesDiv.style.display = 'none';
    }
});