<?php
//update_user.php
//HANDLES USER UPDATE FORM SUBMISSION

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
		$firstname = '';
		$lastname = '';
		$email = '';
		$telephone = '';
		$apprentice_id = '';
		$start_date = '';
		$end_date = '';
		$assessor_id = '';
		$is_accepting_new_apprentices = '';
		$name = '';
		$capacity = '';
		$description = '';
		
		//ENSURE INPUT IS NOT EMPTY
		if(empty($_POST["id"])){
				$errors[] = '<div class="text-white" style="font-size:11px;">User ID cannot be empty!</div>';
		}else{
				
			//SANITIZE INPUT
			$user_id = trim($_POST['id']);
			$user_id = preg_replace('#[^0-9]#i', '', $user_id); // filter everything but numbers
		}
			
		//ENSURE INPUT IS NOT EMPTY
		if(empty($_POST["user_type"])){
			$errors[] = '<div class="text-white">Please select a User Type!</div>';
		}else{
			//SANITIZE INPUT
			$user_type = $db->sanitize($_POST['user_type']);
			
		}
		
		//ENSURE INPUT IS NOT EMPTY
		if(empty($_POST["firstname"])){
			$errors[] = '<div class="text-white">Please enter an first name!</div>';
		}else{
			//SANITIZE INPUT
			$firstname = $db->sanitize($_POST['firstname']);
			
			//REGEX VALIDATE NAME
			if(!preg_match('/^[a-z ]+$/i', $firstname)) {
				$errors[] = '<div class="text-white">Please enter a valid first name</div>';
			} 
		}
		
		//ENSURE INPUT IS NOT EMPTY
		if(empty($_POST["lastname"])){
			$errors[] = '<div class="text-white">Please enter an last name!</div>';
		}else{
			//SANITIZE INPUT
			$lastname = $db->sanitize($_POST['lastname']);
			
			//REGEX VALIDATE NAME
			if(!preg_match('/^[a-z ]+$/i', $lastname)) {
				$errors[] = '<div class="text-white">Please enter a valid last name</div>';
			}
		}
		
		//ENSURE INPUT IS NOT EMPTY
		if(empty($_POST["email"])){
			$errors[] = '<div class="text-white">Please enter an email!</div>';
		}else{
			
			//SANITIZE INPUT
			$email = $db->sanitize($_POST['email']);
			//$table = $user_type;
			
			//REGEX VALIDATE EMAIL
			if(!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i', $email)) {
				$errors[] = '<div class="text-white">Please enter a valid email address!</div>';
			} 
			
		}
		
		//ENSURE INPUT IS NOT EMPTY
		if(empty($_POST["telephone"])){
			$errors[] = '<div class="text-white">Please enter a telephone number!</div>';
		}else{
			
			//SANITIZE INPUT
			$telephone = $db->sanitize($_POST['telephone']);
			
			//REGEX VALIDATE PHONE NUMBER
			if(!preg_match('/^[0-9\+\(\)\/-]+$/', $telephone)) {
				$errors[] = '<div class="text-white">Please enter a valid phone number</div>';
			}
		}
		
		//STORE POST VARIABLES
		$data['id'] = $user_id;
		$data['firstname'] = $firstname;
		$data['lastname'] = $lastname;
		$data['email'] = $email;
		$data['telephone'] = $telephone;
		
		
		if($user_type == 'apprentices'){
			
			//ENSURE INPUT IS NOT EMPTY
			if(empty($_POST["apprentice_id"])){
				$errors[] = '<div class="text-white" style="font-size:11px;">Apprentice ID cannot be empty!</div>';
			}else{
				
				//SANITIZE INPUT
				$apprentice_id = trim($_POST['apprentice_id']);
				$apprentice_id = preg_replace('#[^0-9]#i', '', $apprentice_id); // filter everything but numbers
			}
			//*/
			//ENSURE INPUT IS NOT EMPTY
			if(empty($_POST["start_date"])){
				$errors[] = '<div class="text-white">Please enter a start date!</div>';
			}else{
				
				//SANITIZE INPUT
				$start_date = $db->sanitize($_POST['start_date']);
				
				//REGEX VALIDATE POST VALID YYYY-MM-DD
				if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$start_date)) {
					$errors[] = '<div class="text-white">Please enter a valid start date!</div>';
				}
			}
			
			//ENSURE INPUT IS NOT EMPTY
			if(empty($_POST["end_date"])){
				$errors[] = '<div class="text-white">Please enter a end date!</div>';
			}else{
				
				//SANITIZE INPUT
				$end_date = $db->sanitize($_POST['end_date']);
				
				//REGEX VALIDATE POST VALID YYYY-MM-DD
				if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$end_date)) {
					$errors[] = '<div class="text-white">Please enter a valid end date!</div>';
				}
			}
			
			
			//ENSURE INPUT IS NOT EMPTY
			if(empty($_POST["assessor_id"])){
				$errors[] = '<div class="text-white" style="font-size:11px;">Please select an assessor!</div>';
			}else{
				
				//SANITIZE INPUT
				$assessor_id = trim($_POST['assessor_id']);
				$assessor_id = preg_replace('#[^0-9]#i', '', $assessor_id); // filter everything but numbers
			}
			
			//STORE POST DATA VARIABLES
			//FOR APPRENTICE USER
			$data['apprentice_id'] = $apprentice_id;
			$data['start_date'] = $start_date;
			$data['end_date'] = $end_date;
			$data['assessor_id'] = $assessor_id;
		}
		
		
		if($user_type == 'assessors'){
		
			//ENSURE INPUT IS NOT EMPTY
			if($_POST["is_accepting_new_apprentices"] == '' || $_POST["is_accepting_new_apprentices"] == null){
				$errors[] = '<div class="text-white" style="font-size:11px;">Please select if assessor is accepting apprentices!</div>';
			}else{
				
				//SANITIZE INPUT
				$is_accepting_new_apprentices = trim($_POST['is_accepting_new_apprentices']);
				$is_accepting_new_apprentices = preg_replace('#[^0-9]#i', '', $is_accepting_new_apprentices); // filter everything but numbers
			}
			
			//STORE POST DATA VARIABLES
			//FOR ASSESSOR USER
			$data['is_accepting_new_apprentices'] = $is_accepting_new_apprentices;
		}
		
		
		if($user_type == 'assessment_centres'){
			
			//ENSURE INPUT IS NOT EMPTY
			if(empty($_POST["name"])){
				$errors[] = '<div class="text-white" style="font-size:11px;">Please enter a name!</div>';
			}else{
				//SANITIZE INPUT
				$name = $db->sanitize($_POST['name']);
				
				//REGEX VALIDATE POST
				if(!preg_match('/[A-Za-z0-9\-\\,. ]+/', $name)) {
					$errors[] = '<div class="text-white">Please enter a valid centre name</div>';
				}
			}			
			
			//ENSURE INPUT IS NOT EMPTY
			if(empty($_POST["capacity"])){
				$errors[] = '<div class="text-white" style="font-size:11px;">Please enter a capacity!</div>';
			}else{
				
				//SANITIZE INPUT
				$capacity = $_POST['capacity'];
				
				$capacity = trim($_POST['capacity']);
				//$capacity = preg_replace('#[^0-9]#i', '', $capacity); // filter everything but numbers
				$capacity = floatval(preg_replace('/[^\d\.]/', '', $capacity));
				
				//VALIDATE VIA REGEX
				if (!preg_match("/^[0-9]*$/",$capacity)) {
					$errors[] = '<div class="text-white" style="font-size:11px;">Please enter a valid capacity!</div>';
				}
			}
			
			
			//ENSURE INPUT IS NOT EMPTY
			if(empty($_POST["description"])){
				$errors[] = '<div class="text-white" style="font-size:11px;">Please enter a description!</div>';
			}else{
				//SANITIZE INPUT
				$description = $db->sanitize($_POST['description']);
				
			}
			//STORE POST DATA VARIABLES
			//FOR ASSESSMENT CENTRE USER
			$data['name'] = $name;
			$data['capacity'] = $capacity;
			$data['description'] = $description;
			
		}
		
		//CHECK FOR FORM ERRORS
		if(!empty($errors)){
			$response['success'] = false;
			$response['notif'] = '<div class="alert alert-danger text-center" role="alert">'.implode(" ", $errors).'</div>';
			
		//NO ERRORS TRY TO SAVE DATA	
		}else{
			//create the new user object
			$newUser = new User($data);
				 
			//save the new user to the database
			$user_updated = $newUser->save(false, $user_type);
		
			// check for successfull registration
			if ($user_updated) {
				$response['success'] = true;
				$response['notif'] = '<div class="alert alert-success text-center" role="alert"><span class="glyphicon glyphicon-ok"></span> &nbsp; User has been updated sucessfully!</div>';
				
			} else {
				$response['success'] = false;
				$response['notif'] = '<div class="alert alert-danger text-center" role="alert"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; Could not update user!</div>';
				$response['status'] = 'error'; // could not update
				
			}
		}
		 
	}
 
 
 echo json_encode($response);




