<?php
/* @var $this TblStateController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl States',
);

$this->menu=array(
	array('label'=>'Create TblState', 'url'=>array('create')),
	array('label'=>'Manage TblState', 'url'=>array('admin')),
);
?>

<h1>Tbl States</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
