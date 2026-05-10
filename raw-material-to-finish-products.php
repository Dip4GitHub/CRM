<?php
include('includes/applications.php');
include('includes/function/session.php');
$pageTitle      = 'Raw Material To Finish Products';
$tableName      = generateSql('#__inventory');
$currentPage    = 'raw-material-to-finish-products';

$id              = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$submit          = isset($_REQUEST['submit']) ? $_REQUEST['submit'] : '';
$msg            = isset($_REQUEST['msg']) ? $_REQUEST['msg'] : '';
$errmsg          = isset($_REQUEST['errmsg']) ? $_REQUEST['errmsg'] : NULL;
$whrQry = '';
$productId          = isset($_REQUEST['productId']) ? $_REQUEST['productId'] : '';
$daterange          = isset($_REQUEST['daterange']) ? $_REQUEST['daterange'] : '';

if ($productId != '') {
  $whrQry = "AND productId LIKE '%$productId%'";
}
if ($daterange != '') {
  list($startDate, $endDate) = explode(' to ', $daterange);

  $whrQry = "AND createdDate BETWEEN '$startDate' AND '$endDate'";
}

if ($submit      == 'delete') {
  $operation_query  = "DELETE FROM `$tableName` WHERE `id`= $id ";
  $success          = mysqli_query($Dbconnect, $operation_query);
  $errmsg           = 'Record Deleted successfully.';
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>



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
                  <?php
                  $productsArray = getArrayfromTable('id', 'name', '#__products', ' WHERE activeStatus=1 ORDER BY name ASC');
                  displaySelect('productId', $productsArray, $productId, ' class="keyword"');
                  ?>
                  <input type="search" class="keyword daterange" name="daterange" placeholder="Search By Date range" value="<?php echo $daterange; ?>">
                  <button type="submit" class="btn btn-primary btn-flat btn-xs">Search</button>
                </div>
              </form>

              <table class="table table-hover progress-table mt-2">
                <thead class="text-uppercase bg-primary">
                  <tr class="text-white">
                    <th scope="col">Products Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Batch No.</th>
                    <th scope="col">Packaging Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Edit</th>
                    <!--<th scope="col">Delete</th>-->
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // BOF :: Pagination 
                  $query      = $Dbconnect->query("SELECT id FROM $tableName WHERE inventoryType =1 $whrQry");
                  $totalRows  = $query->num_rows;
                  $pagination =  new Pagination(array('baseURL' => $currentPage . '.php', 'totalRows' => $totalRows, 'perPage' => $limitperpage));
                  // EOF :: Pagination 

                  $sql    = generateSql("SELECT *, DATE_FORMAT(packagingDate, '%d-%m-%Y') AS packagingDate, DATE_FORMAT(createdDate, '%d-%m-%Y') AS createdDate FROM `$tableName` WHERE inventoryType =1 $whrQry");
                  $obj    = mysqli_query($Dbconnect, $sql);
                  $total  = mysqli_num_rows($obj);
                  if ($total > 0) {
                    while ($result = mysqli_fetch_object($obj)) {
                  ?>
                      <tr>
                        <td><?php echo getName('name', '#__products', $result->productId); ?></td>
                        <td><?php echo $result->quantity; ?></td>
                        <td><?php echo $result->batchNo; ?></td>
                        <td><?php echo $result->packagingDate; ?></td>
                        <td><?php echo $statusArray[$result->activeStatus]; ?></td>
                        <td><?php echo $result->createdDate; ?></td>
                        <td><a href="<?php echo $currentPage; ?>-add.php?id=<?php echo $result->id; ?>" class="text-secondary"><span class="pc-micon"> <i data-feather="edit"></i></span></a></td>

                        <!--<td><a href="#" onClick="return deleteRecord('<?php echo $result->id; ?>');" class="text-danger"><span class="pc-micon"> <i data-feather="trash-2"></i></span></a></td>-->



                      </tr>

                  <?php
                    }
                    echo '<tr><td colspan="12" align="center">' . $pagination->createLinks() . '</td></tr>';
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
    flatpickr(".daterange", {
      mode: "range",
      dateFormat: "Y-m-d"
    });
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