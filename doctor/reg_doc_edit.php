<!-- reg_doc_edit.php - for doctor dashboard doc details edit -->
<?php
// Include necessary files
include('include/header.php');
include('include/sidebar.php');
include('config/dbcon_doc.php');


// Fetch doctor data for editing

if (!isset($_SESSION['doc_id'])) {
    header("Location: ../site/log.php");
    exit();
}

$doc_id = $_SESSION['doc_id'];

$query = "SELECT * FROM doc WHERE doc_id='$doc_id' LIMIT 1";
$result = mysqli_query($conn, $query);
$doctor = mysqli_fetch_assoc($result);

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
                        <li class="breadcrumb-item"><a href="dash_db_doc.php">Home</a></li>
                        <li class="breadcrumb-item active">Edit Doctor</li>
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
                <div class="col-md-10 sm-12"><h2>Edit Doctor</h2></div>
                <div class="col-md-2 sm-12 ms-auto"><a class="btn btn-info btn-sm float-right" href="pro_doc.php">Back</a></div>
            </div>
        </div>
        <div class="card-body" >
            <form class="needs-validation" novalidate method="post" style=" justify-content: center; text-align: justify;">
                <input type="hidden" name="doc_id" value="<?php echo $doc_id; ?>">

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Full Name" required name="name" value="<?php echo $doctor['doc_name']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Qualification</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Qualification" required name="qua" value="<?php echo $doctor['doc_qua']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Specialization</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Specialization" required name="spec" value="<?php echo $doctor['doc_spec']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" placeholder="abc@gmail.com" name="mail" value="<?php echo $doctor['doc_email']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Contact</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Contact no" name="contact" value="<?php echo $doctor['doc_phone']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Availability</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Days when you are available" required name="avalible" value="<?php echo $doctor['doc_ava']; ?>">
                    </div>
                </div>   

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="updateDoctor">Update</button>
                </div>
            </form>
        </div>      
    </div> 
</div>  

<?php include('include/footer.php'); ?>
