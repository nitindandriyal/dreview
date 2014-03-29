<?php
/* @var $this DoctorReviewsController */
/* @var $model DoctorReviews */
/* @var $form CActiveForm */

/*variable sdefined for testing purpose*/
$idDoc='12';
$docName='Sushant Singh';
$idUser='1';
$userEmail='vasudha.yadav@gmail.com';
$userName='Vasudha Yadav';

?>

<div class="reviewDiv">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'doctor-reviews-writeReview-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>
	<br>
	<p class="reviewInnerDiv">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="reviewInnerDiv">
		<?php echo $form->labelEx($model,'PURPOSE'); ?><br>
		<?php echo $form->textField($model,'PURPOSE'); ?>
		<?php echo $form->error($model,'PURPOSE'); ?>
	</div>

	<div class="reviewInnerDiv">
		<br>
		<?php echo $form->labelEx($model,'RATING'); ?><br>
		<?php echo $form->textField($model,'RATING'); ?>
		<?php echo $form->error($model,'RATING'); ?>
	</div>

	<div class="reviewInnerDiv">
		<br>
		<?php echo $form->labelEx($model,'WRITE A REVIEW'); ?><br>
		<?php echo $form->textArea($model,'REVIEW', array('class' => 'reviewBox'), array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'REVIEW'); ?>
	</div>

	<div class="reviewInnerDiv">
		<br>
		<?php echo CHtml::submitButton('Submit Review', array('class' => 'btn btn-review')); ?>
	</div>
	<br>
<?php $this->endWidget(); ?>

</div><!-- form -->