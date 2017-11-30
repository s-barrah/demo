<?php
//UserTools.class.php

require_once "User.class.php";
require_once "DB.class.php";

class UserTools {
	
	private $conn;
	
	public function __construct() {
		//create a new database object.
		$db = new DB();
		$this->conn = $db->connect();
			
	}
		
	
	/* Function to get a user
	** returns a User object. Takes the users id as an input
	** variables string $table, int $id
	*/
	public function get($table,$id)
	{
		$db = new DB();
		$result = $db->select($table, "id = $id");
		//$result = mysql_query("SELECT * FROM $table WHERE id = '$id'");
		
		return new User($result);
	}  
	
	
	/* Function to check if email address has already been registered
	** for the user type
	** variables string $email, string $table
	*/
	public function checkEmailExists($email, $table) {
		
		//$sql = "SELECT id FROM $table WHERE email='$email'";
		//$result = $db->query($sql);
		//$row = $result->fetch_row();

		$query = "SELECT id FROM $table WHERE email=?";
		if($stmt = $this->conn->prepare($query)){
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $email);
			
			/* execute query */
			$stmt->execute();
			
			/* store result */
			$stmt->store_result();
			
			if ($stmt->num_rows > 0) {
				return true;
				
			}else {
				return false;
			}
			
			/* close statement */
			$stmt->close();
		}
		
		$this->conn->close();
		
	}
	
	
	/* Function to check if the generated apprentice ID already exists
	** Called during registration to make sure all IDs are unique
	** variables bigint $id
	*/
	public function id_is_unique($id) {
		$query = "SELECT id FROM apprentices WHERE apprentice_id=?";
		if($stmt = $this->conn->prepare($query)){
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $id);
			
			/* execute query */
			$stmt->execute();
			
			/* store result */
			$stmt->store_result();
			
			if ($stmt->num_rows < 1) {
				return true;
				
			}else {
				return false;
			}
			
			/* close statement */
			$stmt->close();
		}
		
		$this->conn->close();
		
	}
	
		

	
	
	
	
}

?>