jQuery(document).ready(function ($) {
    // Show/hide technique sections based on print area checkboxes
    $('.print-area-checkbox').on('change', function () {
        var parentPrintArea = $(this).closest('.print-area');

        if ($(this).is(':checked')) {
            $('.print-area').removeClass('active'); // Remove from all
            parentPrintArea.addClass('active');     // Add to clicked one
        } else {
            parentPrintArea.removeClass('active');  // Remove if unchecked
        }
    });

    // Show/hide technique options based on selected technique
    $('.print-technique').on('change', function () {
        var areaKey = $(this).closest('.print-technique-section').attr('id').replace('technique_', '');
        var techniqueKey = $(this).val().toLowerCase().replace(/\s+/g, '');
        $('.technique-options', '#technique_' + areaKey).hide();
        $('#options_' + areaKey + '_' + techniqueKey).show();
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