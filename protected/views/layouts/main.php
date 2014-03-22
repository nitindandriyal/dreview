<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8" />
<meta name="language" content="en" />
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet"
		href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600" />
	<link rel="stylesheet" type="text/css"
		href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css"
		href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css"
		href="<?php echo Yii::app()->request->baseUrl; ?>/css/dr_style.css" />
	<link rel="stylesheet" type="text/css"
		href="<?php echo Yii::app()->request->baseUrl; ?>/css/normalize.css" />
	<title>DReview</title>

</head>
<body>
	<div id="PageTop">
		<div class="logo">
			<img src="../images/logo.jpg" />
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
	<footer class="site-footer">
		<div class="row">
			<ul class="footer-links">
				<li class="foot-link_item">
					<h3>About</h3>
				</li>
				<li class="foot-link_item"><a href="/about-us/">About us</a>
				</li>
				<li class="foot-link_item"><a href="/advertising">Advertise</a>
				</li>
				<li class="foot-link_item"><a href="/legals">Legals</a>
				</li>
				<li class="foot-link_item"><a href="mailto:feedback@dreview.com">Feedback</a>
				</li>
			</ul>
			<ul class="footer-links">
				<li class="foot-link_item">
					<h3>Our Sites</h3>
				</li>
				<li class="foot-link_item"><a href="http://www.learnable.com"
					target="_blank">Learnable</a>
				</li>
				<li class="foot-link_item"><a href="http://reference.dreview.com"
					target="_blank">Reference</a>
				</li>
				<li class="foot-link_item"><a href="/hosting-reviews/"
					target="_blank">Hosting Reviews</a>
				</li>
				<li class="foot-link_item"><a href="/web-foundations/">Web
						Foundations</a>
				</li>
			</ul>

			<ul class="footer-links">
				<li class="foot-link_item">
					<h3>Connect</h3>
				</li>
				<li class="foot-link_item foot-link_item--icons"><a href="/feed"><i
						class="icon-rss icon-blocks icon-blocks--rss"></i> </a> <a
					href="/newsletter"><i
						class="icon-envelope-alt icon-blocks icon-blocks--newsletter"></i>
				</a> <a href="https://www.facebook.com/dreview" target="_blank"><i
						class="icon-facebook icon-blocks icon-blocks--facebook"></i> </a>
					<a href="http://twitter.com/sitepointdotcom" target="_blank"><i
						class="icon-twitter icon-blocks icon-blocks--twitter"></i> </a> <a
					href="https://plus.google.com/+dreview" target="_blank"><i
						class="icon-google-plus icon-blocks icon-blocks--google-plus"></i>
				</a>
				</li>
			
			</ul>
		</div>
		<p></p>
		<div align="center" style="width:100%; margin-left:auto; margin-right: auto; color: #38B7E0; font-size:small; ">&copy; 2014 DReview, Inc. All rights are reserved.</div>
	</footer>

</body>
</html>
