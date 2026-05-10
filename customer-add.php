<?php
include('includes/applications.php');
include('includes/function/session.php');
$pageTitle      = 'Customer';
$tableName      = generateSql('#__customers');
$currentPage    = 'customer';

$id              = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$submit          = isset($_REQUEST['submit']) ? $_REQUEST['submit'] : '';
$msg            = isset($_REQUEST['msg']) ? $_REQUEST['msg'] : NULL;
$errmsg          = isset($_REQUEST['errmsg']) ? $_REQUEST['errmsg'] : NULL;
if ($id > 0) {
  $submitMsg  = "Update";
} else {
  $submitMsg  = "Add";
}
$name           = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
$email           = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
$mobile         = isset($_REQUEST['mobile']) ? $_REQUEST['mobile'] : '';
$gender         = isset($_REQUEST['gender']) ? $_REQUEST['gender'] : '1';
$activeStatus   = isset($_REQUEST['activeStatus']) ? $_REQUEST['activeStatus'] : '1';
$companyName    = isset($_REQUEST['companyName']) ? $_REQUEST['companyName'] : '';
$address        = isset($_REQUEST['address']) ? $_REQUEST['address'] : '';
$city           = isset($_REQUEST['city']) ? $_REQUEST['city'] : '';
$pincode         = isset($_REQUEST['pincode']) ? $_REQUEST['pincode'] : '';
$gstNumber       = isset($_REQUEST['gstNumber']) ? $_REQUEST['gstNumber'] : '';
$state           = isset($_REQUEST['state']) ? $_REQUEST['state'] : '';
$adharNo         = isset($_REQUEST['adharNo']) ? $_REQUEST['adharNo'] : '';
$panNo           = isset($_REQUEST['panNo']) ? $_REQUEST['panNo'] : '';
$leadId         = isset($_REQUEST['leadId']) ? $_REQUEST['leadId'] : '';


if ($submit == 'Add' or $submit == 'Update') {
  $commonQry  = "`name`='$name', `email`='$email', `mobile`='$mobile', `gender`='$gender', `activeStatus`='$activeStatus', `companyName`='$companyName', `address`='$address', `city`='$city', `pincode`='$pincode', `gstNumber`='$gstNumber', `state`='$state', `adharNo`='$adharNo', `panNo`='$panNo'";

  if ($submit      == 'Add') {
    if ($leadId > 0) {
      $leadQuery      = "UPDATE `crm_leads` SET `activeStatus`='3' WHERE `id`='$leadId'";
      $success    = mysqli_query($Dbconnect, $leadQuery);
    }

    if ($errmsg == '') {
      $query      = "INSERT INTO `$tableName` SET $commonQry, `createdId`='$guserId', `createdDate`=NOW()";
      $success    = mysqli_query($Dbconnect, $query);
      $id         = mysqli_insert_id($Dbconnect);
      $msg        = 'New Customer Created successfully.';
      if ($success) {
        $description = "Customer $name is created by $guserName on" . date("l jS \of F Y h:i:s A");
        $logQuery      = "INSERT INTO crm_logtable SET `idType`='1', `useId`='$id', `name`= 'Customer $name is created', `description` ='$description', `createdId`='$guserId', `createdDate`=NOW()";
        $success    = mysqli_query($Dbconnect, $logQuery);
        location("$currentPage.php?msg=$msg");
      } else {
        $errmsg   = "Error: " . mysqli_error($Dbconnect);
      }
    }
  } else {

    if ($errmsg == '') {
      $query      = "UPDATE `$tableName` SET $commonQry, `modifiedId`='$guserId', `modifiedDate`=NOW() WHERE `id`='$id'";
      $success    = mysqli_query($Dbconnect, $query);
      $msg        = 'Customer Updated successfully.';
      if ($success) {
        $description = "Customer $name is Updated by $guserName on" . date("l jS \of F Y h:i:s A");
        $logQuery      = "INSERT INTO crm_logtable SET `idType`='1', `useId`='$id', `name`= 'Customer $name is Updated', `description` ='$description', `createdId`='$guserId', `createdDate`=NOW()";
        $success    = mysqli_query($Dbconnect, $logQuery);
        location("$currentPage.php?msg=$msg");
      } else {
        $errmsg   = "Error: " . mysqli_error($Dbconnect);
      }
    }
  }
}
if ($leadId > 0) {
  $query      = "SELECT * FROM `crm_leads` WHERE `id`='$leadId'";
  $success    = mysqli_query($Dbconnect, $query);
  $res        = mysqli_fetch_object($success);
  $name           = $res->name;
  $email           = $res->email;
  $mobile         = $res->mobile;
  $gender         = $res->gender;
  $activeStatus   = $res->activeStatus;
  $companyName     = $res->companyName;
  $address         = $res->address;
  $city           = $res->city;
  $pincode         = $res->pincode;
  $state           = $res->state;
}

