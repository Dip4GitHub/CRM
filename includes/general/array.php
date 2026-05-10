<?php
$maritalstatusArray 	= array(1=>'Married', 2=>'Un Married');
$genderArray 			= array(1=>'Male', 2=>'Female');
$statusArray 			= array(1=>'Active', 2=>'In Active');
$userTypeArray 			= array(1=>'Super Admin', 2=>'Admin', 3=>'Member');
$imagetypesArray      	= array('image/jpeg','image/jpg','image/png');
$vendorsTypeArray       = array(1=> 'Vendor for Raw Material', 2=> 'Vendor for Packaging Material', 3=>'Other Vendors');
$statesArray 			= array("AP"=>"Andhra Pradesh","AR"=>"Arunachal Pradesh","AS"=>"Assam","BR"=>"Bihar","CT"=>"Chhattisgarh","GA"=>"Goa","GJ"=>"Gujarat","HR"=>"Haryana","HP"=>"Himachal Pradesh","JH"=>"Jharkhand","KA"=>"Karnataka","KL"=>"Kerala","MP"=>"Madhya Pradesh","MH"=>"Maharashtra","MN"=>"Manipur","ML"=>"Meghalaya","MZ"=>"Mizoram","NL"=>"Nagaland","OD"=>"Odisha","PB"=>"Punjab","RJ"=>"Rajasthan","SK"=>"Sikkim","TN"=>"Tamil Nadu","TS"=>"Telangana","TR"=>"Tripura","UP"=>"Uttar Pradesh","UK"=>"Uttarakhand","WB"=>"West Bengal");
$productUnitArray 		= array('kg'=>'KilloGram', 'gm'=>'Gram', 'ltr'=>'Liter', 'unit'=>'Unit');
$productGstTypeArray 	= array('1'=>'Exclude on Price', '2'=>'Include on Price');
$damageLossTypeArray	= array('1'=>'Damage', '2'=>'Loss');
$branchTypeArray		= array(1=>'Production House', 2=>'Store');
$payModeArray           = array(1=>'Cash', 2=>'UPI', 3=>'Cheque');
$invoiceTypeArray 		= array(1 => 'Product Sale', 2 => 'Raw Materials', 3 => 'Packaging', 4=>'Other');
$orderStatusArray       = array(1 => 'Completed', 2 => 'Pending');

$roleArray              = array(1=>'Owner', 2=>'Assistant Designer', 3=>'Manager', 4=>'Supervisor', 5=>'User', 6=>'Manager User', 7=>'IT Manager', 8=>'Finance Manager', 9=>'Purchase Manager', 10=>'Accountant', 11=>'Store Head', 12=>'Director', 13=>'CEO / GM');

$industryArray          = array(1=>'Interior Designer', 2=>'Restaurant / Cafe', 3=>'Office Spaces / Shops', 4=>'Hotel / Resort', 5=>'Hospital', 6=>'School', 7=>'Glass Vendor', 8=>'Furniture Manufacturer', 9=>'Photographer', 10=>'Decor Retail Shop', 11=>'Jobber', 12=>'Architect', 13=>'SMB ( Small Office )', 14=>'Government / PSU', 15=>'PSP ( Graphics Photo )', 16=>'Corporate MNC', 17=>'Cement Plant', 18=>'Mining Surveyor', 19=>'Reseller', 20=>'Power Plant', 21=>'Plant / Manufacturer', 22=>'Contractor', 23=>'System Integrator', 24=>'Education', 25=>'Defence', 26=>'Railway');

$businessUnitArray          = array(1=>'Muse & Mount', 2=>'Plotters / MFP', 3=>'HP Cartridge / Print Head', 4=>'Canon Cartridge / Print Head', 5=>'Service / Spare Part', 6=>'HP Care Pack', 7=>'Spheric AMC', 8=>'Accessories');

$leadSourceArray        = array(1=>'Cold Site Visit', 2=>'Existing Interior', 3=>'Gallery Visited', 4=>'Cold Calling', 5=>'Insta Page', 6=>'Indiamart', 7=>'Existing Customer', 8=>'Client Reference', 9=>'Website / IVRS', 10=>'Reseller / Channel', 11=>'OEM Lead', 12=>'Road Show', 13=>'Other', 14=>'Old SF CRM');

$meetingArray           = array(1=>'Pending', 2=>'Visited');

$productsArray          = array( 1=> 'All Products', 2=> 'Wallpapers', 3=> 'Frame', 4=> 'Wallpapers & Frame', 5=> 'Roller Blind', 6=> 'Clear Film', 7=> 'Leather', 8=> 'Designing');

$leadStageArray         = array( 1=> 'Open New', 2=> 'Design Discussion', 3=> 'Cold', 4=> 'Hot', 5=> 'Converted', 6=> 'Lost');

$profileArray           = array(1=>'Architect', 2=>'Artist', 3=>'General');

$orderTypeArray         = array(1=>'Gallery', 2=>'Project');


$bankAcccountHeadArray  = array(1=>'1', 2=>'2', 3=>'2', 4=>'2');
$gstdArray  = array(5=>'GST 5%', 18=>'GST 18%', 28=>'GST 28%', 0=>'No GST');
$referenceArray         = array(1=>'Name', 2=>'Mobile', 3=>'Architect Reference');


