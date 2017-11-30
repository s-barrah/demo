<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

include_once "includes/global.inc.php";
	
	//BASE URL OF WEBSITE

	//ASSIGN PAGE TITLE
	$pageTitle = 'Demo Home Page';
	
	//SEO PAGE DESCRIPTION
	$meta_description = '';
	
	//SEO PAGE AUTHOR
	$meta_author = '';
	
	//SEO PAGE KEYWORDS
	$meta_keywords = '';


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link href="<?php echo $base_url;?>assets/images/icons/favicon.ico?<?php echo time();?>" rel="shortcut icon" type="image/ico" />
	
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
	
	<!-- Optional theme -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">
	
	<!-- JQuery UI CSS -->
	<link href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
	
	<!-- Font Awesome -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	
    <!-- Datatables -->
	<link href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css" rel="stylesheet">	
	<link href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" rel="stylesheet">
	
	<!-- Jasny-Bootstrap -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
	
	<!-- Select2 -->
	<link rel="stylesheet" href="assets/css/select2.min.css">
	
	<!-- Select2 -->
	<link rel="stylesheet" href="assets/css/style.css">
	
	<base href="<?php echo $base_url;?>"> 
	
	
</head>
	<body>
		
		<div class="navbar-wrapper">

			<!-- Static navbar -->
			<nav class="navbar navbar-inverse no-radius">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Demo</a>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li class="active"><a href="#">Home</a></li>
							<li><a href="#">About</a></li>
							<li><a href="#">Contact</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="admin/index.php">Admin Dashboard</a></li>
						</ul>
					</div><!--/.nav-collapse -->
				</div><!--/.container-fluid -->
			</nav>
		</div>
		<div class="container">
		
			<!-- Main component for a primary marketing message or call to action -->
			<div class="jumbotron no-radius">
				<h1><?php echo $pageTitle; ?></h1>
				<p>Welcome to our demo page.</p>
			
			</div>

		</div> <!-- /container -->

	
	<!-- JQuery scripts
    ================================================== -->
     <!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	
	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Latest compiled JavaScript -->
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	<!-- Jasny-Bootstrap -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
	
	</body>
</html>
	
	