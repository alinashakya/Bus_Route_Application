<?php
/* @var $this BusrouteController */
/* @var $model BusRoute */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bus-route-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'bus_name'); ?>
		<?php echo $form->textField($model,'bus_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'bus_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'route_name'); ?>
		<?php echo $form->textField($model,'route_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'route_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->