<?php
	/************************************************
	File Name - Config.php
	Purpose - To define constants and settings
	*************************************************/
	define('DB_HOST','localhost');
	define('DB_USER','faizanali');
	define('DB_PASS','Test@1234');
	define('DB_NAME','db_governance_system');
	
	define('DB_DRIVER','MySql');
	define('KEY',md5('youcantseeme'));
	define( 'SITE_URL', 'http://192.168.0.78/gov_information' );
	define( 'SITE_NAME', 'Governancy Information' );
	define( 'EMAIL_FROM', 'Governancy Information' );
	define( 'EMAIL_FROM_NAME', 'Governancy Information' );
	define( 'EMAIL_REPLY_TO', 'admin@gov_information.com' );
	define( 'EMAIL_REPLY_TO_NAME', 'Governancy Information' );
	ini_set('display_errors','ALL');
	error_reporting(-1);
	date_default_timezone_set("Asia/Kolkata");
	
	$con=mysqli_connect(DB_HOST,DB_USER,DB_PASS);
	mysqli_select_db($con,DB_NAME);
?>
