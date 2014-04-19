<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

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

angular.module('docSearchApp', []);

function docSearchController($scope, $http) {
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
						        $scope.initializeGoogleMap();					        
						    });    
	}
	
	$scope.exceptEmptyComparator = function (actual, expected) {
	    if (!expected) {
	       return true;
	    }
	    return angular.equals(expected, actual);
	}
	
	$scope.getAppointmentChart=function(appointment){	
		var workDays = appointment.WORK_DAYS;
		appChart = new Array(7);
		for ( var i = 0; i < workDays.length; i++ ){
			appChart[i] = new Array(1);		
			if(appointment._FROM != null && workDays.charAt(i) == 1){
				appChart[i][0] = appointment._FROM +"-" + appointment._TO;			  
			}
			else{
				appChart[i][0] = '-';
			}
		}
		return appChart;
	}
	
	var geocoder;
	var map;
	var markersArray = [];
	var bounds;
	var infowindow =  new google.maps.InfoWindow({content: '' });
	$scope.locationCharArray = new Array("A", "B", "C", "D", "E");
	
	$scope.initializeGoogleMap = function() {
	  var address = $scope.appointments[0].ADDRESS;
	  geocoder = new google.maps.Geocoder();
	  bounds = new google.maps.LatLngBounds ();
	  
	  var mapOptions = {
	    zoom: 12,
	  }
	  
	  map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);
	  var listenerHandle = google.maps.event.addListener(map, 'idle', function() {
			$mapCanvas.appendTo($("#googleMap"));
			google.maps.event.removeListener(listenerHandle);
			});
	  
	  var counter = 0;
	  for(i = 0; i < $scope.appointments.length; i++){
		   	geocoder.geocode( { 'address': $scope.appointments[i].ADDRESS}, function(results, status) {
		    if (status == google.maps.GeocoderStatus.OK) 
			{				
		      map.setCenter(results[0].geometry.location);
		      var marker = new google.maps.Marker({
		          map: map,
		          title: $scope.appointments[counter].ADDRESS,
		          icon: "http://www.google.com/mapfiles/marker"+$scope.locationCharArray[counter++]+".png",
		          position: results[0].geometry.location
		      });
	
	          google.maps.event.addListener(marker, 'click', function() {
	              infowindow.setContent(address[0]);
	              infowindow.open(map, this);
	          });	      
		      
	          bounds.extend(results[0].geometry.location);
	          markersArray.push(marker);	 
	          
		    } 
		    else{
		      alert('Geocode was not successful for the following reason: ' + status);
		    }
	
			if (i>1){	
		    	map.fitBounds(bounds);
			}	
		  });		 
	  }  
	}
	   
	$scope.doctorsData = <?php if(isset($searchResults)){ echo $searchResults; }?>;
	
	$scope.docQualifications = <?php if(isset($docQualifications)){ echo $docQualifications; }?>;
};
    		
</script>

