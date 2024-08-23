$(document).ready(function() {
    
    $('#specialistClusters, #eventFormats, #eventModes, #didacticConcepts').select2({
        theme: 'bootstrap-5',
        selectionCssClass: 'select2--small',
        dropdownCssClass: 'select2--small',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        closeOnSelect: true,
        maximumSelectionLength: 4,
    });
    
    /*
    $('#specialistClusters, #eventFormats, #eventModes, #didacticConcepts').on('change', function (event) {
        $('form.filter').submit();
    });
    
    $('#searchTerm').on('change', function (event) {
        $('form.filter').submit();
    });
    */

});
