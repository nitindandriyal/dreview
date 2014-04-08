<?php
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script type="text/javascript">
$(function() {
  $( "#search-tabline" ).tabs();
});

angular.module('docSearchApp', []);

function docSearchController($scope, $http) {
//test.controller("docSearchController", function($scope){

$scope.ratingArray = [1,2,3,4,5];
$scope.doctorSelectedEvent=function(doctors){
	//alert(doctors.summary);
    $scope.selectedDoctor = doctors;
}

$scope.initDoctorSelectedEvent = function(first, doctors){
	//alert(first + doctors);
	if( first )
	{
    	$scope.selectedDoctor = doctors;
	}
}

$scope.getReviews=function(){
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

<div class="docTopContainer">
</div>
<div class="docSearchContainer" ng-app="docSearchApp" ng-controller="docSearchController">	
	<div class="docListContainer">
		<div id="docListHeader">
			<span style="font-weight:bold;">&nbsp;Order By:</span>
			<ul>
				<li>Name</li>
				<li>Location</li>
				<li>Rating</li>
			</ul>
		</div>

		<div id="docList" ng-repeat="doctors in doctorsData | filter:selectedgender" ng-click="doctorSelectedEvent(doctors);getReviews()">
			<!--  {{initDoctorSelectedEvent($first, doctors)}}-->
			<img id="docImage" ng-src="../images/doctors/{{doctors.profile_image}}"/>
			<div id="docSummaryDiv">
				<span style="font-weight: bold;">Dr. {{doctors.firstname}} {{doctors.lastname}}</span><br>				
				<span ng-model="selectEdu" ng-repeat="docQualification in doctors.qualifications">{{docQualification.qualification}}{{$last ? '' : ', '}}</span><br>
				<span ng-repeat="docAppointments in doctors.appointments">{{docAppointments.area}},{{docAppointments.state}}</span><br>
				<img ng-repeat="n in ratingArray | limitTo:doctors.user_rating" src = "../images/star.png" height="16" width="16"/>						
				<img ng-repeat="n in ratingArray | limitTo:5-doctors.user_rating" src = "../images/star_off.png" height="16" width="16"/>				
				
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
		<div id="search-tabline" style="position: relative;clear: both;">
			  <ul>
			    <li class="tabs"><a href="#tabAbout">About</a></li>
			    <li class="tabs"><a href="#tabAppointments">Appointments & Offices</a></li>
			    <li class="tabs"><a href="#tabAchievements">Achievements</a></li>
			    <li class="tabs"><a href="#tabReviews">Reviews</a></li>
			  </ul>
			  <div id="tabAbout" style="background: white; height: 100%">			  	
			  		<span class="spanLarge">Know your doctor</span><p>
			  		<span>{{selectedDoctor.summary}}</span><br><br><br>

			  		<span class="spanMedium">Specialities</span>
			  		<ul style="list-style: none">
			  			<li ng-style="{'margin-bottom': 30+'px'}" ng-repeat="docQualification in selectedDoctor.qualifications">{{docQualification.super_speciality}}</li>
			  		</ul>
			  		<br>
			  		<span class="spanMedium">Languages Spoken</span>
			  		<ul style="list-style: none">
			  			<li>{{selectedDoctor.lang_spoken}}</li>
			  		</ul>
			  		<br>
			  		<span class="spanMedium">Qualifications</span>
			  		<ul style="list-style: none">
			  			<li ng-style="{'margin-bottom': 30+'px'}" ng-repeat="docQualification in selectedDoctor.qualifications">{{docQualification.qualification}}<br>{{docQualification.Institute}}</li>
			  		</ul>			  	
			  </div>
			  
			  
			  <div id="tabAppointments">			  		
					<span class="spanMedium">Office Locations</span>
			  		<ul style="list-style: none">
			  			<li ng-style="{'margin-bottom': 30+'px'}" ng-repeat="docAppointments in selectedDoctor.appointments">{{docAppointments.office_name}}<br>{{docAppointments.street}}<br>{{docAppointments.area}}<br>{{docAppointments.state}}<br>Landmark:{{docAppointments.landmark}}</li>
						<form action="http://maps.google.com/maps" method="get" target="_blank">
						   <label for="saddr">Enter your location</label>
						   <input type="text" name="saddr" />
						   <input type="hidden" name="daddr" value="K C Raju Multispeciality Clinic, 4 th cross,Lingarajapuram,Below Flyover,Hennur main road,, 4th Cross Rd, CMR Layout, Lingarajapuram, Bangalore, Karnataka 560084, India" />
						   <input type="submit" value="Get directions" />
						</form>			  			
			  		</ul>
			  </div>
			  
			  <div id="tabAchievements">
			  </div>
			  	
			  <div id="tabReviews">
			  	<div class="reviewGlassy" ng-repeat="review in reviews">
			  		<span>{{review.ID_USER}}</span><br>
			  		<span>{{review.PURPOSE}}</span><br>
			  		<span>{{review.REVIEW}}</span><br>
			  	</div>		  	
			  </div>			
		</div>
	</div>
	<div class="docMiscContainer">		
		<select ng-model="selectedgender" ng-options="obj.gender for obj in doctorsData">
			<option value="">All</option>
		</select>	
	</div>	
</div>