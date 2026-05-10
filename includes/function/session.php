<?php
if( $guserId < 1 ) {
	$url = urlencode(curPageURL()); 
	header("Location:login.php?url=$url");
}
?>