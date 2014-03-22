<?php
class Tbl_state_mapController extends Controller
{
	
public $state = array();
public $city = array();
	public function actionIndex()
		{
	    $criteria = new CDbCriteria();
	    $criteria->select = 'STATE';
	    $criteria->distinct = true;
	    $model = TblStateMap::model()->findAll($criteria);
	    for($i=0;$i<count($model);$i++)// no of state
		    {
		    $this->state[$i] = $model[$i]->STATE;
		    $criteria = new CDbCriteria();
		    $criteria->select = 'CITY';
		    $str = $this->state[$i];
		    $criteria->condition = "STATE=:xyz";
		    $criteria->params=array(':xyz'=>$str);
		    $model_new = TblStateMap::model()->findAll($criteria);
		    for($j=0;$j<count($model_new);$j++)//no of cities of state
			    {
			     $this->city[$i][$j] = $model_new[$j]->CITY;
			     
			    }
		   
		    }
	   
	  	 $this->render('index',array("city"=> $this->city,"state"=> $this->state));
	 }		


	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}