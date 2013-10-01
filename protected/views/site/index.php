

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/media/css/jquery.mobile-1.4.0-alpha.2.min" />
<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/jquery-1.9.1.min"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/jquery.mobile-1.4.0-alpha.2.min.js"></script>


<div data-role="page">

    <div data-role="header">
        <h1>Page Title</h1>
    </div><!-- /header -->

    <div data-role="content">
        <p><?php $this->pageTitle = Yii::app()->name; ?></p>
        <p><?php echo CHtml::link("Check In", array('confirm' => 'Please Select Route from the list'), array('class' => 'checkin')); ?></p>

        <div data-role="fieldcontain">
            <label for="select-native-17">Route:</label>
            <select name="select-native-17" id="select-native-17">
                <!--<option value="">Select One</option>-->
                <?php
                $criteria = new CDbCriteria;
                $criteria->condition = "status='1'";
                $route = BusRoute::model()->findAll($criteria);
                foreach ($route as $key => $value) {
                    echo "<option value='" . $value->id . "'>$value->route_name ($value->bus_name)</option>";
                }
                ?>
            </select>


        </div>
        <div id="data">
           

        </div>

    </div><!-- /content -->

    <div data-role="footer">
        <h4>Page Footer</h4>
    </div><!-- /footer -->
</div><!-- /page -->


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
                    $('#data').html(data);

                },
            });
        });

        var selectedvalue = $(':selected').val();
        $.ajax({
            type: 'POST',
            url: url + '/busroute/getbusroute',
            dataType: 'html',
            data: {value: selectedvalue},
            success: function(data) {
                $('#data').html(data);

            },
        });
    });

//	var url = $('#url').val();
//	$('select').change(function(){
//		var selectedValue = $(':selected').val(); 
//		$.ajax({
//			type: 'POST',
//			url: url+'/busroute/getList',
//			data: {value:selectedValue},
//			dataType: "json",
//			success:function(response){
//				if(response.value){
//					//console.log(response.value);
//					location.href = url+'/busroute/create';
//
//				}
//			}
//		});
//	});


</script>