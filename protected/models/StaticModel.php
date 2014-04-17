<?php

require_once (dirname(__FILE__).'/../config/dbconfig.php');

class StaticModel {

    public static function getSpecialities() 
	{
		$specialities = array(
				"Allergy & Immunology",
				"Cardiology",
				"Chiropractic",
				"Clinical Psychology",
				"Dentistry",
				"Dermatology",
				"Ear, Nose and Throat",
				"Endocrinology, Diabetes & Metabolism",
				"Family Medicine",
				"Gastroenterology",
				"General Surgery",
				"Geriatric Medicine",
				"Hematology",
				"Internal Medicine",
				"Nephrology",
				"Neurology",
				"Neurosurgery",
				"Obstetrics & Gynecology",
				"Ophthalmology",
				"Orthopedic Surgery",
				"Pain Medicine",
				"Pediatrics",
				"Pediatrics",
				"Plastic Surgery",
				"Psychiatry",
				"Psychology",
				"Psychology",
				"Pulmonology",
				"Rheumatology",
				"Rheumatology",
				"Social Work",
				"Sports Medicine",
				"Urology"
		);
       
        return $specialities;
    }  

    public static function getLocations()
    {
    	
    	$query = mysql_query("SELECT distinct state FROM tbl_state_map") or die(mysql_error());
    	
    	while($row = mysql_fetch_array($query) )
    	{
    		$fullData[] = $row['state'];
    	}
    	
    	$query = mysql_query("SELECT distinct city FROM tbl_state_map") or die(mysql_error());
    	
    	while($row = mysql_fetch_array($query) )
    	{
    		$fullData[] = $row['city'];
    	}

    	return $fullData;
    }
    
    public static function getStateMap()
    {
    	

    	$stateMap= array(
    						array ('state' => 'Karnataka',
    					    		'cities'  => array (
    					    							array( 'city' => 'Bangalore',
    												     		'areas' => array (
    										     									array( 'area' => 'Marathalli'),
    										     								    array( 'area' => 'Indiranagar')
    										     								  )
    										   				  ),			    													    								          					
    					    							)
    								),
		    			array ('state' => 'Maharashtra',
		    					'cities'  => array (
					    							array( 'city' => 'Mumbai',
					    									'areas' => array (
					    														array( 'area' => 'Bandra'),
					    														array( 'area' => 'Andheri')
					    													  )
		    											  )				  
					    							)
		    				  )    			
    						);
    	 		
    	
    	/*
    	$stateMap= array(
		    			array ('state' => 'Karnataka'),
		    			array ('state' => 'Maharashtra')
    					);
    	*/
    	
    	return $stateMap;
    }    

}

?>