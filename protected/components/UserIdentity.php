<?php

require_once (dirname(__FILE__).'/../config/dbconfig.php');
require (dirname(__FILE__).'/../lib/facebook/facebook.php');

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	const ERROR_STATUS_INACTIVE=1001;
	const ERROR_NOT_LOGGED_IN=1002;
	
	// Need to store the user's ID
	private $_id;
	private $user;
	
	private static $facebook;
	
	public static function getFBInstance()
	{
		if ( is_null( self::$facebook ) )
		{
			self::$facebook = new Facebook(array(
								'appId' => '1409478415984997',
								'secret' => '3ff14d08e1c3ad9bd151da11aeddf274',
	));
		}
		return self::$facebook;
	}
	
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
	
	function checkFBUser($uid, $oauth_provider, $username,$email,$twitter_otoken,$twitter_otoken_secret)
	{
	
		$fetchQuery = "SELECT username, email, oauth_provider, oauth_uid FROM `tbl_users` WHERE oauth_uid = '$uid' and oauth_provider = '$oauth_provider'";
		$query = mysql_query($fetchQuery ) or die(mysql_error());
		$result = mysql_fetch_array($query, MYSQL_ASSOC);
	
		if (empty($result))
		{
			#user not present. Insert a new Record
			$query = mysql_query("INSERT INTO `tbl_users` (oauth_provider, oauth_uid, username,email, status) VALUES ('$oauth_provider', $uid, '$username','$email','ACTIVE')") or die(mysql_error());
			$query = mysql_query($fetchQuery );
			$result = mysql_fetch_array($query, MYSQL_ASSOC);
		}
		 
		return $result;
	}
	
	function checkGoogleUser($oauth_provider, $username,$email)
	{
		$fetchQuery = "SELECT username, email, oauth_provider FROM `tbl_users` WHERE email = '$email' and oauth_provider = '$oauth_provider'";
		$query = mysql_query($fetchQuery ) or die(mysql_error());
		$result = mysql_fetch_array($query);
	
		if (empty($result))
		{
		#user not present. Insert a new Record
		$query = mysql_query("INSERT INTO `tbl_users` (oauth_provider, username, email, status) VALUES ('$oauth_provider', '$username', '$email', 'ACTIVE')") or die(mysql_error());
			$query = mysql_query($fetchQuery );
			$result = mysql_fetch_array($query );
		}
		 
		return $result;
		 
	}
	
	function facebookLogin()
	{
		$facebook = self::getFBInstance();
		$user = $facebook->getUser();
		
		if ($user)
		{
			try
			{
				// Proceed knowing you have a logged in user who's authenticated.
				$user_profile = $facebook->api('/me');
			} catch (FacebookApiException $e) {
				error_log($e);
				$user = null;
			}
		
			if (!empty($user_profile ))
			{
				# User info ok? Let's print it (Here we will be adding the login and registering routines)		
				$username = $user_profile['name'];
				$uid = $user_profile['id'];
				$email = $user_profile['email'];
				//print_r($user_profile);
				$userdata = $this->checkFBUser($uid, 'facebook', $username,$email,$twitter_otoken,$twitter_otoken_secret);
                //print_r("\n");
		        //print_r($userdata);
				if(array_filter($userdata))
				{					
					$this->errorCode=self::ERROR_NONE;	
					$this->_id = $userdata;				
				}
			}
			else
			{
				$this->errorCode=self::ERROR_UNKNOWN_IDENTITY;
			}
		}
		else
		{
			# There's no active session, let's generate one
			$login_url = $facebook->getLoginUrl(array( 'scope' => 'email'));
			header("Location: " . $login_url);
		}
	}
		
	public function getId()
	{
		return $this->_id;
	}
}