jQuery(document).ready(function ($) {
    
});
// set unit places to map
function render_unit_places($map, pointX, pointY, place_name, place_id){
    console.log("testing");
    html = '<div class="unit-place" style="top:'+pointY+'px; left:'+pointX+'px;">';
    html += '<div class="place-info"><span class="place-name">'+place_name+'</span>';
    html += '<span class="place-delete" data-delete-id="'+place_id+'" title="Delete this place"><i class="fa fa-trash" aria-hidden="true"></i></span>';
    html += '</div></div>';
    $map.append(html);
}
// get all defect list to show point
function getListDefectPlace($id) {
    var map = $("#unit-map-container .unit-map");
    $.ajax({
        dataType: "html",
        method: "GET",
        evalScripts: true,
        url: "/defect_tracking/defect-places/viewByUnitType/" + $id + ".json",
        data: ({}),
        success: function (data, textStatus) {
           data = jQuery.parseJSON(data);
           $.each(data,function(i,listDefectPlace){
                $.each(listDefectPlace,function(j,defectplaces){
                     render_unit_places(map, defectplaces.coordX, defectplaces.coordY, defectplaces.DefectPlaceName);
                    //console.log(defectplaces.DefectPlaceName);
                });
            
            });
         
        }
    });
  
}