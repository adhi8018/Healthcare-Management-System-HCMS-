<!-- logout.php - for doctor dashboard logout -->
<?php 
include('include/header.php');
include('include/sidebar.php');
?>
<?php
session_start();
session_destroy();
header("Location: ../site/log.php");
exit();
?>