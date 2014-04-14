<link rel="stylesheet"
	href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script
	src="//code.jquery.com/jquery-1.9.1.js"></script>
<script
	src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script
	src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

<script type="text/javascript">
$(function() {
  $( "#search-tabline" ).tabs({
      show: function(e, ui) {
          if (ui.index == 0) {
              google.maps.event.trigger(myMap, "resize");
          }
      }
  });
});

var geocoder;
var map;
function initializeGoogleMap() {
  geocoder = new google.maps.Geocoder();
  var latlng = new google.maps.LatLng(-34.397, 150.644);
  var mapOptions = {
    zoom: 10,
    center: latlng
  }
 
  map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);
  var listenerHandle = google.maps.event.addListener(map, 'idle', function() {
		$mapCanvas.appendTo($("#googleMap"));
		google.maps.event.removeListener(listenerHandle);
  });

  codeAddress();  
}

function codeAddress() {
  var address = document.getElementById('Address').value;
  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
      var marker = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location
      });
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}



function showGetDirections(id) {
    var e = document.getElementById(id);
    
    if(e.style.display == 'block')
       e.style.display = 'none';
    else
       e.style.display = 'block';
}

angular.module('docSearchApp', []);

function docSearchController($scope, $http) {
//test.controller("docSearchController", function($scope){

$scope.ratingArray = [1,2,3,4,5];
$selectedClicked = false;
$scope.doctorSelectedEvent=function(doctors){
    $scope.selectedDoctor = doctors;
    $selectedClicked = true;
}

$scope.$watch('query.GENDER', function() {
    $selectedClicked = false;
    $( "#search-tabline" ).tabs({ active: 0 });
});

$scope.initDoctorSelectedEvent = function(first, selectedClicked, doctors){
	//alert(first + doctors);
	if($selectedClicked)
	{
		return;
	}
	if( first )
	{
    	$scope.selectedDoctor = doctors;
	}
}

$scope.getReviews=function(doctors){
	$scope.url = '/doctor/GetDocReviews?docId='+$scope.selectedDoctor.ID_DOCTOR;
	$http.get($scope.url).
					    success(function(data) 
					    {
					        $scope.reviews = data;					        
					    });
}

$scope.getAppointments=function(doctors){
	$scope.url = '/doctor/GetDocAppointments?docId='+$scope.selectedDoctor.ID_DOCTOR;
	$http.get($scope.url).
					    success(function(data) 
					    {
					        $scope.appointments = data;					        
					    });
}

$scope.exceptEmptyComparator = function (actual, expected) {
    if (!expected) {
       return true;
    }
    return angular.equals(expected, actual);
}

$scope.doctorsData = <?php if(isset($searchResults)){ echo $searchResults; }?>;

$scope.docQualifications = <?php if(isset($docQualifications)){ echo $docQualifications; }?>;
};
    		
</script>

