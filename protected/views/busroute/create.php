<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/media/js/jquery.js"></script>
<?php 
$criteria = new CDbCriteria();
$criteria->condition = 'route_id = 1';
$bus_route = BusStop::model()->findAll($criteria);
foreach ($bus_route as $value) { ?>

	<?php $date = date('h:i', strtotime($value->time)); ?>
	<div class="container">
	<ul class="content">
		<li>
			<?php echo ucfirst($value->stop_name);?>
			<input type = "checkbox" class="chk" name="route_chk[]" id="<?php echo "route_chk_".$value->id?>" value="<?php echo $value->id;?>" <?php if(isset($value->created_time)) echo "checked='checked'"?>>
		</li>
	</ul>
</div>
<?php } ?>

<input type="hidden" id="url" value="<?php echo Yii::app()->request->baseUrl;?>">

<script type="text/javascript">
var url = $('#url').val();
$('.chk').click(function(){
	$('#route_chk_3').append('hello');
		//var checked = $(this).val();
		var checkbox = $(this);
		if(checkbox.is(':checked')){
			var value = checkbox.val();
			$.ajax({
				type: 'POST',
				url: url+'/busroute/addCheckedTime',
				data: {value:value},
				dataType : 'json',
				success: function(response){
					if(response.msg == 'success'){
						check_id = response.check_id;
						for(var i = 3 ; i <= check_id; i++){
							var test = $("#route_chk_"+i);console.log(test);
							$('input#route_chk_3').append('hello');

						}
					}
				}
			});
		} else {
			var value = checkbox.val();
			$.ajax({
				type: 'POST',
				url: url+'/busroute/removeCheckedTime',
				data: {value:value}
			});
		}
		
	});
</script>
