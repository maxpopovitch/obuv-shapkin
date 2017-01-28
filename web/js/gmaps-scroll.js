$(document).ready(function () {
    // enabling the pointer events only on click;
    $('#oc-map-canvas>iframe').addClass('oc-scrolloff'); // set the pointer events to none on doc ready
    $('#oc-map-canvas').on('click', function () {
        $('#oc-map-canvas>iframe').removeClass('oc-scrolloff'); // set the pointer events true on click
    });
    
    // disabling pointer events when the mouse leave the canvas area;
    $("#oc-map-canvas>iframe").mouseleave(function () {
        $('#oc-map-canvas>iframe').addClass('oc-scrolloff'); // set the pointer events to none when mouse leaves the map area
    });
});