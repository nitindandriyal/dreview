<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="language" content="en" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600"/>
<link rel="stylesheet" type="text/css" href="css/main.css" />
<link rel="stylesheet" type="text/css" href="css/googleapi_style.css" />
<link rel="stylesheet" type="text/css" href="css/dr_style.css" />
<link rel="stylesheet" type="text/css" href="css/normalize.css" />
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

	<nav id="nav">
		<a href="/" id="logo"> <img src="" class="img-responsive" />
		</a>

		<div id="nav-top-items">
			<a href="/user/signup" rel="auth-require" data-tab="signup"
				class="btn btn-cta" id="nav-login-button">Join</a> <a
				href="/user/login" rel="auth-require" data-tab="login"
				id="nav-signin-button">Sign in</a> <span id="nav-mobile-menu"
				class="dropdown-toggle nav-item-dropdown" data-toggle="dropdown"
				data-target="#main-nav-phone"> <span class="icon icon-mobile-menu"></span>
			</span>
		</div>

		<div class="dropdown-menu-mobile" id="main-nav-phone">
			<ul id="main-nav">
				<li><a href="/find"
					data-gtm='{"event":"navlink:find-a-doctor","state":"navlink","action":"click","widget":"nav"}'>Find
						a Doctor</a>
				</li>
				<li><a href="/review/create" class="link-icon"
					data-gtm='{"event":"navlink:write-a-review","state":"navlink","action":"click","widget":"nav"}'>
						<span class="icon icon-edit hidden-xs-inline"></span> <span
						class="icon icon-edit-white visible-xs-inline"></span> <span
						class="link">Write a Review</span>
				</a></li>
			</ul>

			<a href="/user/signup" rel="auth-require" data-tab="signup"
				class="dropdown-menu-item visible-xs">Sign In / Join</a>
		</div>

	</nav>

	<div id="content">
		<div class="input-container">
			<div id="header">
				<div id="home-hero-image" class="aspect-ratio">
					<div class="content"></div>
				</div>
				<div id="home-tagline">
					<form action="/search/results" class="form-base form-large"
						id="rs-home-hero-search">
						<table align="center">
							<tr align="left">
								<th>Select By Speciality</th>&nbsp;
								<th>Select By Address</th>
							</tr>
							<tr>
								<td><input type="text"
									placeholder="type or select by speciality" autocomplete="off"
									maxlength="30" size="40">
								</td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<td><input type="text" placeholder="type or select by Address"
									autocomplete="off" maxlength="30" size="40">
								</td>
								<td><button class="btn btn-search-cta btn-sm" type="submit">Search</button>
								</td>
							</tr>
						</table>				
				</div>
			</div>
		</div>
	</div>


	<div class="container page-section">
		<h3>Doctor By Speciality</h3>
		<div id="all-local-landing-pages" class="widget-item-list row">

			<div class="col-sm-3">
				<ul class='list-unstyled list-spaceless'>
					<li><a href="/">Allergy & Immunology</a>
					</li>
					<li><a href="/">Cardiology</a>
					</li>
					<li><a href="/">Chiropractic</a>
					</li>
					<li><a href="/">Clinical Psychology</a>
					</li>
					<li><a href="/">Dentistry</a>
					</li>
					<li><a href="/">Dermatology</a>
					</li>
					<li><a href="/">Ear, Nose and Throat</a>
					</li>
					<li><a href="/">Endocrinology, Diabetes & Metabolism</a>
					</li>

				</ul>
			</div>

			<div class="col-sm-3">


				<ul class='list-unstyled list-spaceless'>
					<li><a href="/">Family Medicine</a>
					</li>
					<li><a href="/">Gastroenterology</a>
					</li>
					<li><a href="/">General Surgery</a>
					</li>
					<li><a href="/">Geriatric Medicine</a>
					</li>
					<li><a href="/">Hematology</a>
					</li>
					<li><a href="/">Internal Medicine</a>
					</li>
					<li><a href="/">Nephrology</a>
					</li>
					<li><a href="/">Neurology</a>
					</li>
				</ul>
			</div>

			<div class="col-sm-3">


				<ul class='list-unstyled list-spaceless'>
					<li><a href="/">Neurosurgery</a>
					</li>

					<li><a href="/">Obstetrics & Gynecology</a>
					</li>
					<li><a href="/">Ophthalmology</a>
					</li>

					<li><a href="/">Orthopedic Surgery</a>
					</li>
					<li><a href="/">Pain Medicine</a>
					</li>

					<li><a href="/">Pediatrics</a>
					</li>
					<li><a href="/">Plastic Surgery</a>
					</li>

				</ul>

			</div>

			<div class="col-sm-3">


				<ul class='list-unstyled list-spaceless'>
					<li><a href="/">Psychiatry</a>
					</li>

					<li><a href="/">Psychology</a>
					</li>
					<li><a href="/">Pulmonology</a>
					</li>

					<li><a href="/">Rheumatology</a>
					</li>
					<li><a href="/">Social Work</a>
					</li>

					<li><a href="/">Sports Medicine</a>
					</li>
					<li><a href="/">Urology</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="container page-section">
		<h3>Doctor By City</h3>
		<div id="all-local-landing-pages" class="widget-item-list row">

			<div class="col-sm-3">


				<ul class='list-unstyled list-spaceless'>
					<li><a href="/">Agra</a>
					</li>

					<li><a href="/">Ahmedabad</a>
					</li>
					<li><a href="/">Amritsar</a>
					</li>

					<li><a href="/">Bangalore</a>
					</li>
					<li><a href="/">Bareilly</a>
					</li>

					<li><a href="/">Bhopal</a>
					</li>
					<li><a href="/">Bhubaneswar</a>
					</li>
					<li><a href="/">Chandigarh</a>
					</li>

					<li><a href="/">Chennai</a>
					</li>


				</ul>
			</div>

			<div class="col-sm-3">


				<ul class='list-unstyled list-spaceless'>
					<li><a href="/">Chennai</a>
					</li>
					<li><a href="/">Dehradun</a>
					</li>
					<li><a href="/">Delhi</a>
					</li>
					<li><a href="/">Ghaziabad</a>
					</li>

					<li><a href="/">Gurgaon</a>
					</li>
					<li><a href="/">Guwahati</a>
					</li>
					<li><a href="/">Hyderabad</a>
					</li>

					<li><a href="/">Jaipur</a>
					</li>

				</ul>
			</div>

			<div class="col-sm-3">


				<ul class='list-unstyled list-spaceless'>

					<li><a href="/">Kanpur</a>
					</li>
					<li><a href="/">Kolkata</a>
					</li>
					<li><a href="/">Lucknow</a>
					</li>

					<li><a href="/">Mumbai</a>
					</li>
					<li><a href="/">Nagpur</a>
					</li>
					<li><a href="/">Navi Mumbai</a>
					</li>
					<li><a href="/">New Delhi</a>
					</li>

					<li><a href="/">Noida</a>
					</li>




				</ul>

			</div>

			<div class="col-sm-3">


				<ul class='list-unstyled list-spaceless'>
					<li><a href="/">Puducherry</a>
					</li>
					<li><a href="/">Pune</a>
					</li>

					<li><a href="/">Tiruchirappalli</a>
					</li>
					<li><a href="/">Trivandrum</a>
					</li>

					<li><a href="/">Tripura (TR)</a>
					</li>
					<li><a href="/">Varanasi</a>
					</li>

					<li><a href="/">Vijayawada</a>
					</li>
					<li><a href="/">Visakhapatnam</a>
					</li>
				</ul>
			</div>

		</div>
	</div>

	<div class="container page-section">
		<h3>Doctor By State</h3>
		<div id="all-local-landing-pages" class="widget-item-list row">

			<div class="col-sm-3">


				<ul class='list-unstyled list-spaceless'>
					<li><a href="/">Andhra Pradesh (AP)</a>
					</li>

					<li><a href="/">Arunachal Pradesh (AR)</a>
					</li>
					<li><a href="/">Assam (AS)</a>
					</li>

					<li><a href="/">Bihar (BR)</a>
					</li>
					<li><a href="/">Chhattisgarh (CG)</a>
					</li>

					<li><a href="/">Goa (GA)</a>
					</li>
					<li><a href="/">Gujarat (GJ)</a>
					</li>

				</ul>
			</div>

			<div class="col-sm-3">


				<ul class='list-unstyled list-spaceless'>
					<li><a href="/">Haryana (HR)</a>
					</li>

					<li><a href="/">Himachal Pradesh (HP)</a>
					</li>
					<li><a href="/">Jammu and Kashmir (JK)</a>
					</li>

					<li><a href="/">Jharkhand (JH)</a>
					</li>
					<li><a href="/">Karnataka (KA)</a>
					</li>

					<li><a href="/">Kerala (KL)</a>
					</li>
					<li><a href="/">Madhya Pradesh (MP)</a>
					</li>
				</ul>
			</div>

			<div class="col-sm-3">


				<ul class='list-unstyled list-spaceless'>
					<li><a href="/">Maharashtra (MH)</a>
					</li>

					<li><a href="/">Manipur (MN)</a>
					</li>
					<li><a href="/">Meghalaya (ML)</a>
					</li>

					<li><a href="/">Mizoram (MZ)</a>
					</li>
					<li><a href="/">Nagaland (NL)</a>
					</li>

					<li><a href="/">Odisha(OR)</a>
					</li>
					<li><a href="/">Punjab (PB)</a>
					</li>

				</ul>

			</div>

			<div class="col-sm-3">


				<ul class='list-unstyled list-spaceless'>
					<li><a href="/">Rajasthan (RJ)</a>
					</li>

					<li><a href="/">Sikkim (SK)</a>
					</li>
					<li><a href="/">Tamil Nadu (TN)</a>
					</li>

					<li><a href="/">Tripura (TR)</a>
					</li>
					<li><a href="/">Uttar Pradesh (UP)</a>
					</li>

					<li><a href="/">Uttarakhand (UK)</a>
					</li>
					<li><a href="/">West Bengal (WB)</a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="container page-section">
		<h3>Popular Treatment Locations</h3>
		<br>
		<div id="all-local-landing-pages" class="widget-item-list row">

			<div class="col-sm-3">
				<h3>Banglore</h3>

				<ul class='list-unstyled list-spaceless'>
					<li><a href="/">Cardiology</a>
					</li>
					<li><a href="/">Ear, Nose and Throat</a>
					</li>
					<li><a href="/">General Surgery</a>
					</li>
					<li><a href="/">Neurology</a>
					</li>
					<li><a href="/">Neurosurgery</a>
					</li>
					<li><a href="/">Obstetrics & Gynecology</a>
					</li>
					<li><a href="/">Urology</a>
					</li>
				</ul>
			</div>

			<div class="col-sm-3">
				<h3>Delhi</h3>

				<ul class='list-unstyled list-spaceless'>
					<li><a href="/">Cardiology</a>
					</li>
					<li><a href="/">Ear, Nose and Throat</a>
					</li>
					<li><a href="/">General Surgery</a>
					</li>
					<li><a href="/">Neurology</a>
					</li>
					<li><a href="/">Neurosurgery</a>
					</li>
					<li><a href="/">Obstetrics & Gynecology</a>
					</li>
					<li><a href="/">Urology</a>
					</li>
				</ul>
			</div>

			<div class="col-sm-3">
				<h3>Mumbai</h3>

				<ul class='list-unstyled list-spaceless'>
					<li><a href="/">Cardiology</a>
					</li>
					<li><a href="/">Ear, Nose and Throat</a>
					</li>
					<li><a href="/">General Surgery</a>
					</li>
					<li><a href="/">Neurology</a>
					</li>
					<li><a href="/">Neurosurgery</a>
					</li>
					<li><a href="/">Obstetrics & Gynecology</a>
					</li>
					<li><a href="/">Urology</a>
					</li>
				</ul>

			</div>

			<div class="col-sm-3">
				<h3>Kolkata</h3>

				<ul class='list-unstyled list-spaceless'>
					<li><a href="/">Cardiology</a>
					</li>
					<li><a href="/">Ear, Nose and Throat</a>
					</li>
					<li><a href="/">General Surgery</a>
					</li>
					<li><a href="/">Neurology</a>
					</li>
					<li><a href="/">Neurosurgery</a>
					</li>
					<li><a href="/">Obstetrics & Gynecology</a>
					</li>
					<li><a href="/">Urology</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
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
