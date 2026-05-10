<?php
include('includes/applications.php');
if ($guserId > 0) {
  location($siteUrl);
}
$pageTitle   = 'Login';
$url         = @$_REQUEST['url'];
$submit      = @$_POST['Submit'];
$errorMsg       = 0;
if ($submit == 'send') {

  $email    = isset($_POST['email']) ? $_POST['email'] : '';
  $password  = isset($_POST['password']) ? $_POST['password'] : '';
  $email     = mysqli_real_escape_string($Dbconnect, $email);
  $password   = mysqli_real_escape_string($Dbconnect, $password);
  $password   = MD5Encrypt($password);

  $sql = generateSql("SELECT id, name, email, gender, userType, branchID, branchType FROM #__users WHERE email='$email' AND `password` ='$password' AND `activeStatus` = 1");
  $sql =  mysqli_query($Dbconnect, $sql);
  $count = mysqli_num_rows($sql);
  if ($count > 0) {
    $obj = mysqli_fetch_object($sql);
    $_SESSION["guserId"]      = $obj->id;
    $_SESSION["guserName"]    = $obj->name;
    $_SESSION["guserEmail"]   = $obj->email;
    $_SESSION["gusergender"]  = $obj->gender;
    $_SESSION["guserType"]    = $obj->userType;
    $_SESSION["BranchID"]     = $obj->branchID;
    $_SESSION["BranchType"]   = $obj->branchType;

    $sqlUpdate = generateSql("UPDATE #__users SET lastLogin=NOW() where id=$obj->id");
    mysqli_query($Dbconnect, $sqlUpdate);

    $name = $obj->name . ' Logged in';
    $description = $obj->name . ' Logged in on ' . date("l jS \of F Y h:i:s A");
    mysqli_query($Dbconnect, generateSql("Insert into #__logtable (name, description, createdId, createdDate) values ('$name', '$description', $obj->id, NOW())"));
    location(urldecode($url));
  } else {
    $errorMsg = 1;
  }
}
?>
<!doctype html>
<html lang="en" data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" dir="ltr" data-pc-theme="light">
<!-- [Head] start -->

<head>
  <title><?php echo $siteName . ' :: ' . $pageTitle; ?></title>
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
    .blue {
      color: #007bff;
      cursor: pointer;
    }

    .red {
      font-style: italic;
    }

    .details {
     
      display: none;
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

  <div class="auth-main relative">
    <div class="auth-wrapper v1 flex items-center w-full h-full min-h-screen">
      <div class="auth-form flex items-center justify-center grow flex-col min-h-screen relative p-6 ">
        <div class="w-full max-w-[350px] relative">
          <div class="auth-bg ">
            <span class="absolute top-[-100px] right-[-100px] w-[300px] h-[300px] block rounded-full bg-theme-bg-1 animate-[floating_7s_infinite]"></span>
            <span class="absolute top-[150px] right-[-150px] w-5 h-5 block rounded-full bg-primary-500 animate-[floating_9s_infinite]"></span>
            <span class="absolute left-[-150px] bottom-[150px] w-5 h-5 block rounded-full bg-theme-bg-1 animate-[floating_7s_infinite]"></span>
            <span class="absolute left-[-100px] bottom-[-100px] w-[300px] h-[300px] block rounded-full bg-theme-bg-2 animate-[floating_9s_infinite]"></span>
          </div>

          <form class="needs-validation" method="post" action="login.php">
            <div class="card sm:my-12  w-full shadow-none">
              <div class="card-body !p-10">
                <!--<div class="text-center mb-8">
                            <a href="#"><img src="assets/images/logo-dark.svg" alt="img" class="mx-auto auth-logo"/></a>
                        </div>-->
                <h4 class="text-center font-medium mb-4">Login</h4>
                <div class="mb-3">
                  <input type="email" class="form-control" id="floatingInput" placeholder="Email Address" name="email" />
                </div>
                <div class="mb-4">
                  <input type="password" class="form-control" id="floatingInput1" placeholder="Password" name="password" />
                </div>
                <div class="mb-4">
                  <?php if ($errorMsg == 1) {
                    echo '<p style="color:#FF0000;"><b>Username & Password Not Match.</b></p>';
                  } ?>
                </div>
                <div class="flex mt-1 justify-between items-center flex-wrap">
                  <div class="form-check">
                    <span class="pc-mtext">Username</span>
                  </div>
                  <span onclick="copyUserName(1)" class="pc-micon blue"><i data-feather="copy"></i></span>
                  <span id="text1"></span>
                </div>
                <div class="flex mt-3 justify-between items-center flex-wrap">
                  <div class="form-check">
                    <span class="pc-mtext">Password</span>
                  </div>
                  <span onclick="copyUserName(2)" class="pc-micon blue"><i data-feather="copy"></i></span>
                  <span id="text2"></span>
                </div>
                <div class="mt-4 text-center">
                  <button type="submit" class="btn btn-primary mx-auto shadow-2xl">Login</button>
                </div>
                <h6 class="font-medium mt-3 red">In Case if copy username & password do not work. <span class="blue" onclick="getDetails();">click Here</span></h6>
                <div class="flex justify-between items-end flex-wrap mt-4 details">
                  <h6 class="font-medium mb-0">user : dipakbhardwaj358@gmail.com</h6>
                  <h6 class="font-medium mb-0">pass : admin</h6>
                </div>
              </div>
            </div>
            <input type="hidden" name="Submit" value="send">
            <input type="hidden" name="url" value="<?php echo $url; ?>">
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- [ Main Content ] end -->
  <!-- Required Js -->
  <script src="assets/js/plugins/simplebar.min.js"></script>
  <script src="assets/js/plugins/popper.min.js"></script>
  <script src="assets/js/icon/custom-icon.js"></script>
  <script src="assets/js/plugins/feather.min.js"></script>
  <script src="assets/js/component.js"></script>
  <script src="assets/js/theme.js"></script>
  <script src="assets/js/script.js"></script>

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
  <script>
    function copyUserName(val) {
      let copyText = '';
      if (val == 1) {
        copyText = 'dipakbhardwaj358@gmail.com';
      } else {
        copyText = 'admin';
      }
      navigator.clipboard.writeText(copyText);
      if (val == 1) {
        document.getElementById("text1").innerText = 'copied';
      } else {
        document.getElementById("text2").innerText = 'copied';
      }

    }

    function getDetails() {
      document.querySelector('.details').style.display = 'inline-block';
    }
  </script>

</body>
<!-- [Body] end -->

</html>