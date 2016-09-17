$('table').bootstrapTable({locale:'en-US'});

var $table = $('#table3');
$(function () {
    $('#toolbar').find('select').change(function () {
        $table.bootstrapTable('refreshOptions', {
            exportDataType: $(this).val()
        });
    });
});