if ($id > 0) {
  $query      = "SELECT * FROM `$tableName` WHERE `id`='$id'";
  $success    = mysqli_query($Dbconnect, $query);
  $res        = mysqli_fetch_object($success);

  $name           = $res->name;
  $email           = $res->email;
  $mobile         = $res->mobile;
  $gender         = $res->gender;
  $activeStatus   = $res->activeStatus;
  $companyName     = $res->companyName;
  $address         = $res->address;
  $city           = $res->city;
  $pincode         = $res->pincode;
  $gstNumber       = $res->gstNumber;
  $state           = $res->state;
  $adharNo         = $res->adharNo;
  $panNo           = $res->panNo;
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
                    <label for="name" class="col-form-label">Name</label><span style="color:red"> *</span>
                    <input class="form-control" required type="text" name="name" id="name" value="<?php echo $name; ?>" placeholder="Enter Name Here">
                  </div>
                  <div class="col-span-12 sm:col-span-6 my-1">
                    <label for="companyName" class="col-form-label">Company Name</label>
                    <input class="form-control" type="text" id="companyName" name="companyName" placeholder="Company Name" value="<?php echo $companyName; ?>">
                  </div>
                  <div class="col-span-12 sm:col-span-6 my-1">
                    <label for="email" class="col-form-label">Email</label><span style="color:red"> *</span>
                    <input class="form-control" type="email" id="email" name="email" value="<?php echo $email; ?>" required <?php if ($id > 0) { ?> readonly="readonly" <?php } ?> placeholder="Enter Email Here">
                  </div>

                  <div class="col-span-12 sm:col-span-6 my-1">
                    <label for="mobile" class="col-form-label">Mobile</label><span style="color:red"> *</span>
                    <input class="form-control" required type="text" name="mobile" id="mobile" value="<?php echo $mobile; ?>" placeholder="Mobile" maxlength="10">
                  </div>




                  <div class="col-span-12 sm:col-span-12 my-1">
                    <label for="address" class="col-form-label">Address</label><span style="color:red"> *</span>
                    <textarea rows="5" cols="40" class="form-control" type="text" name="address" id="address" required placeholder="Address"><?php echo $address; ?></textarea>
                  </div>
                  <div class="col-span-12 sm:col-span-6 my-1">
                    <label for="city" class="col-form-label">City</label><span style="color:red"> *</span>
                    <input class="form-control" type="text" id="city" name="city" placeholder="City" value="<?php echo $city; ?>" required>
                  </div>
                  <div class="col-span-12 sm:col-span-6 my-1">
                    <label for="pincode" class="col-form-label">Pincode</label><span style="color:red"> *</span>
                    <input class="form-control" type="text" id="pincode" name="pincode" placeholder="pincode" value="<?php echo $pincode; ?>" required>
                  </div>
                  <div class="col-span-12 sm:col-span-6 my-1">
                    <label for="gstNumber" class="col-form-label">GST Number</label>
                    <input class="form-control" type="text" id="gstNumber" name="gstNumber" placeholder="gstNumber" value="<?php echo $gstNumber; ?>">
                  </div>
                  <div class="col-span-12 sm:col-span-6 my-1">
                    <label for="gender" class="col-form-label">Gender</label><span style="color:red"> *</span>
                    <?php displaySelect('gender', $genderArray, $gender, 'class="form-control" required'); ?>
                  </div>

                  <div class="col-span-12 sm:col-span-6 my-1">
                    <label for="state" class="col-form-label">State</label><span style="color:red"> *</span>
                    <?php displaySelect('state', $statesArray, $state, 'class="form-control" required'); ?>
                  </div>
                  <div class="col-span-12 sm:col-span-6 my-1">
                    <label for="activeStatus" class="col-form-label">Status</label><span style="color:red"> *</span>
                    <?php displaySelect('activeStatus', $statusArray, $activeStatus, 'class="form-control" required'); ?>
                  </div>


                  <div class="col-span-12 sm:col-span-6 my-1">
                    <label for="adharNo" class="col-form-label">Adhar No</label><span style="color:red"> *</span>
                    <input class="form-control" type="text" id="adharNo" name="adharNo" placeholder="Adhar No" value="<?php echo $adharNo; ?>" required maxlength="12">
                  </div>
                  <div class="col-span-12 sm:col-span-6 my-1">
                    <label for="panNo" class="col-form-label">PAN No</label><span style="color:red"> *</span>
                    <input class="form-control" type="text" id="panNo" name="panNo" placeholder="PAN No" value="<?php echo $panNo; ?>" required pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}">
                  </div>

                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="leadId" value="<?php echo $leadId; ?>">
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