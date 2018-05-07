
<!--Left Menu -->
<div class="row">
<div class="col-lg-2  col-md-3  bg-dark">
   
</div>
<!-- contain-->

<div class="blocks col-sm-9 col-lg-10 columns ">

    <div class="row">
        
            <button type="button" class="btn btn-info" id="addItemBtn"> <i class="fa fa-plus-circle" aria-hidden="true"> Add Defect Item</i></button>    

    </div>
    <!-- list defect item-->
    <div class="row">
        <form action="/action_page.php">
        <div class="form-group">
        
        
         <table class="table table-hover">
            <thead>
              <tr>
                <th>Trade</th>
                <th>Description</th>
                <th>Place</th>
                <th>Note</th>
                <th>IMG</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>John</td>
                <td>Doe</td>
                <td>john@example.com</td>
                <td><input type="text" class="form-control" id="DefectItemNote" placeholder="enter note" name="DefectItemNote"></td>
                <td>img</td>
                <td>action</td>
              </tr>
              <tr>
                <td><?= $this->Form->control('TradeID', ['label' => false, 'options' => $trades,'class'=>'form-control']) ?></td>
                <td><?= $this->Form->control('TradeDescriptionID', ['label' => false, 'options' => $tradeDescriptions,'class'=>'form-control']); ?></td>
                <td><?= $this->Form->control('PlaceID', ['label' => false, 'options' => $defectPlaces,'class'=>'form-control']); ?></td>
                <td><input type="text" class="form-control" id="DefectItemNote" placeholder="enter note" name="DefectItemNote"></td>
                <td>img</td>
                <td>action</td>
              </tr>
            </tbody>
          </table>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
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
    $("#addItemBtn").click(function () {
        alert('a');
    });
    getListDefectPlace(<?= $unit->unit_type->UnitTypeID ?>);
</script>