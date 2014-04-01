<div class="SignIn SignUpMainDiv">

	<div class="SignUp">		
		<?php echo CHtml::beginForm() ?>

			<div>
			    <span class="loginTblSpan">Reset Password</span>
			    <div display:inline-block>
			    	<span class="loginTblSpan" id="CreateAccount">Enter new password for your Dreview account</span>
			    </div>	
		 	</div>
		 	
		 	<div style="border:1px solid #669F51; width:80%; height:0px; margin:auto"></div>
		  
		    <div id="SignUpRight" style="padding-top:40px">			    
			    <div>
			        <?php echo CHtml::activeLabel($model,'Email'); ?>	
			    </div><br>
			    
			    <div>			        
			        <?php echo CHtml::activePasswordField($model,'password', array('placeholder' => 'Password')); 
			        if(!empty($model->getErrors('password'))){
			        
			        	$err = $model->getErrors('password');
			        		
			        	?>
			        <span class="bubble">
			        <?php echo $err[0] ?></span><?php }?>
			    </div><br>		    		    
			 
			    <div>			    
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
</div>
<br/>