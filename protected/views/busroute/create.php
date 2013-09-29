<?php 
$criteria = new CDbCriteria();
$criteria->condition = 'route_id = 1';
$bus_route = BusStop::model()->findAll($criteria);
foreach ($bus_route as $value) { ?>

	<?php $date = date('h:i', strtotime($value->time)); ?>
	<ul>
		<li>
			<?php echo ucfirst($value->stop_name)."&nbsp;<strong>at</strong>&nbsp;".$date;?>
			<input type = "checkbox"/>
		</li>
	</ul>

<?php } ?>
