<div id="SignIn">
	<div id="loginDiv" style="max-height:100%">	
		<img src="../images/signup.jpg" style="max-width:100%; height:100%;border-radius: 58px;"/>
	</div> 
	<div id="SignInDiv">		
		<?php echo CHtml::beginForm(); ?>
		
		    <span class="loginTblSpan">SignUp</span>
		    <span class="loginTblSpan" id="CreateAccount">Create a new account</span>
		    
		    <?php echo CHtml::errorSummary($model); ?>
		 
		    <div class="row">
		        <?php echo CHtml::label('First Name', ''); ?><br>
		        <?php echo CHtml::activeTextField($model, 'firstname') ?>
		    </div><br>
		 
		    <div class="row">
		        <?php echo CHtml::label('Last Name', ''); ?><br>
		        <?php echo CHtml::activeTextField($model, 'lastname') ?>
		    </div><br>
		    
		    <div class="row">
		        <?php echo CHtml::activeLabel($model,'Email'); ?><br>
		        <?php echo CHtml::activeTextField($model,'email') ?>
		    </div><br>
		    
		    <div class="row">
		        <?php echo CHtml::activeLabel($model,'Password'); ?><br>
		        <?php echo CHtml::activePasswordField($model,'password') ?>
		    </div><br>		    		    
		 
		    <div class="row">
		        <?php echo CHtml::label('Confirm Password', ''); ?><br>
		        <?php echo CHtml::activePasswordField($model, 'confirmPassword') ?>
		    </div><br>
		    		 
		    <div class="row submit">
		        <?php echo CHtml::submitButton('Confirm', array('class' => 'btn btn-login-cta')); ?>
		    </div>
		 
		<?php echo CHtml::endForm(); ?>	

	</div>		
</div>
<br/>