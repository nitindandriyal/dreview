<?php
/* @var $this TblStateController */
/* @var $data TblState */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_STATE')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_STATE), array('view', 'id'=>$data->ID_STATE)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAME_STATE')); ?>:</b>
	<?php echo CHtml::encode($data->NAME_STATE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('REGION')); ?>:</b>
	<?php echo CHtml::encode($data->REGION); ?>
	<br />


</div>