jQuery(document).ready(function($) {
    // Handle Duplicate action
    $('.cart-item-duplicate').on('click', function(e) {
        e.preventDefault();
        var cartItemKey = $(this).data('cart-item-key');

        $.ajax({
            url: cartControls.ajax_url,
            type: 'POST',
            data: {
                action: 'duplicate_cart_item',
                cart_item_key: cartItemKey,
                nonce: cartControls.nonce
            },
            success: function(response) {
                if (response.success) {
                    window.location.reload(); // Reload to update cart
                } else {
                    alert('Failed to duplicate item: ' + (response.data.message || 'Unknown error'));
                }
            },
            error: function() {
                alert('An error occurred while duplicating the item.');
            }
        });
    });

    // Handle Delete action
    $('.cart-item-delete').on('click', function(e) {
        e.preventDefault();
        var cartItemKey = $(this).data('cart-item-key');

        if (confirm('Are you sure you want to remove this item from the cart?')) {
            $.ajax({
                url: cartControls.ajax_url,
                type: 'POST',
                data: {
                    action: 'delete_cart_item',
                    cart_item_key: cartItemKey,
                    nonce: cartControls.nonce
                },
                success: function(response) {
                    if (response.success) {
                        window.location.reload(); // Reload to update cart
                    } else {
                        alert('Failed to remove item: ' + (response.data.message || 'Unknown error'));
                    }
                },
                error: function() {
                    alert('An error occurred while removing the item.');
                }
            });
        }
    });
});