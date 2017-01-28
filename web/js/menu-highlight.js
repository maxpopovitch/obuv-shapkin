$(document).ready(function () {
    $('#oc-brands').closest('body').find('#oc-main-nav ul li a[href*="brands"]').closest('li').addClass('active');
    $('#oc-tips').closest('body').find('#oc-main-nav ul li a[href*="tips"]').closest('li').addClass('active');
    $('#oc-how-to-order').closest('body').find('footer a[href*="how-to-order"]').addClass('active');
    $('#oc-sizes').closest('body').find('footer a[href*="sizes"]').addClass('active');
    $('#oc-contacts').closest('body').find('footer a[href*="contacts"]').addClass('active');
});