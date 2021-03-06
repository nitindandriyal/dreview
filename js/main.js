function toggle(div_id) {
	var el = document.getElementById(div_id);
	if (el.style.display == 'none') {
		el.style.display = 'block';
	} else {
		el.style.display = 'none';
	}
}


function blanket_size(popUpDivVar) {
	if (typeof window.innerWidth != 'undefined') {
		viewportheight = window.innerHeight;
	} else {
		viewportheight = document.documentElement.clientHeight;
	}
	if ((viewportheight > document.body.parentNode.scrollHeight)
			&& (viewportheight > document.body.parentNode.clientHeight)) {
		blanket_height = viewportheight;
	} else {
		if (document.body.parentNode.clientHeight > document.body.parentNode.scrollHeight) {
			blanket_height = document.body.parentNode.clientHeight;
		} else {
			blanket_height = document.body.parentNode.scrollHeight;
		}
	}
	var blanket = document.getElementById('blanket');
	blanket.style.height = blanket_height + 'px';
	var popUpDiv = document.getElementById(popUpDivVar);
	popUpDiv_height = viewportheight / 2 - 300;//200 is half popup's height
	popUpDiv.style.top = popUpDiv_height + 'px';
}


function window_pos(popUpDivVar) {
	if (typeof window.innerWidth != 'undefined') {
		viewportwidth = window.innerHeight;
	} else {
		viewportwidth = document.documentElement.clientHeight;
	}
	if ((viewportwidth > document.body.parentNode.scrollWidth)
			&& (viewportwidth > document.body.parentNode.clientWidth)) {
		window_width = viewportwidth;
	} else {
		if (document.body.parentNode.clientWidth > document.body.parentNode.scrollWidth) {
			window_width = document.body.parentNode.clientWidth;
		} else {
			window_width = document.body.parentNode.scrollWidth;
		}
	}
	var popUpDiv = document.getElementById(popUpDivVar);
	window_width = window_width / 2 - 250;//200 is half popup's width
	popUpDiv.style.left = window_width + 'px';
}


function popup(windowname) {
	blanket_size(windowname);
	window_pos(windowname);
	toggle('blanket');
	toggle(windowname);
}


function menu_position(menuDivVar) {
	if (typeof window.innerWidth != 'undefined') {
		viewportwidth = window.innerHeight;
	} else {
		viewportwidth = document.documentElement.clientHeight;
	}
	if ((viewportwidth > document.body.parentNode.scrollWidth)
			&& (viewportwidth > document.body.parentNode.clientWidth)) {
		window_width = viewportwidth;
	} else {
		if (document.body.parentNode.clientWidth > document.body.parentNode.scrollWidth) {
			window_width = document.body.parentNode.clientWidth;
		} else {
			window_width = document.body.parentNode.scrollWidth;
		}
	}
	var menuDiv = document.getElementById(menuDivVar);
	menuDiv.style.right = '0px';
}


function menuOpen(windowname) {
	menu_position(windowname);
	toggle(windowname);
}


angular.module('slideShowApp', []);
var delay = 15000;

function slideShowCtrl($scope, $timeout) {
	$scope.timeInMs = 0;

	var countUp = function() {
		if ($scope.toggle) {
			$scope.toggle = false;
		} else {
			$scope.toggle = true;
		}
		$timeout(countUp, delay);
	}
	$timeout(countUp, delay);
}


function searchCtrl($scope, $http) {

	$scope.url = '/home/autoSuggestLocation';
	$http.post($scope.url, {
		"data" : $scope.keywords
	}).success(function(data, status) {
		$scope.status = status;
		$scope.data = data;
		$("#searchByLocDoc").autocomplete({
			source : $scope.data,
			minLength : 3
		});
		$("#searchByLocHospital").autocomplete({
			source : $scope.data,
			minLength : 3
		});
		$("#searchByLocDiagCenter").autocomplete({
			source : $scope.data,
			minLength : 3
		});		
	}).error(function(data, status) {
		$scope.data = data || "Request failed";
		$scope.status = status;
	});
	
	$scope.url = '/home/autoSuggestSpeciality';
	$http.post($scope.url, {
		"data" : $scope.keywords
	}).success(function(data, status) {
		$scope.status = status;
		$scope.data = data;
		
		$("#searchBySpeciality").autocomplete({
			source : $scope.data,
			minLength : 3
		});
	}).error(function(data, status) {
		$scope.data = data || "Request failed";
		$scope.status = status;
	});
}

function onClickSearchController($scope, $http) {
	
	$scope.getLocations=function(){
		$scope.url = '/home/StateMap';			
		$http.get($scope.url).
						    success(function(data) 
						    {
						        $scope.locations = data;							     
						    });
	}
	
	$scope.setLocation=function(state,city,area){
		
		if (angular.isUndefined(area))
		{
			if (angular.isUndefined(city))
			{	
				$scope.selectedlocation = state;
				$scope.searchLocation = state;
			}				
			else
			{
				$scope.selectedlocation = state+' > '+city;
				$scope.searchLocation = city;
			}	
		}
		else
		{
			$scope.selectedlocation = state+' > '+city+' > '+area;
			$scope.searchLocation = area;
		}			    
	    
	}
	
	$scope.submitSearch=function(_speciality, _location) {
		$('#tabDoctorForm input[name="searchBySpeciality"]').val( _speciality );
		$('#tabDoctorForm input[name="searchByLocDoc"]').val( _location );
	    $("#tabDoctorForm").submit();
	}	
	
	$scope.toggleDivDisplay = function(id){
	    var e = document.getElementById(id);
	    
	    if(e.style.display == 'block')
	       e.style.display = 'none';
	    else
	       e.style.display = 'block';
	}		
			
}