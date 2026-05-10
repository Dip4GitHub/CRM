<?php
@ob_start();
session_start();
date_default_timezone_set('asia/kolkata');
include ("configure.php");
include ("general/array.php");
include ("function/common.php");
include ("classes/pagination.class.php");

//$guserId 	= @$_SESSION["id"];
$guserId 		= @$_SESSION["guserId"];
$guserName 		= @$_SESSION["guserName"];
$guserEmail 	= @$_SESSION["guserEmail"];
$gusergender 	= @$_SESSION["gusergender"];
$guserType 	    = @$_SESSION["guserType"];
$BranchID 	    = @$_SESSION["BranchID"];
$BranchType 	= @$_SESSION["BranchType"];
?>