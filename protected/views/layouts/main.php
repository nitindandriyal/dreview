<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8" />
<meta name="language" content="en" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600"/>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/dr_style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/normalize.css" />
<title>DReview</title>
<script type="text/javascript">
    (function () {
        var win = $(window), timeout, onload, trigger;

        trigger = function () {
            win.trigger('rs_load');
            window.rs_loaded = true;
        };

        onload = function () {
            clearTimeout(timeout);
            trigger();
        };

        timeout = setTimeout(function () {
            win.off('load', onload);
            trigger();
        }, 800);

        win.on('load', onload);
    })();
</script>

<meta name="fb:admins" content="303803, 10700183" />
<meta name="rs:page-format" content="landing" />
<script>window.dataLayer = window.dataLayer || [];</script>
</head>
<body>
<div id="PageTop">
	<nav>
		<ul>
			<li>
				<img src="../images/logo.jpg" class="logo"/>
			</li>
			<li>
				<a href="index">Home </a>
			</li>
			<li><a href="/find"	data-gtm='{"event":"navlink:find-a-doctor","state":"navlink","action":"click","widget":"nav"}'>Find a Doctor</a>
			</li>
			<li><a href="/review/create" 
						data-gtm='{"event":"navlink:write-a-review","state":"navlink","action":"click","widget":"nav"}'>Write a Review
					</a>
			</li>
			</ul>
			<div class="actions">
				<a href="login" rel="auth-require" data-tab="signup">Sign In</a>
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