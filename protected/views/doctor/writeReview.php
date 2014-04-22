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

Yii::app()->session['idDoc']=$idDoc;

?>
<div style="height: 60px">
</div>	
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

		<?php 
	if(null!= $model && array_filter($model->getErrors()))
	{
		$err = $model->getErrors();
	?>
		<div class="ErrorDiv" align="center">
			<?php
				foreach ($err as $errValue)
				{					
					echo $errValue[0]."<p>";
				}
			?>
		</div><br>
	<?php 
	}
	?>
	
	<div class="reviewInnerDiv">
		<?php echo $form->labelEx($model,'PURPOSE'); ?><br>
		<?php echo $form->textField($model,'PURPOSE'); ?>
		<?php echo $form->error($model,'PURPOSE'); ?>
	</div>

	<div class="reviewInnerDiv">
		<br>
		<?php echo $form->labelEx($model,'RATING'); ?>
		<?php echo $form->hiddenField($model,'RATING'); ?>
		<br>
		<p class="stars">
			<span>
				<a class="star-05" href="#" onclick="storeRating(0.5);return false;">0.5</a>
				<a class="star-10" href="#" onclick="storeRating(1);return false;">1</a>
				<a class="star-15" href="#" onclick="storeRating(1.5);return false;">1.5</a>
				<a class="star-20" href="#" onclick="storeRating(2);return false;">2</a>
				<a class="star-25" href="#" onclick="storeRating(2.5);return false;">2.5</a>
				<a class="star-30" href="#" onclick="storeRating(3);return false;">3</a>
				<a class="star-35" href="#" onclick="storeRating(3.5);return false;">3.5</a>
				<a class="star-40" href="#" onclick="storeRating4);return false;">4</a>
				<a class="star-45" href="#" onclick="storeRating(4.5);return false;">4.5</a>
				<a class="star-50" href="#" onclick="storeRating(5);return false;">5</a>
			</span>
		</p>
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

<script type="text/javascript">
	function storeRating(rating){
		document.getElementById("DoctorReviews_RATING").value = rating;
	}
</script>
