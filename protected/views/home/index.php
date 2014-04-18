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
				<form id="tabDoctorForm" action="/doctor/DocSearch" method="post">				
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
				<ul> 
					<li id="locationList" ng-repeat="getStates in locations"><a ng-click="setLocation(getStates.state);toggleDivDisplay('selectLocationList')"><b>{{getStates.state}}</b></a>
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
							<li><a ng-click="submitSearch('Allergy & Immunology', searchLocation)">Allergy & Immunology</a></li>
							<li><a ng-click="submitSearch('Cardiology', searchLocation)">Cardiology</a></li>
							<li><a ng-click="submitSearch('Chiropractic', searchLocation)">Chiropractic</a></li>
							<li><a ng-click="submitSearch('Clinical Psychology', searchLocation)">Clinical Psychology</a></li>
							<li><a ng-click="submitSearch('Dentistry', searchLocation)">Dentistry</a></li>
							<li><a ng-click="submitSearch('Dermatology', searchLocation)">Dermatology</a></li>
							<li><a ng-click="submitSearch('Ear, Nose and Throat', searchLocation)">Ear, Nose and Throat</a></li>
							<li><a ng-click="submitSearch('Endocrinology, Diabetes & Metabolism', searchLocation)">Endocrinology, Diabetes & Metabolism</a></li>
						</ul>
					</div>
		
					<div class="col-sm-3">
						<ul class='list-unstyled'>
							<li><a ng-click="submitSearch('Family Medicine', searchLocation)">Family Medicine</a></li>
							<li><a ng-click="submitSearch('Gastroenterology', searchLocation)">Gastroenterology</a></li>
							<li><a ng-click="submitSearch('General Surgery', searchLocation)">General Surgery</a></li>
							<li><a ng-click="submitSearch('Geriatric Medicine', searchLocation)">Geriatric Medicine</a></li>
							<li><a ng-click="submitSearch('Hematology', searchLocation)">Hematology</a></li>
							<li><a ng-click="submitSearch('Internal Medicine', searchLocation)">Internal Medicine</a></li>
							<li><a ng-click="submitSearch('Nephrology', searchLocation)">Nephrology</a></li>
							<li><a ng-click="submitSearch('Neurology', searchLocation)">Neurology</a>
							</li>
						</ul>
					</div>
		
					<div class="col-sm-3">
						<ul class='list-unstyled'>
							<li><a ng-click="submitSearch('Neurosurgery', searchLocation)">Neurosurgery</a></li>
		                    <li><a ng-click="submitSearch('Obstetrics & Gynecology', searchLocation)">Obstetrics & Gynecology</a></li>
							<li><a ng-click="submitSearch('Ophthalmology', searchLocation)">Ophthalmology</a></li>
		                 	<li><a ng-click="submitSearch('Orthopedic Surgery', searchLocation)">Orthopedic Surgery</a></li>
							<li><a ng-click="submitSearch('Pain Medicine', searchLocation)">Pain Medicine</a></li>		
							<li><a ng-click="submitSearch('Pediatrics', searchLocation)">Pediatrics</a></li>
							<li><a ng-click="submitSearch('Plastic Surgery', searchLocation)">Plastic Surgery</a>
							</li>
						</ul>
					</div>
					
					<div class="col-sm-3">
						<ul class='list-unstyled'>
							<li><a ng-click="submitSearch('Psychiatry', searchLocation)">Psychiatry</a></li>						
							<li><a ng-click="submitSearch('Psychology', searchLocation)">Psychology</a></li>
							<li><a ng-click="submitSearch('Pulmonology', searchLocation)">Pulmonology</a></li>							
							<li><a ng-click="submitSearch('Rheumatology', searchLocation)">Rheumatology</a></li>
							<li><a ng-click="submitSearch('Social Work', searchLocation)">Social Work</a></li>
							<li><a ng-click="submitSearch('Sports Medicine', searchLocation)">Sports Medicine</a></li>
							<li><a ng-click="submitSearch('Urology', searchLocation)">Urology</a></li>
						</ul>
					</div>
					
				</div>
			</div>
			
		<div class="container" ng-init="getLocations()">
			<br>
			<h3>Search By Location</h3>
			<div class="widget-item-list row">
				<div class="col-sm-3" ng-repeat="getStates in locations">
					<ul> 
						<li id="locationList"><a ng-click="submitSearch('', getStates.state)"><b>{{getStates.state}}</b></a>
							<ul style="list-style-type: disc;">
								<li ng-repeat="getCities in getStates.cities"><a ng-click="submitSearch('', getCities.city)">{{getCities.city}}<a>
									<ul style="list-style-type: disc;">
										<li ng-repeat="getAreas in getCities.areas"><a ng-click="submitSearch('', getAreas.area)">{{getAreas.area}}<a></li>
									</ul>
								</li>
							</ul>					
						</li>					
					</ul>
				</div>
			</div>		
		</div>			
	</div>
</div>

<br>
<br>
<br>
