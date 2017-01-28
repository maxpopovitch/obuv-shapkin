$(document).ready(function () {
    var modalObj = $('#oc-confirmation');
    var currentObj;
    $('[data-target="#oc-confirmation"]').on('click touchstart', function () {
        currentObj = $(this).closest('.oc-preview');
        var articleImg = currentObj.find('img');
        var articleText = currentObj.find('.oc-explanation').html();
        modalObj.find('img').attr({
            src: articleImg.attr('src'),
            alt: articleImg.attr('alt')
        });
        modalObj.find('.oc-article').html(articleText);
    });
    $('#oc-destroy').on('click touchstart', function () {
        modalObj.modal('hide');
        currentObj.remove();
        articleCheck();
    });
    function articleCheck() {
        var form = $('form[name="order-form"]');
        if (!$('.oc-preview').length) {
            form.hide();
            form.closest('.oc-ware-div > h3:nth-of-type(1)').addClass('oc-empty');
            form.closest('.oc-ware-div > h3:nth-of-type(2)').removeClass('oc-empty');
        } else {
            form.closest('.oc-ware-div > h3:nth-of-type(1)').removeClass('oc-empty');
            form.closest('.oc-ware-div > h3:nth-of-type(2)').addClass('oc-empty');
        }
    }
    articleCheck();
});