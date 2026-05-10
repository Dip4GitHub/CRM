<?php
include('../applications.php');

$productId          = isset($_REQUEST['productId'])? $_REQUEST['productId'] : '';
$fromBranchId       = isset($_REQUEST['fromBranchId'])? $_REQUEST['fromBranchId'] : '';
//$batchNo            = isset($_REQUEST['batchNo'])? $_REQUEST['batchNo'] : '';

$query      = "SELECT SUM(quantity) AS quantity, MAX(packagingDate) AS packagingDate FROM `crm_inventory` WHERE `branchID` ='$fromBranchId' AND `productId`='$productId' group by productId";
$success    = mysqli_query($Dbconnect, $query);
$res        = mysqli_fetch_object($success);
echo json_encode([
    'quantity' => $res->quantity ?? '',
    'packagingDate' => $res->packagingDate ?? ''
]);

?>




