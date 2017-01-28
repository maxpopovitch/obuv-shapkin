$(document).ready(function () {
    var ACTIVE_CLASS = 'oc-selected';
    var thumbs = $('.oc-ware-product ul li');
    var img = $('.oc-ware-product a img');
    var a = $('.oc-ware-product a');
    thumbs.on("click touchstart", function () {
        thumbs.removeClass(ACTIVE_CLASS);
        $(this).addClass(ACTIVE_CLASS);
        var thumbSrc = $(this).find('img').attr('src');
        
        img.attr('src', thumbSrc);
        a.attr('href', thumbSrc);
        var newThumbSrc = img.attr('src').replace('small', 'medium');
        var newThumbHref = a.attr('href').replace('small', 'large');
        img.attr('src', newThumbSrc);
        a.attr('href', newThumbHref);
    });
});