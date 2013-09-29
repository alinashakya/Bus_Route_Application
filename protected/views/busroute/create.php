<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/media/js/jquery.js"></script>
<?php 
$criteria = new CDbCriteria();
$criteria->condition = 'route_id = 1';
$bus_route = BusStop::model()->findAll($criteria);
foreach ($bus_route as $value) { ?>

	<?php $date = date('h:i', strtotime($value->time)); ?>
	<div>
	<ul>
		<li>
			<?php echo ucfirst($value->stop_name);?>
			<?php if($value->created_time != NULL) {?>
				<input type = "checkbox" class="chk" name="route_chk[]" id="<?php echo "route_chk_".$value->id?>" value="<?php echo $value->id;?>" checked="checked"/>
			<?php } else {?>
				<input type = "checkbox" class="chk" name="route_chk[]" id="<?php echo "route_chk_".$value->id?>" value="<?php echo $value->id;?>"/>
			<?php } ?>
		</li>
	</ul>
</div>
<?php } ?>

<input type="hidden" id="url" value="<?php echo Yii::app()->request->baseUrl;?>">

<script type="text/javascript">
var url = $('#url').val();
$('.chk').click(function(){
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
					if(response.msg == 'true'){

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
