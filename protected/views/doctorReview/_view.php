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
        <div class="widget-item-content-review-page">
        
	<?php for($i=0;$i<5;$i++){?>
		<?php if($i<$data['RATING']) {?>
			<img src = "../../images/star.png" height="18" width="18"/>
			<?php }else{ ?>
			<img src = "../../images/star_off.png"height="18" width="18"/>				
				<?php } ?>
		<?php } ?>
		<br>
	<b><?php echo 'Reviewed on: ' ;echo $data['REVIEW_DATE'];?>
	<br />
	<br />
	<b><?php echo $data['REVIEW'];?>
	<br />
	<br \>
	</div>


</div>

</div>	
</div>

