
<?php
class DoctorController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public $docQueryResult =array();
	//search the doctor based on speciality and city/state
	public function actionDocSearchByCity($param1,$param2)
	{
		/*Query:
		SELECT DISTINCT doc.*
		FROM tbl_doctor doc,
	 	tbl_doc_appointments doc_a,
	 	tbl_doc_qualifications doc_q
		WHEREdoc_a.DISTRICT = 'Delhi'
		AND doc_q.SUPER_SPECIALITY = 'Immunology'
		AND doc_a.ID_DOCTOR = doc_q.ID_DOCTOR
		AND doc.ID_DOCTOR = doc_a.ID_DOCTOR
		ORDER BY doc.USER_RATING;
		*/
		$result = Yii::app()->db->createCommand()
		->selectDistinct(array('FIRST_NAME','MIDDLE_NAME','LAST_NAME','GENDER','PRACTICE_ST_DT','USER_RATING','TOTAL_REVIEWS','QUALIFICATION','tbl_doctor.ID_DOCTOR'))
		->from('tbl_doctor,tbl_doc_appointments,tbl_doc_qualification')
		->where('DISTRICT=:city',array(':city'=> $param1))
		->andWhere('tbl_doc_qualification.SUPER_SPECIALITY=:speciality',array(':speciality'=>$param2))
		->andWhere('tbl_doc_appointments.ID_DOCTOR=tbl_doc_qualification.ID_DOCTOR')
		->andWhere('tbl_doctor.ID_DOCTOR=tbl_doc_appointments.ID_DOCTOR')
		->order('tbl_doctor.USER_RATING DESC')
		->queryAll();

		$this->docQueryResult = $result;
		$dataProvider=new CArrayDataProvider($result, array('keyField'=>'LAST_NAME',
    		'pagination'=>array(
        	'pageSize'=>10,
    							),
				));
		$this->render('DocListView',array('dataProvider'=> $dataProvider,"city"=>$param1,"speciality"=>$param2));
	}//end of func actionDocSearchByCity
	
	//search the doctor based on speciality and city/state
	public function actionDocSearchByState($param1,$param2)
	{
		 $result = Yii::app()->db->createCommand()
		->selectDistinct(array('FIRST_NAME','MIDDLE_NAME','LAST_NAME','GENDER','PRACTICE_ST_DT','USER_RATING','TOTAL_REVIEWS','QUALIFICATION','tbl_doctor.ID_DOCTOR'))
		->from('tbl_doctor,tbl_doc_appointments,tbl_doc_qualification')
		->where('STATE =:state',array(':state'=> $param1))
		->andWhere('tbl_doc_qualification.SUPER_SPECIALITY=:speciality',array(':speciality'=>$param2))
		->andWhere('tbl_doc_appointments.ID_DOCTOR=tbl_doc_qualification.ID_DOCTOR')
		->andWhere('tbl_doctor.ID_DOCTOR=tbl_doc_appointments.ID_DOCTOR')
		->order('tbl_doctor.USER_RATING DESC')
		->queryAll();
		$this->docQueryResult = $result;
		$dataProvider=new CArrayDataProvider($result, array('keyField'=>'LAST_NAME',
    		'pagination'=>array(
        	'pageSize'=>10,
    							),
				));
		$this->render('DocListView',array('dataProvider'=> $dataProvider,"city"=>$param1,"speciality"=>$param2));
	}//end of func actionDocSearchBySt
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

	public function actionWriteReview()
	{
		$model=new DoctorReviews;

		// uncomment the following code to enable ajax-based validation
		/*
		 if(isset($_POST['ajax']) && $_POST['ajax']==='doctor-reviews-writeReview-form')
		 {
		echo CActiveForm::validate($model);
		Yii::app()->end();
		}
		*/
		$idDoc = Yii::app()->session['idDoc'];
		$userEmail = Yii::app()->session['user'];		
		
		if(isset($_POST['DoctorReviews']))
		{
			$model->attributes=$_POST['DoctorReviews'];
			if($model->validate())
			{
				if($model->saveReview($model->PURPOSE, $model->RATING, $model->REVIEW, $idDoc, $userEmail))
				{
					echo "review saved";
				}
				// form inputs are valid, do something here
			}
		}
		$this->render('writeReview',array('model'=>$model));
	}
}