<?php
require_once (dirname(__FILE__).'/../lib/mail/email.php');

session_start();

class UsersController extends Controller
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

	public function actionProfile()
	{
		$model = new UserProfile;
		$user = Yii::app()->user->id;				
		
		if(null == $user  || !array_filter($user))
		{
			$email = $_SESSION['email'];
		}
		else
		{
			$email = $user['email'];
		}		
		$result = $model->getProfile($email);
				
		$this->render('profile', array('result'=>$result));
	}
	
	public function actionAddImage()
	{
	
		$target_Path = "C:/tools/XAMPP/htdocs/dreview/images/profiles/";
		$target_Path = $target_Path.basename( $_FILES['userFile']['name'] );

		if (isset($_FILES['userFile']) && $_FILES['userFile']['size'] > 0)
		{		
			$file = $_FILES['userFile']['name'];
			//$fileUpload = move_uploaded_file( $_FILES['userFile']['tmp_name'], dirname(__FILE__)."/".$_FILES['userFile']['name']);
			$fileUpload = move_uploaded_file( $_FILES['userFile']['tmp_name'], $target_Path);
			
		}
	
		$model = new UserProfile;	
		$user = Yii::app()->user->id;
		
		if(null == $user  || !array_filter($user))
		{
			$email = $_SESSION['email'];
		}
		else
		{
			$email = $user['email'];
		}		
		$result = $model->addImage($email, $file);
				
		$this->forward('profile');
	}

	public function actionReviews()
	{
		$model = new UserProfile;
		$user = Yii::app()->user->id;
	
		if(null == $user  || !array_filter($user))
		{
			$email = $_SESSION['email'];
		}
		else
		{
			$email = $user['email'];
		}
		$result = $model->getReviews($email);

		$this->render('reviews', array('result'=>$result));
	}	
	
}