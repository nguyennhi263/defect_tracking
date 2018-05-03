jQuery(document).ready(function ($) {

});

function getListDefectPlace($id) {
    $.ajax({
        dataType: "html",
        method: "GET",
        //dataType:"json",
        evalScripts: true,
        url: "/defect-places/viewByUnitType/" + $id + ".json",
        data: ({}),
        success: function (data, textStatus) {
            return data;
        }
    });
}