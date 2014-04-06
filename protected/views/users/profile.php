<?php 
$bgImage = "../images/users/".$result['image'];
?>
<div style="height:100%;width:auto;margin:auto;border:1px solid; background: url(<?=$bgImage?>) no-repeat;background-size: cover;">
	<div style="margin:60px 0px 20px 20px">	
		<div class="profile-glassy">
			<h3><?php echo $result['username']?></h3><hr>			
			<span>Email</span>
			<p><?php echo $result['email']?></p>			
			<span>Mobile</span>
			<p><?php echo $result['mobile']?></p>
			<span>City</span>
			<p><?php echo $result['city']?></p>
		</div>
		<br>
		<div class="profile-glassy">
			<h3>My Account</h3><hr>
			<span>Login Account</span>
			<p><?php echo $result['oauth_provider']?></p>
			<span>Status</span>
			<p><?php echo $result['status']?></p>
			<span>Last Login</span>
			<p><?php echo $result['last_login']?></p>			
		</div>
		<br>	
		<div class="profile-glassy">
			<h3>My Reviews</h3><hr>
			<span>Total reviews</span>
			<p><a href="/users/reviews"><?php echo $result['reviews']?></a></p>
			<span>Followers</span>
			<p><?php echo $result['followers']?></p>			
		</div>
		<br>
		<div class="profile-glassy">
			<form action='addImage' method='POST' enctype='multipart/form-data'>
				<input type='file' name='userFile' class="btn" style="margin-left: 8px;margin-bottom: 10px;margin-top: 8px">
				<button type='submit' name='upload_btn' value='upload' class='btn' style="margin-left: 18px;"/>Upload  Image</button>
			</form>		
		</div>
	</div>	
</div>