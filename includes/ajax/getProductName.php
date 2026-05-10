<?php
include('../applications.php');

$val          = isset($_REQUEST['val']) ? $_REQUEST['val'] : '';
$productType  = isset($_REQUEST['productType']) ? $_REQUEST['productType'] : '1';

$query      = "SELECT `id`, `name`, salePrice, gst FROM `crm_products` WHERE `name` LIKE '%$val%' AND productType = $productType LIMIT 5";
$result     = mysqli_query($Dbconnect, $query);



while ($row = $result->fetch_assoc()) {
    echo "<div onclick=\"fillProductName(this, {$row['gst']}, {$row['id']}, '" . htmlspecialchars($row['name'], ENT_QUOTES) .  "', {$row['salePrice']})\">" . htmlspecialchars($row['name']) . "</div>";
}
