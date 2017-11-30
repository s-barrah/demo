<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

include_once "../includes/global.inc.php";
	
	//BASE URL OF WEBSITE

	//ASSIGN PAGE ID
	$pageID = 'dashboard';
	
	//ASSIGN PAGE TITLE
	$pageTitle = 'Dashboard';
	
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
	
	<!-- daterange picker -->
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
	
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
	
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-wysiwyg/0.3.3/bootstrap3-wysihtml5.min.css">
	
	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="../assets/css/datepicker3.css">
	
	<!-- Select2 -->
	<link rel="stylesheet" href="../assets/css/select2.min.css">
	
	<!-- Animate.css style -->
	<link rel="stylesheet" href="../assets/css/animate.css">
   
	<!-- Style.css -->
	<link rel="stylesheet" href="../assets/css/style.css">
	
	<!-- Theme style -->
	<link rel="stylesheet" href="../assets/css/AdminLTE.css">
  
    <!-- Custom Theme Style -->
	<link rel="stylesheet" type="text/css" href="../assets/css/custom.min.css?<?php echo time(); ?>" media="all"/>
	
	
</head>
	<body class="nav-md" id="<?php echo $pageID ; ?>">
		
		
	<?php include_once("header.php");?>
	

        <!-- page content -->
        <div class="right_col" role="main">
		
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-4 col-sm-6 col-xs-6 tile_stats_count text-center">
              <span class="count_top"><i class="fa fa-user"></i> Total Assessors</span>
              <div class="count"><?php echo $assessors_count ; ?></div>
             
            </div>
            
            <div class="col-md-4 col-sm-6 col-xs-6 tile_stats_count text-center">
              <span class="count_top"><i class="fa fa-user"></i> Total Apprentices</span>
              <div class="count green"><?php echo $apprentices_count ; ?></div>
              
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6 tile_stats_count text-center">
              <span class="count_top"><i class="fa fa-user"></i> Total Assessment Centres</span>
              <div class="count"><?php echo $centres_count ; ?></div>
              
            </div>
            
          </div>
          <!-- /top tiles -->
			
			
        </div>
        <!-- /page content -->
		
		
	<?php include_once("footer.php");?>
	

	</body>
</html>
	
	