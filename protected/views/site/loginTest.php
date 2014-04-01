<?php
/* @var $this UserProfileController */
/* @var $model UserProfile */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-profile-loginTest-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'PASSWORD'); ?>
		<?php echo $form->textField($model,'PASSWORD'); ?>
		<?php echo $form->error($model,'PASSWORD'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'USER_TYPE'); ?>
		<?php echo $form->textField($model,'USER_TYPE'); ?>
		<?php echo $form->error($model,'USER_TYPE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LAST_LOGIN'); ?>
		<?php echo $form->textField($model,'LAST_LOGIN'); ?>
		<?php echo $form->error($model,'LAST_LOGIN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EMAIL'); ?>
		<?php echo $form->textField($model,'EMAIL'); ?>
		<?php echo $form->error($model,'EMAIL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'USERNAME'); ?>
		<?php echo $form->textField($model,'USERNAME'); ?>
		<?php echo $form->error($model,'USERNAME'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MOBILE'); ?>
		<?php echo $form->textField($model,'MOBILE'); ?>
		<?php echo $form->error($model,'MOBILE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CITY'); ?>
		<?php echo $form->textField($model,'CITY'); ?>
		<?php echo $form->error($model,'CITY'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'OAUTH_UID'); ?>
		<?php echo $form->textField($model,'OAUTH_UID'); ?>
		<?php echo $form->error($model,'OAUTH_UID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'OAUTH_PROVIDER'); ?>
		<?php echo $form->textField($model,'OAUTH_PROVIDER'); ?>
		<?php echo $form->error($model,'OAUTH_PROVIDER'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TWITTER_OAUTH_TOKEN'); ?>
		<?php echo $form->textField($model,'TWITTER_OAUTH_TOKEN'); ?>
		<?php echo $form->error($model,'TWITTER_OAUTH_TOKEN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TWITTER_OAUTH_TOKEN_SECRET'); ?>
		<?php echo $form->textField($model,'TWITTER_OAUTH_TOKEN_SECRET'); ?>
		<?php echo $form->error($model,'TWITTER_OAUTH_TOKEN_SECRET'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'STATUS'); ?>
		<?php echo $form->textField($model,'STATUS'); ?>
		<?php echo $form->error($model,'STATUS'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ACTIVATION_CODE'); ?>
		<?php echo $form->textField($model,'ACTIVATION_CODE'); ?>
		<?php echo $form->error($model,'ACTIVATION_CODE'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->