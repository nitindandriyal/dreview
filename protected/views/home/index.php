<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script type="text/javascript">
$(function() {
    $('#tiredOfTypeBtn').click(function() {
    	$('html,body').animate({
            scrollTop: $(".container").offset().top},
            'slow');
    });
});

$(function() {
  $( "#home-tagline" ).tabs();
});

</script>
<div class="top-container" ng-app="slideShowApp">
	<div ng-controller="slideShowCtrl">
		<div id="toggleImageDiv1" ng-show="toggle"></div>
		<div id="toggleImageDiv2" ng-hide="toggle"></div>
	</div>
	<div id="home-tagline" align="center" ng-controller="searchCtrl" ng-init="init()">
		  <ul>
		    <li class="tabs"><a href="#tabDoctor">Doctors</a></li>
		    <li class="tabs"><a href="#tabHospital">Hospitals</a></li>
		    <li class="tabs"><a href="#tabDiagCenter">Diagnostic Centers</a></li>
		  </ul>
		  <div id="tabDoctor">
			<form action="/dreview/doctor/search" >				
				<div class="ui-widget" style="display: inline-block;">
					<input id="searchBySpeciality" type="text" placeholder="Search by Speciality" maxlength="30">
					<input id="searchByLocDoc" type="text" placeholder="Search by Location" maxlength="30">
					<button class="btn" type="submit">Search</button>
				</div>						
			</form>
		  </div>
		  <div id="tabHospital">
			<form action="/dreview/doctor/search" >				
				<div class="ui-widget" style="display: inline-block;">
					<input id="searchBySpeciality" type="text" placeholder="Search by Speciality" maxlength="30">
					<input id="searchByLocHospital" type="text" placeholder="Search by Location" maxlength="30">
					<button class="btn" type="submit">Search</button>
				</div>						
			</form>
		</div>	
		  <div id="tabDiagCenter">
			<form action="/dreview/doctor/search" >				
				<div class="ui-widget" style="display: inline-block;">
					<input id="searchBySpeciality" type="text" placeholder="Search by Tests" maxlength="30">
					<input id="searchByLocDiagCenter" type="text" placeholder="Search by Location" maxlength="30">
					<button class="btn" type="submit">Search</button>
				</div>						
			</form>
		</div>			
	</div>	
	<div align="center">
		<button type="button" id="tiredOfTypeBtn" >Tired of Typing? Use Our One Click Search</button>
	</div>
</div>	

