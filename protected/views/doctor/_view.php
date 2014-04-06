<?php
/*
 * Created on 30-Mar-2014
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
$img = "../images/doctors/".$data['IMAGE_PATH'];
?>
<div class="container">
 <span class="hr"></span>
<div class="row">
        <div class="col-sm-6">
        <div class="widget-item-image badge-image">
        <a href="/find/Illinois/Chicago/Plastic-Surgeon/Peter-Johnson">
                            <img src="<?=$img?>"/></a>
                            </div>
<div class="widget-item-content">

	<a><?php echo CHtml::link("Dr. ".$data['FIRST_NAME']." ".$data['LAST_NAME'],array('doctorReview/DetailedReview','param1'=>$data['ID_DOCTOR'])); ?>:</b>
	<br />
	
	<?php echo $data['QUALIFICATION'];?>
	<br />
	<?php for($i=0;$i<5;$i++){?>
		<?php if($i<$data['USER_RATING']) {?>
			<img src = "../images/star.png" height="18" width="18"/>
			<?php }else{ ?>
			<img src = "../images/star_off.png"height="18" width="18"/>				
				<?php } ?>
		<?php } ?>
		<?php echo $data['TOTAL_REVIEWS'];echo " ";echo "reviews"?>
	<br/>	
</div>


</div>

</div>	
</div>	

