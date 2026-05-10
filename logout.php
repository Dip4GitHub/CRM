<?php
session_start();
unset($_SESSION['guserId']);
session_destroy();
header("location: login.php");
exit;
?>