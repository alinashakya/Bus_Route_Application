<section>
  <div class="select-wrap">
    <div class="select-content">
      <p class="heading">Select Bus Route - <?php echo Yii::app()->name;?></p>
      <select>
      <?php
        $criteria = new CDbCriteria;
        $criteria->condition = "status='1'";
        $criteria->order = "route_name ASC";

        $route = BusRoute::model()->findAll($criteria);

        foreach ($route as $key => $value) {
            echo "<option value='" . $value->id . "'>$value->route_name ($value->bus_name)</option>";
        }
      ?>
      </select>
    </div>
    <!--end of select-content-->
    
    <div class="btn-wrap">
      <!--<input type="button" value="Check In">-->
      <!--<a href="checkin.html">Check In</a>-->
      <?php echo CHtml::link("Check In", array('confirm' => 'Please Select Route from the list'), array('class' => 'checkin')); ?>
    </div>
  </div>
  <!--end of select-wrap-->

  <div class="sets">
   
  </div>
</section>
  
  
  



<input type="hidden" id="url" value="<?php echo Yii::app()->request->baseUrl; ?>">

<script type="text/javascript">
    $(document).ready(function() {
        var url = $('#url').val();
        $('.checkin').click(function() {
            var selectedValue = $(':selected').val();
            $.ajax({
                type: 'POST',
                url: url + '/busroute/getList',
                data: {value: selectedValue},
                dataType: "json",
                success: function(response) {

                    if (response.value) {

                        location.href = url + '/busroute/create?key=' + response.value;
                    }
                    else
                    {
                        alert('Please Select the Route from the list');
                    }
                }
            });
        });

        /**/
        $('select').change(function() {
            var selectedvalue = $(':selected').val();
            $.ajax({
                type: 'POST',
                url: url + '/busroute/getbusroute',
                dataType: 'html',
                data: {value: selectedvalue},
                success: function(data) {
                    $('.sets').html(data);

                },
            });
        });

        var selectedvalue = $(':selected').val();
       // alert(selectedvalue);
                $.ajax({
            type: 'POST',
            url: url + '/busroute/getbusroute',
            dataType: 'html',
            data: {value: selectedvalue},
            success: function(data) {
                $('.sets').html(data);
            }
        });
    });
</script>

