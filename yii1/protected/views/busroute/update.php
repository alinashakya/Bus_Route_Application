<?php
/* @var $this BusrouteController */
/* @var $model BusRoute */

$this->breadcrumbs=array(
	'Bus Routes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BusRoute', 'url'=>array('index')),
	array('label'=>'Create BusRoute', 'url'=>array('create')),
	array('label'=>'View BusRoute', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BusRoute', 'url'=>array('admin')),
);
?>

<h1>Update BusRoute <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>