<div id="bottom-container">
	<div class="container">
		<br>
		<h3>Search By Speciality</h3>
		<br>
		<div class="widget-item-list row">
	
				<div class="col-sm-3">
					<ul class='list-unstyled'>
						<li><?php echo CHtml::link('Allergy & Immunology',array('tbl_state_map/index','param1'=>'Allergy & Immunology')); ?></li>
						<li><?php echo CHtml::link('Cardiology',array('tbl_state_map/index','param1'=>'Cardiology')); ?></li>
						<li><?php echo CHtml::link('Chiropractic',array('tbl_state_map/index','param1'=>'Chiropractic')); ?></li>
						<li><?php echo CHtml::link('Clinical Psychology',array('tbl_state_map/index','param1'=>'Clinical Psychology')); ?></li>
						<li><?php echo CHtml::link('Dentistry',array('tbl_state_map/index','param1'=>'Dentistry')); ?></li>
						<li><?php echo CHtml::link('Dermatology',array('tbl_state_map/index','param1'=>'Dermatology')); ?></li>
						<li><?php echo CHtml::link('Ear, Nose and Throat',array('tbl_state_map/index','param1'=>'Ear, Nose and Throat')); ?></li>
						<li><?php echo CHtml::link('Endocrinology, Diabetes & Metabolism',array('tbl_state_map/index','param1'=>'Endocrinology, Diabetes & Metabolism')); ?></li>
					</ul>
				</div>
	
				<div class="col-sm-3">
					<ul class='list-unstyled'>
						<li><?php echo CHtml::link('Family Medicine',array('tbl_state_map/index','param1'=>'Family Medicine')); ?></li>
						<li><?php echo CHtml::link('Gastroenterology',array('tbl_state_map/index','param1'=>'Gastroenterology')); ?></li>
						<li><?php echo CHtml::link('General Surgery',array('tbl_state_map/index','param1'=>'General Surgery')); ?></li>
						<li><?php echo CHtml::link('Geriatric Medicine',array('tbl_state_map/index','param1'=>'Geriatric Medicine')); ?></li>
						<li><?php echo CHtml::link('Hematology',array('tbl_state_map/index','param1'=>'Hematology')); ?></li>
						<li><?php echo CHtml::link('Internal Medicine',array('tbl_state_map/index','param1'=>'Internal Medicine')); ?></li>
						<li><?php echo CHtml::link('Nephrology',array('tbl_state_map/index','param1'=>'Nephrology')); ?></li>
						<li><?php echo CHtml::link('Neurology',array('tbl_state_map/index','param1'=>'Neurology')); ?>
						</li>
					</ul>
				</div>
	
				<div class="col-sm-3">
					<ul class='list-unstyled'>
						<li><?php echo CHtml::link('Neurosurgery',array('tbl_state_map/index','param1'=>'Neurosurgery')); ?></li>
	                    <li><?php echo CHtml::link('Obstetrics & Gynecology',array('tbl_state_map/index','param1'=>'Obstetrics & Gynecology')); ?></li>
						<li><?php echo CHtml::link('Ophthalmology',array('tbl_state_map/index','param1'=>'Ophthalmology')); ?></li>
	                 	<li><?php echo CHtml::link('Orthopedic Surgery',array('tbl_state_map/index','param1'=>'Orthopedic Surgery')); ?></li>
						<li><?php echo CHtml::link('Pain Medicine',array('tbl_state_map/index','param1'=>'Pain Medicine')); ?></li>
	                    <li><?php echo CHtml::link('Pediatrics',array('tbl_state_map/index','param1'=>'Pediatrics')); ?>
	
						<li><?php echo CHtml::link('Pediatrics',array('tbl_state_map/index','param1'=>'Pediatrics')); ?>
	
						</li>
						<li><?php echo CHtml::link('Plastic Surgery',array('tbl_state_map/index','param1'=>'Plastic Surgery')); ?>
						</li>
					</ul>
				</div>
				
				<div class="col-sm-3">
					<ul class='list-unstyled'>
						<li><?php echo CHtml::link('Psychiatry',array('tbl_state_map/index','param1'=>'Psychiatry')); ?>
						</li>
	
						<li><?php echo CHtml::link('Psychology',array('tbl_state_map/index','param1'=>'Psychology')); ?>
	
						<li><?php echo CHtml::link('Psychology',array('tbl_state_map/index','param1'=>'Psychology')); ?>
	
						</li>
						<li><?php echo CHtml::link('Pulmonology',array('tbl_state_map/index','param1'=>'Pulmonology')); ?>
						</li>
	
	
						<li><?php echo CHtml::link('Rheumatology',array('tbl_state_map/index','param1'=>'Rheumatology')); ?>
	
						<li><?php echo CHtml::link('Rheumatology',array('tbl_state_map/index','param1'=>'Rheumatology')); ?>
	
						</li>
						<li><?php echo CHtml::link('Social Work',array('tbl_state_map/index','param1'=>'Social Work')); ?>
						</li>
					<li><?php echo CHtml::link('Sports Medicine',array('tbl_state_map/index','param1'=>'Sports Medicine')); ?>
	
						
	
						</li>
						<li><?php echo CHtml::link('Urology',array('tbl_state_map/index','param1'=>'Urology')); ?>
						</li>
					</ul>
				</div>
				
			</div>
		</div>
	
		<div class="container">
	<br>
			<h3>Search By City</h3>
	<br>		<div class="widget-item-list row">
	
				<div class="col-sm-3">
	
	
					<ul class='list-unstyled'>
						<li><?php echo CHtml::link('Agra',array('tbl_doc_qualification/index','param1'=>'Agra')); ?>
						</li>
	
						<li><?php echo CHtml::link('Ahmedabad',array('tbl_doc_qualification/index','param1'=>'Ahmedabad')); ?>
						</li>
						<li><?php echo CHtml::link('Amritsar',array('tbl_doc_qualification/index','param1'=>'Amritsar')); ?>
						</li>
	
						<li><?php echo CHtml::link('Bangalore',array('tbl_doc_qualification/index','param1'=>'Bangalore')); ?>
						</li>
						<li><?php echo CHtml::link('Bareilly',array('tbl_doc_qualification/index','param1'=>'Bareilly')); ?>
						</li>
	
						<li><?php echo CHtml::link('Bhopal',array('tbl_doc_qualification/index','param1'=>'Bhopal')); ?></li>
						<li><?php echo CHtml::link('Bhubaneswar',array('tbl_doc_qualification/index','param1'=>'Bhubaneswar')); ?></li>
						<li><?php echo CHtml::link('Chandigarh',array('tbl_doc_qualification/index','param1'=>'Chandigarh')); ?></li>
	                    <li><?php echo CHtml::link('Chennai',array('tbl_doc_qualification/index','param1'=>'Chennai')); ?></li>
	
	
					</ul>
				</div>
	
				<div class="col-sm-3">
	
	
					<ul class='list-unstyled'>
						<li><?php echo CHtml::link('Chennai',array('tbl_doc_qualification/index','param1'=>'Chennai')); ?></li>
						<li><?php echo CHtml::link('Dehradun',array('tbl_doc_qualification/index','param1'=>'Dehradun')); ?></li>
						<li><?php echo CHtml::link('Delhi',array('tbl_doc_qualification/index','param1'=>'Delhi')); ?></li>
						<li><?php echo CHtml::link('Ghaziabad',array('tbl_doc_qualification/index','param1'=>'Ghaziabad')); ?></li>
	                    <li><?php echo CHtml::link('Gurgaon',array('tbl_doc_qualification/index','param1'=>'Gurgaon')); ?></li>
						<li><?php echo CHtml::link('Guwahati',array('tbl_doc_qualification/index','param1'=>'Guwahati')); ?></li>
						<li><?php echo CHtml::link('Hyderabad',array('tbl_doc_qualification/index','param1'=>'Hyderabad')); ?></li>
						<li><?php echo CHtml::link('Jaipur',array('tbl_doc_qualification/index','param1'=>'Jaipur')); ?></li>
	
					</ul>
				</div>
	
				<div class="col-sm-3">
					<ul class='list-unstyled'>
						<li><?php echo CHtml::link('Kanpur',array('tbl_doc_qualification/index','param1'=>'Kanpur')); ?></li>
						<li><?php echo CHtml::link('Kolkata',array('tbl_doc_qualification/index','param1'=>'Kolkata')); ?></li>
						<li><?php echo CHtml::link('Lucknow',array('tbl_doc_qualification/index','param1'=>'Lucknow')); ?></li>
						<li><?php echo CHtml::link('Mumbai',array('tbl_doc_qualification/index','param1'=>'Mumbai')); ?></li>
						<li><?php echo CHtml::link('Nagpur',array('tbl_doc_qualification/index','param1'=>'Nagpur')); ?></li>
						<li><?php echo CHtml::link('Navi Mumbai',array('tbl_doc_qualification/index','param1'=>'Navi Mumbai')); ?></li>
						<li><?php echo CHtml::link('New Delhi',array('tbl_doc_qualification/index','param1'=>'New Delhi')); ?></li>
						<li><?php echo CHtml::link('Noida',array('tbl_doc_qualification/index','param1'=>'Noida')); ?></li>
					</ul>
				</div>
	
				<div class="col-sm-3">
					<ul class='list-unstyled'>
						<li><?php echo CHtml::link('Puducherry',array('tbl_doc_qualification/index','param1'=>'Puducherry')); ?></li>
						<li><?php echo CHtml::link('Pune',array('tbl_doc_qualification/index','param1'=>'Pune')); ?></li>
						<li><?php echo CHtml::link('Tiruchirappalli',array('tbl_doc_qualification/index','param1'=>'Tiruchirappalli')); ?></li>
						<li><?php echo CHtml::link('Trivandrum',array('tbl_doc_qualification/index','param1'=>'Trivandrum')); ?></li>
						<li><?php echo CHtml::link('Tripura (TR)',array('tbl_doc_qualification/index','param1'=>'Tripura (TR)')); ?></li>
						<li><?php echo CHtml::link('Varanasi',array('tbl_doc_qualification/index','param1'=>'Varanasi')); ?></li>
						<li><?php echo CHtml::link('Vijayawada',array('tbl_doc_qualification/index','param1'=>'Vijayawada')); ?></li>
						<li><?php echo CHtml::link('Visakhapatnam',array('tbl_doc_qualification/index','param1'=>'Visakhapatnam')); ?></li>
					</ul>
				</div>
	
		</div>
	</div>
	
	<div class="container">
		<br>
		<h3>Search By State</h3>
		<br>
		<div class="widget-item-list row">
	
			<div class="col-sm-3">
	
	
					<ul class='list-unstyled'>
						<li><?php echo CHtml::link('Andhra Pradesh (AP)',array('tbl_state_map/state','param1'=>'Andhra Pradesh (AP)')); ?></li>
	
						<li><?php echo CHtml::link('Arunachal Pradesh (AR)',array('tbl_state_map/state','param1'=>'Arunachal Pradesh (AR)')); ?>
						</li>
						<li><?php echo CHtml::link('Assam (AS)',array('tbl_state_map/state','param1'=>'Assam (AS)')); ?></li>
	
						<li><?php echo CHtml::link('Bihar (BR)',array('tbl_state_map/state','param1'=>'Bihar (BR)')); ?>
						</li>
						<li><li><?php echo CHtml::link('Chhattisgarh (CG)',array('tbl_state_map/state','param1'=>'Chhattisgarh (CG)')); ?>
						</li>
	
						<li><?php echo CHtml::link('Goa (GA)',array('tbl_state_map/state','param1'=>'Goa (GA)')); ?>
						</li>
						<li><?php echo CHtml::link('Gujarat (GJ)',array('tbl_state_map/state','param1'=>'Gujarat (GJ)')); ?>
						</li>
	
				</ul>
			</div>
	
			<div class="col-sm-3">
	
	
					<ul class='list-unstyled'>
						<li><?php echo CHtml::link('Haryana (HR)',array('tbl_state_map/state','param1'=>'Haryana (HR)')); ?>
						</li>
	
						<li><?php echo CHtml::link('Himachal Pradesh (HP)',array('tbl_state_map/state','param1'=>'Himachal Pradesh (HP)')); ?>
						</li>
						<li><?php echo CHtml::link('Jammu and Kashmir (JK)',array('tbl_state_map/state','param1'=>'Jammu and Kashmir (JK)')); ?>
						</li>
	
						<li><?php echo CHtml::link('Jharkhand (JH)',array('tbl_state_map/state','param1'=>'Jharkhand (JH)')); ?>
						</li>
						<li><?php echo CHtml::link('Karnataka (KA)',array('tbl_state_map/state','param1'=>'Karnataka (KA)')); ?>
						</li>
	
						<li><?php echo CHtml::link('Kerala (KL)',array('tbl_state_map/state','param1'=>'Kerala (KL)')); ?>
						</li>
						<li><?php echo CHtml::link('Madhya Pradesh (MP)',array('tbl_state_map/state','param1'=>'Madhya Pradesh (MP)')); ?>
						</li>
					</ul>
				</div>
	
			<div class="col-sm-3">
	
	
					<ul class='list-unstyled'>
						<li><?php echo CHtml::link('Maharashtra (MH)',array('tbl_state_map/state','param1'=>'Maharashtra (MH)')); ?>
						</li>
	
						<li><?php echo CHtml::link('Manipur (MN)',array('tbl_state_map/state','param1'=>'Manipur (MN)')); ?>
						</li>
						<li><?php echo CHtml::link('Meghalaya (ML)',array('tbl_state_map/state','param1'=>'Meghalaya (ML)')); ?>
						</li>
	
						<li><?php echo CHtml::link('Mizoram (MZ)',array('tbl_state_map/state','param1'=>'Mizoram (MZ)')); ?>
						</li>
						<li><?php echo CHtml::link('Nagaland (NL)',array('tbl_state_map/state','param1'=>'Nagaland (NL)')); ?>
						</li>
	
						<li><?php echo CHtml::link('Odisha(OR)',array('tbl_state_map/state','param1'=>'Odisha(OR)')); ?>
						</li>
						<li><?php echo CHtml::link('Punjab (PB)',array('tbl_state_map/state','param1'=>'Punjab (PB)')); ?>
						</li>
	
				</ul>
	
			</div>
	
			<div class="col-sm-3">
	
	
					<ul class='list-unstyled'>
						<li><?php echo CHtml::link('Rajasthan (RJ)',array('tbl_state_map/state','param1'=>'Rajasthan (RJ)')); ?>
						</li>
	
						<li><?php echo CHtml::link('Sikkim (SK)',array('tbl_state_map/state','param1'=>'Sikkim (SK)')); ?>
						</li>
						<li><?php echo CHtml::link('Tamil Nadu (TN)',array('tbl_state_map/state','param1'=>'Tamil Nadu (TN)')); ?>
						</li>
	
						<li><?php echo CHtml::link('Tripura (TR)',array('tbl_state_map/state','param1'=>'Tripura (TR)')); ?>
						</li>
						<li><?php echo CHtml::link('Uttar Pradesh (UP)',array('tbl_state_map/state','param1'=>'Uttar Pradesh (UP)')); ?>
						</li>
	
						<li><?php echo CHtml::link('Uttarakhand (UK)',array('tbl_state_map/state','param1'=>'Uttarakhand (UK)')); ?>
						</li>
						<li><?php echo CHtml::link('West Bengal (WB)',array('tbl_state_map/state','param1'=>'West Bengal (WB)')); ?>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
<br>
<br>
<br>
