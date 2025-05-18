<!-- pro_pat.php - for patient dashboard patient details -->
<?php 
include('include/header.php');
include('include/sidebar.php');
include('config/dbcon_pat.php');
?>
<?php
if (!isset($_SESSION['patient_user']) || $_SESSION['role'] != "patient") {
    header("Location:../site/log.php");
    exit();  
}

// Debug: Check if doc_id is stored in session
if (!isset($_SESSION['patient_id'])) {
    echo "Patient ID is not stored in session!";
    exit(); // Stop further execution to debug
}

$patient_id = $_SESSION['patient_id'];

$query = "SELECT * FROM patient WHERE patient_id='$patient_id' LIMIT 1";
$result = mysqli_query($conn, $query);
$patient = mysqli_fetch_assoc($result);

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
                            <li class="breadcrumb-item"><a href="dash_db_pat.php">Home</a></li>
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
                Patient Details
            </div>
            <div class="card-body">
                <table class="table table-hover ">
                    
                    <tr>
                        <th>Name</th>
                        <td><?php echo $patient['patient_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td><?php echo $patient['patient_age']; ?></td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td><?php echo $patient['patient_gender']; ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo $patient['patient_email']; ?></td>
                    </tr>
                    <tr>
                        <th>Contact</th>
                        <td><?php echo $patient['patient_phone']; ?></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><?php echo $patient['patient_address']; ?></td>
                    </tr>
                    <tr>
                        <th>Patient-Medical-History</th>
                        <td><?php echo $patient['patient_medical_history']; ?></td>
                    </tr>                  
                </table>
            </div>
            <div class="card-footer">
            <a href="reg_pat_edit.php?patient_id=<?php echo $patient['patient_id']; ?>" class="btn btn-info btn-sm m-2">Edit</a>               
            </div>
        </div>
    </section>
</div>   
<?php
    
    include('include/footer.php');
?>