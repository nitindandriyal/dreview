<?php
#####################################
# Include PHP Mailer Class
#####################################
require("class.phpmailer.php");
?>
<?php
#####################################
# Function to send email
#####################################
function sendEmail ($fromName, $fromEmail, $toEmail, $subject, $emailBody) {
	$mail = new PHPMailer();
	
	$mail->IsSMTP();	// telling the class to use SMTP
	$mail->SMTPDebug  = 1;	// enables SMTP debug information (for testing)
	$mail->SMTPAuth   = true;	// enable SMTP authentication
	$mail->Username   = "WebAdmin@dreview.in";
	$mail->Password   = "PappuPassHoGaya";
	$mail->FromName = $fromName;
	$mail->From = $fromEmail;
	$mail->AddAddress($toEmail);
		
	$mail->Subject = $subject;
	$mail->Body = $emailBody;
			
	if(!$mail->Send()) {
		return false;
	} else {
		return true;
	}
}

#####################################
# Finally send email
#####################################
function sendVerificationMail($activationLink,$UserEmail,$name,$password){
	//Data to be sent (Ideally fetched from Database)

	$Subject = "Thank you for registering with DReview";
	$emailBody = "Hi $name, \r\n";
	$emailBody .= "\r\nThanks for registering with DReview. \r\n";
	$emailBody .= "Please click on the below link to activate your Account : \r\n";
	$emailBody .=" \r\n#link# \r\n";
	$emailBody .= "\r\nPlease ignore this email if you are not the intended recipient. \r\n";
	$emailBody .= "\r\nCheers, \r\n";
	$emailBody .= "DReview Team";
			
	//Replace all the variables in template file
	$emailBody = str_replace("#link#",$activationLink,$emailBody);
	//Send email
	$emailStatus = sendEmail ("DReview", "WebAdmin@dreview.in", $UserEmail, $Subject, $emailBody);
	
	//If email function return false
	if ($emailStatus != 1) {
		echo "An error occured while sending email. Please try again later.[".$emailStatus."]";
	} 
}
?>