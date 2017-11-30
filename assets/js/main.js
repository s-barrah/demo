	
		$(document).ready(function() {
		
			//SIDE NAV ACTIVE ACTIONS
			$("#users a:contains('Manage Users')").parent().addClass('active');
			$("#dashboard a:contains('Dashboard')").parent().addClass('active');
		
			//DEFAULT HIDE LOADING
			$( "#load" ).hide();
			
			//Initialize Select2 Elements
			$(".select2").select2();
			
			//INITIALISE TEXT EDITOR
			$(".txtEditor").Editor();
			
			$("#edit_desc").Editor();
			
			//USER TYPE CHANGE FUNCTION
			//DISPLAY HIDDEN FORM SECTIONS
			//BASED ON SELECTED USER TYPE
			$('#user_type').change(function() {
				
				$('.form-section').hide(300);
				
				var name = $(this).val();
				var id = '#'+name+'-section';
				$(id).show(500);
				//alert(id);
			});	
			
			//INITIALISE DATE PICKER
			$('.datepicker').datepicker({
				format: "yyyy-mm-dd"
			});
			
			//INITIALISE START DATE
			var start = new Date();
			
			//set end date to max two year period
			var end = new Date(new Date().setYear(start.getFullYear()+2));
			
			//start date
			$('#start_date').datepicker({
				startDate: start,
				endDate: end
			
			// update end date default whenever start date changes			
			}).on('changeDate', function(){
				//set the end date start no later than start date ends
				$('#end_date').datepicker('setStartDate', new Date($(this).val()));
			});

			//end date
			$('#end_date').datepicker({
				startDate: start,
				endDate: end
			
			// update start date default whenever end date changes			
			}).on('changeDate', function(){
				//set the start date start no later than end date ends
				$('#start_date').datepicker('setEndDate', new Date($(this).val()));
			});

			
		});

		//INITIALISE FLOATING LABEL AS EMPTY
		$('input.floatLabel').next().addClass('empty');
		
		$('input.floatLabel').each(function(){
			if ($(this).val().trim() != "" || $(this).val().trim().length > 0) {
					$(this).addClass('filled');
			} else {
					$(this).removeClass('filled');
			}
		})
		
		//FUNCTION TO FLOAT INPUT LABELS
		$(function(){
   
			if ($(".textinput input").val() != "" || $(".textinput input").val().length > 0) {
					$(".textinput input").addClass('filled');
			} else {
					$(".textinput input").removeClass('filled');
			}
			$(".textinput input").on('change keyup keypress',function() {
				if ($(this).val() != "") {
					$(this).addClass('filled');
				} else {
					$(this).removeClass('filled');
				}
			});
				
				
		});
		
		
		
		/*
		**	DATATABLE FUNCTIONS	
		**  DISPLAY TABLES
		**  WITH SEARCH AND PAGINATION
		*/ 
		$(document).ready(function() {

			//ASSESSORS-TABLE
			var table = $('#assessors-table').DataTable({ 
		 
				"language": {
				   "emptyTable": "<div class=\"alert alert-default\"><i class=\"fa fa-ban\"></i> No records!</div>", // 
				   "loadingRecords": "Please wait...", // default Loading...
				   "zeroRecords": "No matching records found!"
				},
				
				//Set column definition initialisation properties.
				"columnDefs": [
				{ 
					"targets": [ 0 ], //first column / numbering column
					"orderable": false, //set not orderable
					//"className": 'mdl-data-table__cell--non-numeric', //Material Design
				},
				],
				//"sDom": 'T<"clear">lfrtip<"clear spacer">T',
				//"dom": 'rtp',
				"dom":' <"search"f><"top"l>rt<"bottom"ip><"clear">',
				"bInfo" : false,
				responsive: true,
				
			});
			
			//APPRENTICES-TABLE
			var table2 = $('#apprentices-table').DataTable({ 
		 
				"language": {
				   "emptyTable": "<div class=\"alert alert-default\"><i class=\"fa fa-ban\"></i> No records!</div>", // 
				   "loadingRecords": "Please wait...", // default Loading...
				   "zeroRecords": "No matching records found!"
				},
				
				//Set column definition initialisation properties.
				"columnDefs": [
				{ 
					"targets": [ 0 ], //first column / numbering column
					"orderable": false, //set not orderable
					//"className": 'mdl-data-table__cell--non-numeric', //Material Design
				},
				],
				//"sDom": 'T<"clear">lfrtip<"clear spacer">T',
				//"dom": 'rtp',
				"dom":' <"search"f><"top"l>rt<"bottom"ip><"clear">',
				"bInfo" : false,
				responsive: true,
				
			});
			
			//ASSESSMENT-CENTRES-TABLE
			var table3 = $('#assessment-centres-table').DataTable({ 
		 
				"language": {
				   "emptyTable": "<div class=\"alert alert-default\"><i class=\"fa fa-ban\"></i> No records!</div>", // 
				   "loadingRecords": "Please wait...", // default Loading...
				   "zeroRecords": "No matching records found!"
				},
				
				//Set column definition initialisation properties.
				"columnDefs": [
				{ 
					"targets": [ 0 ], //first column / numbering column
					"orderable": false, //set not orderable
					//"className": 'mdl-data-table__cell--non-numeric', //Material Design
				},
				],
				//"sDom": 'T<"clear">lfrtip<"clear spacer">T',
				//"dom": 'rtp',
				"dom":' <"search"f><"top"l>rt<"bottom"ip><"clear">',
				"bInfo" : false,
				responsive: true,
				
			});
			
			

			
		});
		
		/*
		**	END DATATABLE FUNCTIONS	
		*/ 
					
			
		//FUNCTION TO HANDLE ADD USER
		//TO DATABASE
		function addUser() { 
			
			
			//CLEAR NOTIFICATION
			$(".notif").html('');
			
			//CLEAR ERRORS ON MODAL
			$(".form_errors").html('');
			
			var userType = $("#user_type").val().trim();
			var start_date = $("#start_date").val().trim();
			var end_date = $("#end_date").val().trim();
			var assessor_id = $("#assessor_id").val().trim();
			var accepting_new_apprentices = $("#is_accepting_new_apprentices").val().trim();
			var name = $("#name").val().trim();
			var capacity = $("#capacity").val().trim();
			
			
			$("#description").val($(".txtEditor").Editor("getText"));
			
			var description = $("#description").val().trim();
			
			//VALIDATE APPRENTICE INPUT FIELDS
			if(userType == 'apprentices'){
				if(assessor_id == '' || assessor_id.length < 1){
					$(".form_errors").html('<div class="alert alert-danger text-center"> Please select an assessor!</div>');
					return;	
				}
				if(start_date == '' || start_date.length < 1){
					$(".form_errors").html('<div class="alert alert-danger text-center"> Please select an start date!</div>');
					return;
				}
				if(end_date == '' || end_date.length < 1){
					$(".form_errors").html('<div class="alert alert-danger text-center"> Please select an end date!</div>');
					return;
				}
				
			}
			
			//VALIDATE ASSESSOR INPUT FIELDS
			if(userType == 'assessors'){
				if(accepting_new_apprentices == '' || accepting_new_apprentices.length < 1){
					$(".form_errors").html('<div class="alert alert-danger text-center"> Please confirm if assessor is accepting apprentices!</div>');
					return;
				}
				
			}
			
			//VALIDATE ASSESSMENT CENTRES INPUT FIELDS
			if(userType == 'assessment_centres'){
				
				if(name == '' || name.length < 1){
					$(".form_errors").html('<div class="alert alert-danger text-center"> Please enter a name for the center!</div>');
					return;
				}
				if(capacity == '' || capacity.length < 1){
					$(".form_errors").html('<div class="alert alert-danger text-center"> Please enter a capacity for the centre!</div>');
					return;
				}
				if(description == '' || description.length < 1){
					$(".form_errors").html('<div class="alert alert-danger text-center"> Please enter a description for the centre!</div>');
					return;
				}
				
			}
			
			$( "#load" ).show();

			var form = new FormData(document.getElementById('addUserForm'));
			
			var validate_url = $('#addUserForm').attr('action');
			
			$.ajax({
				type: "POST",
				url: validate_url,
				//data: dataString,
				data: form,
				dataType: "json",
				cache : false,
				contentType: false,
				processData: false,
				success: function(data){

					
					if(data.success == true){
						
						$( "#load" ).hide();
						
						$(".notif").html(data.notif);
						$("#addUserModal").modal('hide');
						
						//$('#addUserModal').hide();
						//$('.modal-backdrop').hide();
						
						setTimeout(function() { 
							//$(".notif").hide(300);
							window.location.reload(true);
						}, 2000); 
						
						$("input").val('');
						
					

					}else if(data.success == false){
						$( "#load" ).hide();
						$(".form_errors").html(data.notif);
					}
						
				},error: function(xhr, status, error) {
					$( "#load" ).hide();
				},
			});
			return false;
		}	
		
		
		//Function to edit user details
		function editUser(id, table, url){
			
			//CHECK IF EMPTY, DONT PROCEED
			if(id === '' || table === '' || url === ''){
				$( "#load" ).hide();
				return;
			}	
			
			$( "#load" ).show();
			
			var dataString = { 
				id : id,
				table : table
			};		

			$.ajax({
				
				type: "POST",
				url: baseurl+""+url,
				data: dataString,
				dataType: "json",
				cache : false,
				success: function(data){
					
					if(data.success == true){
						
						$( "#load" ).hide();
						$('.textinput input').addClass('filled');
		
						//populate the hidden fields
						$("#userID").val(data.id);
						
						//POPULATE INPUTS
						$("#utype").val(data.user_type);
						$("#fname").val(data.firstname);
						$("#lname").val(data.lastname);
						$("#edit_email").val(data.email);
						$("#tel").val(data.telephone);
						
						if(data.user_type == 'apprentices'){
							
							//DISPLAY HIDDEN UNIQUE SECTION
							$("#apprenticeSection").show();
							
							$("#apprenticeID").val(data.apprentice_id);
							
							//INITIALISE START DATE
							var start = new Date();
			
							//set end date to max two year period
							var end = new Date(new Date().setYear(start.getFullYear()+2));
			
							var start = new Date(data.s_date);
							
							//set end date to max two year period
							//var end = new Date().setYear(start.getFullYear()+2);
							//var end = start.getFullYear()+2;
							
							//start date
							$("#startDate").val(data.s_date);
							
							$('#startDate').datepicker({
								startDate: data.s_date,
								//endDate: end
							
							// update end date default whenever start date changes			
							}).on('changeDate', function(){
								//set the end date start no later than start date ends
								$('#endDate').datepicker('setStartDate', new Date($(this).val()));
							});
							//*/
							//end date
							$("#endDate").val(data.e_date);
							$('#endDate').datepicker({
								startDate: data.e_date,
								//endDate: end
							
							// update start date default whenever end date changes			
							}).on('changeDate', function(){
								//set the start date start no later than end date ends
								$('#startDate').datepicker('setEndDate', new Date($(this).val()));
							});
							//*/
							$("#assessorID").val(data.assessor_id);
						}
						if(data.user_type == 'assessors'){
							
							//DISPLAY HIDDEN UNIQUE SECTION
							$("#assessorSection").show();
							
							//ASSIGN SELECT VALUE
							$("#isAcceptingNewApprentices").val(data.is_accepting_new_apprentices);
						
						}
						if(data.user_type == 'assessment_centres'){
							
							//DISPLAY HIDDEN UNIQUE SECTION
							$("#centreSection").show();
							
							//ASSIGN INPUT VALUES
							$("#edit_name").val(data.name);
							$("#edit_desc").Editor("setText", data.description)
							$("#edit_description").val(data.description);
							$("#edit_capacity").val(data.capacity);
						}
						

					}else{
						$( "#load" ).hide();
						$("#headerTitle").html('Errors!');
					} 
						  
				},error: function(xhr, status, error) {
					$( "#load" ).hide();
					alert(error);
				},

			});
		}
		
				
		//function to submit edited details
		//to db via ajax
		function updateUser(){
			
			
			//CLEAR ERRORS ON MODAL
			$(".form_errors").html('');
			
			//GET INPUT VALUES
			var userType = $("#utype").val().trim();
			var start_date = $("#startDate").val().trim();
			var end_date = $("#endDate").val().trim();
			var assessor_id = $("#assessorID").val().trim();
			var accepting_new_apprentices = $("#isAcceptingNewApprentices").val().trim();
			var name = $("#edit_name").val().trim();
			var capacity = $("#edit_capacity").val().trim();
			
			
			//$("#description").val($(".txtEditor").Editor("getText"));
			
			$("#edit_description").val($("#edit_desc").Editor("getText"));
			
			var description = $("#edit_description").val().trim();
			
			//VALIDATE APPRENTICE INPUT FIELDS
			if(userType == 'apprentices'){
				if(assessor_id == '' || assessor_id.length < 1){
					$(".form_errors").html('<div class="alert alert-danger text-center"> Please select an assessor!</div>');
					return;	
				}
				if(start_date == '' || start_date.length < 1){
					$(".form_errors").html('<div class="alert alert-danger text-center"> Please select an start date!</div>');
					return;
				}
				if(end_date == '' || end_date.length < 1){
					$(".form_errors").html('<div class="alert alert-danger text-center"> Please select an end date!</div>');
					return;
				}
				
			}
			
			//VALIDATE ASSESSOR INPUT FIELDS
			if(userType == 'assessors'){
				if(accepting_new_apprentices == '' || accepting_new_apprentices.length < 1){
					$(".form_errors").html('<div class="alert alert-danger text-center"> Please confirm if assessor is accepting apprentices!</div>');
					return;
				}
				
			}
			
			//VALIDATE ASSESSMENT CENTRES INPUT FIELDS
			if(userType == 'assessment_centres'){
				
				if(name == '' || name.length < 1){
					$(".form_errors").html('<div class="alert alert-danger text-center"> Please enter a name for the center!</div>');
					return;
				}
				if(capacity == '' || capacity.length < 1){
					$(".form_errors").html('<div class="alert alert-danger text-center"> Please enter a capacity for the centre!</div>');
					return;
				}
				if(description == '' || description.length < 1){
					$(".form_errors").html('<div class="alert alert-danger text-center"> Please enter a description for the centre!</div>');
					return;
				}
				
			}
			
			var form = new FormData(document.getElementById('editUserForm'));
			
			var validate_url = $('#editUserForm').attr('action');
			
			$.ajax({
				type: "POST",
				url: validate_url,
				//data: form,
				data: form,
				//data: dataString,
				dataType: "json",
				cache : false,
				contentType: false,
				processData: false,
				
				success: function(data){
					
					if(data.success == true){
						$( "#load" ).hide();
						
						//HIDE MODAL
						$("#editUserModal").modal('hide');
						
						//CLEAR INPUTS
						$("#userID").val('');
						$('#fname').val('');
						$("#lname").val('');
						$("#edit_email").val('');
						$("#tel").val('');
						
						//APPRENTICES
						$("#apprenticeID").val('');
						$("#startDate").val('');
						$("#endDate").val('');
						
						//ASSESSORS
						$("#assessorID").val('');
						
						//ASSESSMENT CENTRES
						$("#edit_name").val('');
						$("#edit_desc").Editor("setText", '')
						$("#edit_description").val('');
						$("#edit_capacity").val('');
						
						$(".notif").html(data.notif);
						
						setTimeout(function() { 
							//$(".notif").hide(300);
							window.location.reload(true);
						}, 5000);
	
					}else if(data.success == false){
						$( "#load" ).hide();
						$(".form_errors").html(data.notif);
						
					}
						
				},error: function(xhr, status, error) {
					$( "#load" ).hide();
					alert(error);
				},
			});
						
		}
		
		
		//Function to delete user
		function deleteUser(id, table, url){
			
			//CHECK IF EMPTY, DONT PROCEED
			if(id === '' || table === '' || url === ''){
				$( "#load" ).hide();
				return;
			}	
			
			//$( "#load" ).show();
			
			var dataString = { 
				id : id,
				table : table
			};		

			$.ajax({
				
				type: "POST",
				url: baseurl+""+url,
				data: dataString,
				dataType: "json",
				cache : false,
				success: function(data){
					
					if(data.success == true){
						
						//populate the hidden fields
						$("#user-ID").val(data.id);
						$("#user-type").val(data.user_type);
						
						var fullname = data.firstname + ' '+data.lastname;
						fullname = fullname.toLowerCase().replace(/\b[a-z]/g, function(letter) {
							return letter.toUpperCase();
						});
						//DISPLAY USER FULL NAME
						$("#user-name").html(fullname);
						
					}else{
						$( "#load" ).hide();
						$("#headerTitle").html('Errors!');
					} 
						  
				},error: function(xhr, status, error) {
					$( "#load" ).hide();
					alert(error);
				},

			});
		}
		
				
		//function to submit edited details
		//to db via ajax
		function deleteUserSubmit(){
			
			var form = new FormData(document.getElementById('deleteUserForm'));
			
			var validate_url = $('#deleteUserForm').attr('action');
			
			$.ajax({
				type: "POST",
				url: validate_url,
				//data: form,
				data: form,
				//data: dataString,
				dataType: "json",
				cache : false,
				contentType: false,
				processData: false,
				
				success: function(data){
					
					if(data.success == true){
						$( "#load" ).hide();
						$("#userDeleteModal").modal('hide');
						
						var id = $("#user-type").val()+'-'+$("#user-ID").val();
						
						//remove deleted rows dynamically
						$('table').find('tr #'+id).remove();
						//$('table tr').is('#'+id).remove();
						//$('table tr').has('#'+id).remove();
						
						$("#user-ID").val('');
						$("#user-type").val('');
						
						//DISPLAY USER FULL NAME
						$("#user-name").html('');
						
						$(".notif").html(data.notif);
						
						setTimeout(function() { 
							//$(".notif").hide(300);
							window.location.reload(true);
						}, 5000);
	
					}else if(data.success == false){
						$( "#load" ).hide();
						$(".form_errors").html(data.notif);
						
					}
						
				},error: function(xhr, status, error) {
					$( "#load" ).hide();
					alert(error);
				},
			});
						
		}
		
		
		//FUNCTION TO VIEW USER DETAILS
		function viewUser(id, table, url){
			
			//CHECK IF EMPTY, DONT PROCEED
			if(id === '' || table === '' || url === ''){
				$( "#load" ).hide();
				return;
			}	
			
			$( "#load" ).show();
			
			var dataString = { 
				id : id,
				table : table
			};		

			$.ajax({
				
				type: "POST",
				url: baseurl+""+url,
				data: dataString,
				dataType: "json",
				cache : false,
				success: function(data){
					
					if(data.success == true){
						
						$( "#load" ).hide();
						
						$("#fullName").html(data.firstname +' '+data.lastname);
						
						//VIEW TABLE
						$("#view-table").html(data.view_table);

					}else{
						$( "#load" ).hide();
						$("#headerTitle").html('Errors!');
					} 
						  
				},error: function(xhr, status, error) {
					$( "#load" ).hide();
					alert(error);
				},

			});
		}
		
		
