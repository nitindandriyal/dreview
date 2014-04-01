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
			
		$query = mysql_query("SELECT username, email, oauth_provider, status, last_login, mobile, city, image FROM tbl_users WHERE email='$email'") or die(mysql_error());
		$result = mysql_fetch_array($query);
		
		if ($result['oauth_provider'] == null)
		{
			$result['oauth_provider'] = 'DReview';
		}
		
		if($result['image'] == null)
		{
			$result['image'] = '163751742.jpg';
		}
		
		return $result;
	}
		
}