<?php
include('includes/applications.php');
include('includes/function/session.php');
$pageTitle      = 'Leads';
$tableName      = generateSql('#__leads');
$currentPage    = 'leads';

$id              = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$submit          = isset($_REQUEST['submit']) ? $_REQUEST['submit'] : '';
$msg            = isset($_REQUEST['msg']) ? $_REQUEST['msg'] : NULL;
$errmsg          = isset($_REQUEST['errmsg']) ? $_REQUEST['errmsg'] : NULL;

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
                <h4 class="header-title"><?php echo getName('name', $tableName, $id); ?></h4>
              </div>
            </div>

            <?php
            $sql    = generateSql("SELECT *, DATE_FORMAT(createdDate, '%d-%m-%Y') AS createdDate, DATE_FORMAT(modifiedDate, '%d-%m-%Y') AS modifiedDate FROM `$tableName` WHERE id= $id");
            $obj    = mysqli_query($Dbconnect, $sql);
            $result  = mysqli_fetch_object($obj);
            ?>
            <div class="card-body">
              <?php // include ('includes/common/customerNav.php'); 
              ?>
              <div class="col-span-12" align="right">
                <a href="<?php echo "$currentPage.php"; ?>"><button class="btn btn-success btn-flat pr-4 pl-4">Back</button></a>
              </div>

              <div class="grid grid-cols-12 gap-1.5 mt-3">
                <div class="sm:col-span-3 my-1">
                  <p>Mobile: </p>
                </div>
                <div class="sm:col-span-3 my-1">
                  <p><strong><a target="_blank" href="https://wa.me/<?php echo $result->mobile; ?>"><?php echo $result->mobile; ?></a></strong></p>
                </div>
                <div class="sm:col-span-3 my-1">
                  <p>Email: </p>
                </div>
                <div class="sm:col-span-3 my-1">
                  <p><strong><a href="mailto:<?php echo $result->email; ?>"><?php echo $result->email; ?></a></strong></p>
                </div>
                <div class="sm:col-span-3 my-1">
                  <p>Gender: </p>
                </div>
                <div class="sm:col-span-3 my-1">
                  <p><strong><?php echo $genderArray[$result->gender]; ?></strong></p>
                </div>
                <div class="sm:col-span-3 my-1">
                  <p>Company Name: </p>
                </div>
                <div class="sm:col-span-3 my-1">
                  <p><strong><?php echo $result->companyName ?></strong></p>
                </div>

                <div class="sm:col-span-3 my-1">
                  <p>Address: </p>
                </div>
                <div class="sm:col-span-3 my-1">
                  <p><strong><?php echo $result->address ?></strong></p>
                </div>
                <div class="sm:col-span-3 my-1">
                  <p>City: </p>
                </div>
                <div class="sm:col-span-3 my-1">
                  <p><strong><?php echo $result->city ?></strong></p>
                </div>
                <div class="sm:col-span-3 my-1">
                  <p>Pincode: </p>
                </div>
                <div class="sm:col-span-3 my-1">
                  <p><strong><?php echo $result->pincode ?></strong></p>
                </div>
                <div class="sm:col-span-3 my-1">
                  <p>State: </p>
                </div>
                <div class="sm:col-span-3 my-1">
                  <p><strong><?php echo $statesArray[$result->state] ?></strong></p>
                </div>

                <div class="sm:col-span-3 my-1">
                  <p>Status: </p>
                </div>
                <div class="sm:col-span-3 my-1">
                  <p><strong><?php if ($result->activeStatus < 3) {
                                echo $statusArray[$result->activeStatus];
                              } else {
                                echo "Already Converted to Customer";
                              } ?></strong></p>
                </div>
              </div>

              <div class="grid grid-cols-12 gap-1.5 mt-5">
                <div class="sm:col-span-3 my-1">
                  <p>Created By: </p>
                </div>
                <div class="sm:col-span-3 my-1">
                  <p><strong><?php echo getName('name', '#__users', $result->createdId); ?></strong></p>
                </div>

                <div class="sm:col-span-3 my-1">
                  <p>Created Date: </p>
                </div>
                <div class="sm:col-span-3 my-1">
                  <p><strong><?php echo $result->createdDate; ?></strong></p>
                </div>
                <div class="sm:col-span-3 my-1">
                  <p>Modified By: </p>
                </div>
                <div class="sm:col-span-3 my-1">
                  <p><strong><?php echo getName('name', '#__users', $result->modifiedId); ?></strong></p>
                </div>

                <div class="sm:col-span-3 my-1">
                  <p>Modified Date: </p>
                </div>
                <div class="sm:col-span-3 my-1">
                  <p><strong><?php echo $result->modifiedDate; ?></strong></p>
                </div>
              </div>
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