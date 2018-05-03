jQuery(document).ready(function ($) {
	function getListDefectPlace(){
		$.ajax({
                        dataType: "html",
                        method:"GET",
                        //dataType:"json",
                        evalScripts: true,
                        url: "/defect-places/viewByUnitType/",
                        data: ({
                        }),
                        success: function (data, textStatus){
                           // $("#div1").html(data);
                           alert(data);
                        }
                    });
	}
	function show_image(src, width, height, alt) {
	    var img = document.createElement("img");
	    img.src = src;
	    img.width = width;
	    img.height = height;
	    img.alt = alt;
	    // This next line will just add it to the <body> tag
	    document.body.getElementById("unit-type-map").appendChild(img);
	    alert('a');
	}
});