<!-- pro_pat_edit.php - for patient dashboard patient details edit -->
<?php
// Include necessary files
include('include/header.php');
include('include/sidebar.php');
include('config/dbcon_pat.php');


// Fetch doctor data for editing

if (!isset($_SESSION['patient_id'])) {
    header("Location: ../site/log.php");
    exit();
}

$patient_id = $_SESSION['patient_id'];

$query = "SELECT * FROM patient WHERE patient_id='$patient_id' LIMIT 1";
$result = mysqli_query($conn, $query);
$patient = mysqli_fetch_assoc($result);

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
                        <li class="breadcrumb-item"><a href="dash_db_pat.php">Home</a></li>
                        <li class="breadcrumb-item active">Edit Patient</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">  
    <div class="card border-dark m-5 " >
        <div class="card-header">
            <div class="row">
                <div class="col-md-10 sm-12"><h2>Edit Patient</h2></div>
                <div class="col-md-2 sm-12 ms-auto"><a class="btn btn-info btn-sm float-right" href="pro_pat.php">Back</a></div>
            </div>
        </div>
        <div class="card-body" >
            <form class="needs-validation" novalidate method="post" style=" justify-content: center; text-align: justify;">
                <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>">

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Full Name" required name="name" value="<?php echo $patient['patient_name']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Age</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" placeholder="" required name="age" value="<?php echo $patient['patient_age']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Gender</label>
                    <div class="col-sm-9">
                    <select class="form-control" id="exampleFormControlSelect1" name="gen" value="<?php echo $patient['patient_gender']; ?>">
                <option selected>Select your gender</option>
                <option>Male</option>
              <option>Female</option>
              <option>Other</option>
            </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" placeholder="abc@gmail.com" name="mail" value="<?php echo $patient['patient_email']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Contact</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Contact no" name="contact" value="<?php echo $patient['patient_phone']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Days when you are available" required name="add" value="<?php echo $patient['patient_address']; ?>">
                    </div>
                </div> 
                
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Patient Medical History</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Days when you are available" required name="his" value="<?php echo $patient['patient_medical_history']; ?>">
                    </div>
                </div> 
        </div>   
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="updatePatient">Update</button>
                </div>
            </form>
          
    </div> 
</div>  

<?php include('include/footer.php'); ?>
