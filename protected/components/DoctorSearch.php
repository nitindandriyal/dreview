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
		
		$query = "	SELECT doc.*,doc_a.*,doc_q.*
			        FROM tbl_doctor doc LEFT JOIN tbl_doc_appointments doc_a ON doc.ID_DOCTOR = doc_a.ID_DOCTOR
        								LEFT JOIN tbl_doc_qualifications doc_q ON doc.ID_DOCTOR = doc_q.ID_DOCTOR";
		$subQuery = "";
		
		$location = trim($location);
		$speciality = trim($speciality);
		
		if (!empty($location))
		{
			$subQuery = $subQuery. " doc_a.STATE = '$location'";
			if (!empty($speciality) )
			{
				$subQuery = $subQuery. " and doc_q.SUPER_SPECIALITY = '$speciality'";
			}
		}
		else
		{
			if (!empty($speciality) )
			{
				$subQuery = $subQuery. " doc_q.SUPER_SPECIALITY = '$speciality'";
			}	
		}				
		
		if(!empty($subQuery))
		{
			$query = $query." where $subQuery";
		}
		
		$queryResults=mysql_query($query) or die(mysql_error());
		$doctorDetails = mysql_fetch_array($queryResults);
	
		//return $doctorDetails;
				
		
	}
	
	public static function getDoctorReviews($doctorId)
	{
	
		$query = "	SELECT *
			        FROM tbl_doc_reviews
			        WHERE id_doctor='$doctorId'";

		$queryResults=mysql_query($query) or die(mysql_error());
		
		while($row = mysql_fetch_array($queryResults) )
		{
			$doctorReviews[] = $row;
		}
		return $doctorReviews;
	
	
	}	
}
?>
