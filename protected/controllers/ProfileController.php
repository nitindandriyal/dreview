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
		$this->render('Login',array('model'=>$model));
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
				$activation = md5(uniqid(rand(), true));
					
				// Send the email:
				$message_part1 = "Please click on this link to Activate your Account :nn";
				$message_part2 = "http://localhost/myapp/index.php?r=site/activate" . '?email=' . urlencode($model->email) . '&activation='. $activation;
				sendVerificationMail();
				/* $yiimail = new YiiMailMessage;
				$yiimail->setBody($message_part1 . $message_part2,'text/html');
				$yiimail->subject = 'Service';
				$yiimail->addTo('nitin.dandriyal@gmail.com');
				$yiimail->from = 'myservice@email.com';
				Yii::app()->mail->send($yiimail);
				 	
				$model->activation = $activation;
					
				$model->save();
				*/	
				$this->renderText('Click on the Activation Link in your email to Activate your account '.$activation,true);
					
			}
		}
		//reset modell
		//$model = new SignUpForm('activation');
		// display the login form
		$this->render('SignUp',array('model'=>$model));
	}
	
	public function actionRegister()
	{
		$model=new SignUpForm('register');
	
		// uncomment the following code to enable ajax-based validation
		/*
		 if(isset($_POST['ajax']) && $_POST['ajax']==='login-form-register-form')
		 {
		echo CActiveForm::validate($model);
		Yii::app()->end();
		}
		*/
	
		if(isset($_POST['SignUpForm']))
		{
			$model->attributes=$_POST['SignUpForm'];
			if($model->validate())
			{
								
                $activation = md5(uniqid(rand(), true));
                
                // Send the email:
                $message_part1 = "Please click on this link to Activate your Account :nn";
                $message_part2 = "http://localhost/myapp/index.php?r=site/activate" . '?email=' . urlencode($model->email) . '&activation='. $activation;

                $yiimail = new YiiMailMessage;
                $yiimail->setBody($message_part1 . $message_part2,'text/html');
                $yiimail->subject = 'Service';
                $yiimail->addTo('nitin.dandriyal@gmail.com');
                $yiimail->from = 'myservice@email.com';
                Yii::app()->mail->send($yiimail);

                $model->activation = $activation;

                $model->save();

                $this->renderText('Click on the Activation Link in your email to Activate your account',true);
  
            }
        }
                //reset modell    
        $model = new SignUpForm('activation');
		$this->render('register',array('model'=>$model));
	}	

	//function to activate user account
	public function actionActivate()
	{
		$model = new SignUpForm('activation');
	
		if(isset($_POST['SignUpForm']))
		{
			$model->attributes=$_POST['SignUpForm'];
	
			$model = $model->findByAttributes( array('email'=>$model->email,'activation'=>$model->activation) );
	
			if( $model ){
	
				$model->activation = null;
				$model->save();
	
			}
	
		}
	
		//reset modell
		$model = new SignUpForm('activation');
		$this->render('activate',array('model'=>$model));
	
	}	
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
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