<div class="docSearchContainer" ng-app="docSearchApp"
	ng-controller="docSearchController">
	<div class="docTopContainer">
		<?php if(isset($searchResults)){?>
		<div
			style="width: 40%; position: relative; display: inline-block; height: 100%; float: left;">
			<div style="margin-left: 5px">
				<span style="font-weight: bold; font-size: 12px">Gender</span><br> <select
					style="font-weight: bold; font-size: 12px" ng-model="query.GENDER">
					<option value="">All</option>
					<option value="Female">Female</option>
					<option value="Male">Male</option>
				</select>
			</div>
		</div>
		<?php } else {?>
		<div
			style="width: 45%; position: relative; display: inline-block; height: 100%; float: left;">
			<div style="margin-left: 5px; margin: 28px; float: right;">
				<span style="font-weight: bold; font-size: 18px">Sorry no doctors
					found, Please search Again</span><br>
			</div>
		</div>
		<?php }?>
		<div
			style="width: 55%; position: relative; display: inline-block; height: 50%; float: left; margin-top: 20px"
			ng-controller="searchCtrl" ng-init="init()">
			<form action="/doctor/DocSearch" method="post">
				<input id="searchBySpeciality" class="smallinput"
					name="searchBySpeciality" type="text"
					placeholder="Search by Speciality" maxlength="30"> <input
					id="searchByLocDoc" class="smallinput" name="searchByLocDoc"
					type="text" placeholder="Search by Location" maxlength="30">
				<button class="btn smaller" type="submit" style="margin-top: -3px">Search</button>
			</form>
		</div>
	</div>

	<?php if(isset($searchResults)){?>
	<div class="docLeftContainer">
		<img alt="" src="../images/docnoface.png"
			style="margin-left: 40%; margin-top: -20px">
	</div>

	<div class="docListContainer">
		<div class="docListContainerContent">
			<div id="docListHeader">
				<span style="font-weight: bold;">&nbsp;Order By:</span>
				<ul>
					<li>Name</li>
					<li>Location</li>
					<!-- li>Rating</li-->
				</ul>
			</div>

			<div id="docList" ng-repeat="doctors in doctorsData | filter:query:exceptEmptyComparator"
				ng-click="doctorSelectedEvent(doctors);getReviews(doctors);getAppointments(doctors)">
				{{initDoctorSelectedEvent($first, $selectedClicked, doctors)}} <img
					id="docImage" ng-src="../images/doctors/{{doctors.PROFILE_IMAGE}}" />
				<div id="docSummaryDiv">
					<span style="font-weight: bold;">Dr. {{doctors.FIRST_NAME}}
						{{doctors.LAST_NAME}}</span><br> <span>{{doctors.SPECIALITY}}</span><br>
					<span>{{doctors.AREA}},{{doctors.STATE}}</span><br>
				</div>
				<div
					style="display: inline-block; float: right; margin-right: 15px; margin-top: 2px"
					align="right">
					<img ng-repeat="n in ratingArray | limitTo:doctors.USER_RATING"
						src="../images/star.png" height="16" width="16" /> <img
						ng-repeat="n in ratingArray | limitTo:5-doctors.USER_RATING"
						src="../images/star_off.png" height="16" width="16" /><br> <span>{{doctors.TOTAL_REVIEWS}}
						reviews</span>
				</div>
			</div>
		</div>
	</div>

	<div class="docDetailsContainer">
		<div id="docDetails">
			<div id="docDetailsHeader">
				<span class="span-XLarge">Dr. {{selectedDoctor.FIRST_NAME}}
					{{selectedDoctor.LAST_NAME}}</span><br> <span class="spanMedium">{{selectedDoctor.SPECIALITY}}</span><br>
				<span class="spanMedium" ng-repeat="qualification in docQualifications | filter:selectedDoctor.ID_DOCTOR">{{qualification.QUALIFICATION+' '}}</span><br>
				<span class="spanSmall">{{selectedDoctor.AREA}},{{selectedDoctor.STATE}}</span><br>
				<img ng-repeat="n in [1,2,3,4,5]" src="../images/star.png"
					height="18" width="18" /> <span>{{selectedDoctor.TOTAL_REVIEWS}}
					reviews</span>
			</div>
			<div style="position: relative; float: right;width:150px;height:220px;" align="center">
				<img id="docProfileImage" src="../images/doctors/{{selectedDoctor.PROFILE_IMAGE}}"><p>
				<button class="btn smaller" type="submit">View Details</button>
			</div>
		</div>
		<div id="search-tabline">
			<ul id="tabs_framed">
				<li class="tabs"><a href="#tabAbout">About</a></li>
				<li class="tabs"><a href="#tabAppointments"
					onclick="initializeGoogleMap()"
					ng-click="getAppointments(selectedDoctor)">Appointments & Offices</a>
				</li>
				<li class="tabs"><a href="#tabReviews" ng-click="getReviews(selectedDoctor)">Reviews</a></li>
			</ul>
			<div id="tabAbout" style="height: 100%">
				<br> 
				<span class="spanMedium">Know your doctor</span>
				<p>
				<div class="reviewGlassy">
					<span class="spanSmall">{{selectedDoctor.SUMMARY}}</span>
					<br>
					<hr>
					<span class="spanSmall">Specializes in
						{{selectedDoctor.SPECIALITY}}</span><br> <span class="spanSmall">Can
						speak {{selectedDoctor.LANG_SPOKEN}}</span><br> <span
						class="spanSmall">Is {{selectedDoctor.AGE}} years old</span><br> <span
						class="spanSmall">Has been practising for
						{{selectedDoctor.EXPERIENCE}} years</span><br>
				</div>
				<br><br>
				<span class="spanMedium">Education and Training</span>
				<p>
				<div class="reviewGlassy">
					
				</div>
				<br><br>
				<span class="spanMedium">Awards and Recognitions</span>
				<p>
				<div class="reviewGlassy">
					
				</div>
			</div>


			<div id="tabAppointments">
				<div class="reviewGlassy" ng-repeat="appointment in appointments">
					<span style="font-weight: bold">{{appointment._FROM}}</span><br> <span
						style="font-weight: bold">{{appointment._TO}}</span><br> <span>{{appointment.WORK_DAYS}}</span><br>
					<span class="spanSmall">{{appointment.OFFICE_NAME}}<br>
						{{appointment.AREA}}<br> {{appointment.STATE}}<br> <a
						style="color: olive;" onclick="showGetDirections('getDirections')">Get
							directions</a>
					</span>
				</div>
				<br> <span class="spanMedium">Office Locations</span>
				<ul style="list-style: none">

					<div id="getDirections" style="display: none;">
						<form action="http://maps.google.com/maps" method="get"
							target="_blank">
							<input type="text" name="saddr" class="smallinput"
								placeholder="Enter your location" /> <input id="Address"
								type="hidden" name="daddr"
								value="K C Raju Multispeciality Clinic, 4 th cross,Lingarajapuram,Below Flyover,Hennur main road,, 4th Cross Rd, CMR Layout, Lingarajapuram, Bangalore, Karnataka 560084, India" />
							<input class="btn smaller" type="submit" value="Get directions" />
						</form>
					</div>
				</ul>

				<div id="googleMap"></div>
			</div>

			<div id="tabReviews">
				<br>
				<span class="spanMedium">Recent Reviews for Dr. {{selectedDoctor.FIRST_NAME}}</span>
				<p>			
				<div class="reviewGlassy" ng-repeat="review in reviews">
					<span style="font-weight: bold">{{review.ID_USER}}</span><br> <span
						style="font-weight: bold">{{review.PURPOSE}}</span><br> <span>{{review.REVIEW}}</span><br>
				</div>
				
			</div>
		</div>
	</div>

	<div class="docRightContainer"></div>
	<?php }?>
</div>
