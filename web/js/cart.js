$(document).ready(function () {
    var modalObj = $('#oc-confirmation');
    var currentObj;
    $('[data-target="#oc-confirmation"]').on('click touchstart', function () {
        currentObj = $(this).closest('.oc-preview');
        var articleImg = currentObj.find('img');
        var articleText = currentObj.find('.oc-explanation').html();
        var articleId = $(this).attr('data-id');
        modalObj.find('img').attr({
            src: articleImg.attr('src'),
            alt: articleImg.attr('alt')
        });
        modalObj.find('.oc-article').html(articleText);
        modalObj.find('#oc-destroy-id').val(articleId);
    });
});