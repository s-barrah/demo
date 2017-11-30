<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

include_once "../includes/global.inc.php";

	// Script Error Reporting
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	//BASE URL OF WEBSITE
	
	//ASSIGN PAGE ID
	$pageID = 'users';
	
	//ASSIGN PAGE TITLE
	$pageTitle = 'Users';
	
	//SEO PAGE DESCRIPTION
	$meta_description = '';
	
	//SEO PAGE AUTHOR
	$meta_author = '';
	
	//SEO PAGE KEYWORDS
	$meta_keywords = '';
	
	//ASSESSORS COUNT
	$assessors_count = $db->count_all('assessors');
	if($assessors_count == '' || $assessors_count < 1 || $assessors_count == null){
		$assessors_count = 0;
	}
	
	//ASSESSORS SELECT DROPDOWN
	$select_assessors= '';
	$assessor_results = $db->query("SELECT * FROM assessors");
	if($assessor_results){
		foreach($assessor_results as $result){
			$select_assessors .= '<option value="'.$result->id.'">'.ucwords($result->firstname.' '.$result->lastname).'</option>';
		}
		
	}
	
	//APPRENTICES COUNT
	$apprentices_count =  $db->count_all('apprentices');
	if($apprentices_count == '' || $apprentices_count < 1 || $apprentices_count == null){
		$apprentices_count = 0;
	}
	
	//ASSESSMENT CENTRES COUNT
	$centres_count =  $db->count_all('assessment_centres');
	if($centres_count == '' || $centres_count < 1 || $centres_count == null){
		$centres_count = 0;
	}
	
	
	
	


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link href="../assets/images/icons/favicon.ico?<?php echo time();?>" rel="shortcut icon" type="image/ico" />
	
	<title><?php echo $pageTitle; ?></title>
	<meta name="description" content="<?php echo $meta_description; ?>">
    <meta name="author" content="<?php echo $meta_author; ?>">
	<meta name="keywords" content="<?php echo $meta_keywords; ?>">
	<link rel="canonical" href="<?php echo $base_url; ?>" />
	<link rel="publisher" href="https://plus.google.com/+Test/"/>
	<meta property="og:locale" content="en_GB" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?php echo $pageTitle; ?>" />
	<meta property="og:description" content="<?php echo $meta_description; ?>" />
	<meta property="og:url" content="<?php echo $base_url; ?>" />
	<meta property="og:site_name" content="<?php echo $pageTitle; ?>" />
	<meta property="fb:app_id" content="361099337567592" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:description" content="<?php echo $meta_description; ?>" />
	<meta name="twitter:title" content="<?php echo $pageTitle; ?>" />
	<meta name="twitter:site" content="@test" />
	
	<!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<!-- JQuery UI CSS -->
	<link href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
	
	<!-- Font Awesome -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	
    <!-- Datatables -->
	<link href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css" rel="stylesheet">	
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">	
	<link href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" rel="stylesheet">
	
	<!-- Jasny-Bootstrap -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
	
	<!-- Select2 -->
	<link rel="stylesheet" href="../assets/css/select2.min.css">
	
	<!-- Animate.css style -->
	<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/animate.css">
   
	<!-- Style.css -->
	<link rel="stylesheet" href="../assets/css/style.css">
	
	<!-- Theme style -->
	<link rel="stylesheet" href="../assets/css/AdminLTE.css">
  
    <!-- Custom Theme Style -->
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/css/custom.min.css?<?php echo time(); ?>" media="all"/>
	
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/css/style.css?<?php echo time(); ?>" media="all"/>
	
	<!-- Line Control TextEditor -->
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/css/editor.css?<?php echo time(); ?>" media="all"/>
	
	<script type="text/javascript">var baseurl = "<?php echo $base_url; ?>";</script>

	
