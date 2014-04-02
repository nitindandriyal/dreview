<?php
/* @var $this Tbl_state_mapController */

$this->breadcrumbs=array(
	'Tbl State Map',
);
?>
<div class="container">
<h3><?php echo $firstParam; 
		echo ' Doctors';?></h3>
</div>
<p>
<?php $columnCnt =0;?>
<div class="container">
<br>
<div id="all-local-landing-pages" class="widget-item-list row">	
            <?php for($stateCount=0;$stateCount<count($state);$stateCount++) {?>
            	<?php if($columnCnt%4==0) {?>
            	</div>	
            	<div class="container">
                <br>
             <?php } ?>
             <?php if(!empty($city[$stateCount][0])){ $columnCnt++;?>
             
			<div class="col-sm-3">
				<ul class='list-unstyled list-spaceless'>
					<li><h2><?php echo CHtml::link($state[$stateCount],array('doctor/DocSearchByState','param1'=>$state[$stateCount],'param2'=>$firstParam)); ?></h2></li>
					<?php for($cityCount=0;$cityCount<count($city[$stateCount]);$cityCount++) {?>
				<li><?php echo CHtml::link($city[$stateCount][$cityCount],array('doctor/DocSearchByCity','param1'=>$city[$stateCount][$cityCount],'param2'=>$firstParam)); ?></li>
				
					<?php  } ?>
					
				</ul>
			 <?php } ?>
				
			</div>
			 <?php } ?>
			
         
   </div>
   
</div>
	
</p>
