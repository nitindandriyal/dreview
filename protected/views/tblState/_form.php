<?php
/* @var $this TblStateController */
/* @var $model TblState */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-state-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ID_STATE'); ?>
		<?php echo $form->textField($model,'ID_STATE',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'ID_STATE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NAME_STATE'); ?>
		<?php echo $form->textField($model,'NAME_STATE',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'NAME_STATE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'REGION'); ?>
		<?php echo $form->textField($model,'REGION',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'REGION'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->