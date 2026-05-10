<?php
// This Function return current page URL.
if(!function_exists('curPageURL')) {
	function curPageURL() {
	 $pageURL = 'http';
	 if (@$_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	 $pageURL .= "://";
	 if ($_SERVER["SERVER_PORT"] != "80") {
	  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	 } else {
	  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	 }
	 return $pageURL;
	}
}
// This Function is used to generate SQL query with table Prefix
if(!function_exists('generateSql')) {
	function generateSql($query) {
		global $tblprefix ;
		return str_replace('#__',$tblprefix,$query);
	}
}
if(!function_exists('MD5Encrypt')) {
	function MD5Encrypt($value) {
		$SHA = 'disuunhxam1vwoopp3z32mvvh7cuu0nmpaoapvsbg8vd7yjlc';
		$newval = trim($value.$SHA); 
		return md5($newval);
	}
}

if(!function_exists('htmlLocation')) {
	function location($url, $time=0,$message="",$class="message_box") {
		echo "<META http-equiv=\"Refresh\" content=\"$time;URL=$url\">";
		exit;
	}
}

if(!function_exists('headerLocation')) {
	function headerLocation($url) {
		header('Location: ' . $url);
		exit;
	}
}

if(!function_exists('getName')) {
	function getName($fieldname, $tablename, $id) {
		global $Dbconnect;
		$query 	= generateSql("SELECT `$fieldname` FROM  `$tablename` WHERE id='$id'");
		$sql 	= mysqli_query($Dbconnect, $query);
		$total 	= mysqli_num_rows($sql);
		if($total > 0) {
			$row 	= mysqli_fetch_object($sql);
			return $row->$fieldname;
		} else {
			return '';
		}
	}
}

function getArrayfromTable($key, $value, $tablename, $whrcondt='') {
	global $Dbconnect;
	$query 	= generateSql("SELECT $key , $value FROM  `$tablename` $whrcondt"); 
	$sql 	= mysqli_query($Dbconnect, $query);
	$total  = mysqli_num_rows($sql);
	if($total > 0) {
		while($row 	= mysqli_fetch_object($sql)) {
			$arr[$row->id] = $row->name;
		}
		return $arr;
	}
}

function displaySelect($name, $arrayValue, $selecvalue='', $string=''){
	echo '<select name="'.$name.'" '.$string.'>';
	echo '<option value="">Please Select</option>';
	if(is_array($arrayValue)) {
		foreach ($arrayValue as $key => $value) {
			if($key == $selecvalue){ $sel = ' selected="selected"'; }
			else { $sel = '';}
			echo '<option value="'.$key.'"'.$sel.'>'.$value.'</option>';
		}
	}	
	echo '</select>';

}

function displayCheckbox($name, $arrayValue, $selecvalue='', $string=''){
	if($selecvalue=='') {
		$selectArray = array();
	} else {
		$selectArray = explode(',',$selecvalue);
	}
	//print_r($selectArray);
	foreach ($arrayValue as $key => $value) {
		if(in_array($key,$selectArray)){ $sel = 'checked="checked"'; }
		else { $sel = '';}
		echo '<input type="checkbox" value="'.$key.'" name="'.$name.'[]" '.$sel.'> '.$value.' &nbsp; &nbsp; &nbsp;';
	}
}

if(!function_exists('getLAstValue')) {
	function getLAstValue($tablename) {
		global $Dbconnect;
		$query 	= generateSql("SELECT max(id) as total FROM `$tablename`");
		$sql 	= mysqli_query($Dbconnect, $query);
		$total 	= mysqli_num_rows($sql);
		if($total > 0) {
			$row 	= mysqli_fetch_object($sql);
			return $row->total+1;
		} else {
			return '';
		}
	}
}

if(!function_exists('getTotal')) {
	function getTotal($qry) {
		global $Dbconnect;
		$query 	= generateSql($qry);
		$sql 	= mysqli_query($Dbconnect, $query);
		$total 	= mysqli_num_rows($sql);
		if($total > 0) {
			$row 	= mysqli_fetch_object($sql);
			return $row->total;
		} else {
			return '0';
		}
	}
}


function getQueryResult($query) {
	global $Dbconnect;
	$query 	= generateSql($query);
	$sql 	= mysqli_query($Dbconnect, $query);
	$total 	= mysqli_num_rows($sql);
	if($total > 0) {
		$row 	= mysqli_fetch_object($sql);
		return $row;
	} else {
		return '';
	}
}


function creditDebitDisplay($value) {
	if($value < 0) {
		$value = $value * -1;
		return "$value Cr.";
	} else {
		return "$value Dr.";
	}
}
function creditDebitDisplayParty($value) {
	if($value < 0) {
		$value = $value * -1;
		return "$value Dr.";
	} else {
		return "$value Cr.";
	}
}

function capitalizeText($value) {
	return ucwords(strtolower($value));
}