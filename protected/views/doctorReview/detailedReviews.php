<?php
/*
 * Created on 29-Mar-2014
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<div class="container">

 <span class="hr"></span>
<div class="row">
        <div class="col-sm-6">
        <div class="widget-item-image_main badge-image">
        <a href="/find/Illinois/Chicago/Plastic-Surgeon/Peter-Johnson">
                            <img src="../../images/doc_pic_big"/></a>
                            </div>
<?php foreach ($docDetail as $row){?>
<h2><?php echo "Dr. " ;echo $row['FIRST_NAME'];echo " " ;echo $row['LAST_NAME'] ;?>  
</h2>
<br>
<?php echo "Practising Since: ";echo $row['PRACTICE_ST_DT']; ?>
<br>
	<?php for($i=0;$i<5;$i++){?>
		<?php if($i<$row['USER_RATING']) {?>
			<img src = "../../images/star.png" height="18" width="18"/>
			<?php }else{ ?>
			<img src = "../../images/star_off.png"height="18" width="18"/>				
				<?php } ?>
		<?php } ?>
<?php echo " From   ";echo $row['TOTAL_REVIEWS'];echo" reviews" ?>
<br>
<?php }?>

<?php foreach ($docQualification as $row){?>
<?php echo $row['QUALIFICATION']; ?>
<?php echo " (";echo $row['INSTITUTION']; echo ")";?>
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
<?php echo "CITY: ";echo $row['DISTRICT']; ?>
<br>
<?php echo "AREA: ";echo $row['AREA']; ?>

<?php }?>
</DIV>
</DIV>
</DIV>
</DIV>

<p>


	<?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
          'template' => '{items}{pager}',
        'cssFile'=>'../../../css/dr_style.css'
)); ?>
</p>
