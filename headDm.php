<?php
error_reporting(E_ALL & (~E_NOTICE | ~E_USER_NOTICE));
ini_set('error_log','log/php_errors.log');
ini_set('ignore_repeated_souce',true);
ini_set('ignore_repeated_errors',true);
ini_set('display_errors',TRUE);
ini_set('log_errors',true);

// SESSION REVIEW USERS
//session_start();
if(!empty($_SESSION['on']) != ""){ 
//	$page = "adpage";
	$idUser   = $_SESSION['id'];
	$nameUser = $_SESSION['nome'];
	$imgUser  = $_SESSION['img'];
} else {
//	$page = "body";
}
?>

<!DOCTYPE html>
<html>
  <head id="my-document-head">
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" id="head" href="css/cssHead.css">
	<link rel="stylesheet" type="text/css" id="headScreen" href="css/cssHead.css">
	  <link rel="stylesheet" type="text/css" id="headScreen" href="css/menuBar.css">
	<!---->
<link rel="stylesheet" href="css/mobile.css" id="screenWidthHeight" type="text/css">
	<!---- >
	<link rel="stylesheet" id="screenWidthHeight" type="text/css">
    <!---->
	<title>WEBSITE - Landpage <?=$nameUser; ?></title>
  </head>
 
 
<body id="body">