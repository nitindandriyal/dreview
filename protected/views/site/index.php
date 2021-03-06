<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div id="content">
	<div class="input-container">
		<div id="home-hero-image" class="aspect-ratio"></div>
		<div id="home-tagline">
			<form action="/search/results" class="form-base form-large"
				id="rs-home-hero-search">
				<table class="tablefront">
					<tr>
						<td><input type="text" placeholder="Search by speciality"
							autocomplete="off" maxlength="30" size="40">
						</td>
						<td><input type="text" placeholder="Search by Address"
							autocomplete="off" maxlength="30" size="40">
						</td>
						<td><button class="btn btn-search-cta btn-sm" type="submit">Search</button>
						</td>
					</tr>
				</table>
			</form>

		</div>
	</div>
</div>
<div class="container">
	<br>
	<h3>Doctor By Speciality</h3>
	<br>
	<div class="widget-item-list row">

		<div class="col-sm-3">
			<ul class='list-unstyled list-spaceless'>
				<li><a href="/?r=find/allergyImmunology"> Allergy & Immunology</a>
				</li>
				<li><a href="dr_by_spec_next.php/?r=find/cardiology">Cardiology</a>
				</li>
				<li><a href="dr_by_spec_next.php?speciality=chiropractic">Chiropractic</a>
				</li>
				<li><a href="dr_by_spec_next.php?speciality=clinicalPsychology">Clinical
						Psychology</a>
				</li>
				<li><a href="dr_by_spec_next.php?speciality=dentistry">Dentistry</a>
				</li>
				<li><a href="dr_by_spec_next.php?speciality=dermatology">Dermatology</a>
				</li>
				<li><a href="dr_by_spec_next.php?speciality=earNoseAndThroat">Ear,
						Nose and Throat</a>
				</li>
				<li><a
					href="dr_by_spec_next.php?speciality=endocrinologyDiabetesMetabolism">Endocrinology</a>
				</li>
			</ul>
		</div>

		<div class="col-sm-3">
			<ul class='list-unstyled list-spaceless'>
				<li><a href="dr_by_spec_next.php?speciality=familyMedicine">Family
						Medicine</a>
				</li>
				<li><a href="dr_by_spec_next.php?speciality=gastroenterology">Gastroenterology</a>
				</li>
				<li><a href="dr_by_spec_next.php?speciality=generalSurgery">General
						Surgery</a>
				</li>
				<li><a href="dr_by_spec_next.php?speciality=geriatricMedicine">Geriatric
						Medicine</a>
				</li>
				<li><a href="dr_by_spec_next.php?speciality=hematology">Hematology</a>
				</li>
				<li><a href="dr_by_spec_next.php?speciality=internalMedicine">Internal
						Medicine</a>
				</li>
				<li><a href="dr_by_spec_next.php?speciality=nephrology">Nephrology</a>
				</li>
				<li><a href="dr_by_spec_next.php?speciality=neurology">Neurology</a>
				</li>
			</ul>
		</div>

		<div class="col-sm-3">
			<ul class='list-unstyled list-spaceless'>
				<li><a href="dr_by_spec_next.php?speciality=neurosurgery">Neurosurgery</a>
				</li>
				<li><a href="dr_by_spec_next.php?speciality=obstetricsGynecology">Obstetrics & Gynecology</a>
				</li>
				<li><a href="dr_by_spec_next.php?speciality=ophthalmology">Ophthalmology</a>
				</li>
				<li><a href="dr_by_spec_next.php?speciality=orthopedicSurgery">Orthopedic
						Surgery</a>
				</li>
				<li><a href="dr_by_spec_next.php?speciality=painmedicine">Pain Medicine</a>
				</li>
				<li><a href="dr_by_spec_next.php?speciality=pediatrics">Pediatrics</a>
				</li>
				<li><a href="dr_by_spec_next.php?speciality=plasticSurgery">Plastic Surgery</a>
				</li>
			</ul>
		</div>

		<div class="col-sm-3">
			<ul class='list-unstyled list-spaceless'>
				<li><a href="dr_by_spec_next.php?speciality=psychiatry">Psychiatry</a>
				</li>
				<li><a href="dr_by_spec_next.php?speciality=psychology">Psychology</a>
				</li>
				<li><a href="dr_by_spec_next.php?speciality=pulmonology">Pulmonology</a>
				</li>
				<li><a href="dr_by_spec_next.php?speciality=rheumatology">Rheumatology</a>
				</li>
				<li><a href="dr_by_spec_next.php?speciality=socialWork">Social Work</a>
				</li>
				<li><a href="dr_by_spec_next.php?speciality=sportsMedicine">Sports
						Medicine</a>
				</li>
				<li><a href="dr_by_spec_next.php?speciality=urology">Urology</a>
				</li>
			</ul>
		</div>

	</div>
</div>

<div class="container">
	<br>
	<h3>Doctor By City</h3>
	<br>
	<div class="widget-item-list row">

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

<div class="container">
	<br>
	<h3>Doctor By State</h3>
	<br>
	<div class="widget-item-list row">

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

<div class="container">
	<br> <br>
	<h3>Popular Treatment Locations</h3>
	<br>
	<div class="widget-item-list row">
		<div class="col-sm-3">
			<ul class='list-unstyled list-spaceless'>
				<li><h5>Bangalore</h5></li>
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
			<ul class='list-unstyled list-spaceless'>
				<li><h5>Delhi</h5></li>
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
			<ul class='list-unstyled list-spaceless'>
				<li><h5>Mumbai</h5></li>
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
			<ul class='list-unstyled list-spaceless'>
				<li><h5>Kolkata</h5></li>
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
<br>
<br>
<br>
