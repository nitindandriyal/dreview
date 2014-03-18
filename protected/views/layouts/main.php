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
</head>
<body>
	<nav id="nav">
		<a href="/" id="logo"> <img src="images/logo.jpg" class="img-responsive" />
		</a>

		<div id="nav-top-items">
			<a href="/user/signup" rel="auth-require" data-tab="signup"
				class="btn btn-cta" id="nav-login-button">Join</a>
				<a
				href="/user/login" rel="auth-require" data-tab="login"
				id="nav-signin-button">Sign in</a> <span id="nav-mobile-menu"
				class="dropdown-toggle nav-item-dropdown" data-toggle="dropdown"
				data-target="#main-nav-phone"> <span class="icon icon-mobile-menu"></span>
			</span>
		</div>

		<div class="dropdown-menu-mobile" id="main-nav-phone">
			<ul id="main-nav">
			<li><a href="/find"
					data-gtm='{"event":"navlink:find-a-doctor","state":"navlink","action":"click","widget":"nav"}'>Home </a>
				</li>
				<li><a href="/find"
					data-gtm='{"event":"navlink:find-a-doctor","state":"navlink","action":"click","widget":"nav"}'>Find
						a Doctor</a>
				</li>
				<li><a href="/review/create" 
					data-gtm='{"event":"navlink:write-a-review","state":"navlink","action":"click","widget":"nav"}'>
						<span class="icon icon-edit hidden-xs-inline"></span> <span
						class="icon icon-edit-white visible-xs-inline"></span> 
						<span>Write a Review</span>
				</a></li>
			</ul>

			
		   </div>

	</nav>
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
