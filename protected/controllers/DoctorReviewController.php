<?php
class DoctorReviewController extends Controller
{
	public $docQueryResult =array();
	public $docdetail =array();
	public $docAppintmentDetail =array();
	public $docQualification =array();
	
	
	//search the doctor based on speciality and city/state
	public function actionDetailedReview($param1)
	{
		//get details of doctor
		$docDetails = Yii::app()->db->createCommand()
		->selectDistinct(array('FIRST_NAME','LAST_NAME','DOB','GENDER','MEDICINE','LANG_SPOKEN','PRACTICE_ST_DT','USER_RATING','TOTAL_REVIEWS'))
		->from('tbl_doctor')
		->where('tbl_doctor.ID_DOCTOR=:docId',array(':docId'=> $param1))

		->queryAll();
		$this->docdetail = $docDetails;
		$docAppointmentDetails = Yii::app()->db->createCommand()
		->select(array('OFFICE_NAME','PRI_CONTACT_NO','EMAIL','DISTRICT','AREA'))
		->from('tbl_doc_appointments')
		->where('tbl_doc_appointments.ID_DOCTOR=:docId',array(':docId'=> $param1))
		->queryAll();
		
		$this->docAppintmentDetail = $docAppointmentDetails;
		
		$docQualification = Yii::app()->db->createCommand()
		->select(array('QUALIFICATION','INSTITUTION','SUPER_SPECIALITY','SUB_SPECIALITY'))
		->from('tbl_doc_qualification')
		->where('tbl_doc_qualification.ID_DOCTOR=:docId',array(':docId'=> $param1))
		->queryAll();
		
		$this->docQualification = $docQualification;
		//Get the reviews of the doctor
		$result = Yii::app()->db->createCommand()
		->select(array('REVIEW','RATING','ID_REVIEW','REVIEW_DATE'))
		->from('tbl_reviews')
		->where('ID_DOCTOR=:docId',array(':docId'=> $param1))
		->order('tbl_reviews.REVIEW_DATE')
		->queryAll();

		$this->docQueryResult = $result;
		$dataProvider=new CArrayDataProvider($result, array('keyField'=>'ID_REVIEW',
    		'pagination'=>array(
        	'pageSize'=>10,
    							),
				));
		$this->render('detailedReviews',array('dataProvider'=> $dataProvider,'docDetail' =>$this->docdetail,'docAppointmentDetails'=>$this->docAppintmentDetail,'docQualification'=>$this->docQualification));
	}//end of func actionDocSearchByCity
}//end of class
