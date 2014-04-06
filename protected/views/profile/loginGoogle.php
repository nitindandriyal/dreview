<?php
# Logging in with Google accounts requires setting special identity, so this example shows how to do it.
require 'protected/lib/google/openid.php';
require 'protected/components/functions.php';

try 
{
    # Change 'localhost' to your domain name.
    $openid = new LightOpenID('localhost');
    //user is notlogged in
    if(!$openid->mode) 
    {     
	        $openid->identity = 'https://www.google.com/accounts/o8/id';
	        //Get additional google account information about the user , name , email , country
	        $openid->required = array('contact/email' , 'namePerson/first' , 'namePerson/last' , 'pref/language' , 'contact/country/home');	        
	        header('Location: ' . $openid->authUrl());
    } 
    elseif($openid->mode == 'cancel') 
	{
        echo 'User has canceled authentication!';
    } 
    //Echo login information by default
    else
    {
        if($openid->validate())
        {
            //User logged in
            $d = $openid->getAttributes();

            //print_r($openid->getAttributes());
            
            $username = $d['namePerson/first'].' '.$d['namePerson/last'];
            $email = $d['contact/email'];
            $language_code = $d['pref/language'];
            $country_code = $d['contact/country/home'];
            
            //now signup/login the user.
			$user = new User();
			$userdata = $user->checkGoogleUser('google',$username, $email);
            
            if(array_filter($userdata))
            {     
            	$_SESSION['username'] = $userdata['username'];
            	$_SESSION['email'] = $email;
            	$_SESSION['oauth_provider'] = $userdata['oauth_provider'];
            	header("Location: /home/index");
            }            
            
        }
        else
        {
            echo "User is not logged in";
        }
     } 
    
} 
catch(ErrorException $e) 
{
    echo $e->getMessage();
}