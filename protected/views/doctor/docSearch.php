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

$scope.$watch('selectedgender', function() {
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
	$scope.url = '/doctor/GetDocReviews?docId='+$scope.selectedDoctor.id;
	$http.get($scope.url).
					    success(function(data) 
					    {
					        $scope.reviews = data;					        
					    });
}

//$scope.doctorsData = [];
$scope.doctorsData = [
                      {
	          			id: 1,
	          			firstname: 'Mangala',
	          			lastname: 'Devi',
	          			gender: 'Female',
	          			lang_spoken: 'Kannada, English',
	          			user_rating: '5',
	          			total_reviews: '10',
	          			profile_image: '1.jpg',
	        			appointments:	[ 
        			        			{   			
					     				office_type: 'Hospital',
					             	    office_name: 'K.C.Raju Multi Speciality Hospital',
					             	    pri_contact_no: '9986555555',
					             	    state: 'Karnataka',
					             	    area: 'Lingarajapura',
					             	    street:'4th Cross,Hennur Main Road',
				 					    landmark:'Below Lingarajapuram Flyover',
				    					available: [
							    					{available_from: '09:00',
					    						     available_to:	'14:00',
					    						     workdays: 'MON - SAT'
							    					},
							    					{available_from: '16:00',
						    						 available_to:	'21:00',
						    						 workdays: 'MON - SAT'
								    			     }	
								    			   ]  						    											    			
					  					 }
 					 				],
 					 qualifications:[
 				 					 {
 	            						qualification:'MBBS',
 	            						Institute:'IMA AKN Sinha Institute'
 	        						  },
 					        		  {
 										qualification:'P.G.F.P',
 										Institute:'IMA AKN Sinha Institute',
 									 	super_speciality:'Cardiology'
 									  }				  
 	    							],
 	    			summary: 'test'
          			},
                    {
	          			id: 2,
	          			firstname: 'Amit',
	          			lastname: 'Rauthan',
	          			gender: 'Male',
	          			lang_spoken: 'Hindi, Garhwali',
	          			user_rating: '2',
	          			total_reviews: '3',
	          			profile_image: '3.jpg',
	        			appointments:	[ ],
	 					qualifications:[
	 				 					 {
	 	            						qualification:'MBBS'	 	            					
	 	        						  },
	 					        		  {
	 										qualification:'MD',
	 										Institute:'Gujarat Cancer & Research Institute, Ahmedabad',
	 									 	super_speciality:'Internal medicine'
	 									  }				  
	 	    							],
	 	    			summary: 'Dr Amit Rauthan is a Consultant in the Department of Medical Oncology, Hemato-oncology and Blood and Marrow transplant. He did his MD in Internal medicine, followed by DM in Medical Oncology from Gujarat Cancer & Research Institute, Ahmedabad. He also has special interest in blood and marrow transplants (BMT). He has conducted many successful Allogeneic and Autologous transplants at Manipal hospital which has an affiliation with the University of Minnesota Physicians, USA.'
          			}          			
               	  ];
	
};  


    		
</script>
<div ng-app="docSearchApp" ng-controller="docSearchController">
<div class="docTopContainer">
	<div style="margin-left: 5px">
		<span style="font-weight: bold; color: #fff; font-size: 14px">Search Filters</span>
	</div>
	<div style="margin-left: 5px">
		<span style="font-weight: bold; color: #fff; font-size: 12px">Gender</span>
		<select style="font-weight: bold; font-size: 12px" ng-model="selectedgender" ng-options="obj.gender for obj in doctorsData">
				<option value="">All</option>
		</select>
	</div>
