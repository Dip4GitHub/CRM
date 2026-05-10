<?php
include('../applications.php');

$status     = isset($_REQUEST['status'])? $_REQUEST['status'] : '1';
$id  		= isset($_REQUEST['id'])? $_REQUEST['id'] : '';
$tableName  = isset($_REQUEST['tableName'])? $_REQUEST['tableName'] : 'crm_inventory';

if ($id > 0) {
    $sql    = generateSql("UPDATE `$tableName` SET `activeStatus`='$status' WHERE `id`='$id'");
    $obj    = mysqli_query($Dbconnect, $sql); 
}
?>

