<?php

require 'dbconfig.php';

class User 
{

    function checkUser($uid, $oauth_provider, $username,$email,$twitter_otoken,$twitter_otoken_secret) 
	{
	
		$file = fopen ('test.log','a+');
		fwrite($file, "\n Inside check user");
		fclose($file );
	
		$fetchQuery = "SELECT username, email, oauth_provider, oauth_uid FROM `tbl_users` WHERE oauth_uid = '$uid' and oauth_provider = '$oauth_provider'";		
        $query = mysql_query($fetchQuery ) or die(mysql_error());
        $result = mysql_fetch_array($query);
        
        if (empty($result))
        {
            #user not present. Insert a new Record
            $query = mysql_query("INSERT INTO `tbl_users` (oauth_provider, oauth_uid, username,email) VALUES ('$oauth_provider', $uid, 			    '$username','$email')") or die(mysql_error());
            $query = mysql_query($fetchQuery );
            $result = mysql_fetch_array($query );            
        }
       
        return $result;
    }   
    

}

?>