<?php
/*
 * Created on 29-Mar-2014
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<div class="container">


<h2><?php echo $speciality ?> specialist in 
	<?php echo $city ;?>
</h2>
</div>

<p>


	<?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
        'template' => '{items}{pager}',
        'cssFile'=>'../../../css/dr_style.css'
)); ?>
</p>