<div class="SignIn">
	<div class="SignUp" id="SignUpLeft" style="max-height:100%">	
		<img src="../images/signup.jpg" style="max-width:100%; height:100%;border-radius: 58px;"/>
	</div> 
	<div class="SignUp" id="SignUpRight">		
		<?php echo CHtml::beginForm() ?>

		    <span class="loginTblSpan">SignUp</span>
		    <span class="loginTblSpan" id="CreateAccount">Create a new account</span>
		 
		    <div class="row">
		        <?php //echo CHtml::label('First Name', ''); ?>
		        <?php echo CHtml::activeTextField($model, 'firstname', array('placeholder' => 'First Name')); 
		        if(!empty($model->getErrors('firstname'))){
		        
		        	$err = $model->getErrors('firstname');
		        		
		        	?>
		        <span class="bubble">
		        <?php echo $err[0] ?></span><?php }?>		        
		    </div><br>
		 
		    <div class="row">
		        <?php //echo CHtml::label('Last Name', ''); ?>
		        <?php echo CHtml::activeTextField($model, 'lastname', array('placeholder' => 'Last Name'));
		        if(!empty($model->getErrors('lastname'))){
	
					$err = $model->getErrors('lastname');
					
		        ?>
		        <span class="bubble"><?php echo $err[0] ?></span>
		        <?php }?>
		    </div><br>
		    
		    <div class="row">
		        <?php //echo CHtml::activeLabel($model,'Email'); ?>
		        <?php echo CHtml::activeTextField($model,'email', array('placeholder' => 'Email')); 
		        if(!empty($model->getErrors('email'))){
		        
		        	$err = $model->getErrors('email');
		        		
		        	?>
		        <span class="bubble">
		        <?php echo $err[0] ?></span><?php }?>	
		    </div><br>
		    
		    <div class="row">
		        <?php //echo CHtml::activeLabel($model,'Password'); ?>
		        <?php echo CHtml::activePasswordField($model,'password', array('placeholder' => 'Password')); 
		        if(!empty($model->getErrors('password'))){
		        
		        	$err = $model->getErrors('password');
		        		
		        	?>
		        <span class="bubble">
		        <?php echo $err[0] ?></span><?php }?>
		    </div><br>		    		    
		 
		    <div class="row">
		        <?php //echo CHtml::label('Confirm Password', ''); ?>
		        <?php echo CHtml::activePasswordField($model, 'confirmPassword', array('placeholder' => 'Confirm Password')); 
		        if(!empty($model->getErrors('confirmPassword'))){
		        
		        	$err = $model->getErrors('confirmPassword');
		        		
		        	?>
		        <span class="bubble">
		        <?php echo $err[0] ?></span><?php }?>
		    </div><br>
		    		 
		    <div class="row submit">
		        <?php echo CHtml::submitButton('Confirm', array('class' => 'btn btn-login-cta')); ?>
		    </div>
		 
		<?php echo CHtml::endForm(); ?>	

	</div>		
</div>
<br/>