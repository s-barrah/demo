<?php

ob_start();
//start the session
session_start();

//set timezone
date_default_timezone_set('Europe/London');


include_once "User.class.php";
include_once "UserTools.class.php";
include_once "DB.class.php";

//connect to the database
$db = new DB();
$db->connect();

//initialize objects
//$user = new User();
$userTools = new UserTools();

//Webmaster Email
$mail_webmaster = 'sidneybarrah@gmail.com';

//Top site root URL
$base_url = 'http://localhost/websites/demo/';

/******************************************************
-----------------Optional Configuration----------------
******************************************************/

//Home page file name
$url_home = 'index.php';

//Design Name
$design = 'default';



?>