<?php
/* @var $this BusrouteController */
/* @var $model BusRoute */

$this->breadcrumbs=array(
	'Bus Routes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BusRoute', 'url'=>array('index')),
	array('label'=>'Manage BusRoute', 'url'=>array('admin')),
);
?>

<h1>Create BusRoute</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>