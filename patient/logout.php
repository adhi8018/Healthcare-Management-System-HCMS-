<!-- logout.php - for patient dashboard patient logout -->
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