<?php
require_once (dirname(__FILE__).'/../lib/mail/email.php');
class ProfileController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	
	public function actionLoginFacebook()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('loginFacebook');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		/*
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		*/
		
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				Yii::app()->request->redirect('/dreview/home/index');
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
	
	public function actionSignUp()
	{
		$model=new SignUpForm;

		//Yii::app()->request->redirect('/dreview/home/index');
			
		if(isset($_POST['SignUpForm']))
		{
			$model->attributes=$_POST['SignUpForm'];
			if($model->validate())
			{					
				$activationCode = md5(uniqid(rand(), true));
				
				if ($model->userSave($activationCode))
				{
					// Send the email:
					$activationLink = "http://".$_SERVER['HTTP_HOST']."/profile/activate" . '?email=' . urlencode($model->email) . '&activation='. $activationCode;
					sendVerificationMail($activationLink,$model->email,$model->firstname, $model->password);
	
					$this->render('SignUp',array('model'=>$model, 'activationSucess'=> true));
					//Yii::app()->request->redirect('/dreview/profile/SignUp');
				}	
			}
		}
		//reset modell
		//$model = new SignUpForm('activation');
		// display the login form
		$this->render('signUp',array('model'=>$model));
	}
	
	//function to activate user account
	public function actionActivate()
	{
		$model = new SignUpForm('activation');
		
		if(!empty($_GET['activation']) && isset($_GET['activation']))
		{
			$code=mysql_real_escape_string($_GET['activation']);
			echo $code;
			$email=$_GET['email'];
			echo $email;
			
			if ($model->userCheckAndActivate($email, $code))
				echo "Hurray !!!! account activated.";
			else 
				echo "Error in account activation";
		}

		//reset modell
		$this->render('activate',array('model'=>$model));
	
	}	
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect("/dreview/home/index");
	}
	
	public function actionCheckLogin()
	{
	// check login details
		$user = new TblUsers('search');
		$user->unsetAttributes();
		
		if (isset($_GET['email']))
			$customerToHotel->attributes = $_GET['customerToHotel'];
			
		$this->render('checkLogin', array('customerToHotel' => $customerToHotel));
	}	
	
}