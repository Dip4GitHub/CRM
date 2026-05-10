<?php
include('includes/applications.php');
include('includes/function/session.php');
$pageTitle      = 'Products Transfer';
$tableName      = generateSql('#__inventory');
$currentPage    = 'products-transfer';
$productsArray  = getArrayfromTable('id', 'name', '#__products', ' WHERE activeStatus=1 ORDER BY name ASC');
$branchArray    = getArrayfromTable('id', 'name', '#__branch', ' WHERE activeStatus=1 ORDER BY name ASC');
$batchNoArray   = getArrayfromTable('batchNo AS id', 'batchNo AS name', '#__inventory', ' WHERE activeStatus=1 ORDER BY name ASC');

$id              = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$submit          = isset($_REQUEST['submit']) ? $_REQUEST['submit'] : '';
$msg            = isset($_REQUEST['msg']) ? $_REQUEST['msg'] : NULL;
$errmsg          = isset($_REQUEST['errmsg']) ? $_REQUEST['errmsg'] : NULL;

$submitMsg  = "Transfer";
$inventoryType       = '5'; //Outward
$inventoryTypeReceived  = '6'; //Inward
$fromBranchId      = isset($_REQUEST['fromBranchId']) ? $_REQUEST['fromBranchId'] : $BranchID;
$toBranchId        = isset($_REQUEST['toBranchId']) ? $_REQUEST['toBranchId'] : '';
$productId         = isset($_REQUEST['productId']) ? $_REQUEST['productId'] : '';
$quantity         = isset($_REQUEST['quantity']) ? $_REQUEST['quantity'] : '';
$activeStatus     = isset($_REQUEST['activeStatus']) ? $_REQUEST['activeStatus'] : '1';
$packagingDate    = isset($_REQUEST['packagingDate']) ? $_REQUEST['packagingDate'] : '';
$createdDate       = isset($_POST['createdDate']) ? $_POST['createdDate'] : date('Y-m-d');


if ($submit == 'Confirm') {
  $batchNoDetails        = isset($_POST['batchNoDetails']) ? $_POST['batchNoDetails'] : '';
  $selectedBatches      = unserialize($batchNoDetails);
  $insertArray = array();

  foreach ($selectedBatches as $batch) {
    $batchNo = $batch['batchNo'];
    $packagingDate = $batch['packagingDate'];
    $qty = $batch['qty'];
    $qty2 = $qty * -1;

    $insertArray[] = "(NULL, '$productId', '$qty2', '$inventoryType', '$fromBranchId', '$toBranchId', '$fromBranchId', '1', '$guserId', '$createdDate','$batchNo','$packagingDate')";

    $insertArray[] = "(NULL, '$productId', '$qty', '$inventoryTypeReceived', '$toBranchId', '$fromBranchId', '$toBranchId', '2', '$guserId', '$createdDate', '$batchNo','$packagingDate')";
  }
  $query = "INSERT INTO $tableName (`id`, `productId`, `quantity`, `inventoryType`, `branchID`, `toBranchId`, `fromBranchId`, `activeStatus`, `createdID`, `createdDate`,`batchNo`, `packagingDate` ) VALUES " . implode(',', $insertArray);
  //echo $query; die;

  $success    = mysqli_query($Dbconnect, $query);
  $id         = mysqli_insert_id($Dbconnect);
  $msg        = 'Product Transfer successfully.';

  if ($success) {
    $name =  getName('name', '#__products', $productId);
    $description = "Product $name is Transfer by $guserName on" . date("l jS \of F Y h:i:s A");
    $logQuery      = "INSERT INTO crm_logtable SET `idType`='5', `useId`='$id', `name`= 'Product $name is created', `description` ='$description', `createdId`='$guserId', `createdDate`=NOW()";
    $success    = mysqli_query($Dbconnect, $logQuery);
    location("$currentPage.php?msg=$msg");
  } else {
    $errmsg   = "Error: " . mysqli_error($Dbconnect);
  }
}

