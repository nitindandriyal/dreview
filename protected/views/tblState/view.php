<?php
/* @var $this TblStateController */
/* @var $model TblState */

$this->breadcrumbs=array(
	'Tbl States'=>array('index'),
	$model->ID_STATE,
);

$this->menu=array(
	array('label'=>'List TblState', 'url'=>array('index')),
	array('label'=>'Create TblState', 'url'=>array('create')),
	array('label'=>'Update TblState', 'url'=>array('update', 'id'=>$model->ID_STATE)),
	array('label'=>'Delete TblState', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_STATE),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblState', 'url'=>array('admin')),
);
?>

<h1>View TblState #<?php echo $model->ID_STATE; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID_STATE',
		'NAME_STATE',
		'REGION',
	),
)); ?>