</div>
<div class="docSearchContainer">	
	<div class="docListContainer">
		<div id="docListHeader">
			<span style="font-weight:bold;">&nbsp;Order By:</span>
			<ul>
				<li>Name</li>
				<li>Location</li>
				<li>Rating</li>
			</ul>
		</div>

		<div id="docList" ng-repeat="doctors in doctorsData | filter:selectedgender" ng-click="doctorSelectedEvent(doctors);getReviews(doctors)"">
			{{initDoctorSelectedEvent($first, $selectedClicked, doctors)}}
			<img id="docImage" ng-src="../images/doctors/{{doctors.profile_image}}" />
			<div id="docSummaryDiv">
				<span style="font-weight: bold;">Dr. {{doctors.firstname}} {{doctors.lastname}}</span><br>				
				<span ng-model="selectEdu" ng-repeat="docQualification in doctors.qualifications">{{docQualification.qualification}}{{$last ? '' : ', '}}</span><br>
				<span ng-repeat="docAppointments in doctors.appointments">{{docAppointments.area}},{{docAppointments.state}}</span><br>
			</div>
			<div style="display:inline-block;float:right;margin-right:10px;margin-top:2px" align="right">
				<img ng-repeat="n in ratingArray | limitTo:doctors.user_rating" src = "../images/star.png" height="16" width="16"/>						
				<img ng-repeat="n in ratingArray | limitTo:5-doctors.user_rating" src = "../images/star_off.png" height="16" width="16"/><br>				
				<span>{{doctors.total_reviews}} reviews</span>
			</div>
		</div>
			
	</div>
	
	
	<div class="docDetailsContainer" style="border: 1px solid silver">
		<div id="docDetails" style="width: 99%;">
			<div id="docSummaryDiv" style="position:relative;">
				<span class="span-XLarge">Dr. {{selectedDoctor.firstname}} {{selectedDoctor.lastname}}</span><br>				
				<span class="spanMedium" ng-repeat="docQualification in selectedDoctor.qualifications">{{docQualification.qualification}}{{$last ? '' : ', '}}</span><br>
				<span class="class="spanSmall" ng-repeat="docAppointments in selectedDoctor.appointments">{{docAppointments.area}},{{docAppointments.state}}</span><br>
				<img ng-repeat="n in [1,2,3,4,5]" src = "../images/star.png" height="18" width="18"/>
				<span>{{selectedDoctor.total_reviews}} reviews</span>
			</div>
			<div style="position:relative; float: right;">
				<img src="../images/doctors/{{selectedDoctor.profile_image}}" style="height:80; padding-right: 10px; padding-top: 5px">
			</div>
		</div>
		<div id="search-tabline" style="position: relative;clear: both;height:650px">
			  <ul id="tabs_framed">
			    <li class="tabs"><a href="#tabAbout">About</a></li>
			    <li class="tabs"><a href="#tabAppointments" onclick="initializeGoogleMap()">Appointments & Offices</a></li>
			    <li class="tabs"><a href="#tabAchievements">Achievements</a></li>
			    <li class="tabs"><a href="#tabReviews" ng-click="getReviews(selectedDoctor)">Reviews</a></li>
			  </ul>
			  <div id="tabAbout" style="background: white; height: 100%">			  	
			  		<span class="spanMedium">Know your doctor</span><p>
			  		<span class="spanSmall">{{selectedDoctor.summary}}</span><br><br><br>

			  		<span class="spanMedium">Specialities</span>
			  		<ul style="list-style: none">
			  			<li ng-style="{'margin-bottom': 30+'px'}" ng-repeat="docQualification in selectedDoctor.qualifications"><span class="spanSmall">{{docQualification.super_speciality}}</span></li>
			  		</ul>
			  		<br>
			  		<span class="spanMedium">Languages Spoken</span>
			  		<ul style="list-style: none">
			  			<li><span class="spanSmall">{{selectedDoctor.lang_spoken}}</span></li>
			  		</ul>
			  		<br>
			  		<span class="spanMedium">Qualifications</span>
			  		<ul style="list-style: none">
			  			<li ng-style="{'margin-bottom': 30+'px'}" ng-repeat="docQualification in selectedDoctor.qualifications"><span class="spanSmall">{{docQualification.qualification}}<br>{{docQualification.Institute}}</span></li>
			  		</ul>			  	
			  </div>
			  
			  
			  <div id="tabAppointments">			  		
					<span class="spanMedium">Office Locations</span>
			  		<ul style="list-style: none">
			  			<li ng-style="{'margin-bottom': 30+'px'}" ng-repeat="docAppointments in selectedDoctor.appointments"><span class="spanSmall">{{docAppointments.office_name}}<br>{{docAppointments.street}}<br>{{docAppointments.area}}<br>{{docAppointments.state}}<br>Landmark:{{docAppointments.landmark}}<br><a style="color:olive;" onclick="showGetDirections('getDirections')">Get directions</a></span></li>			  			
			  			<div id="getDirections" style="display: none;">
							<form action="http://maps.google.com/maps" method="get" target="_blank">						   
							   <input type="text" name="saddr"  placeholder="Enter your location"/>
							   <input id="Address" type="hidden" name="daddr" value="K C Raju Multispeciality Clinic, 4 th cross,Lingarajapuram,Below Flyover,Hennur main road,, 4th Cross Rd, CMR Layout, Lingarajapuram, Bangalore, Karnataka 560084, India" />
							   <input class="btn" type="submit" value="Get directions" />
							</form>
						</div>			  			
			  		</ul>
			  		
			  	<div id="googleMap"></div>
			  </div>
			  
			  <div id="tabAchievements">
			  </div>
			  	
			  <div id="tabReviews">
			  	<div class="reviewGlassy" style="font-size: 12px" ng-repeat="review in reviews">
			  		<span style="font-weight: bold">{{review.ID_USER}}</span><br>
			  		<span style="font-weight: bold">{{review.PURPOSE}}</span><br>
			  		<span>{{review.REVIEW}}</span><br>
			  	</div>		  	
			  </div>			
		</div>
	</div>
	<div class="docMiscContainer">		
			
	</div>	
</div>
</div>