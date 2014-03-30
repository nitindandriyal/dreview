<div>
	<?php   

	if(array_filter($model->getErrors()))
	{
		$errValue = $model->getErrors('activationStatus');
		
		if ($errValue[0] == 'ALREADY_ACTIVE')
		{
	?>
			<div id="SuccessDivId">	
				<h4>Account Active</h4>
				<p>Your account is already active, no need to activate again</p>
				<p>LogIn to Dreview using your registered email and password <a href="/dreview/profile/login">LogIn</a> </p>
			</div>		
	<?php		
		}	
		elseif ($errValue[0] == 'ACCOUNT_ACTIVATED')
		{
	?>
			<div id="SuccessDivId">	
				<h4>Account Activated</h4>
				<p>Your account has been activated</p>
				<p>Login to Dreview using your registered email and password <a href="/dreview/profile/login">LogIn</a></p>
			</div>	
	<?php		
		}	
		elseif ($errValue[0] == 'INVALID_URL')
		{
	?>
			<div class="ErrorDiv">	
				<h4>Invalid URL</h4>
				<p>Activation URL is invalid</p>
				<p>Please click on the activation URL sent on your registered email</p>
			</div>	
	<?php		
		}	
		elseif ($errValue[0] == 'INVALID_REQUEST')
		{
			?>
					<div class="ErrorDiv">	
						<h4>Invalid Request</h4>
						<p>Your email is not registered with DReview</p>
						<p>Please create a new account <a href="/dreview/profile/SignUp">Create Account</a></p>
					</div>	
			<?php		
				}
	}

	?>
</div>	