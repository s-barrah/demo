<?php
//delete_user.php
//HANDLES USER DELETE ACTION

include_once "../includes/global.inc.php";
	
	// Script Error Reporting
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	//RESPONSE ARRAY
	$response = array();
	
	//ERRORS ARRAY
	$errors = array();
	
	//USER DATA ARRAY
	$data = array();
	
	//CHECK IF POST SUBMITTED
	if ($_POST) {
		
		//DECLARE FORM VARIABLES
		$user_id = '';
		$user_type = '';
		
		//ENSURE INPUT IS NOT EMPTY
		if(empty($_POST["userID"])){
				$errors[] = '<div class="text-white" style="font-size:11px;">User ID cannot be empty!</div>';
		}else{
				
			//SANITIZE INPUT
			$user_id = trim($_POST['userID']);
			$user_id = preg_replace('#[^0-9]#i', '', $user_id); // filter everything but numbers
		}
			
		//ENSURE INPUT IS NOT EMPTY
		if(empty($_POST["userType"])){
			$errors[] = '<div class="text-white">Please select a User Type!</div>';
		}else{
			//SANITIZE INPUT
			$user_type = $db->sanitize($_POST['userType']);
			
		}
		
		//STORE POST VARIABLES
		$data['id'] = $user_id;
		
		//CHECK FOR FORM ERRORS
		if(!empty($errors)){
			$response['success'] = false;
			$response['notif'] = '<div class="alert alert-danger text-center" role="alert">'.implode(" ", $errors).'</div>';
			
		//NO ERRORS TRY TO SAVE DATA	
		}else{
			//create the new user object
			$db = new DB();
				 
			//save the new user to the database
			$deleted = $db->delete($user_type, $user_id, 1);
		
			// check for successfull registration
			if ($deleted) {
				$response['success'] = true;
				$response['notif'] = '<div class="alert alert-success text-center" role="alert"><span class="glyphicon glyphicon-ok"></span> &nbsp; User has been deleted sucessfully!</div>';
				
			} else {
				$response['success'] = false;
				$response['notif'] = '<div class="alert alert-danger text-center" role="alert"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; Could not delete user!</div>';
				$response['status'] = 'error'; // could not delete
				
			}
		}
		 
	}
 
 
 echo json_encode($response);




