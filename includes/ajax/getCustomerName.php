<?php
include('../applications.php');

$val          = isset($_REQUEST['val'])? $_REQUEST['val'] : '';

$query      = "SELECT `id`, `name` FROM `crm_customers` WHERE `name` LIKE '%$val%' LIMIT 5";
$result    = mysqli_query($Dbconnect, $query);



while ($row = $result->fetch_assoc()) {
    echo "<div onclick=\"fillCustomerName({$row['id']}, '" . htmlspecialchars($row['name'], ENT_QUOTES) . "')\">" . htmlspecialchars($row['name']) . "</div>";
}

?>




