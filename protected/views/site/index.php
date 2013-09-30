

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.0-alpha.2/jquery.mobile-1.4.0-alpha.2.min.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.0-alpha.2/jquery.mobile-1.4.0-alpha.2.min.js"></script>


<div data-role="page">

	<div data-role="header">
		<h1>Page Title</h1>
	</div><!-- /header -->

	<div data-role="content">
		<p><?php $this->pageTitle=Yii::app()->name; ?></p>
		<p><?php echo CHtml::link("Check In",array('confirm' => 'Please Select Route from the list'),array('class'=>'checkin'));?></p>
		
		<div data-role="fieldcontain">
		    <label for="select-native-17">Route:</label>
		    <select name="select-native-17" id="select-native-17">
		    <option value="">Select One</option>
			<?php
				$criteria=new CDbCriteria;
				$criteria->condition="status='1'";
				$route=  BusRoute::model()->findAll($criteria);
				foreach ($route as $key => $value) {
					echo "<option value='".$value->id."'>$value->route_name</option>";
				}
				
		    ?>
		    </select>
		</div>

		
	</div><!-- /content -->

	<div data-role="footer">
		<h4>Page Footer</h4>
	</div><!-- /footer -->
</div><!-- /page -->


<input type="hidden" id="url" value="<?php echo Yii::app()->request->baseUrl;?>">

<script type="text/javascript">
    $(document).ready(function(){
        var url = $('#url').val();
    $('.checkin').click(function(){
       var selectedValue = $(':selected').val();
       $.ajax({
           type: 'POST',
           url: url+'/busroute/getList',
           data: {value:selectedValue},
           dataType: "json",
           success:function(response){
               if(response.value){
                   location.href = url+'/busroute/create';
               }
               else
                   {
                       alert('Please Select the Route from the list');
                   }
           }
       });
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