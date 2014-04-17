<?php

require_once (dirname(__FILE__).'/../config/dbconfig.php');

class DoctorSearch {
	
	public static function getDoctors($speciality,$location)
	{	
		/*
		SELECT doc.*,doc_a.*,doc_q.*
		FROM tbl_doctor doc 
        	LEFT JOIN tbl_doc_appointments doc_a ON doc.ID_DOCTOR = doc_a.ID_DOCTOR
        	LEFT JOIN tbl_doc_qualifications doc_q ON doc.ID_DOCTOR = doc_q.ID_DOCTOR
	 	;
		 */
		
		/*
		SELECT DISTINCT doc.*
		FROM tbl_doctor doc,
	 	tbl_doc_appointments doc_a,
	 	tbl_doc_qualifications doc_q
		WHERE doc_a.STATE = 'Delhi'
		AND doc_q.SUPER_SPECIALITY = 'Cardiology'
		AND doc_a.ID_DOCTOR = doc_q.ID_DOCTOR
		AND doc.ID_DOCTOR = doc_a.ID_DOCTOR
		ORDER BY doc.USER_RATING;		 
		 */
		
		$query = "SELECT distinct doc.*, doc_o.STATE, doc_o.DISTRICT, 
						DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), practice_st_dt)), \"%Y\")+0 as EXPERIENCE ,
						DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), dob)), \"%Y\")+0 as AGE 
					FROM tbl_doctor doc 
					JOIN tbl_doc_appointments doc_a ON doc.ID_DOCTOR = doc_a.ID_DOCTOR
					JOIN tbl_offices doc_o ON doc_a.id_office = doc_o.id_office";
		$subQuery = "";
		
		$location = trim($location);
		$speciality = trim($speciality);
		
		if (!empty($location))
		{
			$subQuery = $subQuery. " doc_o.STATE = '$location'";
			if (!empty($speciality) )
			{
				$subQuery = $subQuery. " and doc.SPECIALITY like '%$speciality%'";
			}
		}
		else
		{
			if (!empty($speciality) )
			{
				$subQuery = $subQuery. " doc.SPECIALITY like '%$speciality%'";
			}	
		}				
		
		if(!empty($subQuery))
		{
			$query = $query." where $subQuery";
		}
		
		$queryResults=mysql_query($query) or die(mysql_error());
		$doctorDetails = array();
		while($row = mysql_fetch_array($queryResults, MYSQL_ASSOC) )
		{
			$doctorDetails[] = $row;
		}
		
		foreach ($doctorDetails as $key => $doctor){
			if(empty($doctor["PROFILE_IMAGE"])){
				if( strcmp($doctor["GENDER"], "Female") == 0 ){
					$doctorDetails[$key]["PROFILE_IMAGE"] = 'female_default.jpg';
				}
				else{
					$doctorDetails[$key]["PROFILE_IMAGE"] = 'male_default.jpg';
				} 
			}
		}
		return $doctorDetails;		
	}
	
	public static function getDoctorQualifications($doctorIds)
	{
		$docIds = implode("','",$doctorIds);
		$query = "SELECT *
					FROM tbl_doc_qualifications
					WHERE id_doctor in ('".$docIds."')";
	
		$queryResults=mysql_query($query) or die(mysql_error());
		$doctorsQualifications = array();
		while($row = mysql_fetch_array($queryResults, MYSQL_ASSOC) )
		{
			$doctorsQualifications[] = $row;
		}
		return $doctorsQualifications;
	}
	
	public static function getDoctorReviews($doctorId)
	{
	
		$query = "	SELECT *
			        FROM tbl_doc_reviews
			        WHERE id_doctor='$doctorId'";

		$queryResults=mysql_query($query) or die(mysql_error());
		$doctorReviews = array();
		while($row = mysql_fetch_array($queryResults) )
		{
			$doctorReviews[] = $row;
		}
		return $doctorReviews;
	
	
	}

	public static function getDoctorAppointments($doctorId)
	{
	
		$query = "SELECT *, CONCAT(ofc.office_name,',',ofc.area,',',ofc.district,',',ofc.state) as ADDRESS,
							DATE_FORMAT(doc_a.AVAILABLE_FROM, '%H:%i') as _FROM, 
							DATE_FORMAT(doc_a.AVAILABLE_TO, '%H:%i') as _TO
				  FROM tbl_offices ofc,
					   tbl_doc_appointments doc_a
				  WHERE id_doctor='$doctorId'
				  AND doc_a.ID_OFFICE = ofc.ID_OFFICE";
	
		$queryResults=mysql_query($query) or die(mysql_error());
		$doctorAppointments = array();
		while($row = mysql_fetch_array($queryResults) )
		{
			$doctorAppointments[] = $row;
		}
		return $doctorAppointments;	
	}
}
?>
