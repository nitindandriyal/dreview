<?php
/*
 * Created on 29-Mar-2014
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<div class="container">


<?php foreach ($docDetail as $row){?>
<h2><?php echo "Dr. " ;echo $row['FIRST_NAME'];echo " " ;echo $row['LAST_NAME'] ;?>  
</h2>
<br>
<?php echo "DOB: ";echo $row['DOB']; ?>
<br>
<?php echo "LANG_SPOKEN: ";echo $row['LANG_SPOKEN']; ?>
<br>
<?php echo "PRACTICE_ST_DT: ";echo $row['PRACTICE_ST_DT']; ?>
<br>
<?php echo "USER_RATING: ";echo $row['USER_RATING']; ?>
<br>
<?php echo "MEDICINE: ";echo $row['MEDICINE']; ?>
<br>
<?php echo "GENDER: ";echo $row['GENDER']; ?>
<br>
<?php echo "TOTAL_REVIEWS: ";echo $row['TOTAL_REVIEWS']; ?>
<br>
<?php }?>

<?php foreach ($docQualification as $row){?>
<br>
<?php echo "QUALIFICATION: ";echo $row['QUALIFICATION']; ?>
<br>
<?php echo "INSTITUTION: ";echo $row['INSTITUTION']; ?>
<br>
<?php echo "SUPER_SPECIALITY: ";echo $row['SUPER_SPECIALITY']; ?>
<br>
<?php echo "SUB_SPECIALITY: ";echo $row['SUB_SPECIALITY']; ?>

<?php }?>

<?php foreach ($docAppointmentDetails as $row){?>
<br>
<?php echo "Hospital: ";echo $row['OFFICE_NAME']; ?>
<br>
<?php echo "PRI_CONTACT_NO: ";echo $row['PRI_CONTACT_NO']; ?>
<br>
<?php echo "EMAIL: ";echo $row['EMAIL']; ?>
<br>
<?php echo "DISTRICT: ";echo $row['DISTRICT']; ?>
<br>
<?php echo "AREA: ";echo $row['AREA']; ?>

<?php }?>
</DIV>

<p>


	<?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
          'template' => '{items}{pager}',
        'cssFile'=>'../../../css/dr_style.css'
)); ?>
</p>
