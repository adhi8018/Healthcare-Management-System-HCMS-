<!-- reg_pat_edit.php - for admin dashboard edit patient details-->
<?php
// Include necessary files
include('include/header.php');
include('include/sidebar.php');
include('config/dbcon.php');


// Fetch Patient data for editing
if (isset($_GET['patient_id']) && is_numeric($_GET['patient_id'])) {
    $patient_id = mysqli_real_escape_string($conn, $_GET['patient_id']);
    $query = "SELECT * FROM patient WHERE patient_id='$patient_id' LIMIT 1";
    $query_run = mysqli_query($conn, $query);

    if (!$query_run || mysqli_num_rows($query_run) == 0) {
        die('<h3>No record found</h3>');
    }

    $row = mysqli_fetch_assoc($query_run);
} else {
    die('<h3>Invalid request: patient_id is missing or invalid</h3>');
}

?>

<!-- HTML FORM -->
<div class="content-wrapper" style="margin: 35px; margin-left: 110px;">
    <div class="content-header">
        <div class="container ">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item active">Edit Patient</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">  
    <div class="card border-dark m-5">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10 sm-12"><h2>Edit Patient</h2></div>
                <div class="col-md-2 sm-12 ms-auto"><a class="btn btn-info btn-sm float-right" href="reg_pat.php">Back</a></div>
            </div>
        </div>
        <div class="card-body" >
            <form class="needs-validation" novalidate method="post" style=" justify-content: center; text-align: justify;">
                <input type="hidden" name="patient_id" class="form-control" value="<?php echo $patient_id; ?>">

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" value="<?php echo $row['patient_name']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Age</label>
                    <div class="col-sm-9">
                    <input type="number" name="age" class="form-control" value="<?php echo $row['patient_age']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Gender</label>
                    <div class="col-sm-9">
                        <select name="gen" class="form-control">
                            <option value="Male" <?php if($row['patient_gender'] == 'Male') echo 'selected'; ?>>Male</option>
                            <option value="Female" <?php if($row['patient_gender'] == 'Female') echo 'selected'; ?>>Female</option>
                            <option value="Other" <?php if($row['patient_gender'] == 'Other') echo 'selected'; ?>>Other</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                    <input type="email" name="mail" class="form-control" value="<?php echo $row['patient_email']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Contact</label>
                    <div class="col-sm-9">
                    <input type="text" name="contact" class="form-control" value="<?php echo $row['patient_phone']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-9">
                    <input type="text" name="add" class="form-control" value="<?php echo $row['patient_address']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Medi.- Hist.</label>
                    <div class="col-sm-9">
                    <input type="text" name="his" class="form-control" value="<?php echo $row['patient_medical_history']; ?>">
                    </div>
                </div>
                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"  name="updatePatient">Update</button>
                </div>
            </form>
        </div>      
    </div> 
</div>  

<?php include('include/footer.php'); ?>
