<?php
include('includes/applications.php');
include('includes/function/session.php');
$pageTitle      = 'Raw Material Purchase';
$tableName      = generateSql('#__invoice_purchase');
$currentPage    = 'raw-material-purchase';

$id             = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$submit         = isset($_REQUEST['submit']) ? $_REQUEST['submit'] : '';
$msg            = isset($_REQUEST['msg']) ? $_REQUEST['msg'] : NULL;
$errmsg         = isset($_REQUEST['errmsg']) ? $_REQUEST['errmsg'] : NULL;
if ($id > 0) {
  $submitMsg  = "Update";
} else {
  $submitMsg  = "Add";
}
$salePurchaseDate   = isset($_REQUEST['salePurchaseDate']) ? $_REQUEST['salePurchaseDate'] : date('Y-m-d');
$vendorName       = isset($_REQUEST['vendorName']) ? $_REQUEST['vendorName'] : '';
$vendorId         = isset($_REQUEST['vendorId']) ? $_REQUEST['vendorId'] : '';

$invoiceNo          = isset($_REQUEST['invoiceNo']) ? $_REQUEST['invoiceNo'] : '';
$finalTotal         = isset($_REQUEST['finalTotal']) ? $_REQUEST['finalTotal'] : '';
$payMode            = isset($_REQUEST['payMode']) ? $_REQUEST['payMode'] : '';

$discountAmount     = isset($_REQUEST['discountAmount']) ? $_REQUEST['discountAmount'] : '';
$referenceNo        = isset($_REQUEST['referenceNo']) ? $_REQUEST['referenceNo'] : '';
$nameOnAccount      = isset($_REQUEST['nameOnAccount']) ? $_REQUEST['nameOnAccount'] : '';
$ifsccode           = isset($_REQUEST['ifsccode']) ? $_REQUEST['ifsccode'] : '';
$accountNo          = isset($_REQUEST['accountNo']) ? $_REQUEST['accountNo'] : '';