$gstArray               = array(1=>'5', 2=>'12',3=>'18', 4=>'28');
//$categoryArray        = array(1=> 'All Products', 2=> 'Wallpapers', 3=> 'Frame', 4=> 'Wallpapers & Frame', 5=> 'Roller Blind', 6=> 'Clear Film', 7=> 'Leather', 8=> 'Designing');
$gstTypeArray           = array(1=> 'Exclude', 2=> 'Include');
$unitArray              = array('Inches'=> 'Inches', 'Sq. Ft'=> 'Sq. Ft');

$logTypeArray           = array(1=> 'User', 2=> 'Customer');

$styleArray             = array(0=> 'No', 1=> 'Yes');
$styleTypeArray         = array(1=> 'Floated Canvas',
								2=> 'Stretcher Canvas', 
								3=> 'Mould / Dry Mount / MDF/ Canvas', 
								4 => 'Mould / Dry Mount / MDF/ Canvas / Lamination',
								5 => 'Mould / Dry Mount / MDF/ Canvas  / Glass',
								6 => 'Mould / Dry Mount / MDF/ Canvas  / Glass / Mount',
								7 => 'Mould / Dry Mount / MDF/ Glossy / Lamination',
								8 => 'Mould / Dry Mount / MDF/ Glossy / Glass',
								9 => 'Mould / Dry Mount / MDF/ Glossy / Glass / Mount',
								9 => 'Mould / Dry Mount / MDF/ Matt Art Paper  / Glass',
								10 => 'Mould / Dry Mount / MDF/ Matt Art Paper/ Glass / Mount',
								11 => 'Mould / Dry Mount / MDF/ Matt Art Paper/ Glass / Double Mount',
								12 => 'Custom Framing / Mould',
								13 => 'Custom Framing / Mould / MDF / Dry Mount',
								14 => 'Custom Framing / Mould / MDF / Dry Mount / Mount / Glass',
								15 => 'Custom Framing / Mould / MDF / Dry Mount/ Lamination',
								16 => 'Custom Framing / Stretcher Canvas');


$invoiceForArray        = array(1=> 'Customer', 2=> 'Contact' );

$warrantyStatusArray    = array(1=> 'Active', 2=> 'Expired');

$warrantyTypeArray      = array(1=> 'Spheric AMC', 2=>'Canon Warranty', 3=>'HP Warranty', 4=>'Out of Warranty');
$serviceTypeArray       = array(1=> 'OEM warranty', 2=> 'Comprehensive Spare & Site', 3=> 'Non Com Only Site', 4=>'Not Support');

$billNoInitial			= array('R'=>'RCT-', 'P'=>'PMT-', 'A'=>'AST-');
$customerAccountHead	= 3;

$pagePettyAccountArray 		= array('account-group','account-head','ledger','ledger-view','ledger-payment','ledger-receipt','ledger-report','ledger-log');
$pagePaymentReceiptArray 	= array('payment', 'receipt');
$pageCashReportArray 		= array('report-ledger','report-account-head');
$pageCustomersArray 		= array('customer','contact','report-customer','report-receivable','customer-view','customer-history','customer-receipt','customer-asset','customer-contact', 'customer-report','customer-log');
$pageOrdersArray 			= array('orders','order-history','order-tasks','order-attachment');
$pageLeadArray 				= array('lead');
$pageSupportArray 			= array('asset-mif','printing-products','ticket','asset-mif-report','asset-mif-view','asset-mif-tasks','asset-mif-attachment', 'printing-customer', 'printing-contact','printing-customer-view', 'printing-customer-asset', 'printing-customer-contact','printing-customer-log');
$pageCategoryArray 			= array('category', 'products');
//$pageArray 		= array('account','account','ledger');

$categoryArray = array(1=>'None', 2=>'Sales Follow Up / Call', 3=>'Service Follow Up / Call', 4=>'Spheric Services', 5=>'HP Services', 6=>'Canon Services', 7=>'HP ARC', 8=>'Delivery In', 9=>'Delivery Out', 10=>'Accounts', 11=>'Purchase Order', 12=>'Dispute', 13=>'Demo', 14=>'Visit', 15=>'Technical Work', 16=>'Payment Follow Up', 17=>'Offer Send', 18=>'General Work', 19=>'T1 / OEM / Dealer Communication', 20=>'Others');

$remindArray      = array(1=> 'None', 2=> 'On Due Time', 3=>'Before 15 Mins', 4=>'Before 30 Mins', 5=>'Before 1 Hour');
$remindByArray      = array(1=> 'Email & SMS', 2=> 'Email',  2=> 'SMS');
$taskStatusArray 			= array(1=>'Open', 2=>'Closed');
$productTypeArray 			= array(1=>'Decor', 2=>'Printing');
$attachmentTypeArray = array(1=>'Installation Report',  2=> 'Plotter Serial No', 3=>'Scanner Serial No', 4=>'Other Documents');

$remainingDaysArray = array(1=>'All Asset', 2=> 'Recently Updated', 3=> 'All Active', 4=> 'All Expired',  5=> 'Expiring Soon');


?>