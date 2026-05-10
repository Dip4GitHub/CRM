<div class="container mt-2">
  <ul class="nav nav-tabs" id="menuTab" >
    <li class="nav-item"> <a class="nav-link <?php if($currentPage=='sale-view') { echo 'active'; }?>" href="sale-view.php?id=<?php echo $id;?>">View</a> </li>
    <li class="nav-item"> <a class="nav-link <?php if($currentPage=='sale') { echo 'active'; }?>" href="sale-edit.php?id=<?php echo $id;?>">Edit Details</a> </li>
    <!--<li class="nav-item"> <a class="nav-link <?php if($currentPage=='customer-history') { echo 'active'; }?>" href="customer-history.php?id=<?php echo $id;?>">Order History</a> </li>
    <li class="nav-item"> <a class="nav-link <?php if($currentPage=='customer-receipt') { echo 'active'; }?>" href="customer-receipt.php?id=<?php echo $id;?>">Receipt</a> </li>
    <li class="nav-item"> <a class="nav-link <?php if($currentPage=='customer-asset') { echo 'active'; }?>" href="customer-asset.php?id=<?php echo $id;?>">Support</a> </li>
	<li class="nav-item"> <a class="nav-link <?php if($currentPage=='customer-contact') { echo 'active'; }?>" href="customer-contact.php?id=<?php echo $id;?>">Contact</a> </li>
	<li class="nav-item"> <a class="nav-link <?php if($currentPage=='customer-report') { echo 'active'; }?>" href="customer-report.php?id=<?php echo $id;?>">Report</a> </li>
  <li class="nav-item"> <a class="nav-link <?php if($currentPage=='customer-log') { echo 'active'; }?>" href="customer-log.php?id=<?php echo $id;?>">Logs</a> </li>
  <li class="nav-item"> <a class="nav-link <?php if($currentPage=='contact-attachment') { echo 'active'; }?>" href="contact-attachment.php?id=<?php echo $id;?>">Attachment</a> </li>-->
  <li class="nav-item"> <a class="nav-link" href="sale.php">Back</a> </li>
  </ul>
</div>