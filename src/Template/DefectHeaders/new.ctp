
<!--Left Menu -->
<div class="row">
 <!--Left Menu -->
    <div class="left-menu col-sm-3 col-md-2 bg-dark">
          <div class="btn-group-vertical btn-block">
               <a href="/defect_tracking/defect-headers/" class="btn btn-dark ">List Defect</a>
              <a href="/defect_tracking/defect-headers/block" class="btn btn-dark ">Create New Defect</a>
              <button type="button" class="btn btn-block btn-dark"></button>
            </div>
    </div>
<!-- contain-->

<div class="blocks col-sm-9 col-lg-10 columns ">

    <div class="row">
        
            <button type="button" class="btn btn-info" id="addItemBtn"> <i class="fa fa-plus-circle" aria-hidden="true"> Add Defect Item</i></button>    

    </div>
    <!-- list defect item-->
    <div class="row">
        <form action="/defect_tracking/defect-headers/" enctype="multipart/form-data">
        <div class="form-group">
    
         <table class="table table-hover">
            <thead>
              <tr>
                <th>Trade</th>
                <th>Description</th>
                <th>Place</th>
                <th>Note</th>
                <th class="hidden">IMG</th>
              </tr>
            </thead>
            <tbody id="table-item">
              <tr id="row-1">
                <td><?= $this->Form->control('TradeID', ['label' => false, 'options' => $trades,'class'=>'form-control']) ?></td>
                <td><?= $this->Form->control('TradeDescriptionID', ['label' => false, 'options' => $tradeDescriptions,'class'=>'form-control']); ?></td>
                <td><?= $this->Form->control('PlaceID', ['label' => false, 'options' => $defectPlaces,'class'=>'form-control']); ?></td>
                <td><input type="text" class="form-control" id="DefectItemNote" placeholder="enter note" name="DefectItemNote"></td>
                <td class="hidden"><?= $this->Form->control('ImageFileNameBefore', ['label'=>false ,'type' => 'file','class'=>'form-control-file']); ?></td>
                <td class="remove-row" value="1"><i class="fa fa-trash" aria-hidden="true"></i></td>
              </tr>
            </tbody>
          </table>
        </div>
        <button type="submit" class="btn btn-primary" id="insertItem">Submit</button>
      </form>

    </div>
    <!-- bản vẽ -->
    <div class="row" >
    <div class="content" >
            <div id="unit-map-container"  >
                <div id="unit-type-map" class="unit-map" style="background-image:url(/defect_tracking/webroot/img/ArchirecturalDrawing/<?= $unit->unit_type->image ?>)">
                <img src="/defect_tracking/webroot/img/ArchirecturalDrawing/<?=$unit->unit_type->image?>" alt="CakePHP" />
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    var $idList = 1;
  jQuery(document).ready(function ($) {
    
    $('#table-item').on('click', '.remove-row', function() {
        var $id = $(this).attr('value');
        $("#row-"+$id).remove();
    });
    // submit insert defect
     $('#insertItem').on('click', function() {

         // insert defect header
           $.ajax({
                dataType: "html",
                method: "GET",
                evalScripts: true,
                url: "/defect_tracking/defect-items/newHeader/"+<?= $unit->UnitID ?>+".json",
                data: ({}),
                success: function (data, textStatus) {
                   // alert(data);
                }
            });
           setTimeout(
            function() {
                     $('#table-item').each(function(){
                 $(this).find('tr').each(function(){

               $PlaceID = $(this).find('select[name=PlaceID]').val();
               $TradeDescriptionID = $(this).find('select[name=TradeDescriptionID]').val();
               $note = $(this).find('#DefectItemNote').val();
              // $image = $(this).find('#ImageFileNameBefore');
              $image = $(this).find('input[type=file]');
              insert_item($TradeDescriptionID,$PlaceID,$image,$note);
            });
            },
            0000);
   
          
         });
       
     });

});
   
    // add row
    $("#addItemBtn").click(function () {
        $idList ++;
        var table = $("#table-item");
        html = '<tr id=row-'+$idList+'>';
        html += '<td><?= $this->Form->control('TradeID', ['label' => false, 'options' => $trades,'class'=>'form-control']) ?></td>';
        html += '<td><?= $this->Form->control("TradeDescriptionID", ['label' => false, 'options' => $tradeDescriptions,'class'=>'form-control']); ?></td>';

        html += ' <td><?= $this->Form->control('PlaceID', ['label' => false, 'options' => $defectPlaces,'class'=>'form-control']); ?></td>';
        html += '<td><input type="text" class="form-control" id="DefectItemNote" placeholder="enter note" name="DefectItemNote"></td>';
        html += '<td class="hidden"><?= $this->Form->control('ImageFileNameBefore', ['label'=>false ,'type' => 'file','class'=>'form-control-file']); ?></td>';
        html += '<td class="remove-row" value="'+$idList+'" ><i class="fa fa-trash" aria-hidden="true"></i></td>';
        html +=' </tr>';

        table.append(html);

    });

    function insert_item($Desc,$Place,$Image,$Note){
        //alert('a');
        $.ajax({
                dataType: "html",
                method: "POST",
                evalScripts: true,
                url: "/defect_tracking/defect-items/newDefectItem/"+$Desc+"/"+$Place+"/"+$Note,
                data: ([]),
                success: function (data, textStatus) {
                   // alert(data);
                }
            });
    }

    getListDefectPlace(<?= $unit->unit_type->UnitTypeID ?>);
    
</script>
