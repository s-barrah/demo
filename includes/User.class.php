<?php
//User.class.php

require_once "DB.class.php";


class User {

	public $id;
	public $firstname;
	public $lastname;
	public $email;
	public $telephone;
	public $user_type;
	public $apprentice_id;
	public $start_date;
	public $end_date;
	public $assessor_id;
	public $is_accepting_new_apprentices;
	public $name;
	public $capacity;
	public $description;
	public $last_updated;
	public $created;
	public $db;

	//Constructor is called whenever a new object is created.
	//Takes an associative array with the DB row as an argument.
	function __construct($data) {
		$this->id = (isset($data['id'])) ? $data['id'] : "";
		$this->firstname = (isset($data['firstname'])) ? $data['firstname'] : "";
		$this->lastname = (isset($data['lastname'])) ? $data['lastname'] : "";
		$this->email = (isset($data['email'])) ? $data['email'] : "";
		$this->telephone = (isset($data['telephone'])) ? $data['telephone'] : "";
		$this->user_type = (isset($data['user_type'])) ? $data['user_type'] : "";
		
		//APPRENTICE USER TYPE
		$this->apprentice_id = (isset($data['apprentice_id'])) ? $data['apprentice_id'] : "";
		$this->start_date = (isset($data['start_date'])) ? $data['start_date'] : "";
		$this->end_date = (isset($data['end_date'])) ? $data['end_date'] : "";
		$this->assessor_id = (isset($data['assessor_id'])) ? $data['assessor_id'] : "";
		
		//ASSESSOR USER TYPE
		$this->is_accepting_new_apprentices = (isset($data['is_accepting_new_apprentices'])) ? $data['is_accepting_new_apprentices'] : "";
		
		//ASSESSMENT CENTRE USER TYPE
		$this->name = (isset($data['name'])) ? $data['name'] : "";
		$this->capacity = (isset($data['capacity'])) ? $data['capacity'] : "";
		$this->description = (isset($data['description'])) ? $data['description'] : "";
		
		$this->last_updated = (isset($data['last_updated'])) ? $data['last_updated'] : "";
		$this->created = (isset($data['created'])) ? $data['created'] : "";
		
		//create a new database object.
		$this->db = new DB();
		$this->db->connect();
		
	}
	
	//FUNCTION TO SAVE AND UPDATE USERS
	public function save($isNewUser = false, $table = '') {
		
		//if the user is already registered and we're
		//just updating their info.
		if(!$isNewUser) {
			//set the data array
			$data = array(
				"firstname" => $this->firstname,
				"lastname" => $this->lastname,
				"email" => $this->email,
				"telephone" => $this->telephone,
				"last_updated" => date('Y-m-d H:i:s')
			);
			
			if($table == 'apprentices'){
				$data['apprentice_id'] = $this->apprentice_id;
				$data['start_date'] = $this->start_date;
				$data['end_date'] = $this->end_date;
				$data['assessor_id'] = $this->assessor_id;
			}
			
			if($table == 'assessors'){
				$data['is_accepting_new_apprentices'] = $this->is_accepting_new_apprentices;
			}
			
			if($table == 'assessment_centres'){
				$data['name'] = $this->name;
				$data['description'] = $this->description;
				$data['capacity'] = $this->capacity;
			}
			
			if($table != '' && $table != null){
				//update the row in the database
				
				//Add the WHERE clauses
				$where_clause = array( 
					'id' => $this->id
				);
				
				//UPDATE IN DB
				$updated = $this->db->update($table, $data, $where_clause, 1);
				
				//VALIDATE INSERT
				if($updated){
					return true;
				}else{
					return false;
				}
				
			}
			
		}else {
		
			if($table != ''){
				
				//if the user is being registered for the first time.
				$data = array(
					
					"firstname" => $this->firstname,
					"lastname" => $this->lastname,
					"email" => $this->email,
					"telephone" => $this->telephone,
					"last_updated" => '0000-00-00 00:00:00',
					"created" => date('Y-m-d H:i:s')
				);
				
				//APPRENTICE USER TYPE
				if($table == 'apprentices'){
					$data['apprentice_id'] = $this->apprentice_id;
					$data['start_date'] = $this->start_date;
					$data['end_date'] = $this->end_date;
					$data['assessor_id'] = $this->assessor_id;
				}
				
				//ASSESSOR USER TYPE
				if($table == 'assessors'){
					$data['is_accepting_new_apprentices'] = $this->is_accepting_new_apprentices;
				}
				
				//ASSESSMENT CENTRE USER TYPE
				if($table == 'assessment_centres'){
					$data['name'] = $this->name;
					$data['description'] = $this->description;
					$data['capacity'] = $this->capacity;
				}
				
				//INSERT DATA INTO DB
				$saved = $this->db->insert($table, $data);
				
				//VALIDATE INSERT
				if($saved){
					return true;
				}else{
					return false;
				}
				
			}
			
			
		}
		
	}
	
	
	//FUNCTION TO DELETE USERS
	public function delete($table = '') {
		
		if($this->id != '' && $this->id != null){
			
			//DELETE USER FROM DB
			$deleted = $this->db->delete($table, $this->id, 1);
				
			//VALIDATE DELETE
			if($deleted){
				return true;
			}else{
				return false;
			}
				
		}
	}

	
}

?>