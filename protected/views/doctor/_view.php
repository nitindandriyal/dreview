<?php
/*
 * Created on 30-Mar-2014
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<div class="container">
 <span class="hr"></span>
<div class="row">
        <div class="col-sm-6">
        <div class="widget-item-image badge-image">
        <a href="/find/Illinois/Chicago/Plastic-Surgeon/Peter-Johnson">
                            <img src="../../images/dr_pic"/></a>
                            </div>
<div class="widget-item-content">

	<a><?php echo CHtml::link("Dr. ".$data['FIRST_NAME']." ".$data['LAST_NAME'],array('doctorReview/DetailedReview','param1'=>$data['ID_DOCTOR'])); ?>:</b>
	<br />
	
	<?php echo 'Rating:  ';echo $data['USER_RATING'];?>
	<br />
	<?php echo $data['QUALIFICATION'];?>
	<br />
	<br/>	
</div>


</div>

</div>	
</div>	

