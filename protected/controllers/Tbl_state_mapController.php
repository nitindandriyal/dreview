<?php
class Tbl_state_mapController extends Controller
{
	public $state = array();
	public $city = array();
	
	//Action function for Tbl_state_mapController controller
	public function actionIndex($param1)
	{
	    $criteria = new CDbCriteria();
	    $criteria->select = 'STATE';
	    $criteria->distinct = true;
	    $model = TblStateMap::model()->findAll($criteria);
	    for($stateCount=0;$stateCount<count($model);$stateCount++)
		{
		    $this->state[$stateCount] = $model[$stateCount]->STATE;
		    $criteria = new CDbCriteria();
		    $criteria->select = 'CITY';
		    $str = $this->state[$stateCount];
		    $criteria->condition = "STATE=:stateName";
		    $criteria->params=array(':stateName'=>$str);
		   	$model_new = TblStateMap::model()->findAll($criteria);
		   	for($cityCount=0;$cityCount<count($model_new);$cityCount++)
			{
			     $this->city[$stateCount][$cityCount] = $model_new[$cityCount]->CITY;     
			}//end of for($cityCount=0 ..... 
		   
		}//end of for($stateCount=0.......
		 
	 	 //send the results to view file	
	  	 $this->render('index',array("city"=> $this->city,"state"=> $this->state,"firstParam" =>$param1));
	 }//end of function actionIndex()		

public function actionState($param1)
{
	$this->render('state',array("stateParam" =>$param1));
}
}
 