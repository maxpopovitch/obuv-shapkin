$(document).ready(function () {
// hide #oc-ontop first
    $('#oc-ontop').hide();

    $(function () {
        var resizeId;

        toggleOnTop();

        $(window).resize(function () {
            clearTimeout(resizeId);
            resizeId = setTimeout(toggleOnTop, 250);
        });

        function toggleOnTop() {
            var wW = $(window).width() + getScrollBarWidth();

            //hide #oc-ontop if window width greater or equal 1200px
            if (wW >= 1200) {
                $(window).scroll(function () {
                    if ($(this).scrollTop() > 100) {
                        $('#oc-ontop').fadeIn('fast');
                    } else {
                        $('#oc-ontop').fadeOut('fast');
                    }
                });
            } else {
                $(window).unbind('scroll');
                $('#oc-ontop').hide();
            }
        }

        //calculating scroll width
        function getScrollBarWidth() {
            var inner = document.createElement('p');
            $(inner).css({
                'width': '100%',
                'height': '200px'
            });

            var outer = document.createElement('div');
            $(outer).css({
                'position': 'absolute',
                'top': '0',
                'left': '0',
                'visibility': 'hidden',
                'width': '200px',
                'height': '150px',
                'overflow': 'hidden'
            });
            outer.appendChild(inner);

            document.body.appendChild(outer);
            var w1 = inner.offsetWidth;
            $(outer).css({
                'overflow': 'scroll'
            });
            var w2 = inner.offsetWidth;
            if (w1 === w2)
                w2 = outer.clientWidth;

            document.body.removeChild(outer);

            return (w1 - w2);
        }

        // scroll body to 0px on click
        $('#oc-ontop').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 300);
            return false;
        });
    });
});