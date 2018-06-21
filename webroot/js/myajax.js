jQuery(document).ready(function ($) {
   
});
/*
  set unit places to map
*/ 
function render_unit_places($map, pointX, pointY, place_name, place_id){
    html = '<div class="unit-place" style="top:'+pointY+'px; left:'+pointX+'px;">';
    html += '<div class="place-info"><span class="place-name">'+place_name+'</span>';
    html += '<span class="place-delete" data-delete-id="'+place_id+'" title="Delete this place"><i class="fa fa-trash" aria-hidden="true"></i></span>';
    html += '</div></div>';
    $map.append(html);
}
/*
  set unit places to map without delete button (defect header view)
*/ 
function render_unit_places_defect_header($map, pointX, pointY, place_name, place_id){
    html = '<div class="unit-place1" style="top:'+pointY+'px; left:'+pointX+'px; ">';
    html +='<img src="/defect_tracking/webroot/img/point.gif" >';
    html += '<div class="place-info1"><span class="place-name1">'+place_name+'</span>';
    html += '</div></div>';
    $map.append(html);
}
/*
  get all defect list -> show point -> unit types view
*/ 
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
                });
            
            });
         
        }
    });
}
/*
  get trade name
*/
function getTradeName($TradeID){
  $.ajax({
        dataType: "html",
        method: "GET",
        evalScripts: true,
        url: "/defect_tracking/trades/view/" + $TradeID + ".json",
        data: ({}),
        success: function (data, textStatus) {
           data = jQuery.parseJSON(data);
           $.each(data,function(i,trade){
            console.log(trade['TradeName']);
          });
        }
    });
}
/*
  get trade description
*/
function getTradeDescription($TradeID){
  $.ajax({
        dataType: "html",
        method: "GET",
        evalScripts: true,
        url: "/defect_tracking/trade-descriptions/view/" + $TradeID + ".json",
        data: ({}),
        success: function (data, textStatus) {
           data = jQuery.parseJSON(data);
           $.each(data,function(i,trade){
            console.log(data);
            console.log(trade);
            console.log(trade['TradeDescriptionDetail']);   
          });
        }
    });
}
/*
  get defect item + defect place -> -> show on map -> defect heade view
*/
function getDefectItem_Place($placeID,$ItemID,$Trade){
  var map = $("#unit-map-container .unit-map");
  $.ajax({
        dataType: "html",
        method: "GET",
        evalScripts: true,
        url: "/defect_tracking/defect-places/view/" + $placeID + ".json",
        data: ({}),
        success: function (data, textStatus) {
           data = jQuery.parseJSON(data);
           $.each(data,function(i,place){
                // show point on map
                render_unit_places_defect_header(map, place.coordX, place.coordY, place.DefectPlaceName);
                console.log(place);
            
            });
         
        }
    });
}
/*
  Get list defect items by defect header 
*/
function getDefectItems($idDefectItem){

      $.ajax({
          dataType: "html",
          method: "GET",
          evalScripts: true,
          url: "/defect_tracking/defect-headers/view/" + $idDefectItem + ".json",
          data: ({}),
          success: function (data, textStatus) {
             data = jQuery.parseJSON(data);
             $.each(data,function(i,listDefectItem){
                   console.log(listDefectItem);
                  $.each(listDefectItem,function(j,item){
                    getDefectItem_Place(item.PlaceID,item.DefectItemID,item.TradeDescriptionID);
                    console.log(item['PlaceID']);
                });
              });
           
          }
      });
}

/*
  chart defect by month
*/
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
/*
  input data to chart
*/ 
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
              }
            ]
          },
          options: {
            title: {
              display: true,
              text: 'Defect opened last 12 months'
            }
          }
        });
}
/*
   return Month name
*/
function getMonthName(monthNumber) {
  var months = ['January', 'February', 'March', 'April', 'May', 'June',
  'July', 'August', 'September', 'October', 'November', 'December'];
  return months[monthNumber-1];
}