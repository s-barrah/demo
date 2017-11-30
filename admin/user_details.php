<?php
//user_details.php
//FOR AJAX FUNCTION USER EDIT

include_once "../includes/global.inc.php";

	$data = array();
	
	//CHECK IF POST SUBMITTED
	if ($_POST["id"] && $_POST["table"]) {
		
		//clean post values
		//SANITIZE INPUT
		$id = trim($_POST['id']);
		$id = preg_replace('#[^0-9]#i', '', $id); // filter everything but numbers
		
		$table = $db->sanitize($_POST['table']);
		
		$details = $db->select($table, $id);
	
		if($details){
			
			$data['id'] = $details['id'];
			$data['firstname'] = $details['firstname'];
			$data['lastname'] = $details['lastname'];
			$data['email'] = $details['email'];
			$data['telephone'] = $details['telephone'];
			$data['last_updated'] = $details['last_updated'];
			$data['created'] = $details['created'];
			
			//GENERATE VIEW USER DYNAMIC TABLE 
			$view_table = '<h3>Personal Information</h3>';
			$view_table .= '<table class="table">';
			
			if($table == 'assessment_centres'){
				$view_table .= '<tr>';
				$view_table .= '<td><h5><strong>Name: </strong> '.$details['name'].'</h5></td>';
				$view_table .= '</tr>';
			}
			$view_table .= '<tr>';
			$view_table .= '<td><h5><strong>User: </strong> '.$details['firstname'].' '.$details['lastname'].'</h5></td>';
			$view_table .= '</tr>';
			
			$view_table .= '<tr>';
			$view_table .= '<td><h5><strong>Email: </strong> '.$details['email'].'</h5></td>';
			$view_table .= '</tr>';
			
			$view_table .= '<tr>';
			$view_table .= '<td><h5><strong>Tel: </strong> '.$details['telephone'].'</h5></td>';
			$view_table .= '</tr>';
			
			$view_table .= '</table>';
				
			$view_table .= '<h3>Account Information</h3>';
			$view_table .= '<table class="table">';
			
			if($table == 'apprentices'){
				$data['apprentice_id'] = $details['apprentice_id'];
				$data['start_date'] = $details['start_date'];
				$data['s_date'] = $details['start_date'];
				$data['end_date'] = $details['end_date'];
				$data['e_date'] = $details['end_date'];
				$data['assessor_id'] = $details['assessor_id'];
				
				
				$view_table .= '<tr>';
				$view_table .= '<td><h5><strong>Apprentice ID: </strong> '.$details['apprentice_id'].'</h5></td>';
				$view_table .= '</tr>';
			
				$view_table .= '<tr>';
				$view_table .= '<td><h5><strong>Start Date: </strong> '.$details['start_date'].'</h5></td>';
				$view_table .= '</tr>';
				
				$view_table .= '<tr>';
				$view_table .= '<td><h5><strong>End Date: </strong> '.$details['end_date'].'</h5></td>';
				$view_table .= '</tr>';
			
			
				$view_table .= '<tr>';
				$view_table .= '<td><h5><strong>Assessor ID: </strong> '.$details['assessor_id'].'</h5></td>';
				$view_table .= '</tr>';
			
			}
			
			if($table == 'assessors'){
				$data['is_accepting_new_apprentices'] = $details['is_accepting_new_apprentices'];
				
				$is_accepting_new_apprentices = ($details['is_accepting_new_apprentices'] == '1')?'Yes':'No';
															
				$view_table .= '<tr>';
				$view_table .= '<td><h5><strong>Accepting Apprentices: </strong> '.$is_accepting_new_apprentices.'</h5></td>';
				$view_table .= '</tr>';
			
			
			}
			
			if($table == 'assessment_centres'){
				$data['name'] = $details['name'];
				$data['description'] = $details['description'];
				$data['capacity'] = $details['capacity'];
				
				$view_table .= '<tr>';
				$view_table .= '<td><h5><strong>Name: </strong> '.$details['name'].'</h5></td>';
				$view_table .= '</tr>';
			
				$view_table .= '<tr>';
				$view_table .= '<td><h5><strong>Description: </strong> '.$details['description'].'</h5></td>';
				$view_table .= '</tr>';
				
				$view_table .= '<tr>';
				$view_table .= '<td><h5><strong>Capacity: </strong> '.$details['capacity'].'</h5></td>';
				$view_table .= '</tr>';
			
			}
			
			$view_table .= '</table>';
			
			
			$data['success'] = true;
			$data['user_type'] = $table;
			$data['view_table'] = $view_table;
			
		}else{
			$data['success'] = false;
		}
		
	}
	
	
	
 
 echo json_encode($data);

		















?>