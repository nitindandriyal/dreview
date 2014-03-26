<?php
//Always place this code at the top of the Page
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
	<img src="../images/login.png" style="width:20%; height:20%;"/>
</div>
<div class="SignIn SignIn-Login" align="center">
	
		<?php echo CHtml::beginForm(); ?>
	
		<span class="loginTblSpan">Login</span> 
		
		<?php echo CHtml::errorSummary($model); ?>
	
		<div class="row">
			<?php echo CHtml::activeTextField($model,'username', array('placeholder' => 'Enter User Name')) ?>
			<?php echo CHtml::activePasswordField($model,'password', array('placeholder' => 'Enter Your Password')) ?>
			<?php echo CHtml::submitButton('Login', array('class' => 'btn-login-cta')); ?>
		</div>
		<br>
		<div style="display:block;width:80%">
		<div style="margin-left:0px;display:inline-block;width: 40%" align="left">			
			<?php echo CHtml::activeCheckBox($model, 'keepLoggedIn'); ?>
			<?php echo CHtml::label('Keep me logged in',''); ?>
		</div>
		<div style="margin-left:0px;display:inline-block;width:57%" align="left">
			<?php echo CHtml::label('Forgot your password?',''); ?>
		</div>
		</div>
		<br>
		<?php echo CHtml::endForm(); ?>
		<span class="loginImageSpan"><a href="loginFacebook"><img src="../images/facebook.png" /> </a><span> 
		<!--  span class="loginImageSpan"><img src="../images/google.png"/><span>
		<span class="loginImageSpan"><img src="../images/twitter.png"/><span-->
	
</div>
<br />