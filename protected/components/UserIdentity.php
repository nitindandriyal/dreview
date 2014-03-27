<?php

require (dirname(__FILE__).'/../config/dbconfig.php');

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{

	// Need to store the user's ID
	private $_id;	
	
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
		$username=$this->username;
		
		$query=mysql_query("SELECT username, password FROM tbl_users WHERE username='$username'") or die(mysql_error());
		$users = mysql_fetch_array($query);
				
		if($users["username"] != $this->username)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users["password"] != $this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			//$this->_id=$usernam->id;
			//$this->setState('title', $username->title);			
			$this->errorCode=self::ERROR_NONE;	
		
		return !$this->errorCode;
	}
	
	//check if email id already exists in the database
	public function checkEmailExisting($email)
	{
		
		$query=mysql_query("SELECT 1 FROM tbl_users WHERE email='$email'") or die(mysql_error());
		$emailCount = mysql_fetch_row($query);
	
        if ($emailCount >= 1)
        	return true;
		else
			return false;

	}	

	public function getId()
	{
		return $this->_id;
	}	
}