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
				array('password, confirmPassword', 'verify'),
				array('email', 'verifyMailAddress'),
		);
	}

	/**
	 * Compares the password.
	 * This is the 'verify' validator as declared in rules().
	 */
	public function verify($attribute,$params)
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
	function verifyMailAddress($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			if (!filter_var($this->email, FILTER_VALIDATE_EMAIL))
				$this->addError('email','Invalid email address. Please enter again');
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
}
