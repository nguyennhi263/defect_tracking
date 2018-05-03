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
        var url_post = $("#url-post").val()+".json";
        var unit_type_id = $("#unit-type-id").val();
        var relativeX, relativeY;

        btn_save.click(function () {
            // Get data
            var place_name_val = place_name.val();

            if(place_name_val.length <4 ){
                alert("Please enter place name, 4 characters minimum.");
            } else {
                // Run ajax here
                alert("Place: " + place_name_val + " - x:" + relativeX + ", y:" + relativeY);
                // ajax insert defect place
                    $.ajax({
                        dataType: "html",
                        method:"POST",
                        //dataType:"json",
                        evalScripts: true,
                        url: url_post,
                        data: ({
                            UnitTypeID:unit_type_id,
                            DefectPlaceName:place_name_val,
                            coordX:relativeX,
                            coordY:relativeY
                        }),
                        success: function (data, textStatus){
                           // $("#div1").html(data);
                           // alert(data);
                            // If save successfully, load saved unit places
                            render_unit_places(relativeX, relativeY, place_name_val);
                        }
                    });
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

        // set unit places to map
        function render_unit_places(pointX, pointY, place_name, place_id){
            console.log("testing");
            html = '<div class="unit-place" style="top:'+pointY+'px; left:'+pointX+'px;">';
            html += '<div class="place-info"><span class="place-name">'+place_name+'</span>';
            html += '<span class="place-delete" data-delete-id="'+place_id+'" title="Delete this place"><i class="fa fa-trash" aria-hidden="true"></i></span>';
            html += '</div></div>';
            map.append(html);
        }
    }
    get_coordinates();
});