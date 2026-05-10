<?php
include('includes/applications.php');
include('includes/function/session.php');
$pageTitle      = 'Damage/Loss Products';
$tableName      = generateSql('#__inventory');
$currentPage    = 'damage-loss-products';

$id              = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$submit          = isset($_REQUEST['submit']) ? $_REQUEST['submit'] : '';
$msg            = isset($_REQUEST['msg']) ? $_REQUEST['msg'] : NULL;
$errmsg          = isset($_REQUEST['errmsg']) ? $_REQUEST['errmsg'] : NULL;
if ($id > 0) {
  $submitMsg  = "Update";
} else {
  $submitMsg  = "Add";
}

$productId        = isset($_REQUEST['productId']) ? $_REQUEST['productId'] : '';
$quantity          = isset($_REQUEST['quantity']) ? $_REQUEST['quantity'] : '';
$batchNo           = isset($_REQUEST['batchNo']) ? $_REQUEST['batchNo'] : '';
$packagingDate     = isset($_REQUEST['packagingDate']) ? $_REQUEST['packagingDate'] : '';
$activeStatus     = isset($_REQUEST['activeStatus']) ? $_REQUEST['activeStatus'] : '1';
$damageLossType   = isset($_REQUEST['damageLossType']) ? $_REQUEST['damageLossType'] : '';



if ($submit == 'Add' or $submit == 'Update') {
  $commonQry  = "`productId`='$productId', `quantity`='$quantity', `batchNo`='$batchNo', `activeStatus`='$activeStatus', `packagingDate`='$packagingDate', `damageLossType`='$damageLossType'";
  $name = getName('name', '#__products', $productId);

  if ($submit      == 'Add') {
    $query      = "INSERT INTO `$tableName` SET $commonQry, `createdId`='$guserId', `createdDate`=NOW()";
    $success    = mysqli_query($Dbconnect, $query);
    $id         = mysqli_insert_id($Dbconnect);
    $msg        = 'Damage/Loss Products Added successfully.';
    if ($success) {
      $description = "Damage/Loss Products $name is Added created by $guserName on" . date("l jS \of F Y h:i:s A");
      $logQuery      = "INSERT INTO crm_logtable SET `idType`='5', `useId`='$id', `name`= 'Damage/Loss Products $name is Added ', `description` ='$description', `createdId`='$guserId', `createdDate`=NOW()";
      $success    = mysqli_query($Dbconnect, $logQuery);
      location("$currentPage.php?msg=$msg");
    } else {
      $errmsg   = "Error: " . mysqli_error($Dbconnect);
    }
  } else {

    if ($errmsg == '') {
      $query      = "UPDATE `$tableName` SET $commonQry, `modifiedId`='$guserId', `modifiedDate`=NOW() WHERE `id`='$id'";
      $success    = mysqli_query($Dbconnect, $query);
      $msg        = 'Damage/Loss Products Updated successfully.';
      if ($success) {
        $description = "Damage/Loss Products $name is Updated by $guserName on" . date("l jS \of F Y h:i:s A");
        $logQuery      = "INSERT INTO crm_logtable SET `idType`='5', `useId`='$id', `name`= 'Damage/Loss Products $name is Updated', `description` ='$description', `createdId`='$guserId', `createdDate`=NOW()";
        $success    = mysqli_query($Dbconnect, $logQuery);
        location("$currentPage.php?msg=$msg");
      } else {
        $errmsg   = "Error: " . mysqli_error($Dbconnect);
      }
    }
  }
}