<div class="docSearchContainer" ng-app="docSearchApp" ng-controller="docSearchController">
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
					<span>{{doctors.DISTRICT}},{{' '+doctors.STATE}}</span><br>
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

	<div class="docDetailsContainer" style="height:1321px">
		<div id="docDetails">
			<div id="docDetailsHeader">
				<span class="span-XLarge">Dr. {{selectedDoctor.FIRST_NAME}} {{selectedDoctor.LAST_NAME}}</span><br> 
				<span class="spanMedium">{{selectedDoctor.SPECIALITY}}</span><br>
				<span class="spanMedium" ng-repeat="qualification in docQualifications | filter:selectedDoctor.ID_DOCTOR">{{qualification.QUALIFICATION+' '}}</span><br>
				<span class="spanSmall">{{selectedDoctor.DISTRICT}},{{' '+selectedDoctor.STATE}}</span><br>
				<img ng-repeat="n in ratingArray | limitTo:selectedDoctor.USER_RATING" src="../images/star.png" height="16" width="16" /> 
				<img ng-repeat="n in ratingArray | limitTo:5-selectedDoctor.USER_RATING" src="../images/star_off.png" height="16" width="16" />
				<br> 
				<span class="spanSmall">{{selectedDoctor.TOTAL_REVIEWS}} reviews</span><p>
					<!-- <a href="/doctor/writeReview" class="tooltip">
					<img src="../images/writeReview.png"/>					
					<span><img class="callout" src="../images/callout_black.gif" />Write Review</span>
					 -->
			</div>
			<div style="position: relative; float: right;width:40%;height:180px;">
				<div style="display: inline-block; height: 100%;margin-top:25px">
					<a href="/doctor/writeReview"><button id="docActions"><img alt="" src="../images/hnd_md_review.png" class="buttonImageWithText">Write Review</button></a><br>
					<button id="docActions"><img alt="" src="../images/hnd_md_recommend.png" class="buttonImageWithText"/>Recommend</button><br>
					<button id="docActions"><img alt="" src="../images/hnd_md_star.png"/ class="buttonImageWithText">Rate Doctor</button><br>
					<button id="docActions"><img alt="" src="../images/hnd_md_details.png" class="buttonImageWithText"/>Full Details</button><br>
				</div>
				<img id="docProfileImage" src="../images/doctors/{{selectedDoctor.PROFILE_IMAGE}}">
			</div>
		</div>
		<div id="search-tabline">
			<ul id="tabs_framed">
				<li class="tabs"><a href="#tabAbout">About</a></li>
				<li class="tabs"><a href="#tabAppointments" ng-click="getAppointments(selectedDoctor)">Appointments & Offices</a></li>
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
					<span class="spanMedium">Specialities</span><br>
					<span class="spanSmall">{{selectedDoctor.SPECIALITY}}</span><br>
					<span class="spanMedium">Languages Spoken</span><br> 
					<span class="spanSmall">{{selectedDoctor.LANG_SPOKEN}}</span><br>
					<span class="spanMedium">Age</span><br> 
					<span class="spanSmall">{{selectedDoctor.AGE}} years</span><br>
					<span class="spanMedium">Experience</span><br> 
					<span class="spanSmall">Practising for {{selectedDoctor.EXPERIENCE}} years</span><br>
				</div>
				<br><br>
				<span class="spanMedium">Education and Training</span>
				<p>
				
				<div class="reviewGlassy">
					<div ng-repeat="qualification in docQualifications | filter:selectedDoctor.ID_DOCTOR">
						<span class="spanMedium">{{qualification.QUALIFICATION}} ({{qualification.SUPER_SPECIALITY}})</span><br> 
						<span class="spanSmall">{{qualification.INSTITUTION}}</span><br><br>	
					</div>
				</div>
				<br><br>
				<span class="spanMedium">Awards and Recognitions</span>
				<p>
				<div class="reviewGlassy">
					
				</div>
			</div>
			<div id="tabAppointments">
				<br> <span class="spanMedium">Office Locations</span>
				<div class="reviewGlassy" ng-repeat="appointment in appointments">
					<img alt="" ng-src="http://www.google.com/mapfiles/marker{{locationCharArray[$index]}}.png">
					<span class="spanSmall">{{appointment.OFFICE_NAME}}, {{appointment.AREA}}, {{appointment.DISTRICT}}, {{appointment.STATE}}
					</span><br><br>
					<table class="table">
						<tr>
							<td>Mon</td>
							<td>Tue</td>
							<td>Wed</td>
							<td>Thu</td>
							<td>Fri</td>
							<td>Sat</td>
							<td>Sun</td>
						</tr>
						<tr>
							<td ng-repeat="chart in getAppointmentChart(appointment)">{{chart[0]}}</td>
						</tr>
					</table>
					<br>
					<div id="getDirections">
						<form action="http://maps.google.com/maps" method="get" target="_blank">
							<input type="text" name="saddr" class="smallinput" placeholder="Enter your location" /> 
							<input type="text" id="Address" name="daddr" class="smallinput" ng-model="appointment.ADDRESS"/>
							<input class="btn smaller" type="submit" value="Get directions" />
						</form>
					</div>
					
				</div>
				<br><br><br>
							
				<div id="googleMap"></div>			
			</div>

			<div id="tabReviews" style="height:97%; overflow-y:auto">
				<br>
				<span class="spanLarge">Recent Reviews for Dr. {{selectedDoctor.FIRST_NAME}}</span>
				<p>			
				<div ng-repeat="review in reviews" style="width: 97%;height:auto;">
						<img src="../images/user.png" style="margin-bottom: -15px;"/>
						<span class="spanMedium">{{review.USERNAME}}</span>						
						<span class="spanSmall" style="color:#858585">{{review.REVIEW_DATE}}</span><br><br>
						<div class="bubbleReview">
							<div style="margin-top:-20px;">
							<img ng-repeat="n in ratingArray | limitTo:review.RATING" src="../images/star.png" height="16" width="16" /> 
							<img ng-repeat="n in ratingArray | limitTo:5-review.RATING" src="../images/star_off.png" height="16" width="16" /><br>												
							<span class="spanSmall">{{review.REVIEW}}</span>
							</div>
						</div>
						<br><br>
				</div>
			</div>
		</div>
	</div>

	<div class="docRightContainer"></div>
	<?php }?>
</div>
