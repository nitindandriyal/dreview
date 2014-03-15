<?php
/* @var $this TblStateController */
/* @var $model TblState */

$this->breadcrumbs=array(
	'Tbl States'=>array('index'),
	$model->ID_STATE=>array('view','id'=>$model->ID_STATE),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblState', 'url'=>array('index')),
	array('label'=>'Create TblState', 'url'=>array('create')),
	array('label'=>'View TblState', 'url'=>array('view', 'id'=>$model->ID_STATE)),
	array('label'=>'Manage TblState', 'url'=>array('admin')),
);
?>

<h1>Update TblState <?php echo $model->ID_STATE; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>