<?php
include('includes/applications.php');
include('includes/function/session.php');
$pageTitle      = 'Sale';
$tableName      = generateSql('#__invoice_purchase');
$currentPage    = 'sale';

$id             = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$submit         = isset($_REQUEST['submit']) ? $_REQUEST['submit'] : '';
$msg            = isset($_REQUEST['msg']) ? $_REQUEST['msg'] : '';
$errmsg         = isset($_REQUEST['errmsg']) ? $_REQUEST['errmsg'] : NULL;
$whrQry = '';
$keyword        = isset($_REQUEST['keyword']) ? $_REQUEST['keyword'] : '';

if ($keyword != '') {
  $whrQry = "WHERE customerName LIKE '%$keyword%'";
}

if ($submit      == 'delete') {
  $operation_query1  = "DELETE FROM `crm_invoice_purchase_details` WHERE `invoiceId`= $id ";
  $success1          = mysqli_query($Dbconnect, $operation_query1);

  if ($success1) {
    $operation_query  = "DELETE FROM `$tableName` WHERE `id`= $id ";
    $success          = mysqli_query($Dbconnect, $operation_query);
    $errmsg           = 'Record Deleted successfully.';
  }
  unset($id);
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
  <script>
    function deleteRecord(id) {
      if (confirm("Are You Sure You Want to Delete Record")) {
        window.location = "<?php echo $currentPage; ?>.php?submit=delete&id=" + id;
      }
    }
  </script>
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
            if ($msg != '')  echo '<div class="alert alert-success" role="alert"><strong>' . $msg . '</strong></div>';
            if ($errmsg != '')  echo '<div class="alert alert-danger" role="alert"><strong>' . $errmsg . '</strong></div>';
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
                <h4 class="header-title"><?php echo $pageTitle; ?></h4>
              </div>
              <div class="col-lg-6" align="right"><a href="<?php echo $currentPage; ?>-add.php"><button type="button" class="btn btn-primary mb-3">Add <?php echo $pageTitle; ?></button></a></div>
            </div>

            <div class="card-body">
              <form name="frm" method="GET" autocomplete=off>
                <div class="search-container">
                  <input type="search" class="keyword" name="keyword" placeholder="Search By Customer Name" value="<?php echo $keyword; ?>">
                  <button type="submit" class="btn btn-primary btn-flat btn-xs">Search</button>
                </div>
              </form>

              <table class="table table-hover progress-table mt-2">
                <thead class="text-uppercase bg-primary">
                  <tr class="text-white">
                    <th scope="col">Branch Name</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Invoice Type</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Discount Amount</th>
                    <th scope="col">Final Amount</th>

                    <th scope="col">Edit</th>
                    <th scope="col">View</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // BOF :: Pagination 
                  $query      = $Dbconnect->query("SELECT MAX(A.branchId) AS branchId, MAX(A.customerName) AS customerName, MAX(A.invoiceType) AS invoiceType, sum(D.discountAmt) AS discountAmt, sum(D.amount) AS amount, sum(D.finalAmount) AS finalAmount FROM $tableName AS A INNER JOIN `crm_invoice_purchase_details` AS D ON A.id = D.invoiceId $whrQry GROUP BY A.id ");
                  $totalRows  = $query->num_rows;
                  $pagination =  new Pagination(array('baseURL' => $currentPage . '.php', 'totalRows' => $totalRows, 'perPage' => $limitperpage));
                  // EOF :: Pagination 

                  $i = 1;
                  $sql    = generateSql("SELECT A.id, MAX(A.branchId) AS branchId, MAX(A.customerName) AS customerName, MAX(A.customerName) AS customerName, MAX(A.invoiceType) AS invoiceType, sum(D.discountAmt) AS discountAmt, sum(D.amount) AS amount, sum(D.finalAmount) AS finalAmount FROM $tableName AS A INNER JOIN `crm_invoice_purchase_details` AS D ON A.id = D.invoiceId $whrQry GROUP BY A.id");
                  $obj    = mysqli_query($Dbconnect, $sql);
                  $total  = mysqli_num_rows($obj);
                  if ($total > 0) {
                    while ($result = mysqli_fetch_object($obj)) {
                  ?>
                      <tr>
                        <td><?php echo getName('name', 'crm_branch', $result->branchId); ?></td>
                        <td><?php echo $result->customerName; ?></td>
                        <td><?php echo $invoiceTypeArray[$result->invoiceType]; ?></td>
                        <td><?php echo $result->amount; ?></td>
                        <td><?php echo $result->discountAmt; ?></td>
                        <td><?php echo $result->finalAmount; ?></td>

                        <td><a href="<?php echo $currentPage; ?>-edit.php?id=<?php echo $result->id; ?>" class="text-secondary"><span class="pc-micon"> <i data-feather="edit"></i></span></a></td>

                        <td><a href="<?php echo $currentPage; ?>-view.php?id=<?php echo $result->id; ?>" class="text-secondary"><span class="pc-micon"> <i data-feather="command"></i></span></a></td>

                        <td><a href="#" onClick="return deleteRecord('<?php echo $result->id; ?>');" class="text-danger"><span class="pc-micon"> <i data-feather="trash-2"></i></span></a></td>



                      </tr>

                  <?php
                    }
                    echo '<tr><td colspan="8" align="center">' . $pagination->createLinks() . '</td></tr>';
                  }
                  ?>
                </tbody>
              </table>
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
  <script src="assets/js/bootstrap.min.js"></script>

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