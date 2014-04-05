<?php

require_once (dirname(__FILE__).'/../config/dbconfig.php');

/**
 * SignUpForm class.
 * SignUpForm is the data structure for keeping
 * user login form data. It is used by the 'signup' action of 'ProfileController'.
 */
class UserProfile extends CFormModel
{
	public $firstname;
	public $lastname;
	public $password;
	public $email;
	public $image;
	
	public function addImage($email,$file)
	{
		$query = "UPDATE tbl_users SET image = '$file' WHERE email='$email'";
		$result = mysql_query($query) or die(mysql_error());

		return $result;	
	}
	
	public function getProfile($email)
	{
			
		$query = mysql_query("SELECT username, email, oauth_provider, status, last_login, mobile, city, image, reviews, followers FROM tbl_users WHERE email='$email'") or die(mysql_error());
		$result = mysql_fetch_array($query);

		if($result['image'] == null)
		{
			$result['image'] = '163751742.jpg';
		}
		
		return $result;
	}
		
	public function getReviews($email)
	{			
		$query = mysql_query("SELECT id_review, id_doctor, id_user, purpose, rating, review, recommended, review_date, views, agree, disagree, status FROM tbl_doc_reviews WHERE id_user='$email'") or die(mysql_error());
		
		while($row = mysql_fetch_array($query) ){
			$fullData[] = $row;
		}
	
		return $fullData;
	}	
}