<?php

/**
 * SignUpForm class.
 * SignUpForm is the data structure for keeping
 * user login form data. It is used by the 'signup' action of 'ProfileController'.
 */
class SignUpForm extends CFormModel
{
	public $firstname;
	public $lastname;
	public $password;
	public $confirmPassword;
	public $email;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
				array('firstname, lastname, password, confirmPassword, email', 'required'),
				array('password, confirmPassword', 'verifyPassword'),
				array('email', 'email'),
				array('email', 'checkEmailExisting')
		);
	}

	/**
	 * Compares the password.
	 * This is the 'verifyPassword' validator as declared in rules().
	 */
	public function verifyPassword($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			if($this->password != $this->confirmPassword)
				$this->addError('password','Password and Confirm password do not match. Please enter again');
		}
	}

	/**
	 * verifies emailid of user.
	 * This is the 'verifyMailAddress' validator as declared in rules().
	 */
	function checkEmailExisting($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->email,$this->password);
			if($this->_identity->checkEmailExisting($this->email))
				$this->addError('email','Email is already registered.');

			return false;
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
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
	
	public function userSave($activationCode)
	{
		$this->_identity=new UserIdentity($this->email,$this->password);
		if($this->_identity->userSave($this->firstname, $this->lastname, $this->email, $this->password, $activationCode))
			return true;
		else 
			return false;		
	}
}