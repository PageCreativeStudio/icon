document.addEventListener('DOMContentLoaded', function() {
    const selectAllCheckbox = document.getElementById('select-all-orders');
    const orderCheckboxes = document.querySelectorAll('.order-checkbox');
    const payButton = document.getElementById('pay-selected-orders');

    // Check if required elements exist
    if (!selectAllCheckbox || !orderCheckboxes.length || !payButton) {
        console.log('Completed Quotes script: Required elements not found.');
        return;
    }

    console.log('Completed Quotes script loaded successfully.');

    // Enable/disable Pay Now button based on selection
    function updatePayButton() {
        const atLeastOneSelected = Array.from(orderCheckboxes).some(checkbox => checkbox.checked);
        payButton.disabled = !atLeastOneSelected;
    }

    // Select All checkbox functionality
    selectAllCheckbox.addEventListener('change', function() {
        orderCheckboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
        updatePayButton();
    });

    // Individual checkbox change
    orderCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            // Uncheck "Select All" if any individual checkbox is deselected
            if (!this.checked) {
                selectAllCheckbox.checked = false;
            }
            // Check "Select All" if all individual checkboxes are selected
            if (Array.from(orderCheckboxes).every(checkbox => checkbox.checked)) {
                selectAllCheckbox.checked = true;
            }
            updatePayButton();
        });
    });

    // Initial state
    updatePayButton();
});