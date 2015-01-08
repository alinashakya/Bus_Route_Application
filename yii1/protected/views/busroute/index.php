<?php
/* @var $this BusrouteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bus Routes',
);

$this->menu=array(
	array('label'=>'Create BusRoute', 'url'=>array('create')),
	array('label'=>'Manage BusRoute', 'url'=>array('admin')),
);
?>

<h1>Bus Routes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
