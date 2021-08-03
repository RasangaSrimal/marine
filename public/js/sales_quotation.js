$(function (){
    function calc_total() {
        var sum = 0;
        $(".calc_total").each(function () {
            var total = 0;
            $(this).find("tr").each(function () {
                var rowTotal = $(this).find(".quantity").val() * $(this).find(".unit_price").val();
                $(this).find(".total_price").val(rowTotal);
                total += rowTotal;
            });
            $(this).parent().find('tfoot input').val(total);
            $("#" + $(this).data("output")).val(total);
            sum += total;
            var subTotal = sum + parseInt($("#id_travel_total").val() || 0);
            $("#id_estimate_subtotal").val(subTotal);
            var estimatedTotal = subTotal - parseInt($("#id_discount").val() || 0);
            $("#id_consumption_tax").val(estimatedTotal * taxRate | 0);
            $("#id_estimated_total").val(estimatedTotal * (1 + taxRate) | 0);
        });
    }
    $("input").change(calc_total);
    calc_total();
    $(".addRow").click(function() {
        $table = $(this).parents("table");
        console.log($(this).parents("table"));
        $table.find('tbody').append($table.find('tr.d-none').clone());
        $table.find('tbody tr').removeClass("d-none");
        $table.find("tbody tr:last-child input").removeAttr('disabled').change(calc_total);
    });
    $.each(customers, function(i, customer) { customer.value = customer.name; });
    $("#id_customer").autocomplete({
        source: customers,
        select: function (event, ui) {
            $('#id_customer_id').val(ui.item.id);
            $('#id_customer_tel').val(ui.item.mobile_tel);
            $('#id_customer_postal_code').val(ui.item.user_postal_code);
            $('#id_customer_address1').val(ui.item.user_address1);
            $('#id_customer_address2').val(ui.item.user_address2);
        } 
    });
    $("#id_company").autocomplete({
        source: companies,
        select: function (event, ui) {
            $('#id_company_id').val(ui.item.id);
        }
    });
    $("#id_ship").autocomplete({
        source: ships,
        select: function (event, ui) {
            $('#id_ship_id').val(ui.item.id);
            $('#id_inspection_num').val(ui.item.inspection_num);
        }
    });
});
