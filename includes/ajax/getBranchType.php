<?php
include('../applications.php');

$branchId 		    = isset($_REQUEST['branchId'])? $_REQUEST['branchId'] : '';

if($branchId>0){
  $query      = "SELECT branchType FROM `crm_branch` WHERE `id`='$branchId'";
  $success    = mysqli_query($Dbconnect, $query);
  $res        = mysqli_fetch_object($success);

  displaySelect('branchType', $branchTypeArray, $res->branchType, 'class="form-control" readonly="readonly"');
 
}

?>

