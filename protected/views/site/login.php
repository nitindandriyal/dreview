<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<div id="SignIn">
	<div id="loginDiv">
		<span class="loginTblSpan">Login to DReview</span>
		<br><br>
		<table class="login_tbl">
			<tr>
				<td>
				<input type="text"
					placeholder="Enter Email or Phone" autocomplete="off"
					maxlength="30" size="30" style="border-radius:5px">
				</td>				
			</tr>
			<tr>
				<td>
				<input type="text"
					placeholder="Enter Password" autocomplete="off"
					maxlength="30" size="30" style="border-radius:5px">
				</td>				
			</tr>
			<tr>
				<td align="center">
					<button class="btn">LogIn</button>
				</td>
			</tr>
		</table>

		<span class="loginTblSpan">OR</span>
		<span class="loginImageSpan"><img src="images/facebook.png"/><span>
		<span class="loginImageSpan"><img src="images/google.png"/><span>
		<span class="loginImageSpan"><img src="images/twitter.png"/><span>
	</div>
	
	<div style="width:2px; height:400px; background: red; display:inline-block; margin-top:50px"></div> 
	<div style="float:right; display:inline-block; height:300px; width:390px">		
		<table class="login_tbl">
			<tr>
				<td><span class="loginTblSpan">SignUp</span></td>
			</tr>	
			<tr>
				<td><span class="loginTblSpan" id="CreateAccount">Create an account with DReview</span></td>
			</tr>			
			<tr>
				<td>
				<input type="text"
					placeholder="First Name" autocomplete="off"
					maxlength="30" size="30" style="border-radius:5px">				
				</td>	
			</tr>
			<tr>
				<td>
				<input type="text"
					placeholder="Last Name" autocomplete="off"
					maxlength="30" size="30" style="border-radius:5px">				
				</td>					
			</tr>
			<tr>
				<td>
				<input type="text"
					placeholder="Email" autocomplete="off"
					maxlength="30" size="30" style="border-radius:5px">				
				</td>						
			</tr>
			<tr>
				<td>
				<input type="text"
					placeholder="Password" autocomplete="off"
					maxlength="30" size="30" style="border-radius:5px">				
				</td>						
			</tr>
			<tr>
				<td>
				<input type="text"
					placeholder="Confirm Password" autocomplete="off"
					maxlength="30" size="30" style="border-radius:5px">				
				</td>						
			</tr>
			<tr>
				<td align="center">
					<input id="tc_checkbox" type="checkbox" value="1" checked="1">
					<label>I agree to the terms and conditions*</label>				
				</td>							
			</tr>	
			<tr>
				<td align="center">
					<button class="btn" type="Submit">Create Account</button>
				</td>
			</tr>	
		</table>
	</div>		
</div>