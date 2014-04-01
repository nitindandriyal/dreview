<?php
/*
 * Created on 30-Mar-2014
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<div class="view">

	<b><?php echo CHtml::link($data['FIRST_NAME']." ".$data['LAST_NAME'],array('doctorReview/DetailedReview','param1'=>$data['ID_DOCTOR'])); ?>:</b>
	<br />
	<b><?php echo 'Practicing Since: ' ;echo $data['PRACTICE_ST_DT'];?>
	<br />
	<b><?php echo 'Rating:  ';echo $data['USER_RATING'];?>
	<br />
	<b><?php echo 'Qualification:  ';echo $data['QUALIFICATION'];?>
	<br />

	

</div>