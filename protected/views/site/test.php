

	<div id="myTabs" style="width:100%" align="center">
	<form action="printTest" method="post">
	<?php 
	echo $_SERVER["HTTP_HOST"];
	$options = array ('M' => 'Male', 'F' => 'Female');
	echo CHtml::dropDownList('mySelect', 'M', $options, array('empty'=>'Select gender'));
	echo CHtml::submitButton('Login', array('class' => 'btn'));
	?>
	</form>
	
	<div>
	<?php echo CHtml::beginForm(); ?>
	
	<?php 	
	$type_list=array ('M' => 'Male', 'F' => 'Female');
	
	echo CHtml::activeTextField($model,'email', array('placeholder' => 'Enter Registered Email'));
	echo CHtml::activeDropDownList($model,'gender',$type_list); 
	echo CHtml::submitButton('Submit', array('class' => 'btn'));
	?>
	</div>
	
	<?php echo CHtml::endForm(); ?>
	</div>
		