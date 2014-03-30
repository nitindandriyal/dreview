<div class="SignIn SignUpMainDiv">
	<?php   
	if( $model->email != null && !array_filter($model->getErrors())) {?>
	<div class="SuccessDiv">	
		<h4>Registration Successful</h4>
		<p>Thank you for registering with Dreview. A confirmation email has been sent to your registered email Id</p>
		<p>Please click on the activation link on the email to Activate your account</p>
	</div>
	<?php }
	else{
	?>
	<div class="SignUp">		
		<?php echo CHtml::beginForm() ?>

			<div>
			    <span class="loginTblSpan">SignUp</span>
			    <div style="margin-left:0px;display:inline-block;width: 40%" align="left">
			    	<span class="loginTblSpan" id="CreateAccount">Already a member? <a href="/dreview/profile/login">Login</a></span>
			    </div>
			    <div style="margin-right:0px;display:inline-block;width: 57%" align="right">
			    	<span class="loginTblSpan" id="CreateAccount">Create a new account</span>
			    </div>	
		 	</div>
		 	
		 	<div style="border:1px solid #669F51; width:80%; height:0px; margin:auto"></div>
		  
		    <div id="SignUpRight">
			    <div>
			        <?php //echo CHtml::label('First Name', ''); ?>
			        <?php echo CHtml::activeTextField($model, 'firstname', array('placeholder' => 'First Name')); 
			        if(!empty($model->getErrors('firstname'))){
			        
			        	$err = $model->getErrors('firstname');
			        		
			        	?>
			        <span class="bubble">
			        <?php echo $err[0] ?></span><?php }?>		        
			    </div><br>
			 
			    <div>
			        <?php //echo CHtml::label('Last Name', ''); ?>
			        <?php echo CHtml::activeTextField($model, 'lastname', array('placeholder' => 'Last Name'));
			        if(!empty($model->getErrors('lastname'))){
		
						$err = $model->getErrors('lastname');
						
			        ?>
			        <span class="bubble"><?php echo $err[0] ?></span>
			        <?php }?>
			    </div><br>
			    
			    <div>
			        <?php //echo CHtml::activeLabel($model,'Email'); ?>
			        <?php echo CHtml::activeTextField($model,'email', array('placeholder' => 'Email')); 
			        if(!empty($model->getErrors('email'))){
			        
			        	$err = $model->getErrors('email');
			        		
			        	?>
			        <span class="bubble">
			        <?php echo $err[0] ?></span><?php }?>	
			    </div><br>
			    
			    <div>
			        <?php //echo CHtml::activeLabel($model,'Password'); ?>
			        <?php echo CHtml::activePasswordField($model,'password', array('placeholder' => 'Password')); 
			        if(!empty($model->getErrors('password'))){
			        
			        	$err = $model->getErrors('password');
			        		
			        	?>
			        <span class="bubble">
			        <?php echo $err[0] ?></span><?php }?>
			    </div><br>		    		    
			 
			    <div>
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
			    
		 	</div>
		<?php echo CHtml::endForm(); ?>	

	</div>
	<?php }?>		
</div>
<br/>