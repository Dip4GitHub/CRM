<?php 
$host 			= '';
$username 		= 'root';
$password 		= '';
$database 		= 'projects_crm';
$tblprefix 		= 'crm_';
$siteName       = 'CRM';
$siteUrl		= 'http://127.0.0.1/Projects/project-1/';
$limitperpage   =  25;
$recieptInitial =  'RCT';
$invoiceExpenceInitial =  'INV';
$limitperpage   =  25;
$Dbconnect = new mysqli($host, $username, $password, $database);
mysqli_set_charset( $Dbconnect, 'utf8');
// Check connection
if ($Dbconnect->connect_error) {
    die("Connection failed: " . $Dbconnect->connect_error);
}