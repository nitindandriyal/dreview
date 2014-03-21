<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8" />
<meta name="language" content="en" />
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/dr_style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/normalize.css" />
	<title>DReview</title>

</head>
<body>
	<div id="PageTop">
	    <div class="logo">
	     	<img src="../images/logo.jpg"/>
	     </div>
		<nav>
			<div class="actions">
				<ul>
					<li><a href="index">Home </a>
					</li>
					<li><a href="find">Find a Doctor</a>
					</li>
					<li><a href="writereview">Write a Review</a>
					</li>
					<li><a href="login" rel="auth-require" data-tab="signup">Sign In</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
	<?php echo $content; ?>
	<div class="clear"></div>

	<div id="footer">
		<div id="footer-text">
			<div align="center">
				<center>
					<p>&copy; 2014 DReview, Inc. All rights are reserved.
				
				</center>
			</div>
		</div>
	</div>

</body>
</html>
