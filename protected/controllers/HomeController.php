<?php

require (dirname(__FILE__).'/../models/StaticModel.php');

class HomeController extends Controller
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
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
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
	
	public function actionAutoSuggestLocation()
	{
		$data = file_get_contents("php://input");
		$objData = json_decode($data);
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$locations = StaticModel::getLocations();
			
		$jsonData = json_encode($locations);
		
		print_r($jsonData);
		//in_array($objData->data, $jsonData);
		//$this->render('testfade',array($fullData));
	}
	
	public function actionAutoSuggestSpeciality(){
		$data = file_get_contents("php://input");
		$objData = json_decode($data);		
		$specialities = StaticModel::getSpecialities();
		
		$jsonData = json_encode($specialities);
		print_r($jsonData);
	}
	
	public function actionStateMap()
	{
		header('Content-Type: application/json');
		$stateMap = StaticModel::getStateMap();	
		$jsonData = json_encode($stateMap);
		print_r($jsonData);
	}	
}