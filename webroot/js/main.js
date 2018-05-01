jQuery(document).ready(function ($) {

    /**
     * Get coordinates on unit map
     */
    function get_coordinates(){
        // Init variables
        var map = $("#unit-map-container .unit-map");
        var btn_save = $("#unit-map-container .btn-unit-map");
        var place_name_form = $('.defect-place-saving');
        var place_name = $('input.place-name');
        var relativeX, relativeY;

        btn_save.click(function () {
            // Get data
            var place_name_val = place_name.val();
            if(place_name_val.length < 10){
                alert("Please enter place name, 10 characters minimum.");
            } else {
                // Run ajax here
                alert("Place: " + place_name_val + " - x:" + relativeX + ", y:" + relativeY);

                // Hide place name form
                place_name_form.addClass('hidden');

                // Clear place name after saved
                place_name.val('');
            }

        });
        map.click(function(e) {
            // Show place name form
            place_name_form.removeClass('hidden');

            // Get coordinates
            var offset = $(this).offset();
            relativeX = parseInt(e.pageX - offset.left);
            relativeY = parseInt(e.pageY - offset.top);
        });
    }
    get_coordinates();
});