<!-- del_pat.php - for admin dashboard to delete patient -->
<?php
include('include/header.php');
include('include/sidebar.php');
include('config/dbcon.php');
// Fetch Patient data for editing
if (isset($_GET['patient_id']) && is_numeric($_GET['patient_id'])) {
    $patient_id = mysqli_real_escape_string($conn, $_GET['patient_id']);
    $query = "DELETE FROM patient WHERE patient_id='$patient_id' LIMIT 1";
    $query_run = mysqli_query($conn, $query);

   
    if ($query_run) {
        echo "<script>alert('Patient details Delete successfully!'); window.location.href='reg_pat.php';</script>";
    } else {
        echo "<script>alert('Delete failed: " . mysqli_error($conn) . "');</script>";
    }
}
else {
    echo "<script>alert('Invalid request!'); window.location.href='reg_pat.php';</script>";
}

mysqli_close($conn);
?>

<?php
include('include/footer.php');
?>