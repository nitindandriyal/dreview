<?php
require_once (dirname(__FILE__).'/../config/dbconfig.php');
/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $email;
	public $password;
	public $keepLoggedIn;
	public $confirmPassword;
	
	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('email, password', 'required'),
			// rememberMe needs to be a boolean
			// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

	

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->email,$this->password);		
			$returnCode = $this->_identity->authenticate();
			
			switch($returnCode->errorCode)
			{
				case UserIdentity::ERROR_NONE:					
					Yii::app()->user->login($this->_identity);
					break;
				case UserIdentity::ERROR_USERNAME_INVALID:
					$this->addError('email','USERNAME_INVALID');
					break;
				case UserIdentity::ERROR_PASSWORD_INVALID:
					$this->addError('password','PASSWORD_INVALID');
					break;	
				case UserIdentity::ERROR_STATUS_INACTIVE:
					$this->addError('email','STATUS_INACTIVE');
					break;					
				default:
					$this->addError('error','Unknown error, please contact dreview.in');
					break;
			}						
		}				
	}	

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->email,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->keepLoggedIn ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
	
	public function userCheckAndActivate($email, $activationCode)
	{		
		$query=mysql_query("SELECT status, activation_code FROM tbl_users WHERE email='$email'") or die(mysql_error());
		$users = mysql_fetch_array($query);
		
		if (isset($users["status"]))
		{
			if ($users["status"] == 'ACTIVE')
			{	
				$this->addError('activationStatus','ALREADY_ACTIVE');
			}	
			else
			{
				if ($users["activation_code"] == $activationCode)
				{
					$query = mysql_query("UPDATE tbl_users SET status='ACTIVE', activation_code=NULL where activation_code='$activationCode'") or die(mysql_error());
					$this->addError('activationStatus','ACCOUNT_ACTIVATED');
				}
				else
				{
					$this->addError('activationStatus','INVALID_URL');
				}				
			} 
		}	
		else
		{
			$this->addError('activationStatus','INVALID_REQUEST');
		}		
	}
}