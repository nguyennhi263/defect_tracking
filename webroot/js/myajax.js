jQuery(document).ready(function ($) {
   // getCountDefectByMonthChart();
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
function getCountDefectByMonthChart(){
    //alert(a);
    $.ajax({
        dataType: "html",
        method: "GET",
        evalScripts: true,
        url: "/defect_tracking/home/getCountDefectByMonth.json",
        data: ({}),
        success: function (data, textStatus) {
           data = jQuery.parseJSON(data);
            var listMonth = [];
            var listOpenDefectData = [];
            var listCloseDefectData = [];
           $.each(data,function(i,listData){

                $.each(listData,function(j,defectOpen){
                     listMonth.push(getMonthName(defectOpen.month));
                     listOpenDefectData.push(defectOpen.value);
                     listCloseDefectData.push(defectOpen.value2);
                });
            });
          
        console.log(listMonth);
        console.log(listOpenDefectData);
        console.log(listCloseDefectData);
         showCountDefectByMonthChart(listMonth,listOpenDefectData,listCloseDefectData);
        }
    });
}
// input data to chart
function showCountDefectByMonthChart($label,$openDefect,$closeDefect){
    var ctx = $("#CountDefectByMonth");
         new Chart(document.getElementById("CountDefectByMonth"), {
          type: 'line',
          data: {
            labels: $label,
            datasets: [{ 
                data: $openDefect,
                label: "Opened",
                borderColor: "#ff6384",
                fill: false
              }, { 
                data: $closeDefect,
                label: "Closed",
                borderColor: "#8e5ea2",
                fill: false
              }
            ]
          },
          options: {
            title: {
              display: true,
              text: 'Defect opened and closed'
            }
          }
        });
}
// return Month name
function getMonthName(monthNumber) {
  var months = ['January', 'February', 'March', 'April', 'May', 'June',
  'July', 'August', 'September', 'October', 'November', 'December'];
  return months[monthNumber-1];
}