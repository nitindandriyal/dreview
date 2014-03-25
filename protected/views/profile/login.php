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
 
<div id="SignIn" style="border:1px solid">
	<div id="loginDiv" style="border:1px solid">		
		<?php echo CHtml::beginForm(); ?>
		
		    <span class="loginTblSpan">Login</span>
		    <span class="loginTblSpan" id="CreateAccount">Already a member?</span>
		    
		    <?php echo CHtml::errorSummary($model); ?>
		 
		    <div class="row">
		        <?php echo CHtml::activeLabel($model,'username'); ?><br>
		        <?php echo CHtml::activeTextField($model,'username', array('placeholder' => 'Enter User Name')) ?>
		    </div><br>
		 
		    <div class="row">
		        <?php echo CHtml::activeLabel($model,'password'); ?><br>
		        <?php echo CHtml::activePasswordField($model,'password') ?>
		    </div><br>
		 
		    <div class="row submit">
		        <?php echo CHtml::submitButton('Login', array('class' => 'btn btn-login-cta')); ?>
		        <?php echo CHtml::label('Forgot your password?',''); ?>
		    </div>
		    
		    <br><br><br><br><br>
		    <div class="row">
		        <?php echo CHtml::label('Not a member?',''); ?>
		        <?php echo CHtml::label('SignUp',''); ?>
		    </div><br>		    
		 
		<?php echo CHtml::endForm(); ?>

	</div>
	
	<div style="width:2px; height:400px; background: grey; display:inline-block; margin-top:50px"></div> 
	<div id="SignInDiv" style="border:1px solid">
		<span class="loginImageSpan"><a href="loginFacebook"><img src="../images/facebook.png"/></a><span>
		<span class="loginImageSpan"><img src="../images/google.png"/><span>
		<span class="loginImageSpan"><img src="../images/twitter.png"/><span>	
	</div>	
</div>
<br/>