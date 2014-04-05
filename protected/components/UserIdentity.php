<?php

require_once (dirname(__FILE__).'/../config/dbconfig.php');

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	const ERROR_STATUS_INACTIVE=1001;
	
	// Need to store the user's ID
	private $_id;
	private $user;
	
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */

	public function authenticate()
	{
		//$record=User::model()->findByAttributes(array('username'=>$this->username));		
		$email=$this->username;
		
		$query=mysql_query("SELECT email, username, password, status FROM tbl_users WHERE email='$email' and oauth_provider='DReview'") or die(mysql_error());
		$users = mysql_fetch_array($query);		
		
		if($users["email"] != $this->username)
		{
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}
		elseif($users["status"] != "ACTIVE")
		{
			$this->errorCode=self::ERROR_STATUS_INACTIVE;
		}		
		elseif($users["password"] != $this->password)
		{
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}		
		else
		{
			$this->errorCode=self::ERROR_NONE;	
			$this->_id = $users;
		}
		
		return $this;
	}
	
	//check if email id already exists in the database
	public function checkEmailExisting($email)
	{
		
		$query=mysql_query("SELECT 1 FROM tbl_users WHERE email='$email' and oauth_provider='DReview'") or die(mysql_error());
		$emailCount = mysql_fetch_row($query);
	
        if ($emailCount >= 1)
        	return true;
		else
			return false;

	}	

	public function userSave($firstname, $lastname, $email, $password, $activationCode)
	{
		$username = $firstname . ' ' . $lastname;
		$query = mysql_query("INSERT INTO `tbl_users` (email, username, password,activation_code) VALUES ('$email', '$username', '$password','$activationCode')") or die(mysql_error());
		$query = mysql_query("SELECT 1 FROM tbl_users WHERE email='$email'") or die(mysql_error());
		$userCount = mysql_fetch_row($query);
		
		if ($userCount >= 1)
			return true;
		else
			return false;
	}
	
	public function getId()
	{
		return $this->_id;
	}
}