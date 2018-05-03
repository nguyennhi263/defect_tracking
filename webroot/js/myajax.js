jQuery(document).ready(function ($) {
	function getListDefectPlace(){
		$.ajax({
                        dataType: "html",
                        method:"GET",
                        //dataType:"json",
                        evalScripts: true,
                        url: "/defect-places/viewByUnitType/",
                        data: ({
                            id=1
                        }),
                        success: function (data, textStatus){
                           // $("#div1").html(data);
                           alert(data);
                        }
                    });
	}
});