jQuery(document).ready(function ($) {
    // Show/hide technique sections based on print area checkboxes
    $(document).on('change', '.print-area-checkbox', function () {
        var areaKey = $(this).data('area');
        var techniqueSection = $('#technique_' + areaKey);
        if ($(this).is(':checked')) {
            techniqueSection.show();
        } else {
            techniqueSection.hide();
            // Clear selected print technique
            $('input[name="print_techniques[' + areaKey + ']"]', techniqueSection).prop('checked', false);
            // Clear selected technique options for all techniques in this section
            $('.technique-options input[type="radio"]', techniqueSection).prop('checked', false);
            // Hide all technique options subsections
            $('.technique-options', techniqueSection).hide();
        }
    });

    $(document).on('change', '.print-area-checkbox', function () {
        var $printArea = $(this).closest('.print-area');
        if ($(this).is(':checked')) {
            $printArea.addClass('active');
        } else {
            $printArea.removeClass('active');
        }
    });


    // Use $(document).on for print-technique change as well
    $(document).on('change', '.print-technique', function () {
        var areaKey = $(this).closest('.print-technique-section').attr('id').replace('technique_', '');
        var techniqueKey = $(this).val().toLowerCase().replace(/\s+/g, '');
        $('.technique-options', '#technique_' + areaKey).hide();
        var $options = $('#options_' + areaKey + '_' + techniqueKey).show();
        $('input[type="radio"]:checked', $options).closest('label').addClass('active');
    });

    // Change for radio buttons inside technique-options
    $(document).on('change', '.technique-options input[type="radio"]', function () {
        var $group = $(this).closest('.options-list');
        $('label', $group).removeClass('active');
        $(this).closest('label').addClass('active');
    });

    // Uncomment if you want to trigger change on page load (use one at a time if needed)
    // $(document).trigger('change', '.print-area-checkbox');
    // $(document).trigger('change', '.print-technique');

    // Show upload button when a print area is selected
    $(document).on('change', '.print-area-checkbox', function () {
        if ($('.print-area-checkbox:checked').length > 0) {
            $('.upload-button').show();
        } else {
            $('.upload-button').hide();
            $('#logo-upload').val(''); // Clear file input when no print areas are selected
        }
    });

    // Trigger file input click when upload button is clicked
    $(document).on('click', '.upload-button', function () {
        $('#logo-upload').click();
    });
});


jQuery(document).ready(function ($) {
    $(document).on('click', '.quickquote', function () {
        const $btn = $(this);
        const title = $btn.data('title');
        const sku = $btn.data('sku');
        const price = $btn.data('price');
        const productId = $btn.data('product-id');

        $('#drawer-product-title').text(title);
        $('#drawer-product-sku').text(sku);
        $('#drawer-product-name').text(title);
        $('#drawer-product-price').text(price);
        $('#quickquoteDrawer').addClass('active');
        $('.custom-fields-wrapper').html('<p>Loading custom options…</p>');
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                action: 'load_custom_fields',
                product_id: productId
            },
            success: function (response) {
                $('.custom-fields-wrapper').html(response);
            },
            error: function () {
                $('.custom-fields-wrapper').html('<p>Failed to load options.</p>');
            }
        });
    });

    // Close drawer on click
    $(document).on('click', '.closedrawer', function () {
        $('#quickquoteDrawer').removeClass('active');
    });
});
