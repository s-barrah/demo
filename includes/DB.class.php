<?php
	//DB.class.php

	class DB {
		
		protected $db_name = 'demo';
		protected $db_user = 'test';
		protected $db_pass = 'test@213';
		protected $db_host = 'localhost';


	
		/* Function to connect
		** to database
		**
		*/
		public function connect() {
			// Create connection
			$conn = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);

			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			return $conn;
		}
		
		public function pdo_connect() {
			// Create connection
			try {
				$dbh = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name.'', $this->db_user, $this->db_pass);
				
			} catch (PDOException $e) {
				print "Error!: " . $e->getMessage() . "<br/>";
				die();
			}
			return $dbh;
		}
		
		/* Query Function to get all
		** records in a table
		 * @access public
		 * @param string query
		 * @return array
		**
		*/
		public function query($query) {
			$db = $this->connect();
			$result = $db->query($query);
			if( mysqli_error($db) )
			{
				return false; 
			}
			else
			{
				$results = array();
				while ( $row = $result->fetch_object() ) {
					$results[] = $row;
				}
				return $results;
			}
			
		}
		
		/* Function to count all
		** records in a table
		** @access public
		 * @param string table name
		 * @return int
		*/
		function count_all($table){
			
			$db = $this->connect();
			$query = "SELECT COUNT(*) FROM $table";
			
			if($result = $db->query($query)){
				
				/* determine number of rows result set */
				//$row_cnt = $result->num_rows;
				$row = $result->fetch_row();
				
				//return $row_cnt;
				return $row[0];
				
				/* close result set */
				$result->close();
			}
			/* close connection */
			$db->close();
		}

		    
		/**
		 * Function to Insert data into database table
		 *
		 * @access public
		 * @param string table name
		 * @param array table column => column value
		 * @return bool
		 *
		 */
		public function insert($table, $variables = array() )
		{
			// Check for $table or $variables not set
			if ( empty( $table ) || empty($variables) ) {
				return false;
			}
			
			// Connect to the database
			$db = $this->connect();
			
			// Cast $variables to arrays
			$variables = (array)$variables;
			
			$sql = "INSERT INTO ". $table;
			
			$fields = array();
			$values = array();
			
			$types = $this->paramtypez($variables);
			//$types = '';
			$placeholders = array();
			$params = array();
			
			foreach( $variables as $field => $value )
			{
				$fields[] = $field;
				$values[] = "'".$value."'";
				$params[] = & $value;
				$placeholders[] = ":".$field;
				//$placeholders[] = "?";
				
				//$types .= substr(strtolower(gettype($value)), 0, 1);
			}
			
			//GET COLUMNS
			$fields = ' (' . implode(', ', $fields) . ')';

			//GET VALUES
			$values = '('. implode(', ', $values) .')';
			//$values = implode(', ', $values);
			
			$placeholders = '('. implode(', ', $placeholders) .')';
			
			
			$sql .= $fields .' VALUES '. $values;
			
			/*
			$query = mysqli_query($db, $sql);
			
			if( mysqli_error($db) )
			{
				//return false; 
				return false;
			}
			else
			{
				return true;
			}
			*/
			// Connect to the database
			$pdo = $this->pdo_connect();
			
			$sql = 'insert into '.$table.''.$fields .' values '.$placeholders.'';
			
			$stmt = $pdo->prepare($sql); 

			if($stmt === false) {
			  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->errno . ' ' . $db->error, E_USER_ERROR);
			}
			$stmt->execute($variables);
			
			$newId = $pdo->lastInsertId();
			
			// Check for successful insertion
			if ($newId) {
				return true;
			}
			
			return false;
			
			//*/
			
			
			
			// Prepary our query for binding
			//$stmt = $db->prepare($sql);
		/*	$sql = "INSERT INTO ".$table." ".$fields." VALUES ".$placeholders." ";
			$stmt = $db->prepare($sql);
			if($stmt === false) {
			  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $db->errno . ' ' . $db->error, E_USER_ERROR);
			}
			// Dynamically bind values
			call_user_func_array( array( $stmt, 'bind_param'), array_merge(array($types),$this->ref_values($params)));
			//call_user_func_array( array( $stmt, 'bind_param'), $this->ref_values($params));
			//$stmt->bind_param($ntypes, $new_params);
			
			// Execute the query
			$stmt->execute();
			
			//store result 
			$stmt->store_result();
			
			// Check for successful insertion
			if ( $stmt->affected_rows ) {
				return true;
			}
			
			return false;
			*/
		}
    
	
		public function paramtypez($val)
		{
				$types = '';                        //initial sting with types
				foreach($val as $para) 
				{     
					if(is_int($para)) {
						$types .= 'i';              //integer
					} elseif (is_float($para)) {
						$types .= 'd';              //double
					} elseif (is_string($para)) {
						$types .= 's';              //string
					} else {
						$types .= 'b';              //blob and unknown
					}
				}
				return $types;
		}
	
		/* Function to select 
		** row in a table
		 * @access public
		 * @param string table name
		 * @param int user id
		 * @return array
		**
		*/
		public function select($table, $id) {
			
			$db = $this->connect();
			$query = "SELECT * FROM $table WHERE id=?";
			
			if($stmt = $db->prepare($query)){
					
				/* bind parameters for markers */
				$stmt->bind_param("i", $id);
				
				/* execute query */
				$stmt->execute();
				
				/* get the result */
				$result = $stmt->get_result();
				
				if ($result->num_rows > 0) {
					
					$row = $result->fetch_assoc();
					return $row;
					
					
				}else {
					return false;
				}
				/* free results */
				$stmt->free_result();
				
				/* close statement */
				$stmt->close();
			}
			
			/* close connection */
			$db->close();
		} 
		
		//Select rows from the database.
		//returns a full row or rows from $table using $where as the where clause.
		//return value is an associative array with column names as keys.
	 	public function select2($table, $where) {
			
			$db = $this->connect();
			$sql = "SELECT * FROM $table WHERE $where";
			$result = $db->query($sql);
			
			$results = array();
			
			while ( $row = $result->fetch_object() ) {
				$results[] = $row;
			}
			
			return $results;
		} 
		
		
		    
		/**
		 * Function to update user data
		 * in database table
		 * @access public
		 * @param string table name
		 * @param array values to update table column => column value
		 * @param array where parameters table column => column value
		 * @param int limit
		 * @return bool
		 *
		 */
		public function update( $table, $variables = array(), $where = array(), $limit = '' )
		{
			
			// Connect to the database
			$db = $this->connect();
			
			$sql = "UPDATE ". $table ." SET ";
			
			$updates = array();
			
			foreach( $variables as $field => $value )
			{
				
				$updates[] = "`$field` = '$value'";
			}
			$sql .= implode(', ', $updates);
			
			$clause = array();
			$types = '';
			$values = array();
			//WHERE CLAUSE
			foreach( $where as $field => $value )
			{
				$value = $value;
				$values[] = $value;
				//$clause[] = "$field = '$value'";
				//WHERE PLACEHOLDERS
				$clause[] = "$field = ?";
				
				//GET VALUE TYPE
				$types.= substr(strtolower(gettype($value)), 0, 1);
			}
			$sql .= ' WHERE '. implode(' AND ', $clause);
			
			$values = implode(',', $values);
			
			if( !empty( $limit ) )
			{
				$sql .= ' LIMIT '. $limit;
			}
			
			if($stmt = $db->prepare($sql)){
				
							
				/* bind parameters for markers */
				$stmt->bind_param($types, $values);
				
				/* execute query */
				$stmt->execute();
				
				/* store result */
				$stmt->store_result();
				
				// Check for successful update
				if ( $stmt->affected_rows ) {
					return true;
				}else{
					return false;
				}
				
				/* close statement */
				$stmt->close();
			}
			$db->close();
			/*$query = mysqli_query($db, $sql );

			if( mysqli_error($db) )
			{
				return false;
			}
			else
			{
				return true;
			}*/
		}
		
		/**
		 * Function to delete user data
		 * from database table
		 * @access public
		 * @param string table name
		 * @param int where parameters user id
		 * @param int limit
		 * @return bool
		 *
		 */
		public function delete($table, $id = '', $limit = '' )
		{
			// Connect to the database
			$db = $this->connect();
			
			$sql = "DELETE from $table WHERE id =?";
			
			if($stmt = $db->prepare($sql)){
				
							
				/* bind parameters for markers */
				$stmt->bind_param("i", $id);
				
				/* execute query */
				$stmt->execute();
				
				// Check for successful deletion
				if ( $stmt->affected_rows ) {
					return true;
				}else{
					return false;
				}
				
				/* close statement */
				$stmt->close();
			}
			$db->close();
			/*$query = mysqli_query($db, $sql );

			if( mysqli_error($db) )
			{
				return false;
			}
			else
			{
				return true;
			}*/
		}
		
		
		/**
		 * Function to get data values
		 * reference
		 * @access private
		 * @param array data values
		 * @return array
		 *
		 */
		private function ref_values($array) {
			
			if (strnatcmp(phpversion(),'5.3') >= 0) //Reference is required for PHP 5.3+
			{
				$refs = array();
				foreach ($array as $key => $value) {
					$refs[$key] = &$array[$key]; 
				}
				return $refs; 
			}
			return $array;
		}
		
		/**
		 * Function to sanitize user
		 * form data
		 * @access public
		 * @param string input data
		 * @return string
		 *
		 */
		//Function To SANITIZE Data
		public function sanitize($data)
		{
			$data = trim($data);
			$data= stripslashes($data);
			
			//$data= mysqli_real_escape_string($data);
			$type = substr(strtolower(gettype($data)), 0, 1);
			switch ($type) {
				//integer
				case 'i':
					$data=(filter_var($data, FILTER_SANITIZE_NUMBER_INT));
					break;
				//double or float
				case 'd':
					
					break;
				//string type
				case 's':
					$data=(filter_var($data, FILTER_SANITIZE_STRING));
					if(filter_var($data, FILTER_VALIDATE_EMAIL)) {
						$data=(filter_var($data, FILTER_SANITIZE_EMAIL));
					}
					break;
				//unknown type
				case 'u':
					$data=(filter_var($data, FILTER_SANITIZE_STRING));
					break;
				default:
					$data=(filter_var($data, FILTER_SANITIZE_STRING));
			}
			
			return $data;
		}	




	}
	

?>