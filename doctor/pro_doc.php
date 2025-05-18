<!-- pro_doc.php - for doctor dashboard doc details -->
<?php 
include('include/header.php');
include('include/sidebar.php');
include('config/dbcon_doc.php');
?>
<?php
if (!isset($_SESSION['doc_user']) || $_SESSION['role'] != "doc") {
    header("Location:../site/log.php");
    exit();  
}

// Debug: Check if doc_id is stored in session
if (!isset($_SESSION['doc_id'])) {
    echo "Doctor ID is not stored in session!";
    exit(); // Stop further execution to debug
}

$doc_id = $_SESSION['doc_id'];

$query = "SELECT * FROM doc WHERE doc_id='$doc_id' LIMIT 1";
$result = mysqli_query($conn, $query);
$doctor = mysqli_fetch_assoc($result);

?>  
<div class="content">
    <div class="content-wrapper" style="margin: 35px; margin-left: 110px;">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="dash_db_doc.php">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
    <div class="container">
        <section class="profile" style=" height: 500px;">
            <div class="card shadow-lg p-2 mb-3 bg-body-tertiary rounded" style="max-width: 38rem; justify-content: center; text-align: center; align-item:center; margin: auto;">
                <div class="card-header">
                    Doctor Details
                </div>
                <div class="card-body">
                    <table class="table table-hover ">
                        
                        <tr>
                            <th>Name</th>
                            <td><?php echo $doctor['doc_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $doctor['doc_email']; ?></td>
                        </tr>
                        <tr>
                            <th>Contact</th>
                            <td><?php echo $doctor['doc_phone']; ?></td>
                        </tr>
                        <tr>
                            <th>Qualification</th>
                            <td><?php echo $doctor['doc_qua']; ?></td>
                        </tr>
                        <tr>
                            <th>Specilization</th>
                            <td><?php echo $doctor['doc_spec']; ?></td>
                        </tr>
                        <tr>
                            <th>Avalible</th>
                            <td><?php echo $doctor['doc_ava']; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                <a href="reg_doc_edit.php?doc_id=<?php echo $doctor['doc_id']; ?>" class="btn btn-info btn-sm m-2">Edit</a>               
                </div>
            </div>
        </section>
    </div>   
</div>
<?php
    
    include('include/footer.php');
?>