$(document).ready(function () {
    $('#oc-max-price').on("input mousemove touchmove", function () {
        var mP = $('#oc-max-price').val();
        $('#oc-max-price-val').text(mP);
    });
});