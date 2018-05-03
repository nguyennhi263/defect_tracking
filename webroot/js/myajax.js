jQuery(document).ready(function ($) {
    
});

function getListDefectPlace($id) {
    var result;
    $.ajax({
        dataType: "html",
        method: "GET",
        //dataType:"json",
        evalScripts: true,
        url: "/defect_tracking/defect-places/viewByUnitType/" + $id + ".json",
        data: ({}),
        success: function (data, textStatus) {
        //console.log(data);
            result = data;
           //alert(data);
        }
    });
    return result;
}