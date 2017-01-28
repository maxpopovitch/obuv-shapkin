var dH = $('.oc-ware-div').height();
$('button.oc-details').click(function () {
    if ($('.row-offcanvas').hasClass('active')) {
        $('.oc-ware-div').height(dH);
        $('#sidebar').hide();
    }
    else {
        var sH = $('#sidebar').height();
        var wH = $('.oc-ware-div').height();
        if (wH > sH) {
            sH = wH;
        }
        $('#sidebar').show();
        $('.oc-ware-div').height(sH);
    }
});