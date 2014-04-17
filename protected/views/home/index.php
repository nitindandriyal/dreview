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
<div id="indexMain" ng-app="slideShowApp">
	<div class="top-container">
		<div ng-controller="slideShowCtrl">
			<div id="toggleImageDiv1" ng-show="toggle"></div>
			<div id="toggleImageDiv2" ng-hide="toggle"></div>
		</div>
		<div id="home-tagline" align="center" ng-controller="searchCtrl" ng-init="init()">
			  <ul>
			    <li class="tabs"><a href="#tabDoctor">Doctors</a></li>
			    <li class="tabs"><a href="#tabHospital">Hospitals</a></li>
			    <li class="tabs"><a href="#tabDiagCenter">Diagnostic Centers</a></li>
			    <li class="tabs"><a href="#tabPharmacy">Pharmacy</a></li>
			    <li class="tabs"><a href="#tabEmergency">Emergency</a></li>
			  </ul>
			  <div id="tabDoctor">
				<form action="/doctor/DocSearch" method="post">				
					<div class="ui-widget" style="display: inline-block;">
						<input id="searchBySpeciality" name="searchBySpeciality" type="text" placeholder="Search by Speciality" maxlength="30">
						<input id="searchByLocDoc" name="searchByLocDoc" type="text" placeholder="Search by Location" maxlength="30">
						<button class="btn" type="submit">Search</button>
					</div>						
				</form>
			  </div>
			  <div id="tabHospital">
				<form action="/doctor/search" method="post">				
					<div class="ui-widget" style="display: inline-block;">
						<input id="searchBySpeciality" type="text" placeholder="Search by Speciality" maxlength="30">
						<input id="searchByLocHospital" type="text" placeholder="Search by Location" maxlength="30">
						<button class="btn" type="submit">Search</button>
					</div>						
				</form>
			</div>	
			<div id="tabDiagCenter">
				<form action="/doctor/search" method="post">				
					<div class="ui-widget" style="display: inline-block;">
						<input id="searchBySpeciality" type="text" placeholder="Search by Tests" maxlength="30">
						<input id="searchByLocDiagCenter" type="text" placeholder="Search by Location" maxlength="30">
						<button class="btn" type="submit">Search</button>
					</div>						
				</form>
			</div>
			<div id="tabPharmacy">
				<form action="/doctor/search" method="post">				
					<div class="ui-widget" style="display: inline-block;">
						<input id="searchBySpeciality" type="text" placeholder="Search by Tests" maxlength="30">
						<input id="searchByLocDiagCenter" type="text" placeholder="Search by Location" maxlength="30">
						<button class="btn" type="submit">Search</button>
					</div>						
				</form>
			</div>
			<div id="tabEmergency">
				<form action="/doctor/search" method="post">				
					<div class="ui-widget" style="display: inline-block;">
						<input id="searchBySpeciality" type="text" placeholder="Search by Tests" maxlength="30">
						<input id="searchByLocDiagCenter" type="text" placeholder="Search by Location" maxlength="30">
						<button class="btn" type="submit">Search</button>
					</div>						
				</form>
			</div>	
		</div>	
		<div align="center">
			<button type="button" id="tiredOfTypeBtn" >Tired of Typing? Use Our On Click Search</button>
		</div>
	</div>	
	
	<div id="bottom-container" ng-controller="onClickSearchController">
		<div class="container">
			<br>
			<h3>Search By Speciality</h3>
			<button type="button" id="clickSearchSelectLoc" ng-click="getLocations();toggleDivDisplay('selectLocationList')">Select Location</button>
			<label>{{selectedlocation}}</label>
			<div id="selectLocationList">
				<ul id="locationList"> 
					<li ng-repeat="getStates in locations"><a ng-click="setLocation(getStates.state);toggleDivDisplay('selectLocationList')"><b>{{getStates.state}}</b></a>
						<ul>
							<li ng-repeat="getCities in getStates.cities"><a ng-click="setLocation(getStates.state,getCities.city);toggleDivDisplay('selectLocationList')">{{getCities.city}}<a>
								<ul>
									<li ng-repeat="getAreas in getCities.areas"><a ng-click="setLocation(getStates.state,getCities.city,getAreas.area);toggleDivDisplay('selectLocationList')">{{getAreas.area}}<a></li>
								</ul>
							</li>
						</ul>					
					</li>					
				</ul>
			</div>		
			<br>
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
							<li><?php echo CHtml::link('Pediatrics',array('tbl_state_map/index','param1'=>'Pediatrics')); ?></li>
							<li><?php echo CHtml::link('Plastic Surgery',array('tbl_state_map/index','param1'=>'Plastic Surgery')); ?>
							</li>
						</ul>
					</div>
					
					<div class="col-sm-3">
						<ul class='list-unstyled'>
							<li><?php echo CHtml::link('Psychiatry',array('tbl_state_map/index','param1'=>'Psychiatry')); ?></li>						
							<li><?php echo CHtml::link('Psychology',array('tbl_state_map/index','param1'=>'Psychology')); ?></li>
							<li><?php echo CHtml::link('Pulmonology',array('tbl_state_map/index','param1'=>'Pulmonology')); ?></li>							
							<li><?php echo CHtml::link('Rheumatology',array('tbl_state_map/index','param1'=>'Rheumatology')); ?></li>
							<li><?php echo CHtml::link('Social Work',array('tbl_state_map/index','param1'=>'Social Work')); ?></li>
							<li><?php echo CHtml::link('Sports Medicine',array('tbl_state_map/index','param1'=>'Sports Medicine')); ?></li>
							<li><?php echo CHtml::link('Urology',array('tbl_state_map/index','param1'=>'Urology')); ?></li>
						</ul>
					</div>
					
				</div>
			</div>
	</div>
</div>

<br>
<br>
<br>
