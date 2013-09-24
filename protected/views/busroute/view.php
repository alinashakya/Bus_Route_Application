<?php
/* @var $this BusrouteController */
/* @var $model BusRoute */

$this->breadcrumbs=array(
	'Bus Routes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BusRoute', 'url'=>array('index')),
	array('label'=>'Create BusRoute', 'url'=>array('create')),
	array('label'=>'Update BusRoute', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BusRoute', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BusRoute', 'url'=>array('admin')),
);
?>

<h1>View BusRoute #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'bus_name',
		'route_name',
		'status',
	),
)); ?>
