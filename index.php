<?php
include('includes/applications.php');
include('includes/function/session.php');
$pageTitle   = 'Dashboard';
$currentPage   = 'home';
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
    ul.list {
      list-style-type: disc;
      margin-left: 50px;
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




  <!-- [ Main Content ] start -->
  <div class="pc-container">
    <div class="pc-content">
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="page-header-title">
            <h5 class="mb-0 font-medium">Default</h5>
          </div>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page">Default</li>
          </ul>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->
      <div class="grid grid-cols-12 gap-x-6">
        <div class="col-span-12">
          <div class="card">

            <div class="card-header !pb-0 !border-b-0">
              <h3>CRM & Inventory Management System – Project Summary</h3>
            </div>
            <div class="card-header !pb-0 !border-b-0">
              <p>Developed a complete web-based CRM, Inventory, Sales, and Production Management System using PHP, MySQL, JavaScript, jQuery, AJAX, HTML, and CSS. The system manages end-to-end business operations including branch management, product inventory, production workflow, sales, purchases, customer handling, vendor management, and detailed reporting.</p>
            </div>
            <div class="w-full bg-theme-bodybg rounded-lg h-1.5 mt-6 dark:bg-themedark-bodybg">
              <div class="bg-theme-bg-1 h-full rounded-lg shadow-[0_10px_20px_0_rgba(0,0,0,0.3)]" role="progressbar" style="width: 100%"></div>
            </div>
          </div>




          <div class="grid grid-cols-12 gap-x-6">
            <div class="col-span-12 xl:col-span-3 md:col-span-6">
              <div class="card">
                <div class="card-header !pb-0 !border-b-0">
                  <h3>Technologies Used:</h3>
                </div>
                <div class="card-header !pb-0 !border-b-0">
                  <ul class="list">
                    <li>PHP</li>
                    <li>MySQL</li>
                    <li>JavaScript</li>
                    <li>jQuery & AJAX</li>
                    <li>HTML5 & CSS3</li>
                    <li>Bootstrap</li>
                    <li>Stored Procedures</li>
                    <li>(DOMPDF) PDF Integration</li>
                    <li>(PhpSpreadsheet) Excel Export Integration</li>

                  </ul>
                </div>
                <div class="w-full bg-theme-bodybg rounded-lg h-1.5 mt-6 dark:bg-themedark-bodybg">
                  <div class="bg-theme-bg-1 h-full rounded-lg shadow-[0_10px_20px_0_rgba(0,0,0,0.3)]" role="progressbar" style="width: 100%"></div>
                </div>
              </div>
            </div>
            <div class="col-span-12 xl:col-span-3 md:col-span-6">
              <div class="card">
                <div class="card-header !pb-0 !border-b-0">
                  <h3>Additional Highlights:</h3>
                </div>
                <div class="card-header !pb-0 !border-b-0">
                  <ul class="list">
                    <li>Implemented AJAX-based real-time data fetching and product operations</li>
                    <li>Designed optimized database structure and reporting system</li>
                    <li>Built dynamic inventory calculations and automated report generation</li>
                    <li>Created responsive admin dashboard and management panels for business operations</li>

                  </ul>
                </div>
                <div class="w-full bg-theme-bodybg rounded-lg h-1.5 mt-6 dark:bg-themedark-bodybg">
                  <div class="bg-theme-bg-1 h-full rounded-lg shadow-[0_10px_20px_0_rgba(0,0,0,0.3)]" role="progressbar" style="width: 100%"></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-span-12 xl:col-span-3 md:col-span-6">
            <div class="card">
              <div class="card-header !pb-0 !border-b-0">
                <h3>Key Features:</h3>
              </div>
              <div class="card-header !pb-0 !border-b-0">
                <ul class="list">
                  <li>Multi-branch/location management with centralized control</li>
                  <li>Product management for finished products, raw materials, and packaging materials</li>
                  <li>Dynamic pricing management for products and sales</li>
                  <li>Raw material to finished product production tracking</li>
                  <li>Damage/loss inventory management</li>
                  <li>Product transfer and receiving system between branches using AJAX-based operations</li>
                  <li>Customer and lead management with lead-to-customer conversion</li>
                  <li>Vendor management and purchase tracking</li>
                  <li>Sales management with multi-product billing, payment tracking, and PDF invoice email functionality</li>
                  <li>Excel export functionality for sales reports</li>
                  <li>Raw material and packaging material purchase modules</li>
                  <li>Expense and invoice management system</li>
                  <li>Advanced inventory reporting using MySQL Stored Procedures</li>
                  <li>Vendor, customer, and product analytical reports with total sales/purchase calculations</li>
                  <li>Search, filtering, and detailed data view functionality across all modules</li>

                </ul>
              </div>
              <div class="w-full bg-theme-bodybg rounded-lg h-1.5 mt-6 dark:bg-themedark-bodybg">
                <div class="bg-theme-bg-1 h-full rounded-lg shadow-[0_10px_20px_0_rgba(0,0,0,0.3)]" role="progressbar" style="width: 100%"></div>
              </div>
            </div>
          </div>


          <div class="card">

            <div class="card-header !pb-0 !border-b-0">
              <h3>Functional Breakdown of Each Feature</h3>
            </div>
            <div class="card-header !pb-0 !border-b-0">
              <h5>Branchs Master</h5>
              <ul class="list">
                <li>Manage multiple company branches/locations</li>
                <li>Add/edit/delete branches/locations</li>
                <li>Search, view, all details in one</li>

              </ul>
            </div>
            <div class="card-header !pb-0 !border-b-0">
              <h5>Products Master</h5>
              <ul class="list">
                <li>Manage Product Details Add/edit/delete</li>
                <li>Multiple Product type: product, Raw Material, Packaging Material</li>
                <li>Search, view, all details in one</li>

              </ul>
            </div>

            <div class="card-header !pb-0 !border-b-0">
              <h5>Manage Products Price</h5>
              <ul class="list">
                <li>Manage Sale Product price</li>
                <li>Search, view, all details in one</li>

              </ul>
            </div>

            <div class="card-header !pb-0 !border-b-0">
              <h5>Raw Material To Finish Products</h5>
              <ul class="list">
                <li>Add raw material product to complete product</li>
                <li>edit finish product</li>
                <li>Search by product Name & Date range</li>
              </ul>
            </div>

            <div class="card-header !pb-0 !border-b-0">
              <h5>Damage Loss Product</h5>
              <ul class="list">
                <li>Add damage loss product</li>
                <li>Multiple Product type: product, Raw Material, Packaging Material</li>
                <li>Search, view, all details in one</li>
              </ul>
            </div>

            <div class="card-header !pb-0 !border-b-0">
              <h5>Products Transfer</h5>
              <ul class="list">
                <li>Transfer product from production House to Different branch/locations</li>
                <li>Select product > total quantity & packaging date through AJAX</li>
                <li>Search, view, all details in one</li>
              </ul>
            </div>

            <div class="card-header !pb-0 !border-b-0">
              <h5>Products Recieved</h5>
              <ul class="list">
                <li>Transfer product get recieved by Different branch/locations</li>
                <li>Get recieved through AJAX</li>
                <li>Search, view, all details in one</li>
              </ul>
            </div>

            <div class="card-header !pb-0 !border-b-0">
              <h5>Vendors</h5>
              <ul class="list">
                <li>Add/edit/delete vendors</li>
                <li>Search, view, all details in one</li>
              </ul>
            </div>
            <div class="card-header !pb-0 !border-b-0">
              <h5>Customer & Leads</h5>
              <ul class="list">
                <li>Add lead, convert leads into Customer</li>
                <li>Add/edit/delete Customer, leads</li>
                <li>Search, view, view in details all details in one</li>
              </ul>
            </div>

            <div class="card-header !pb-0 !border-b-0">
              <h5>Sale</h5>
              <ul class="list">
                <li>Add Sale, multiple product at a time, AJAX, payment all details</li>
                <li>Add/edit/delete sale details</li>
                <li>Invoice send to customers email in pdf format</li>
                <li>Sale list download in excel format</li>
                <li>Search, view, view in details all details in one</li>
              </ul>
            </div>
            <div class="card-header !pb-0 !border-b-0">
              <h5>Raw Material Purchase</h5>
              <ul class="list">
                <li>Add Raw Material Purchase, AJAX, payment all details</li>
                <li>Search, view, view in details all details in one</li>
              </ul>
            </div>

            <div class="card-header !pb-0 !border-b-0">
              <h5>Packaging Material Purchase</h5>
              <ul class="list">
                <li>Add Raw Material Purchase, AJAX, payment all details</li>
                <li>Search, view, view in details all details in one</li>
              </ul>
            </div>

            <div class="card-header !pb-0 !border-b-0">
              <h5>Invoice & Expence</h5>
              <ul class="list">
                <li>complete details of invoice and expences</li>
                <li>Search, view, view in details all details in one</li>
              </ul>
            </div>

            <div class="card-header !pb-0 !border-b-0">
              <h5>Inventory Reports</h5>
              <ul class="list">
                <li>complete details of inventory</li>
                <li>Stored Procedure</li>
              </ul>
            </div>

            <div class="card-header !pb-0 !border-b-0">
              <h5>Vendors Reports</h5>
              <ul class="list">
                <li>complete details of Vendors Reports</li>
                <li>Total purchase amount from vendor</li>

              </ul>
            </div>

            <div class="card-header !pb-0 !border-b-0">
              <h5>Customer Reports</h5>
              <ul class="list">
                <li>complete details of Customer Reports</li>
                <li>Total sale amount of Customer </li>

              </ul>
            </div>

            <div class="card-header !pb-0 !border-b-0">
              <h5>Product Reports</h5>
              <ul class="list">
                <li>Complete product details</li>
                <li>Sale product list, total amount, etc </li>
                <li>Raw material product list, total amount, etc </li>
                <li>Packaging material product list, total amount, etc </li>

              </ul>
            </div>
            <div class="w-full bg-theme-bodybg rounded-lg h-1.5 mt-6 dark:bg-themedark-bodybg">
              <div class="bg-theme-bg-1 h-full rounded-lg shadow-[0_10px_20px_0_rgba(0,0,0,0.3)]" role="progressbar" style="width: 100%"></div>
            </div>


          </div>
        </div>

      </div>

      <!-- [ Main Content ] start 
      <div class="grid grid-cols-12 gap-x-6">
        <div class="col-span-12 xl:col-span-4 md:col-span-6">
          <div class="card">
            <div class="card-header !pb-0 !border-b-0">
              <h5>Daily Sales</h5>
            </div>
            <div class="card-body">
              <div class="flex items-center justify-between gap-3 flex-wrap">
                <h3 class="font-light flex items-center mb-0">
                  <i class="feather icon-arrow-up text-success-500 text-[30px] mr-1.5"></i>
                  $ 249.95
                </h3>
                <p class="mb-0">67%</p>
              </div>
              <div class="w-full bg-theme-bodybg rounded-lg h-1.5 mt-6 dark:bg-themedark-bodybg">
                <div class="bg-theme-bg-1 h-full rounded-lg shadow-[0_10px_20px_0_rgba(0,0,0,0.3)]" role="progressbar" style="width: 75%"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-span-12 xl:col-span-4 md:col-span-6">
          <div class="card">
            <div class="card-header !pb-0 !border-b-0">
              <h5>Monthly Sales</h5>
            </div>
            <div class="card-body">
              <div class="flex items-center justify-between gap-3 flex-wrap">
                <h3 class="font-light flex items-center mb-0">
                  <i class="feather icon-arrow-down text-danger-500 text-[30px] mr-1.5"></i>
                  $ 2.942.32
                </h3>
                <p class="mb-0">36%</p>
              </div>
              <div class="w-full bg-theme-bodybg rounded-lg h-1.5 mt-6 dark:bg-themedark-bodybg">
                <div class="bg-theme-bg-2 h-full rounded-lg shadow-[0_10px_20px_0_rgba(0,0,0,0.3)]" role="progressbar" style="width: 35%"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-span-12 xl:col-span-4">
          <div class="card">
            <div class="card-header !pb-0 !border-b-0">
              <h5>Yearly Sales</h5>
            </div>
            <div class="card-body">
              <div class="flex items-center justify-between gap-3 flex-wrap">
                <h3 class="font-light flex items-center mb-0">
                  <i class="feather icon-arrow-up text-success-500 text-[30px] mr-1.5"></i>
                  $8.638.32
                </h3>
                <p class="mb-0">80%</p>
              </div>
              <div class="w-full bg-theme-bodybg rounded-lg h-1.5 mt-6 dark:bg-themedark-bodybg">
                <div class="bg-theme-bg-1 h-full rounded-lg shadow-[0_10px_20px_0_rgba(0,0,0,0.3)]" role="progressbar" style="width: 80%"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-span-12 xl:col-span-4">
          <div class="card card-social">
            <div class="card-body border-b border-theme-border dark:border-themedark-border">
              <div class="flex items-center justify-center">
                <div class="shrink-0">
                  <i class="fab fa-facebook-f text-primary-500 text-[36px]"></i>
                </div>
                <div class="grow ltr:text-right rtl:text-left">
                  <h3 class="mb-2">12,281</h3>
                  <h5 class="text-success-500 mb-0">+7.2% <span class="text-muted">Total Likes</span></h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="grid grid-cols-12 gap-x-6">
                <div class="col-span-6">
                  <h6 class="text-center mb-2.5"><span class="text-muted m-r-5">Target:</span>35,098</h6>
                  <div class="w-full bg-theme-bodybg rounded-lg h-1.5 dark:bg-themedark-bodybg">
                    <div class="bg-theme-bg-1 h-full rounded-lg shadow-[0_10px_20px_0_rgba(0,0,0,0.3)]" role="progressbar" style="width: 60%"></div>
                  </div>
                </div>
                <div class="col-span-6">
                  <h6 class="text-center mb-2.5"><span class="text-muted m-r-5">Duration:</span>350</h6>
                  <div class="w-full bg-theme-bodybg rounded-lg h-1.5 dark:bg-themedark-bodybg">
                    <div class="bg-theme-bg-2 h-full rounded-lg shadow-[0_10px_20px_0_rgba(0,0,0,0.3)]" role="progressbar" style="width: 45%"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-span-12 xl:col-span-4 md:col-span-6">
          <div class="card card-social">
            <div class="card-body border-b border-theme-border dark:border-themedark-border">
              <div class="flex items-center justify-center">
                <div class="shrink-0">
                  <i class="fab fa-twitter text-primary-500 text-[36px]"></i>
                </div>
                <div class="grow ltr:text-right rtl:text-left">
                  <h3 class="mb-2">11,200</h3>
                  <h5 class="text-purple-500 mb-0">+6.2% <span class="text-muted">Total Likes</span></h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="grid grid-cols-12 gap-x-6">
                <div class="col-span-6">
                  <h6 class="text-center mb-2.5"><span class="text-muted m-r-5">Target:</span>34,185</h6>
                  <div class="w-full bg-theme-bodybg rounded-lg h-1.5 dark:bg-themedark-bodybg">
                    <div class="bg-success-500 h-full rounded-lg shadow-[0_10px_20px_0_rgba(0,0,0,0.3)]" role="progressbar" style="width: 40%"></div>
                  </div>
                </div>
                <div class="col-span-6">
                  <h6 class="text-center mb-2.5"><span class="text-muted m-r-5">Duration:</span>800</h6>
                  <div class="w-full bg-theme-bodybg rounded-lg h-1.5 dark:bg-themedark-bodybg">
                    <div class="bg-primary-500 h-full rounded-lg shadow-[0_10px_20px_0_rgba(0,0,0,0.3)]" role="progressbar" style="width: 70%"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-span-12 xl:col-span-4 md:col-span-6">
          <div class="card card-social">
            <div class="card-body border-b border-theme-border dark:border-themedark-border">
              <div class="flex items-center justify-center">
                <div class="shrink-0">
                  <i class="fab fa-google-plus-g text-danger-500 text-[36px]"></i>
                </div>
                <div class="grow ltr:text-right rtl:text-left">
                  <h3 class="mb-2">10,500</h3>
                  <h5 class="text-purple-500 mb-0">+5.9% <span class="text-muted">Total Likes</span></h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="grid grid-cols-12 gap-x-6">
                <div class="col-span-6">
                  <h6 class="text-center mb-2.5"><span class="text-muted m-r-5">Target:</span>25,998</h6>
                  <div class="w-full bg-theme-bodybg rounded-lg h-1.5 dark:bg-themedark-bodybg">
                    <div class="bg-theme-bg-1 h-full rounded-lg shadow-[0_10px_20px_0_rgba(0,0,0,0.3)]" role="progressbar" style="width: 80%"></div>
                  </div>
                </div>
                <div class="col-span-6">
                  <h6 class="text-center mb-2.5"><span class="text-muted m-r-5">Duration:</span>900</h6>
                  <div class="w-full bg-theme-bodybg rounded-lg h-1.5 dark:bg-themedark-bodybg">
                    <div class="bg-theme-bg-2 h-full rounded-lg shadow-[0_10px_20px_0_rgba(0,0,0,0.3)]" role="progressbar" style="width: 50%"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-span-12 xl:col-span-4 md:col-span-6">
          <div class="card user-list">
            <div class="card-header">
              <h5>Rating</h5>
            </div>
            <div class="card-body">
              <div class="flex items-center justify-between gap-1 mb-5">
                <h2 class="font-light flex items-center m-0">
                  4.7
                  <i class="fas fa-star text-[10px] ml-2.5 text-warning-500"></i>
                </h2>
                <h6 class="flex items-center m-0">
                  0.4
                  <i class="fas fa-caret-up text-success text-[22px] ml-2.5"></i>
                </h6>
              </div>

              <div class="flex items-center justify-between gap-2 mb-2">
                <h6 class="flex items-center gap-1">
                  <i class="fas fa-star text-[10px] mr-2.5 text-warning-500"></i>
                  5
                </h6>
                <h6>384</h6>
              </div>
              <div class="w-full bg-theme-bodybg rounded-lg h-1.5 mb-6 mt-3 dark:bg-themedark-bodybg">
                <div class="bg-theme-bg-1 h-full rounded-lg shadow-[0_10px_20px_0_rgba(0,0,0,0.3)]" role="progressbar" style="width: 70%"></div>
              </div>

              <div class="flex items-center justify-between gap-2 mb-2">
                <h6 class="flex items-center gap-1">
                  <i class="fas fa-star text-[10px] mr-2.5 text-warning-500"></i>
                  4
                </h6>
                <h6>145</h6>
              </div>
              <div class="w-full bg-theme-bodybg rounded-lg h-1.5 mb-6 mt-3 dark:bg-themedark-bodybg">
                <div class="bg-theme-bg-1 h-full rounded-lg shadow-[0_10px_20px_0_rgba(0,0,0,0.3)]" role="progressbar" style="width: 35%"></div>
              </div>

              <div class="flex items-center justify-between gap-2 mb-2">
                <h6 class="flex items-center gap-1">
                  <i class="fas fa-star text-[10px] mr-2.5 text-warning-500"></i>
                  3
                </h6>
                <h6>24</h6>
              </div>
              <div class="w-full bg-theme-bodybg rounded-lg h-1.5 mb-6 mt-3 dark:bg-themedark-bodybg">
                <div class="bg-theme-bg-1 h-full rounded-lg shadow-[0_10px_20px_0_rgba(0,0,0,0.3)]" role="progressbar" style="width: 25%"></div>
              </div>

              <div class="flex items-center justify-between gap-2 mb-2">
                <h6 class="flex items-center gap-1">
                  <i class="fas fa-star text-[10px] mr-2.5 text-warning-500"></i>
                  2
                </h6>
                <h6>1</h6>
              </div>
              <div class="w-full bg-theme-bodybg rounded-lg h-1.5 mb-6 mt-3 dark:bg-themedark-bodybg">
                <div class="bg-theme-bg-1 h-full rounded-lg shadow-[0_10px_20px_0_rgba(0,0,0,0.3)]" role="progressbar" style="width: 10%"></div>
              </div>

              <div class="flex items-center justify-between gap-2 mb-2">
                <h6 class="flex items-center gap-1">
                  <i class="fas fa-star text-[10px] mr-2.5 text-warning-500"></i>
                  1
                </h6>
                <h6>0</h6>
              </div>
              <div class="w-full bg-theme-bodybg rounded-lg h-1.5 mt-4 dark:bg-themedark-bodybg">
                <div class="bg-theme-bg-1 h-full rounded-lg shadow-[0_10px_20px_0_rgba(0,0,0,0.3)]" role="progressbar" style="width: 0%"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-span-12 xl:col-span-8 md:col-span-6">
          <div class="card table-card">
            <div class="card-header">
              <h5>Recent Users</h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <tbody>
                    <tr class="unread">
                      <td>
                        <img class="rounded-full max-w-10" style="width: 40px" src="assets/images/user/avatar-1.jpg" alt="activity-user" />
                      </td>
                      <td>
                        <h6 class="mb-1">Isabella Christensen</h6>
                        <p class="m-0">Lorem Ipsum is simply dummy text of…</p>
                      </td>
                      <td>
                        <h6 class="text-muted">
                          <i class="fas fa-circle text-success text-[10px] ltr:mr-4 rtl:ml-4"></i>
                          11 MAY 12:56
                        </h6>
                      </td>
                      <td>
                        <a href="#!" class="badge bg-theme-bg-2 text-white text-[12px] mx-2">Reject</a>
                        <a href="#!" class="badge bg-theme-bg-1 text-white text-[12px]">Approve</a>
                      </td>
                    </tr>
                    <tr class="unread">
                      <td>
                        <img class="rounded-full max-w-10" style="width: 40px" src="assets/images/user/avatar-2.jpg" alt="activity-user" />
                      </td>
                      <td>
                        <h6 class="mb-1">Mathilde Andersen</h6>
                        <p class="m-0">Lorem Ipsum is simply dummy text of…</p>
                      </td>
                      <td>
                        <h6 class="text-muted">
                          <i class="fas fa-circle text-danger text-[10px] ltr:mr-4 rtl:ml-4"></i>
                          11 MAY 10:35
                        </h6>
                      </td>
                      <td>
                        <a href="#!" class="badge bg-theme-bg-2 text-white text-[12px] mx-2">Reject</a>
                        <a href="#!" class="badge bg-theme-bg-1 text-white text-[12px]">Approve</a>
                      </td>
                    </tr>
                    <tr class="unread">
                      <td>
                        <img class="rounded-full max-w-10" style="width: 40px" src="assets/images/user/avatar-3.jpg" alt="activity-user" />
                      </td>
                      <td>
                        <h6 class="mb-1">Karla Sorensen</h6>
                        <p class="m-0">Lorem Ipsum is simply dummy text of…</p>
                      </td>
                      <td>
                        <h6 class="text-muted">
                          <i class="fas fa-circle text-success text-[10px] ltr:mr-4 rtl:ml-4"></i>
                          9 MAY 17:38
                        </h6>
                      </td>
                      <td>
                        <a href="#!" class="badge bg-theme-bg-2 text-white text-[12px] mx-2">Reject</a>
                        <a href="#!" class="badge bg-theme-bg-1 text-white text-[12px]">Approve</a>
                      </td>
                    </tr>
                    <tr class="unread">
                      <td>
                        <img class="rounded-full max-w-10" style="width: 40px" src="assets/images/user/avatar-1.jpg" alt="activity-user" />
                      </td>
                      <td>
                        <h6 class="mb-1">Ida Jorgensen</h6>
                        <p class="m-0">Lorem Ipsum is simply dummy text of…</p>
                      </td>
                      <td>
                        <h6 class="text-muted f-w-300">
                          <i class="fas fa-circle text-danger text-[10px] ltr:mr-4 rtl:ml-4"></i>
                          19 MAY 12:56
                        </h6>
                      </td>
                      <td>
                        <a href="#!" class="badge bg-theme-bg-2 text-white text-[12px] mx-2">Reject</a>
                        <a href="#!" class="badge bg-theme-bg-1 text-white text-[12px]">Approve</a>
                      </td>
                    </tr>
                    <tr class="unread">
                      <td>
                        <img class="rounded-full max-w-10" style="width: 40px" src="assets/images/user/avatar-2.jpg" alt="activity-user" />
                      </td>
                      <td>
                        <h6 class="mb-1">Albert Andersen</h6>
                        <p class="m-0">Lorem Ipsum is simply dummy text of…</p>
                      </td>
                      <td>
                        <h6 class="text-muted">
                          <i class="fas fa-circle text-success text-[10px] ltr:mr-4 rtl:ml-4"></i>
                          21 July 12:56
                        </h6>
                      </td>
                      <td>
                        <a href="#!" class="badge bg-theme-bg-2 text-white text-[12px] mx-2">Reject</a>
                        <a href="#!" class="badge bg-theme-bg-1 text-white text-[12px]">Approve</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
       [ Main Content ] end -->
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