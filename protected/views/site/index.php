<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php echo CHtml::link("Check In");?>

 <h1><?php echo "Route:";?></h1>

<?php 

$criteria=new CDbCriteria;
		$criteria->condition='status=:status';
		$criteria->params=array(':status'=>1);
		
		$models=  BusRoute::model()->findAll($criteria);
                
		 
// retrieve the models from db
$models = BusRoute::model()->findAll();
 
// format models as $key=>$value with listData
$list = CHtml::listData($models,'id', 'route_name');
 echo CHtml::dropDownList('route', "routename", 
              $list,
              array('empty' => '(Select a category'));
?>
