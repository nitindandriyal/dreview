<?php

/**
 * This is the model class for table "tbl_doc_reviews".
 *
 * The followings are the available columns in table 'tbl_doc_reviews':
 * @property integer $ID_REVIEW
 * @property integer $ID_DOCTOR
 * @property integer $ID_USER
 * @property string $USER_TYPE
 * @property string $PURPOSE
 * @property integer $RATING
 * @property string $RECOMMENDED
 * @property string $REVIEW
 * @property string $REVIEW_DATE
 * @property integer $VIEWS
 * @property integer $AGREE
 * @property integer $DISAGREE
 * @property string $STATUS
 * @property integer $REPORT_ABUSE
 * @property string $SPAM
 *
 * The followings are the available model relations:
 * @property TblReportAbuse[] $tblReportAbuses
 */
class DoctorReviews extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_doc_reviews';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PURPOSE, RATING', 'required'),			
			array('REVIEW', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			//array('ID_REVIEW, ID_DOCTOR, ID_USER, USER_TYPE, PURPOSE, RATING, RECOMMENDED, REVIEW, REVIEW_DATE, VIEWS, AGREE, DISAGREE, STATUS, REPORT_ABUSE, SPAM', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'tblReportAbuses' => array(self::HAS_MANY, 'TblReportAbuse', 'ID_REVIEW'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_REVIEW' => 'Id Review',
			'ID_DOCTOR' => 'Id Doctor',
			'ID_USER' => 'Id User',
			'USER_TYPE' => 'User Type',
			'PURPOSE' => 'Purpose',
			'RATING' => 'Rating',
			'RECOMMENDED' => 'Recommended',
			'REVIEW' => 'Review',
			'REVIEW_DATE' => 'Review Date',
			'VIEWS' => 'Views',
			'AGREE' => 'Agree',
			'DISAGREE' => 'Disagree',
			'STATUS' => 'Status',
			'REPORT_ABUSE' => 'Report Abuse',
			'SPAM' => 'Spam',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID_REVIEW',$this->ID_REVIEW);
		$criteria->compare('ID_DOCTOR',$this->ID_DOCTOR);
		$criteria->compare('ID_USER',$this->ID_USER);
		$criteria->compare('USER_TYPE',$this->USER_TYPE,true);
		$criteria->compare('PURPOSE',$this->PURPOSE,true);
		$criteria->compare('RATING',$this->RATING);
		$criteria->compare('RECOMMENDED',$this->RECOMMENDED,true);
		$criteria->compare('REVIEW',$this->REVIEW,true);
		$criteria->compare('REVIEW_DATE',$this->REVIEW_DATE,true);
		$criteria->compare('VIEWS',$this->VIEWS);
		$criteria->compare('AGREE',$this->AGREE);
		$criteria->compare('DISAGREE',$this->DISAGREE);
		$criteria->compare('STATUS',$this->STATUS,true);
		$criteria->compare('REPORT_ABUSE',$this->REPORT_ABUSE);
		$criteria->compare('SPAM',$this->SPAM,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DoctorReviews the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function saveReview($purpose, $rating, $review, $idDoc, $idUser)
	{
		$instance = new DoctorReviews();
		$instance->PURPOSE = $purpose;
		$instance->RATING = $rating;
		$instance->REVIEW = $review;
		$instance->ID_DOCTOR = $idDoc;
		$instance->ID_USER = $idUser;
		$instance->save();				
	}
		
}
