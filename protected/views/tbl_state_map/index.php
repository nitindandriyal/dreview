<?php
/* @var $this Tbl_state_mapController */

$this->breadcrumbs=array(
	'Tbl State Map',
);
?>
<p>

<div class="container">
<br>
<div id="all-local-landing-pages" class="widget-item-list row">	
            <?php for($i=0;$i<count($state);$i++) {?>
            	<?php if($i%4==0) {?>
            	</div>	
            	<div class="container">
                <br>
             <?php } ?>
			<div class="col-sm-3">
				<ul class='list-unstyled list-spaceless'>
					<li><h4><?php echo CHtml::link($state[$i],array('controller/action','param1'=>$state[$i])); ?></h4></li>
					<?php for($j=0;$j<count($city[$i]);$j++) {?>
					<li><?php echo CHtml::link($city[$i][$j],array('controller/action','param1'=>$city[$i][$j])); ?></li>
					<?php } ?>
				</ul>
			</div>
			
           <?php } ?>
         
   </div>
</div>
	
</p>
