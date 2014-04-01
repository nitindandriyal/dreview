<?php
/*
 * Created on 29-Mar-2014
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<div class="container">

</div>
<?php echo "hello";?>
<?php foreach ($docDetail as $row){?>
<h2><?php echo $row['FIRST_NAME'] ;echo "hello";?>  
</h2>
<?php }?>
<p>


	<?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
)); ?>
</p>
