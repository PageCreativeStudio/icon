document.addEventListener('DOMContentLoaded', function () {
    const orderCheckboxes = document.querySelectorAll('.order-checkbox');
    const proceedPaymentButton = document.getElementById('pay-selected-orders');
    const overviewItems = document.getElementById('overview-items');
    const overviewDelivery = document.getElementById('overview-delivery');
    const overviewVat = document.getElementById('overview-vat');
    const overviewGrandTotal = document.getElementById('overview-grand-total');
    const overviewArtwork = document.getElementById('overview-artwork');
    const overviewSubtotal = document.getElementById('overview-subtotal');
    const selectedOrderIdsInput = document.getElementById('selected-order-ids');

    // Function to format number as currency
    function formatCurrency(amount) {
        return '£' + parseFloat(amount).toFixed(2);
    }

    // Function to calculate and update totals
    function updateTotals() {
        let totalItems = 0;
        let totalDelivery = 0;
        let totalVat = 0;

        orderCheckboxes.forEach(checkbox => {
            if (checkbox.checked) {
                totalItems += parseFloat(checkbox.dataset.total || 0);
                totalDelivery += parseFloat(checkbox.dataset.shipping || 0);
                totalVat += parseFloat(checkbox.dataset.tax || 0);
            }
        });

        const grandTotal = totalItems + totalDelivery + totalVat;

        overviewItems.textContent = formatCurrency(totalItems);
        overviewDelivery.textContent = formatCurrency(totalDelivery);
        overviewVat.textContent = formatCurrency(totalVat);
        overviewGrandTotal.textContent = formatCurrency(grandTotal);
        overviewArtwork.textContent = formatCurrency(0); // Static for now
        overviewSubtotal.textContent = formatCurrency(totalItems);

        // Enable/disable Proceed To Payment button based on selection
        proceedPaymentButton.disabled = !Array.from(orderCheckboxes).some(checkbox => checkbox.checked);
    }

    // Handle individual checkbox changes
    orderCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            updateTotals();
        });
    });

    // Handle Proceed To Payment button click
    proceedPaymentButton.addEventListener('click', function (e) {
        const selectedOrders = Array.from(orderCheckboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.dataset.orderId);
        selectedOrderIdsInput.value = selectedOrders.join(',');
        this.form.submit();
    });

    // Initialize totals on page load
    updateTotals();
});