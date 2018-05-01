jQuery(document).ready(function ($) {

    /**
     * Get coordinates on unit map
     */
    var unit_map_status = false;
    function get_coordinates(){
        var coordinates = [];
        var map = $("#unit-map-container .unit-map");
        var btn = $("#unit-map-container .btn-toggle");
        btn.toggle(function () {
            unit_map_status = true;
        }, function () {
            unit_map_status = false;
        });
        map.click(function(e) {

            var offset = $(this).offset();
            var relativeX = parseInt(e.pageX - offset.left);
            var relativeY = parseInt(e.pageY - offset.top);

            coordinates.push( { 'x': relativeX, 'y': relativeY } );

        });

        $('.cas').click(function () {
            // ajax
        });
    }
    get_coordinates();
});