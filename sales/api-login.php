<?php
/**
 * WordPress User Page
 *
 * Handles authentication, registering, resetting passwords, forgot password,
 * and other user handling.
 *
 * @package WordPress
 */

/** Make sure that the WordPress bootstrap has run before continuing. */
require( dirname(__FILE__) . '/wp-load.php' );
$action=$_GET['action'];
switch($action){
	case "oAuth" :					
					echo $url = "http://dv2-gps.aenetworks.com/SS/api/Login/Login";
					$data = array(
						"UserName" => $_POST['form-username'], 
						"Password" =>  $_POST['form-password']
						); 

					$result = postRemoteResult($url,$data); 
					if(isset($result->TokenDetail)){
						 $email =  $_POST['form-username'];
  						$user_id = email_exists($email);						
						if(!$user_id){					
							$user_id = wp_create_user( $result->FullNm, md5($result->Password), $result->UserName);
						}							
						
						 $user = get_user_by( 'id', $user_id ); 	
						$user_details["Id"]=$user;
						$user_details["Token"]=$result->TokenDetail;							
						unset( $_COOKIE['oAuth'] );
						unset( $_COOKIE['Token'] );
						$json = json_encode($user_details);
						set_newuser_cookie("oAuth",$json) ;	
						set_newuser_cookie("Token",$result->TokenDetail->AuthToken) ;										
						wp_set_current_user( $user_id, $user->user_login );
						wp_set_auth_cookie( $user_id );
						do_action( 'wp_login', $user->user_login );
						wp_redirect(site_url()."/scripted-series/");
						
					} 
					else{
						new WP_Error( 'mylogin', 'Invalid User', 'Login Again' );
						wp_redirect(site_url()."/login/");
					}
					break;
	case "logout" :
					unset( $_COOKIE['oAuth'] );
					wp_logout();
					wp_redirect(site_url()."/");
					break; 
}


function postRemoteResult($url,$data){
	$data_string = json_encode($data); 
	$ch = curl_init($url);                                                                      
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));                   
	$result = curl_exec($ch);
	return json_decode($result);
}   
		