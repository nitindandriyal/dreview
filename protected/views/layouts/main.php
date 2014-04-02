<?php 
$user = Yii::app()->user->id;

if(null == $user  || !array_filter($user))
{
	if(isset($_SESSION['email']))
	{
		$user = array('email' => $_SESSION['email'], 
				'username' => $_SESSION['username']);
	}
}

//echo $user["username"];
//echo $user["email"];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8" />
<meta name="language" content="en" />
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
<link href="/favicon.ico" rel="shortcut icon"/>
<link href="/favicon.png" rel="icon" type="image/png"/>
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/dr_style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/normalize.css" />
	<title>DReview</title>
	<script language="javaScript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>
	
</head>
<body>
	<div id="blanket" style="display:none;"></div>
		<div id="SignInPopUpdiv" class="SignInPopUpdiv" style="display:none;">    
			<div class="innerRow">
				<form action="/dreview/profile/logout">
					<button class="btn" type="submit">Log Out</button>
				</form>				
			</div>
			<div class="innerRow">
				<form action="/dreview/users/profile">
					<button class="btn" type="submit">My Profile</button>
				</form>				
			</div>			
			<div class="innerRow">
	    		<button class="btn" onclick="popup('SignInPopUpdiv')">Close</button>
	    	</div>
	    	
		</div>
	
	<div id="PageTop">
		<div class="logo">
			<img src="../images/logo.jpg" />
		</div>
		<nav>
		<div class="actions">
			<ul>
				<li><a href="/dreview/home/index">Home </a>
				</li>
			<?php 
				if(null != $user && array_filter($user))
				{
			?>
				<li><a href="#" onclick="popup('SignInPopUpdiv')"><?php echo $user["username"]?></a></li>
			<?php				
				}
				else
				{
			?>
				<li><a href="/dreview/profile/login">Login</a>
				</li>
				<li><a href="/dreview/profile/signUp">New User?</a>
				</li>
			<?php
				}
			?>				
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
				<li class="foot-link_item foot-link_item--icons">
					<a href="/feed">
						<i class="icon-rss icon-blocks icon-blocks--rss"></i> 
					</a> 
					<a href="/newsletter">
						<i class="icon-envelope-alt icon-blocks icon-blocks--newsletter"></i>
					</a> 
					<a href="https://www.facebook.com/dreview" target="_blank">
						<i class="icon-facebook icon-blocks icon-blocks--facebook"></i> 
					</a>
					<a href="http://twitter.com/sitepointdotcom" target="_blank">
						<i class="icon-twitter icon-blocks icon-blocks--twitter"></i> 
					</a> 
					<a href="https://plus.google.com/+dreview" target="_blank">
						<i class="icon-google-plus icon-blocks icon-blocks--google-plus"></i>
					</a>
				</li>
			
			</ul>
		</div>
		<p></p>
		<div align="center" style="width:100%; margin-left:auto; margin-right: auto; color: #38B7E0; font-size:small; ">&copy; 2014 DReview, Inc. All rights are reserved.</div>
	</footer>
</body>
</html>