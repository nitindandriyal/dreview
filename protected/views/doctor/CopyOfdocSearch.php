<?php
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script type="text/javascript">
$(function() {
  $( "#search-tagline" ).tabs();
});

$doctors = [
    		{
    			id: 1,
    			firstname: 'Mangala',
    			lastname: 'Devi',
    			gender: 'Female',
    			lang_spoken: 'Kannada, English',
    			user_rating: '5',
    			total_reviews: '10',
    			profile_image: '1.jpg',
    			appointments:	[ {   			
    			     				office_type: 'Hospital',
    			             	    office_name: 'K.C.Raju Multi Speciality Hospital',
    			             	    pri_contact_no: '9986555555',
    			             	    state: 'Karnataka',
    			             	    area: 'Lingarajapura',
    			             	    street:'4th Cross,Hennur Main Road';
     	    					    landmark:'Below Lingarajapuram Flyover';
			    					available_from: '09:00'
				    				available_to:	'14:00'
					    			workdays: 'MON - SAT'
    							   }
					    		   {   			
				     				 office_type: 'Hospital',
				             	     office_name: 'K.C.Raju Multi Speciality Hospital',
				             	     pri_contact_no: '9986555555',
				             	     state: 'Karnataka',
				             	     area: 'Lingarajapura',
				             	     street:'4th Cross,Hennur Main Road';
									 landmark:'Below Lingarajapuram Flyover';
									 available_from: '16:00'
				    				 available_to:	'21:00'
					    			 workdays: 'MON - SAT'
								    }
    							],
        		qualifications:	[{
            						qualification:'MBBS',
            						Institute:'IMA AKN Sinha Institute'
        						  }
				        		  {
									qualification:'P.G.F.P',
									Institute:'IMA AKN Sinha Institute',
								 	super_speciality:'Cardiology'
								  }				  
    							]
    		}
    		];  

    		
    		
</script>
<div class="docSearchContainer">
	<div class="docFilterContainer">	
	</div>
		
	<div class="docListContainer">
		<div id="docListHeader">
			<span style="font-weight:bold;">&nbsp;Order By:</span>
			<ul>
				<li>Name</li>
				<li>Location</li>
				<li>Rating</li>
			</ul>
		</div>
	<?php for ($x=0; $x<=10; $x++){ ?>
		<div id="docList">
			<img id="docImage" src="../images/doctors/1.jpg"/>
			<div id="docSummaryDiv">
				<span style="font-weight: bold;">Dr. Monica Bhagat</span><br>				
				<span>MBBS, MD(Cardiology)</span><br>
				<span>Safdarjang, Delhi</span><br>
				<img src = "../images/star.png" height="18" width="18"/>
				<span>10 reviews</span>
			</div>
		</div>
		<div id="docList">
			<img id="docImage" src="../images/doctors/2.jpg"/>
			<div id="docSummaryDiv">
				<span style="font-weight: bold;">Dr. Soumya Swaminathan</span><br>				
				<span>Director of NIRT</span><br>
				<span>Chennai</span><br>
				<img src = "../images/star.png" height="18" width="18"/>
				<span>53 reviews</span>
			</div>
		</div>
		<?php } ?>
	</div>
	
	
	<div class="docDetailsContainer" style="border: 1px solid silver">
		<div id="docDetails" style="width: 99%;">
			<div id="docSummaryDiv" style="position:relative;">
				<span style="font-weight: bold; font-size: 36px;">Dr. Monica Bhagat</span><br>				
				<span style="font-weight: bold; font-size: 24px;">MBBS, MD(Cardiology)</span><br>
				<span>Safdarjang, Delhi</span><br>
				<img src = "../images/star.png" height="18" width="18"/>
				<span>10 reviews</span>
			</div>
			<div style="position:relative; float: right;">
				<img src="../images/doctors/1.jpg">
			</div>
		</div>
		<div id="search-tagline" style="position: relative;clear: both;">
			  <ul>
			    <li class="tabs"><a href="#tabAbout">About</a></li>
			    <li class="tabs"><a href="#tabAppointments">Appointments</a></li>
			    <li class="tabs"><a href="#tabReviews">Reviews</a></li>
			  </ul>
			  <div id="tabAbout">
			  </div>
			  <div id="tabAppointments">
			  </div>	
			  <div id="tabReviews">
			  </div>			
		</div>
	</div>
</div>