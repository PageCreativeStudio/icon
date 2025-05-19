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

