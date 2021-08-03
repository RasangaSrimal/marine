var icons = {
    time: 'fa fa-clock-o',
    date: 'fa fa-calendar',
    up: 'fa fa-chevron-up',
    down: 'fa fa-chevron-down',
    previous: 'fa fa-chevron-left',
    next: 'fa fa-chevron-right',
    today: 'fa fa-check',
    clear: 'fa fa-trash',
    close: 'fa fa-times'
};
$(function (){
    $('.input-group:has(.text-danger) input').addClass('is-invalid');
    $('select').addClass('custom-select');
    $('select').each(function() {
        if (!!$(this).find('option:first').val()) {
            $(this).prepend($('<option></option>'));
        }
    });
    $('input').addClass('form-control');
    $('.search-address').click(function () {
        var postal_code = $('input[name="' + $(this).data('zip') + '"]').val();
        var $addressInput = $('input[name="' + $(this).data('input') + '"]');
        $.get('/api/postal/code/' + postal_code.replace(/-/, ""), function (data) {
            $addressInput.val(data['pref_name'] + data['city_name'] + data['town_name']);
        });
    });
    $('.date, .datetimepicker').append($('<div class="input-group-append input-group-addon"><span class="input-group-text fa fa-calendar"></span></div>'));
    $('.date').datetimepicker({
        format: 'YYYY-MM-DD',
        icons: icons,
    });
    $('.datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD HH:mm',
        icons: icons,
    });
    $(function (){
        $(document).ready(function() {
            $(window).keydown(function(event){
                if(event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
        });
    });
});
function customerAutoComplete(pref, source, isSelected) {
    var fields = ['postal_code', 'address1', 'address2', 'tel'];
    var $id_field = $('[name=' + pref + '_id]');
    var selectors = $.map(fields, function (field) { return '[name="' + pref + '[' + field + ']"]'; });
    var $fields = $(selectors.join());
    $('[name="' + pref + '[name]"]').autocomplete({
        source: source,
        select: function(event, ui) {
            $id_field.val(ui.item.id);
            $.each(fields, function (i, field) {
                $(selectors[i]).val(ui.item[field]);
            });
            $fields.attr('readonly', 'readonly');
        },
        change: function(event, ui) {
            if(ui.item) return;
            $id_field.val("");
            $fields.removeAttr('readonly');
        }
    });
    if(isSelected) { $fields.attr('readonly', 'readonly'); }
}
