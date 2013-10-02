<?php
/* @var $this BusrouteController */
/* @var $data BusRoute */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bus_name')); ?>:</b>
	<?php echo CHtml::encode($data->bus_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('route_name')); ?>:</b>
	<?php echo CHtml::encode($data->route_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>