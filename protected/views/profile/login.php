<?php
//Always place this code at the top of the Page
ob_start();


if (isset($_SESSION['id'])) {
	// Redirection to login page twitter or facebook
	header("location: index");
}

if (array_key_exists("login", $_GET)) {
	$oauth_provider = $_GET['oauth_provider'];
	if ($oauth_provider == 'twitter') {
		header("Location: loginTwitter.php");
	} else if ($oauth_provider == 'facebook') {
		header("Location: loginFacebook.php");
	}
}

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
		'Login',
);

?>
<title>Login</title>

	<div id="blanket" style="display:none;"></div>
		<div id="forgotPwdPopUpDiv" class="SignInPopUpdiv" style="display:none;"> 
			<form action="forgotPasword">   		
				<div style="margin-left: 85%;">
		    		<img src="../images/Close.jpg" onclick="popup('forgotPwdPopUpDiv')"/>
		    	</div>
		    	<div align="center">
		    		<?php echo CHtml::activeTextField($model,'email', array('placeholder' => 'Enter your registered Email', 'class' => 'input')); ?><br><br><br>
		    		<?php echo CHtml::submitButton('Reset Password', array('class' => 'btn btn-login-cta btn-reset-pwd')); ?>
		    	</div>
	    	</form>
		</div>

<div align="center">
	<img src="../images/login.png" style="width: 20%; height: 20%;" />
</div>
<div class="SignIn SignIn-Login" align="center">

	<?php echo CHtml::beginForm(); ?>

	<span class="loginTblSpan">Login</span>

	<?php 
	if(null!= $model && array_filter($model->getErrors()))
	{
		$err = $model->getErrors();
	?>
		<div class="ErrorDiv">
			<?php
				foreach ($err as $errValue)
				{					
					if ($errValue[0] == 'USERNAME_INVALID')
					{
			?>
						<h4 style="color: red">Invalid Email</h4>
						<p>Email you have entered is not registered with Dreview</p>
						<p>Make sure you type the email correctly</p>
								
			<?php
					}
					else if($errValue[0] == 'PASSWORD_INVALID')
					{
			?>
							<h4 style="color: red">Invalid Password</h4>
							<p>Password you have entered is not correct</p>
							<p>Make sure your CAPS LOCK is OFF and try entering the password again</p>
							<p>Your account will be locked after 5 unsucessful attempts</p>						
			<?php 
					}
					else if($errValue[0] == 'STATUS_INACTIVE')
					{
			?>
							<h4 style="color: red">Inactive account</h4>
							<p>Your account is not active</p>
							<p>Please activate your account by clicking on the activation link sent on your registered email</p>							
			<?php 	
					}	
					else
					{
						echo $errValue[0]."<p>";
					}
				}
			?>
		</div>
	<?php 
	}
	?>	

	<div>
		<?php echo CHtml::activeTextField($model,'email', array('placeholder' => 'Enter Registered Email')) ?>
		<?php echo CHtml::activePasswordField($model,'password', array('placeholder' => 'Enter Your Password')) ?>
		<?php echo CHtml::submitButton('Login', array('class' => 'btn')); ?>
	</div>
	<br>
	<div style="display: block; width: 80%">
		<div style="margin-left: 0px; display: inline-block; width: 40%"
			align="left">
			<?php echo CHtml::activeCheckBox($model, 'keepLoggedIn'); ?>
			<?php echo CHtml::label('Keep me logged in',''); ?>
		</div>
		<div style="margin-left: 0px; display: inline-block; width: 57%"
			align="left">
			<a href="#" onclick="popup('forgotPwdPopUpDiv')"><?php echo CHtml::label('Forgot your password?',''); ?></a>
		</div>
	</div>
	<br>
	<?php echo CHtml::endForm(); ?>
	<span class="loginImageSpan"><a href="loginFacebook"><img
			src="../images/facebook.png" /> </a><span> <!--  span class="loginImageSpan"><img src="../images/google.png"/><span>
		<span class="loginImageSpan"><img src="../images/twitter.png"/><span-->

</div>
<br />