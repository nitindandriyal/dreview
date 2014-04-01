<?php 
$bgImage = "../images/profiles/".$result['image'];
?>
<div style="height:800px;width:auto;margin:auto;border:1px solid; background: url(<?=$bgImage?>) no-repeat;background-size: cover;">
	<div style="margin:20px 20px 20px 20px;">	
		<div>
			<h3>About me</h3>
			<p>Name<span style="padding-left: 20px"><?php echo $result['username']?></span></p>
			<p>Email<span style="padding-left: 20px"><?php echo $result['email']?></span></p>
			<p>Mobile</p>
			<p>City</p>
		</div>
		<div>
			<h3>My Account</h3>
			<p>Login Account<span style="padding-left: 20px"><?php echo $result['oauth_provider']?></span></p>
			<p>Status<span style="padding-left: 20px"><?php echo $result['status']?></span></p>
			<p>Last login<span style="padding-left: 20px"><?php echo $result['last_login']?></span></p>			
		</div>	
		<div>
			<h3>My Reviews</h3>
			<p>Reviews</p>
			<p>Followers</p>			
		</div>
		<div>
			<form action='addImage' method='POST' enctype='multipart/form-data'>
			<input type='file' name='userFile'><br>
			<input type='submit' name='upload_btn' value='upload'>
			</form>		
		</div>
	</div>	
</div>