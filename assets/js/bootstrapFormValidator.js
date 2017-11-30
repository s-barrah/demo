/* Start of file bootstrapFormValidator.js */			
		
		//bootstrap validator	
		 $(document).ready(function() {
			
			//////******************ADD USER FORM*************////////	
			$('#addUserForm').bootstrapValidator({
				
				message: 'This value is not valid',
				feedbackIcons: {
					valid: 'glyphicon glyphicon-ok',
					invalid: 'glyphicon glyphicon-remove',
					validating: 'glyphicon glyphicon-refresh'
				},
				fields: {
					user_type: {
						validators: {
							notEmpty: {
								message: 'Please select a user type!'
							}
						}
					},
					firstname: {
						validators: {
							notEmpty: {
								message: 'Please enter a first name!'
							},
							placeholder: {
								message: 'The value cannot be the same as placeholder'
							}
						}
					},
					lastname: {
						validators: {
							notEmpty: {
								message: 'Please enter a last name!'
							},
							placeholder: {
								message: 'The value cannot be the same as placeholder'
							}
						}
					},
					email: {
						validators: {
							notEmpty: {
								message: 'Please enter an email address!'
							},
							emailAddress: {
								message: 'Please enter a valid email address'
							}
						}
					},
					telephone: {
						validators: {
							notEmpty: {
								message: 'Please enter a telephone number!'
							}
						}
					}
					
				},
				submitHandler: function(validator, form, submitButton) {
					$("#addUserForm").data('bootstrapValidator').resetForm();
					addUser();
					
				}
			});
			//////******************ADD USER FORM*************////////
			
			//////******************UPDATE USER FORM*************////////	
			$('#editUserForm').bootstrapValidator({
				
				message: 'This value is not valid',
				feedbackIcons: {
					valid: 'glyphicon glyphicon-ok',
					invalid: 'glyphicon glyphicon-remove',
					validating: 'glyphicon glyphicon-refresh'
				},
				fields: {
					user_type: {
						validators: {
							notEmpty: {
								message: 'Please select a user type!'
							}
						}
					},
					firstname: {
						validators: {
							notEmpty: {
								message: 'Please enter a first name!'
							},
							placeholder: {
								message: 'The value cannot be the same as placeholder'
							}
						}
					},
					lastname: {
						validators: {
							notEmpty: {
								message: 'Please enter a last name!'
							},
							placeholder: {
								message: 'The value cannot be the same as placeholder'
							}
						}
					},
					email: {
						validators: {
							notEmpty: {
								message: 'Please enter an email address!'
							},
							emailAddress: {
								message: 'Please enter a valid email address'
							}
						}
					},
					telephone: {
						validators: {
							notEmpty: {
								message: 'Please enter a telephone number!'
							}
						}
					}
					
				},
				submitHandler: function(validator, form, submitButton) {
					$("#editUserForm").data('bootstrapValidator').resetForm();
					updateUser();
					
				}
			});
			//////******************UPDATE USER FORM*************////////
			
			
		});
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
/* End of file bootstrapFormValidator.js */		
		