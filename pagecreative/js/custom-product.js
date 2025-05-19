jQuery(document).ready(function ($) {
    // Show/hide technique sections based on print area checkboxes
    $('.print-area-checkbox').on('change', function () {
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


    $('.print-technique').on('change', function () {
        var areaKey = $(this).closest('.print-technique-section').attr('id').replace('technique_', '');
        var techniqueKey = $(this).val().toLowerCase().replace(/\s+/g, '');
        $('.technique-options', '#technique_' + areaKey).hide();
        var $options = $('#options_' + areaKey + '_' + techniqueKey).show();
        $('input[type="radio"]:checked', $options).closest('label').addClass('active');
    });

    $(document).on('change', '.technique-options input[type="radio"]', function () {
        var $group = $(this).closest('.options-list');
        $('label', $group).removeClass('active');
        $(this).closest('label').addClass('active');
    });


    // Trigger change events on page load to ensure correct visibility
    //  $('.print-area-checkbox').trigger('change');
    //  $('.print-technique').trigger('change');

    // Show upload button when a print area is selected
    $('.print-area-checkbox').on('change', function () {
        if ($('.print-area-checkbox:checked').length > 0) {
            $('.upload-button').show();
        } else {
            $('.upload-button').hide();
            $('#logo-upload').val(''); // Clear file input when no print areas are selected
        }
    });

    // Trigger file input click when upload button is clicked
    $('.upload-button').on('click', function () {
        $('#logo-upload').click();
    });

});

jQuery(document).ready(function ($) {
    $('.print-area-checkbox').on('change', function () {
        var $printArea = $(this).closest('.print-area');
        if ($(this).is(':checked')) {
            $printArea.addClass('active');
        } else {
            $printArea.removeClass('active');
        }
    });

});

jQuery(document).on('click', '.quickquote', function () {
    const $btn = jQuery(this);
    jQuery('#drawer-product-title').text($btn.data('title'));
    jQuery('#drawer-product-sku').text($btn.data('sku'));
    jQuery('#drawer-product-price').text($btn.data('price'));
    jQuery('#quickquoteDrawer').addClass('active');
});

jQuery(document).on('click', '.closedrawer', function () {
    jQuery('#quickquoteDrawer').removeClass('active');
});
