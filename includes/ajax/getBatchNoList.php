<?php
include('../applications.php');

$productId 		    = isset($_REQUEST['productId'])? $_REQUEST['productId'] : '';
$fromBranchId  		= isset($_REQUEST['fromBranchId'])? $_REQUEST['fromBranchId'] : '';

$batchNoArray       = array();
if ($productId > 0 && $fromBranchId>0) {
    $batchNoArray = getArrayfromTable('batchNo AS id','batchNo AS name','#__inventory', "WHERE productId = $productId AND branchID= $fromBranchId ORDER BY `packagingDate` DESC");
}
displaySelect('batchNo', $batchNoArray, '', 'onchange="getpackagingDateList(this.value)" class="form-control"');
?>