?>
<!doctype html>
<html lang="en" data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" dir="ltr" data-pc-theme="light">
<!-- [Head] start -->

<head>
  <title><?php echo "$siteName :: $pageTitle"; ?></title>
  <!-- [Meta] -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="Datta Able is trending dashboard template made using Bootstrap 5 design framework. Datta Able is available in Bootstrap, React, CodeIgniter, Angular,  and .net Technologies." />
  <meta name="keywords" content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard" />
  <meta name="author" content="CodedThemes" />

  <!-- [Favicon] icon -->
  <link rel="icon" href="assets/images/favicon.svg" type="image/x-icon" />
  <!-- [Font] Family -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />
  <!-- [phosphor Icons] https://phosphoricons.com/ -->
  <link rel="stylesheet" href="assets/fonts/phosphor/duotone/style.css" />
  <!-- [Tabler Icons] https://tablericons.com -->
  <link rel="stylesheet" href="assets/fonts/tabler-icons.min.css" />
  <!-- [Feather Icons] https://feathericons.com -->
  <link rel="stylesheet" href="assets/fonts/feather.css" />
  <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
  <link rel="stylesheet" href="assets/fonts/fontawesome.css" />
  <!-- [Material Icons] https://fonts.google.com/icons -->
  <link rel="stylesheet" href="assets/fonts/material.css" />
  <!-- [Template CSS Files] -->
  <link rel="stylesheet" href="assets/css/style.css" id="main-style-link" />

  <style>
    tbody {
      padding: 50px !important;
    }
  </style>
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body>

  <!-- [ Pre-loader ] start -->
  <div class="loader-bg fixed inset-0 bg-white dark:bg-themedark-cardbg z-[1034]">
    <div class="loader-track h-[5px] w-full inline-block absolute overflow-hidden top-0">
      <div class="loader-fill w-[300px] h-[5px] bg-primary-500 absolute top-0 left-0 animate-[hitZak_0.6s_ease-in-out_infinite_alternate]"></div>
    </div>
  </div>
  <!-- [ Pre-loader ] End -->
  <!-- [ Sidebar Menu ] && [ Header Topbar ] start -->
  <?php
  include('includes/common/nav.php');
  ?>
  <!-- [ Sidebar Menu ] && [ Header ] end -->
  <!-- [ Header ] end -->
  <!-- [ Main Content ] start -->
  <div class="pc-container">
    <div class="pc-content">
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="page-header-title">
            <?php
            if (isset($msg))  echo '<div class="alert alert-success" role="alert"><strong>' . $msg . '</strong></div>';
            if (isset($errmsg))  echo '<div class="alert alert-danger" role="alert"><strong>' . $errmsg . '</strong></div>';
            ?>
          </div>

          <!--<ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript: void(0)">Other</a></li>
            <li class="breadcrumb-item" aria-current="page">Sample Page</li>
          </ul>-->
        </div>
      </div>
      <!-- [ breadcrumb ] end -->
      <!-- [ Main Content ] start -->
      <div class="grid grid-cols-12 gap-x-6">
        <!-- [ sample-page ] start -->
        <div class="col-span-12">
          <div class="card">
            <div class="row">

            </div>
            <div class="card-header">
              <div class="col-lg-6">
                <h4 class="header-title"><?php echo $pageTitle; ?></h4>
              </div>
            </div>
            <div class="card-body">
              <?php if ($submit == 'Transfer') { ?>
                <form name="frm" method="post" action="<?php echo $currentPage; ?>-add.php" onSubmit="return confirm('Are you sure you want to Continue?');">
                  <div class="col-lg-12 ">
                    <input type="hidden" name="productId" value="<?php echo $productId; ?>">
                    <input type="hidden" name="fromBranchId" value="<?php echo $fromBranchId; ?>">
                    <input type="hidden" name="toBranchId" value="<?php echo $toBranchId; ?>">
                    <input type="hidden" name="packagingDate" value="<?php echo $packagingDate; ?>">
                    <input type="hidden" name="activeStatus" value="<?php echo $activeStatus; ?>">
                    <div class="col-lg-12 ">
                      <table class="table table-hover progress-table mt-2">
                        <thead>
                          <tr>
                            <th>Sr No</th>
                            <th>batch No</th>
                            <th>Packaging Date</th>
                            <th>QTY</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          //$result = mysqli_query($Dbconnect, "CALL inventoryBatchReport($productmasterId, $BranchID)");
                          $query    = "SELECT sum(quantity) as totalQty, productId, batchNo, packagingDate, fromBranchId FROM `crm_inventory` where productId=$productId and branchID = $fromBranchId group by batchNo, packagingDate order by packagingDate";
                          $selectedqty   = $i = 0;
                          $j = 1;
                          $QtyTotal     = $trfQty = $quantity;
                          //$selectedqty=0;
                          $batcheArray   = array();
                          $obj          = mysqli_query($Dbconnect, $query);
                          echo "<h5>" . getName('name', 'crm_products', $productId) . "</h5>";
                          while ($result = mysqli_fetch_object($obj)) {
                            if ($trfQty <= 0) {
                              break;
                            }
                            if ($QtyTotal > $result->totalQty) {
                              $QtyTotal -= $result->totalQty;
                              $selectedqty = $result->totalQty;
                            } else {
                              $selectedqty = $QtyTotal;
                              $QtyTotal -= $QtyTotal;
                            } ?>

                            <tr>
                              <td><?php echo $j; ?></td>
                              <td><?php echo $result->batchNo; ?></td>
                              <td><?php echo $result->packagingDate; ?></td>
                              <td><?php echo $selectedqty; ?></td>
                            </tr>
                          <?php
                            $trfQty = $trfQty - $result->totalQty;

                            $batcheArray[$i] = array('batchNo' => $result->batchNo, 'qty' => $selectedqty, 'packagingDate' => $result->packagingDate);

                            $i++;
                            $j++;
                          } ?>
                        </tbody>
                      </table>
                      <?php

                      if ($QtyTotal > 0) {
                        echo "<b style=\"color:red;\">Inventory does not have enough product Amount: $quantity </b>";
                      }
                      ?>
                    </div>
                    <input type="hidden" name="quantity" value="<?php echo $quantity; ?>">

                    <input type="hidden" name="batchNoDetails" value='<?php echo serialize($batcheArray); ?>'>

                    <?php if ($QtyTotal > 0) { ?>
                      <input type="button" value="Back" class="btn btn-primary mb-3" onClick="window.history.go(-2); return false;">
                    <?php } else { ?>
                      <input type="submit" value="Confirm" class="btn btn-primary mb-3" name="submit"> &nbsp; <input type="button" value="Back" class="btn btn-primary mb-3" onClick="window.history.go(-2); return false;">
                    <?php } ?>
                </form>
            </div>
          <?php } else {  ?>
            <form name="frm" method="post" action="<?php echo $currentPage; ?>-add.php" autocomplete=off>
              <div class="grid grid-cols-12 gap-1.5">
                <div class="col-span-12 sm:col-span-6 my-1">
                  <label for="fromBranchId" class="col-form-label">From Branch </label><span style="color:red"> *</span>
                  <?php displaySelect('fromBranchId', $branchArray, $fromBranchId, 'class="form-control" required id="fromBranchId"'); ?>
                </div>
                <div class="col-span-12 sm:col-span-6 my-1">
                  <label for="name" class="col-form-label">To Branch </label><span style="color:red"> *</span>
                  <?php displaySelect('toBranchId', $branchArray, $toBranchId, 'class="form-control" required id="toBranchId"'); ?>
                </div>

                <div class="col-span-12 sm:col-span-6 my-1">
                  <label for="name" class="col-form-label">Products Name</label><span style="color:red"> *</span>
                  <?php displaySelect('productId', $productsArray, $productId, 'class="form-control" id="productId" onchange="getpackagingDateList(this.value)"'); ?>
                </div>
                <!--<div class="col-span-12 sm:col-span-6 my-1" >
                      <label for="price" class="col-form-label">Batch No</label><span style="color:red"> *</span>
                      <div id="batchNo">
                      <?php //displaySelect('batchNo', $batchNoArray, $batchNo, 'class="form-control"');
                      ?>
                      </div>
                      
                    </div>-->
                <div class="col-span-12 sm:col-span-6 my-1">
                  <label for="quantity" class="col-form-label">Quantity</label>
                  <input class="form-control" type="text" id="quantity" name="quantity" value="<?php echo $quantity; ?>">
                </div>
                <div class="col-span-12 sm:col-span-6 my-1">
                  <label for="packagingDate" class="col-form-label">Packaging Date</label>
                  <input class="form-control" type="date" name="packagingDate" id="packagingDate" value="<?php echo $packagingDate; ?>">
                </div>
                <div class="col-span-12 sm:col-span-6 my-1">
                  <label for="activeStatus" class="col-form-label">Status</label><span style="color:red"> *</span>
                  <?php displaySelect('activeStatus', $statusArray, $activeStatus, 'class="form-control" required id="activeStatus"'); ?>
                </div>
              </div>
              <input type="hidden" name="id" value="<?php echo $id; ?>">

              <div class="col-span-12 justify-self-center">
                <input type="submit" name="submit" value="<?php echo $submitMsg; ?>" class="btn btn-primary mt-4 pr-4 pl-4">
                <a href="<?php echo "$currentPage.php"; ?>"><input type="button" value="Cancel" class="btn btn-danger pr-4 pl-4"></a>
              </div>
            </form>
          <?php } ?>
          </div>
        </div>
      </div>
      <!-- [ sample-page ] end -->
    </div>
    <!-- [ Main Content ] end -->
  </div>
  </div>
  <!-- [ Main Content ] end -->
  <footer class="pc-footer">
    <?php include('includes/footer.php'); ?>
  </footer>
  <!-- Required Js -->
  <script src="assets/js/plugins/simplebar.min.js"></script>
  <script src="assets/js/plugins/popper.min.js"></script>
  <script src="assets/js/icon/custom-icon.js"></script>
  <script src="assets/js/plugins/feather.min.js"></script>
  <script src="assets/js/component.js"></script>
  <script src="assets/js/theme.js"></script>
  <script src="assets/js/script.js"></script>
  <script src="assets/js/jquery-3.6.0.min.js"></script>
  <script>
    /*function getBatchNoList(productId){
    var fromBranchId = $('#fromBranchId').val();
    //console.log(productId, fromBranchId);
    $.post('includes/ajax/getBatchNoList.php',{productId:productId, fromBranchId:fromBranchId},
    function(data,status){
      //console.log(data);
      $('#batchNo').html(data);
      
    });
     
}*/
    /* To find out packagingDate & Qty */
    function getpackagingDateList(productId) {
      var fromBranchId = $('#fromBranchId').val();
      // var productId     = $('#productId').val();
      //, batchNo:batchNo

      $.post('includes/ajax/getpackagingDateList.php', {
          productId: productId,
          fromBranchId: fromBranchId
        },
        function(data, status) {
          console.log(status);
          $('#quantity').val(data.quantity);
          $('#packagingDate').val(data.packagingDate);

        }, 'json');

    }
  </script>

  <div class="floting-button fixed bottom-[50px] right-[30px] z-[1030]">
  </div>




  <script>
    layout_change('false');
  </script>


  <script>
    layout_theme_sidebar_change('dark');
  </script>


  <script>
    change_box_container('false');
  </script>

  <script>
    layout_caption_change('true');
  </script>

  <script>
    layout_rtl_change('false');
  </script>

  <script>
    preset_change('preset-1');
  </script>

  <script>
    main_layout_change('vertical');
  </script>



</body>
<!-- [Body] end -->

</html>