if ($id > 0) {
  $query      = "SELECT * FROM `$tableName` WHERE `id`='$id'";
  $success    = mysqli_query($Dbconnect, $query);
  $res        = mysqli_fetch_object($success);

  $productId       = $res->productId;
  $quantity       = $res->quantity;
  $batchNo         = $res->batchNo;
  $packagingDate   = $res->packagingDate;
  $activeStatus   = $res->activeStatus;
  $damageLossType = $res->damageLossType;
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
            <div class="row mt-2">
            </div>
            <div class="card-header">
              <div class="col-lg-6">
                <h4 class="header-title"><?php echo $submitMsg . ' ' . $pageTitle; ?></h4>
              </div>
            </div>
            <div class="card-body">
              <form name="frm" method="post" action="<?php echo $currentPage; ?>-add.php" autocomplete=off>
                <div class="grid grid-cols-12 gap-1.5">
                  <div class="col-span-12 sm:col-span-6 my-1">
                    <label for="name" class="col-form-label">Products Name</label><span style="color:red"> *</span>
                    <?php
                    $productsArray = getArrayfromTable('id', 'name', '#__products', ' WHERE activeStatus=1 ORDER BY name ASC');
                    displaySelect('productId', $productsArray, $productId, 'required class="form-control" onchange=" getBatchList(this.value);" id="productId"');
                    ?>
                  </div>
                  <div class="col-span-12 sm:col-span-6 my-1">
                    <label for="batchNo" class="col-form-label">Batch No.</label><span style="color:red"> *</span>
                    <?php $batchNoArray = getArrayfromTable('batchNo AS id', 'batchNo AS name', '#__inventory', "WHERE branchID= $BranchID ORDER BY `packagingDate` DESC"); ?>
                    <span id="batchNo">
                      <?php displaySelect('batchNo', $batchNoArray, $batchNo, 'required class="form-control" '); ?></span>
                  </div>
                  <div class="col-span-12 sm:col-span-6 my-1"><span style="color:red"> *</span>
                    <label for="packagingDate" class="col-form-label">Packaging Date</label><span style="color:red"> *</span>
                    <?php $packagingDateArray = getArrayfromTable('packagingDate AS id', 'packagingDate AS name', '#__inventory', "WHERE packagingDate IS NOT NULL AND branchID= $BranchID ORDER BY packagingDate DESC");  ?>
                    <span id="packagingDate">
                      <?php
                      displaySelect('packagingDate', $packagingDateArray, $packagingDate, 'required class="form-control"'); ?></span>
                  </div>
                  <div class="col-span-12 sm:col-span-6 my-1">
                    <label for="quantity" class="col-form-label">Quantity</label><span style="color:red"> *</span>
                    <input class="form-control" type="text" id="quantity" name="quantity" value="<?php echo $quantity; ?>" required>
                  </div>

                  <div class="col-span-12 sm:col-span-6 my-1">
                    <label for="activeStatus" class="col-form-label">Damage/ Loss</label><span style="color:red"> *</span>
                    <?php displaySelect('damageLossType', $damageLossTypeArray, $damageLossType, 'class="form-control" required'); ?>
                  </div>
                  <div class="col-span-12 sm:col-span-6 my-1">
                    <label for="activeStatus" class="col-form-label">Status</label><span style="color:red"> *</span>
                    <?php displaySelect('activeStatus', $statusArray, $activeStatus, 'class="form-control" required'); ?>
                  </div>

                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <div class="col-span-12 justify-self-center">
                  <input type="submit" name="submit" value="<?php echo $submitMsg; ?>" class="btn btn-primary mt-4 pr-4 pl-4">
                  <a href="<?php echo "$currentPage.php"; ?>"><input type="button" value="Cancel" class="btn btn-danger pr-4 pl-4"></a>
                </div>
              </form>
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
  <div class="floting-button fixed bottom-[50px] right-[30px] z-[1030]">
  </div>
  <script>
    function getBatchList(val) {
      $.post("includes/ajax/getBatchList.php", {
          productId: val
        },
        function(data, status) {
          $("#batchNo").html(data);
        });
    }

    // function getpackagingDateList(batchNo) {
    //   var productId = $('#productId').val();
    //   //alert(productId);
    //   $.post("includes/ajax/getpackagingDateList.php", {
    //       batchNo: batchNo,
    //       productId: productId
    //     },
    //     function(data, status) {
    //       if (status == 'success') {
    //         var data2 = JSON.parse(data);
    //         console.log(data2);
    //         $("#packagingDate").html(data);
    //       }
    //     });

    // }
  </script>



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