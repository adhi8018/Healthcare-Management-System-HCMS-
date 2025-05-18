<!-- del_doc.php - for admin dashboard to delete doctor -->
<?php
include('include/header.php');
include('include/sidebar.php');
include('config/dbcon.php');
// Fetch Patient data for editing
if (isset($_GET['doc_id']) && is_numeric($_GET['doc_id'])) {
    $doc_id = mysqli_real_escape_string($conn, $_GET['doc_id']);
    $query = "DELETE FROM doc WHERE doc_id='$doc_id' LIMIT 1";
    $query_run = mysqli_query($conn, $query);

   
    if ($query_run) {
        echo "<script>alert('Doctor details Delete successfully!'); window.location.href='reg_doc.php';</script>";
    } else {
        echo "<script>alert('Delete failed: " . mysqli_error($conn) . "');</script>";
    }
}
else {
    echo "<script>alert('Invalid request!'); window.location.href='reg_doc.php';</script>";
}

mysqli_close($conn);
?>

<?php
include('include/footer.php');
?>