</head>
	<body class="nav-md" id="<?php echo $pageID ; ?>">
		
		
	<?php include_once("header.php");?>
	

        <!-- page content -->
        <div class="right_col" role="main">
			<div class="page-title">
				<div class="title_left">
					<h3><?php echo $pageTitle;?></h3>
				</div>
					
			</div>
			
			<div class="clearfix"></div>
				
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
								
							<!-- breadcrumb -->
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<ol class="breadcrumb">
										<li>
											<a href="!#" onclick="location.href='index.php'" title="Admin Dashboard">
												<i class="fa fa-home"></i> Dashboard
											</a>
										</li>						
										<li class="active">
											<i class="fa fa-users"></i> <?php echo $pageTitle;?>
											</li>
										<li>
											<a href="!#" data-toggle="modal" data-target="#addUserModal" title="Add User"><i class="fa fa-user-plus"></i> Add User</a>
										</li>											
									</ol>
								</div>
							</div>
							<!-- /breadcrumb -->
								
							   
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							
							
							<!-- container -->
							<div class="container">
								<div class="row">
									<div class="col-xs-12">
										<div class="notif"></div>
										
									</div>
								</div>
							</div>
							<!-- /container -->
						
							
							<!-- .nav-tabs-custom -->
							<div class="nav-tabs-custom">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active">
										<a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab"><h4><i class="fa fa-user"></i> Assessors (<?php echo $assessors_count; ?>)</h4></a>
									</li>
									<li role="presentation">
										<a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab"><h4><i class="fa fa-user"></i> Apprentices (<?php echo $apprentices_count; ?>)</h4></a>
									</li>	
									<li role="presentation">
										<a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab"><h4><i class="fa fa-user"></i> Assessment Centres (<?php echo $centres_count; ?>)</h4></a>
									</li>	
									
								</ul>
								<!-- /Nav tabs -->
								
								<!-- Tab panes -->
								<div class="tab-content">
							
									<!-- Tab1 -->
									<div role="tabpanel" class="tab-pane active" id="tab1">
									<br/>
														
										<!-- table container -->
										<div class="container">
											<!-- /table-responsive -->
											<div class="table-responsive" >
												
												<!-- Assessors Table -->
												<table id="assessors-table" frame="box" class="table table-hover table-striped" cellspacing="0" width="100%">
													<thead>
														<tr>
															<th>ID</th>
															<th>First Name</th>
															<th>Last Name</th>
															<th>Email</th>
															<th>Tel</th>
															<th>Accepting Apprentices</th>
															<th>Updated</th>	
															<th>Created</th>
															<th>Edit / Delete</th>
														</tr>
													</thead>
													<tbody>
													<?php
														$assessor_results = $db->query("SELECT * FROM assessors");
														if($assessor_results){
															foreach($assessor_results as $result){
																
																//CONVERT ENUM VAL TO STRING
																$is_accepting_new_apprentices = ($result->is_accepting_new_apprentices == '1')?'Yes':'No';
															
																//DISPLAY DATE
																$last_updated = date("F j, Y, g:i a", strtotime($result->last_updated));
																if($result->last_updated == '0000-00-00 00:00:00' || $result->last_updated == ''){
																	$last_updated = 'Never';
																}
																
																//AJAX URL
																$details_url = 'admin/user_details.php';
																
																//DB TABLE
																$table = 'assessors';
													?>
														<tr id="assessors-<?php echo $result->id ;?>">
														
															<td><?php echo $result->id ;?></td>
															<td><?php echo ucwords($result->firstname) ;?></td>
															<td><?php echo ucwords($result->lastname) ;?></td>
															<td><?php echo $result->email ; ?></td>
															<td><?php echo $result->telephone ; ?></td>
															<td><?php echo $is_accepting_new_apprentices ; ?></td>
															<td><?php echo $last_updated ; ?></td>
															<td>
																<?php echo date("F j, Y", strtotime($result->created)); ?>
															</td>
															
															<td>
																<!-- Edit Button -->
																<button class="btn btn-primary btn-xs"  data-toggle="modal" data-target="#editUserModal" title="Edit <?php echo ucwords($result->firstname .' '.$result->lastname) ;?>" onclick="editUser(<?php echo $result->id;?>,'<?php echo $table ;?>','<?php echo $details_url ;?>');" ><i class="fa fa-pencil" aria-hidden="true"></i></button>
																<!-- /Edit Button -->
																
																<!-- Delete Button -->
																<button class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#userDeleteModal" title="Delete <?php echo ucwords($result->firstname .' '.$result->lastname) ;?>" onclick="deleteUser(<?php echo $result->id;?>,'<?php echo $table ;?>','<?php echo $details_url ;?>');" ><i class="fa fa-trash" aria-hidden="true"></i> </button>
																<!-- /Delete Button -->
															</td>
																
														</tr>
													
													<?php
															}
														}
													?>
													</tbody>
											 
												</table>
												<!-- /Assessors Table -->	
													
											</div>
											<!-- /table-responsive -->
										</div>
										<!-- /table container -->
							
									</div>
									<!-- Tab1 -->
								
									<!-- Tab2 -->
									<div role="tabpanel" class="tab-pane" id="tab2">
									<br/>
									
										<!-- table container -->
										<div class="container">
											<!-- /table-responsive -->
											<div class="table-responsive" >
												
												<!-- Apprentices Table -->
												<table id="apprentices-table" frame="box" class="table table-hover table-striped" cellspacing="0" width="100%">
													<thead>
														<tr id="apprentices-<?php echo $result->id ;?>">
															<th>Apprentice ID</th>
															<th>First Name</th>
															<th>Last Name</th>
															<th>Email</th>
															<th>Tel</th>
															<th>Start Date</th>
															<th>End Date</th>
															<th>Assessor ID</th>
															<th>Updated</th>	
															<th>Created</th>
															<th>Edit / Delete</th>
														</tr>
													</thead>
													<tbody>
													
												<?php
													$apprentice_results = $db->query("SELECT * FROM apprentices");
													if($apprentice_results){
														foreach($apprentice_results as $result){		
															
															//AJAX URL
															$details_url = 'admin/user_details.php';
															
															//DB TABLE
															$table = 'apprentices';
												?>
														<tr>
															
															<td><?php echo $result->apprentice_id ;?></td>
															
															<td><?php echo ucwords($result->firstname) ; ?></td>
															
															<td><?php echo ucwords($result->lastname) ; ?></td>
															
															<td><?php echo $result->email ; ?></td>
															
															<td><?php echo $result->telephone ; ?></td>
															
															<td><?php echo date("F j, Y", strtotime($result->start_date)); ?></td>
															
															<td><?php echo date("F j, Y", strtotime($result->end_date)); ?></td>
															
															<td><?php echo $result->assessor_id ; ?></td>
															
															<td><?php echo $last_updated ; ?></td>
															
															<td>
																<?php echo date("F j, Y", strtotime($result->created)); ?>
															</td>
															
															<td>
																<!-- Edit Button -->
																<button class="btn btn-primary btn-xs"  data-toggle="modal" data-target="#editUserModal" onclick="editUser(<?php echo $result->id;?>,'<?php echo $table ;?>','<?php echo $details_url ;?>');" title="Edit  <?php echo ucwords($result->firstname .' '.$result->lastname) ;?>"><i class="fa fa-pencil" aria-hidden="true"></i></button>
																<!-- /Edit Button -->
																
																<!-- Delete Button -->
																<button class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#userDeleteModal" title="Delete <?php echo ucwords($result->firstname .' '.$result->lastname) ;?>" onclick="deleteUser(<?php echo $result->id;?>,'<?php echo $table ;?>','<?php echo $details_url ;?>');" ><i class="fa fa-trash" aria-hidden="true"></i> </button>
																<!-- /Delete Button -->
															</td>
															
														</tr>
													<?php
															}
														}
													?>
													</tbody>
											 
												</table>
												<!-- /Apprentices Table -->	
													
											</div>
											<!-- /table-responsive -->
										</div>
										<!-- /table container -->
									
									</div>
									<!-- /Tab2 -->
							
									<!-- Tab3 -->
									<div role="tabpanel" class="tab-pane" id="tab3">
									<br/>
																							
										<!-- table container -->
										<div class="container">
											<!-- /table-responsive -->
											<div class="table-responsive">
												
												<!-- assessment-centres-table -->
												<table id="assessment-centres-table" frame="box" class="table table-hover table-striped" cellspacing="0" width="100%">
													<thead>
														<tr id="assessment_centres-<?php echo $result->id ;?>">
															<th>ID</th>
															<th>First Name</th>
															<th>Last Name</th>
															<th>Email</th>
															<th>Tel</th>
															<th>Name</th>
															<th>Description</th>
															<th>Capacity</th>
															<th>Updated</th>	
															<th>Created</th>
															<th>Edit / View / Delete</th>
														</tr>
													</thead>
													<tbody>
													<?php
														$assessment_centre_results = $db->query("SELECT * FROM assessment_centres");
														if($assessment_centre_results){
															foreach($assessment_centre_results as $result){
																
																//DISPLAY DATE IF SET OR "NEVER"
																$last_updated = date("F j, Y, g:i a", strtotime($result->last_updated));
																if($result->last_updated == '0000-00-00 00:00:00' || $result->last_updated == ''){
																	$last_updated = 'Never';
																}
																
																//AJAX URL
																$details_url = 'admin/user_details.php';
																
																//DB TABLE
																$table = 'assessment_centres';
													?>
														<tr>
														
															<td><?php echo $result->id ;?></td>
															<td><?php echo ucwords($result->firstname) ;?></td>
															<td><?php echo ucwords($result->lastname) ;?></td>
															<td><?php echo $result->email ; ?></td>
															<td><?php echo $result->telephone ; ?></td>
															<td><?php echo $result->name ; ?></td>
															<td class="text">
																<span><?php echo $result->description ; ?></span>
															</td>
															
															<td><?php echo $result->capacity ; ?></td>
															
															<td><?php echo $last_updated ; ?></td>
															<td>
																<?php echo date("F j, Y", strtotime($result->created)); ?>
															</td>
															<td>
																<!-- Edit Button -->
																<button class="btn btn-primary btn-xs"  data-toggle="modal" data-target="#editUserModal" onclick="editUser(<?php echo $result->id;?>,'<?php echo $table ;?>','<?php echo $details_url ;?>');" title="Edit <?php echo ucwords($result->firstname .' '.$result->lastname) ;?>"><i class="fa fa-pencil" aria-hidden="true"></i></button>
																<!-- /Edit Button -->
																
																<!-- View Button -->
																<button class="btn btn-success btn-xs"  data-toggle="modal" data-target="#viewModal" onclick="viewUser(<?php echo $result->id;?>,'<?php echo $table ;?>','<?php echo $details_url ;?>');" title="View  <?php echo ucwords($result->firstname .' '.$result->lastname) ;?>"><i class="fa fa-search" aria-hidden="true"></i></button>
																<!-- /View Button -->
															
																<!-- Delete Button -->
																<button class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#userDeleteModal" title="Delete <?php echo ucwords($result->firstname .' '.$result->lastname) ;?>" onclick="deleteUser(<?php echo $result->id;?>,'<?php echo $table ;?>','<?php echo $details_url ;?>');" ><i class="fa fa-trash" aria-hidden="true"></i> </button>
																<!-- /Delete Button -->
															</td>
																
														</tr>
													
													<?php
															}
														}
													?>
													
													</tbody>
											 
												</table>
												<!-- /assessment-centres-table -->	
													
											</div>
											<!-- /table-responsive -->
										</div>
										<!-- /table container -->

									
									</div>
									<!-- /Tab3 -->
									

							
								</div>
								<!-- /Tab panes -->
						
							</div>
							<!-- /nav-tabs-custom -->
							
						</div>
					</div>
				</div>
			</div>
        </div>
        <!-- /page content -->
		

		<!-- ADD USER FORM-->
		<form action="<?php echo $base_url; ?>admin/add_user.php" id="addUserForm" name="addUserForm" class="form-horizontal form-label-left input_mask" method="post" enctype="multipart/form-data">
			
			<!-- .modal -->
			<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				
				<!-- .modal-dialog -->
				<div class="modal-dialog" role="document">
					
					<!-- .modal-content -->
					<div class="modal-content">
						
						<!-- .modal-header -->
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							
							<h3 align="center">Add New User</h3>
						</div>
						<!-- /.modal-header -->
						
						<!-- .modal-body -->
						<div class="modal-body">
						
							<div class="form_errors"></div>
							
							<!-- .scrollable -->
							<div class="scrollable">
							
								<div class="form-group">
									<div class="col-md-12 col-xs-12">
										<label for="user_type">Select User Type</label>
										<select name="user_type" id="user_type" class="form-control">
											<option value="">Select a user type</option>
											<option value="apprentices">Apprentice</option>
											<option value="assessors">Assessor</option>
											<option value="assessment_centres">Assessment Centre</option>
										</select>
									</div>
									
								</div>
								
								<br/>
								
								<div class="form-group">
									<div class="col-md-6 col-xs-12">
										<div class="textinput">
											<input type="text" class="form-control floatLabel" name="firstname" id="firstname" placeholder="">
											<label for="firstname">First Name</label>
										</div>
									</div>
									<div class="col-md-6 col-xs-12">
										<div class="textinput">
											<input type="text" class="form-control floatLabel" name="lastname" id="lastname" placeholder="">
											<label for="lastname">Last Name</label>
										</div>
									</div>
								</div>
								
								<br/>
								
								<div class="form-group">
									<div class="col-md-6 col-xs-12">
										<div class="textinput">
											<input type="email" class="form-control floatLabel" name="email" id="email" placeholder="">
											<label for="email">Email</label>
										</div>
									</div>
									<div class="col-md-6 col-xs-12">
										<div class="textinput">
											<input type="tel" class="form-control floatLabel" name="telephone" id="telephone" placeholder="">
											<label for="telephone">Telephone</label>
										</div>
									</div>
								</div>
								
								<br/>
								
								<!-- #apprentices-section -->
								<div id="apprentices-section" class="form-section">
								
									<div class="form-group">
										<div class="col-md-6 col-xs-12">
											<label for="start_date">Start Date</label>
											
											<div class="input-group">
												<span class="input-group-addon">
													<span class="glyphicon glyphicon-calendar"></span>
												</span>
												<input type="text" class="form-control datepicker" name="start_date" id="start_date" placeholder="">
											</div>	
										</div>
										<div class="col-md-6 col-xs-12">
											<label for="end_date">End Date</label>
											
											<div class="input-group">
												<span class="input-group-addon">
													<span class="glyphicon glyphicon-calendar"></span>
												</span>
												<input type="text" class="form-control datepicker" name="end_date" id="end_date" placeholder="">
											</div>	
										</div>
									</div>
									
									<br/>
									
									<div class="form-group">
										<div class="col-md-6 col-xs-12">
											<label for="assessor_id">Select Assessor</label>
											<select name="assessor_id" id="assessor_id" class="form-control">
												<option value="">Select an Assessor</option>
												<?php echo $select_assessors ; ?>
											</select>
										</div>
									</div>
								</div>
								<!-- /#apprentices-section -->
								
								<br/>
								
								<!-- #assessors-section -->
								<div id="assessors-section" class="form-section">
								
									<div class="form-group">
										<div class="col-md-6 col-xs-12">
											<label for="is_accepting_new_apprentices">Accepting New Apprentices?</label>
											<select name="is_accepting_new_apprentices" id="is_accepting_new_apprentices" class="form-control">
												<option value="">Select</option>
												<option value="1">Yes</option>
												<option value="0">No</option>
											</select>
										</div>
									</div>
								</div>
								<!-- /#assessors-section -->
								
								<br/>
								
								<!-- #assessment_centres-section -->
								<div id="assessment_centres-section" class="form-section">
								
									<div class="form-group">
										<div class="col-md-6 col-xs-12">
											<div class="textinput">
												<input type="text" class="form-control floatLabel" name="name" id="name">
												<label for="name">Name</label>
											</div>
										</div>
										<div class="col-md-6 col-xs-12">
											<div class="textinput">
												<input type="number" class="form-control floatLabel" name="capacity" id="capacity">
												<label for="capacity">Capacity</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12 col-xs-12">
											<label for="description">Description</label>
											<div class="txtEditor"></div>
											<textarea name="description" id="description" class="form-control hidden"></textarea>
										</div>
									</div>
								</div>
								<!-- /#centre-section -->
								
								<br/>
								
							</div>
							<!-- /.scrollable -->
							
						</div>
						<!-- /.modal-body -->
						
						<!-- .modal-footer -->
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							
							<button type="submit" class="btn btn-success">Add</button>
							
						</div>
						<!-- /.modal-footer -->
						
					</div>
					<!-- /.modal-content -->
					
				</div>
				<!-- /.modal-dialog -->
				
			</div>	
			<!-- /.modal -->
			
		</form>		
		<!-- /Add User Form-->
		
		
				
		<!-- UPDATE USER FORM-->
		<form action="<?php echo $base_url; ?>admin/update_user.php" id="editUserForm" name="editUserForm" class="form-horizontal form-label-left input_mask" method="post" enctype="multipart/form-data">
			
			<!-- .modal -->
			<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				
				<!-- .modal-dialog -->
				<div class="modal-dialog" role="document">
					
					<!-- .modal-content -->
					<div class="modal-content">
						
						<!-- .modal-header -->
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							
							<h3 align="center">Update User</h3>
						</div>
						<!-- /.modal-header -->
						
						<!-- .modal-body -->
						<div class="modal-body">
						
							<div class="form_errors"></div>
							
							<!-- .scrollable -->
							<div class="scrollable">
							
								<div class="form-group">
									<div class="col-md-12 col-xs-12">
										<label for="user_type">User Type</label>
										<input type="text" class="form-control" name="user_type" id="utype" readonly>
									</div>
									
								</div>
								
								<br/>
								
								<div class="form-group">
									<div class="col-md-6 col-xs-12">
										<div class="textinput">
											<input type="text" class="form-control floatLabel" name="firstname" id="fname" placeholder="">
											<label for="firstname">First Name</label>
										</div>
									</div>
									<div class="col-md-6 col-xs-12">
										<div class="textinput">
											<input type="text" class="form-control floatLabel" name="lastname" id="lname" placeholder="">
											<label for="lastname">Last Name</label>
										</div>
									</div>
								</div>
								
								<br/>
								
								<div class="form-group">
									<div class="col-md-6 col-xs-12">
										<div class="textinput">
											<input type="email" class="form-control floatLabel" name="email" id="edit_email" placeholder="">
											<label for="email">Email</label>
										</div>
									</div>
									<div class="col-md-6 col-xs-12">
										<div class="textinput">
											<input type="tel" class="form-control floatLabel" name="telephone" id="tel" placeholder="">
											<label for="telephone">Telephone</label>
										</div>
									</div>
								</div>
								
								<br/>
								
								<!-- #apprenticeSection -->
								<div id="apprenticeSection" class="form-section">
								
									<div class="form-group">
										<div class="col-md-6 col-xs-12">
											<label for="start_date">Start Date</label>
											
											<div class="input-group">
												<span class="input-group-addon">
													<span class="glyphicon glyphicon-calendar"></span>
												</span>
												<input type="text" class="form-control datepicker" name="start_date" id="startDate" placeholder="">
											</div>	
										</div>
										<div class="col-md-6 col-xs-12">
											<label for="end_date">End Date</label>
											
											<div class="input-group">
												<span class="input-group-addon">
													<span class="glyphicon glyphicon-calendar"></span>
												</span>
												<input type="text" class="form-control datepicker" name="end_date" id="endDate" placeholder="">
											</div>	
										</div>
									</div>
									
									<br/>
									
									<div class="form-group">
										<div class="col-md-6 col-xs-12">
											<label for="assessor_id">Select Assessor</label>
											<select name="assessor_id" id="assessorID" class="form-control">
												<option value="">Select an Assessor</option>
												<?php echo $select_assessors ; ?>
											</select>
											<input type="hidden" name="apprentice_id" id="apprenticeID">
										</div>
									</div>
								</div>
								<!-- /#apprentices-section -->
								
								<br/>
								
								<!-- #assessors-section -->
								<div id="assessorSection" class="form-section">
								
									<div class="form-group">
										<div class="col-md-6 col-xs-12">
											<label for="is_accepting_new_apprentices">Accepting New Apprentices?</label>
											<select name="is_accepting_new_apprentices" id="isAcceptingNewApprentices" class="form-control">
												
												<option value="1">Yes</option>
												<option value="0">No</option>
											</select>
										</div>
									</div>
								</div>
								<!-- /#assessors-section -->
								
								<br/>
								
								<!-- #assessment_centres-section -->
								<div id="assessment_centres-section" class="form-section">
								
									<div class="form-group">
										<div class="col-md-6 col-xs-12">
											<div class="textinput">
												<input type="text" class="form-control floatLabel" name="name" id="edit_name">
												<label for="name">Name</label>
											</div>
										</div>
										<div class="col-md-6 col-xs-12">
											<div class="textinput">
												<input type="number" class="form-control floatLabel" name="capacity" id="edit_capacity">
												<label for="capacity">Capacity</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12 col-xs-12">
											<label for="description">Description</label>
											<div id="edit_desc"></div>
											<textarea name="description" id="edit_description" class="form-control hidden"></textarea>
										</div>
									</div>
								</div>
								<!-- /#centre-section -->
								
								<br/>
								
							</div>
							<!-- /.scrollable -->
							
						</div>
						<!-- /.modal-body -->
						
						<!-- .modal-footer -->
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							<input type="hidden" name="id" id="userID" readonly>
							<button type="submit" class="btn btn-success">Update</button>
							
						</div>
						<!-- /.modal-footer -->
						
					</div>
					<!-- /.modal-content -->
					
				</div>
				<!-- /.modal-dialog -->
				
			</div>	
			<!-- /.modal -->
			
		</form>		
		<!-- /Update User Form-->
		

	<!-- DELETE USER FORM-->
	<form action="<?php echo $base_url; ?>admin/delete_user.php" id="deleteUserForm" name="deleteUserForm" method="post" enctype="multipart/form-data">
		
	<div class="modal fade" id="userDeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h3 align="center" >Delete Record?</h3>
					
				</div>
				<div class="modal-body">
					<div id="delete-errors"></div>
					<p>Do you want to permanently delete <strong><span id="user-name"></span></strong>?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<input type="hidden" name="userID"  id="user-ID">
					<input type="hidden" name="userType"  id="user-type">
					<input type="button" onclick="deleteUserSubmit()" class="btn btn-danger" value="Delete">
					
				</div>
			</div>
		</div>
	</div>		
	</form>		
	<!-- /Delete User Form-->
	
	
	

		
	<!-- View User -->
	<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3 align="center" id="headerTitle"></h3>
				</div>
				<div class="modal-body scrollable">
					
					<div class="clearfix"></div>
					
					<div class="row">
						<div class="col-md-12">
							<!-- Widget: user widget style 1 -->
							<div class="widget-user">
								<!-- Add the bg color to the header using any of the bg-* classes -->
								<div class="widget-user-header bg-black" style="background: url('<?php echo $base_url;?>assets/images/img/photo1.png') center center;">
								  <h3 class="widget-user-username"><span class="fullName"></span></h3>
								  
								</div>
								
								<br/><br/><br/>
									<div id="view-table"></div>
								<br/>
							
							</div>
							<!-- /.widget-user -->
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->
				
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

				</div>
			</div>
		</div>
	</div>	
	<!-- View User -->


	
	
			
	<?php include_once("footer.php");?>
	

	</body>
</html>
	
	