$productName        = isset($_REQUEST['productName']) ? $_REQUEST['productName'] : '';
$productId          = isset($_REQUEST['productId']) ? $_REQUEST['productId'] : '';
$discount           = isset($_REQUEST['discount']) ? $_REQUEST['discount'] : '';
$finalDiscount           = isset($_REQUEST['finalDiscount']) ? $_REQUEST['finalDiscount'] : '';
$qty                = isset($_REQUEST['qty']) ? $_REQUEST['qty'] : '';
$amount             = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : '';
$finalAmount        = isset($_REQUEST['finalAmount']) ? $_REQUEST['finalAmount'] : '';
$gst                = isset($_REQUEST['gst']) ? $_REQUEST['gst'] : '';
$tAmount            = isset($_REQUEST['tAmount']) ? $_REQUEST['tAmount'] : '';
$orderStatus = '';
if ($submit == 'Add' or $submit == 'Update') {
  $commonQry  = "`salePurchaseDate`='$salePurchaseDate', `vendorName`='$vendorName', `vendorId`='$vendorId', `invoiceNo`='$invoiceNo', `finalTotal`='$finalTotal', `branchId`='$BranchID', invoiceType = 2";

  if ($submit      == 'Add') {
    if ($errmsg == '') {
      $query      = "INSERT INTO `$tableName` SET $commonQry, `createdId`='$guserId', `createdDate`=NOW()";
      $success    = mysqli_query($Dbconnect, $query);
      $id         = mysqli_insert_id($Dbconnect);
      $msg        = 'New Purchase/Order Created successfully.';

      if ($success) {
        $description = "Purchase/Order #$id From Vendors $vendorName is created by $guserName on" . date("l jS \of F Y h:i:s A");
        $logQuery      = "INSERT INTO crm_logtable SET `idType`='7', `useId`='$id', `name`= 'Purchase/Order of Vendors $vendorName is created', `description` ='$description', `createdId`='$guserId', `createdDate`=NOW()";
        $success    = mysqli_query($Dbconnect, $logQuery);
      } else {
        $errmsg   = "Error: " . mysqli_error($Dbconnect);
      }

      $totalAmount = $finalTotalAmount = $balAmount = $discountAmtSum = 0;
      for ($i = 0; $i < count($productId); $i++) {
        $pname  = $productName[$i] ?? '';
        $pid    = $productId[$i] ?? '';
        $disc   = $discount[$i] ?? '';
        $discountAmt   = $finalDiscount[$i] ?? '';
        $q      = $qty[$i] ?? '';
        $amt    = $amount[$i] ?? '';
        $famt   = $finalAmount[$i] ?? '';
        $gstTax = $gst[$i] ?? '';

        $totalAmount += $amt;
        $finalTotalAmount += $famt;
        $discountAmtSum += $discountAmt;
        /*echo "totalAmount : $totalAmount";
        echo "<br>";
        echo "finalTotalAmount : $finalTotalAmount";
        echo "<br>";
        echo "discountAmtSum : $discountAmtSum";
        echo "<br>";*/




        $invoiceDetailsQuery = "INSERT INTO `crm_invoice_purchase_details` (productId, productName, qty, amount, discount, finalAmount, invoiceId, gst, `discountAmt`) VALUES('$pid','$pname','$q','$amt','$disc','$famt',$id, $gstTax, '$discountAmt')";
        //echo "<br>";

        mysqli_query($Dbconnect, $invoiceDetailsQuery);
      }
      $balAmount = $tAmount - ($discountAmtSum + $finalTotalAmount);
      // echo "balAmount : $balAmount";
      if ($balAmount > 0) {
      } else {
        $orderStatus = ",`orderStatus`= 1";
      }

      $pcmnqry = "`payMode`='$payMode', `discountAmt`='$discountAmount', `referenceNo`='$referenceNo', `nameOnAccount`='$nameOnAccount', `ifsccode`='$ifsccode', `accountNo`='$accountNo', `amount`='$totalAmount', `finalTotal`='$finalTotalAmount', `balAmount`='$balAmount' $orderStatus";

      $paymentQry = "INSERT INTO `crm_invoice_purchase_payment` set $pcmnqry, invoiceId = $id ";
      mysqli_query($Dbconnect, $paymentQry);
    }
  }
  location("$currentPage.php?msg=$msg");
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
    .green {
      color: green;
    }

    .red {
      color: red;
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
                    <label for="salePurchaseDate" class="col-form-label">Purchase/Invoice Date</label>
                    <input class="form-control" type="date" name="salePurchaseDate" id="salePurchaseDate" value="<?php echo $salePurchaseDate; ?>">
                  </div>
                  <div class="col-span-12 sm:col-span-6 my-1">
                    <label for="vendorName" class="col-form-label">Vendors Name</label><span style="color:red"> *</span>
                    <input class="form-control" type="text" id="vendorName" name="vendorName" placeholder="Vendors Name" value="<?php echo $vendorName; ?>" required onkeyup="getVendorsName(this.value)">
                    <div id="vendorList"></div>
                  </div>
                </div>


                <table class="table table-hover progress-table mt-2" id="productTable">
                  <thead class="text-uppercase bg-primary">
                    <tr class="text-white">
                      <th scope="col">product Name</th>
                      <th scope="col">Amount</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Discount %</th>
                      <th scope="col">GST</th>
                      <th scope="col">Final Amount</th>
                      <th scope="col">Add More Products</th>
                      <th scope="col">Remove</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td> <input class="form-control" type="text" id="productName" name="productName[]" placeholder="Enter product Name Here" onkeyup="getProductName(this)">
                        <input type="hidden" name="productId[]" id="productId">
                        <div class="productList"></div>
                      </td>
                      <td><input class="form-control" type="text" id="amount" name="amount[]" placeholder="Amount"></td>
                      <td><input class=" form-control" type="text" id="qty" name="qty[]" placeholder="Quantity" value="0"></td>

                      <td><input onblur="getFinalAmount(this)" class="form-control" type="text" id="discount" name="discount[]" placeholder="Discount">
                        <input type="text" id="finalDiscount" name="finalDiscount[]">
                      </td>
                      <td><input class="form-control" type="gst" id="gst" name="gst[]" readonly></td>
                      <td><input class="form-control" type="text" id="finalAmount" name="finalAmount[]"></td>

                      <td onclick="getMoreRow(this)" class="green"><i data-feather="plus-circle"></i> </td>
                      <td onclick="removeRow(this)" class="red"><i data-feather="minus-circle"></i> </td>
                    </tr>
                  </tbody>
                </table>
                <input class="form-control" type="text" id="tAmount" name="tAmount" value="0">

                <div class="grid grid-cols-12 gap-1.5">
                  <div class="col-span-12 sm:col-span-6 my-1">
                    <label for="discountAmount" class="col-form-label">Discount Amount</label>
                    <input class="form-control" type="text" id="discountAmount" name="discountAmount" placeholder="Discount Amount" readonly value="<?php echo $discountAmount; ?>">
                  </div>
                  <div class="col-span-3 sm:col-span-6 my-1">
                    <label for="finalTotal" class="col-form-label">Final Total</label><span style="color:red"> *</span>
                    <input class="form-control" readonly type="text" name="finalTotal" id="finalTotal" value="<?php echo $finalTotal; ?>">
                  </div>

                  <div class="col-span-12 sm:col-span-6 my-1">
                    <label for="invoiceNo" class="col-form-label">Invoice No.</label><span style="color:red"> *</span>
                    <input class="form-control" type="text" id="invoiceNo" name="invoiceNo" value="<?php echo $invoiceNo; ?>" placeholder="Enter Invoice No Here">
                  </div>

                  <div class="col-span-12 sm:col-span-6 my-1">
                    <label for="payMode" class="col-form-label">Payment Mode</label><span style="color:red"> *</span>
                    <?php displaySelect('payMode', $payModeArray, $payMode, 'class="form-control" required id="payMode" onchange="hideBankDetails(this.value);"'); ?>
                  </div>

                  <div class="col-span-12 sm:col-span-6 my-1">
                    <label for="referenceNo" class="col-form-label">Reference No</label><span style="color:red"> *</span>
                    <input class="form-control" type="text" id="referenceNo" name="referenceNo" placeholder="Reference No" value="<?php echo $referenceNo; ?>">
                  </div>
                  <div class="col-span-12 sm:col-span-6 my-1 bankDetails">
                    <label for="nameOnAccount" class="col-form-label">Name On Account</label><span style="color:red"> *</span>
                    <input class="form-control" type="text" id="nameOnAccount" name="nameOnAccount" placeholder="Name On Account" value="<?php echo $nameOnAccount; ?>">
                  </div>

                  <div class="col-span-12 sm:col-span-6 my-1 bankDetails">
                    <label for="ifsccode" class="col-form-label">IFSC code</label><span style="color:red"> *</span>
                    <input class="form-control" type="text" id="ifsccode" name="ifsccode" placeholder="IFSC Code" value="<?php echo $ifsccode; ?>">
                  </div>

                  <div class="col-span-12 sm:col-span-6 my-1 bankDetails">
                    <label for="accountNo" class="col-form-label">Account No</label><span style="color:red"> *</span>
                    <input class="form-control" type="text" id="accountNo" name="accountNo" placeholder="Account No" value="<?php echo $accountNo; ?>">
                  </div>

                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="vendorId" id="vendorId" value="<?php echo $vendorId; ?>">


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
  <script>
    function getVendorsName(val) {
      const xhr = new XMLHttpRequest();
      xhr.open("GET", "includes/ajax/getVendorsName.php?q=" + encodeURIComponent(val), true);
      xhr.onload = function() {
        if (xhr.status === 200) {
          document.getElementById("vendorList").innerHTML = xhr.responseText;
        }
      };
      xhr.send();
    }

    function fillVendorsName(id, name) {
      document.getElementById("vendorName").value = name;
      document.getElementById("vendorId").value = id;
      document.getElementById("vendorList").innerHTML = "";
    }

    function getProductName(el) {

      var tr = el.closest('tr'); // current row
      var productList = tr.querySelector('.productList');

      const xhr = new XMLHttpRequest();
      xhr.open("GET", "includes/ajax/getProductName.php?productType=2&q=" + encodeURIComponent(el.value), true);

      xhr.onload = function() {
        if (xhr.status === 200) {
          productList.innerHTML = xhr.responseText;
        }
      };

      xhr.send();
    }

    function fillProductName(el, gst, id, name, salePrice) {

      var tr = el.closest('tr');

      tr.querySelector('[name="productName[]"]').value = name;
      tr.querySelector('[name="productId[]"]').value = id;
      tr.querySelector('[name="amount[]"]').value = salePrice;
      tr.querySelector('[name="qty[]"]').value = 1;
      tr.querySelector('[name="gst[]"]').value = gst;

      tr.querySelector('.productList').innerHTML = "";
    }


    function getMoreRow(val) {
      var tr = $(val).closest('tr');
      var clone = tr.clone();
      // clear values in cloned row
      clone.find('[name="productName[]"]').val('');
      clone.find('[name="productId[]"]').val('');
      clone.find('[name="amount[]"]').val('');
      clone.find('[name="qty[]"]').val(1);
      clone.find('[name="discount[]"]').val('');
      clone.find('[name="finalAmount[]"]').val('');

      clone.find('.productList').html('');

      $('#productTable').append(clone); // append new row
    }

    function removeRow(val) {
      var tr = $(val).closest('tr');
      var totalRows = $('#productTable tr').length;
      //console.log(totalRows);
      if (totalRows <= 2) {} else {
        tr.remove();
      }
    }

    function getFinalAmount(val) {
      var tr = $(val).closest('tr')[0]; // get DOM element
      var discount = parseFloat(val.value);
      var amountInput = tr.querySelector('[name="amount[]"]');
      var qty = tr.querySelector('[name="qty[]"]');
      var amount = parseFloat(amountInput.value);
      var discountAmount = (discount * amount) / 100;
      qty = parseInt(qty.value);
      var finalAmount = (amount - discountAmount) * qty;
      tr.querySelector('[name="finalAmount[]"]').value = finalAmount;
      var finalAmounts = document.querySelectorAll('[name="finalAmount[]"]');
      var finalTotal = 0;

      finalAmounts.forEach(finVal => {
        finalTotal += parseFloat(finVal.value);
      });
      var amountAll = document.querySelectorAll('[name="amount[]"]');
      var tAmount = fAmount = 0;
      amountAll.forEach(finVal => {
        tAmount += parseFloat(finVal.value);
        fAmount = tAmount * qty;
      });


      tr.querySelector('[name="finalDiscount[]"]').value = discountAmount * qty;

      var finalDiscount = document.querySelectorAll('[name="finalDiscount[]"]');
      var discountAmount = finalDiscountAmount = 0;
      finalDiscount.forEach(finVal => {
        discountAmount += parseFloat(finVal.value);
        //finalDiscountAmount = discountAmount * qty;
      });
      console.log(finalDiscountAmount);
      document.querySelector('[name="finalTotal"]').value = finalTotal;
      document.querySelector('[name="discountAmount"]').value = discountAmount;
      //console.log(tAmount);
      document.querySelector('[name="tAmount"]').value = fAmount;



    }

    function hideBankDetails(val) {
      if (val == 3) {
        $('.bankDetails').show();
      } else {
        $('.bankDetails').hide();

      }

    }
  </script>


</body>
<!-- [Body] end -->

</html>