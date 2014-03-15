<?php
/* @var $this TblStateController */
/* @var $model TblState */

$this->breadcrumbs=array(
	'Tbl States'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblState', 'url'=>array('index')),
	array('label'=>'Manage TblState', 'url'=>array('admin')),
);
?>

<h1>Create TblState</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>