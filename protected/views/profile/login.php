<?php
//Always place this code at the top of the Page
ob_start();
session_start();

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

/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
		'Login',
);

?>
<html>
<head>
<title>Login</title>

<div align="center">
	<img src="../images/login.png" style="width: 20%; height: 20%;" />
</div>
<div class="SignIn SignIn-Login" align="center">

	<?php echo CHtml::beginForm(); ?>

	<span class="loginTblSpan">Login</span>

	<?php 
	if(array_filter($model->getErrors()))
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

	<div class="row">
		<?php echo CHtml::activeTextField($model,'email', array('placeholder' => 'Enter Registered Email')) ?>
		<?php echo CHtml::activePasswordField($model,'password', array('placeholder' => 'Enter Your Password')) ?>
		<?php echo CHtml::submitButton('Login', array('class' => 'btn-login-cta')); ?>
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
			<?php echo CHtml::label('Forgot your password?',''); ?>
		</div>
	</div>
	<br>
	<?php echo CHtml::endForm(); ?>
	<span class="loginImageSpan"><a href="loginFacebook"><img
			src="../images/facebook.png" /> </a><span> <!--  span class="loginImageSpan"><img src="../images/google.png"/><span>
		<span class="loginImageSpan"><img src="../images/twitter.png"/><span-->

</div>
<br />