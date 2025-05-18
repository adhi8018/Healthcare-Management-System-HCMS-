<!-- book_appo.php - for patient dashboard book appointment -->
<?php
include('config/dbcon_pat.php');
include('include/header.php');
include('include/sidebar.php');

if (!isset($_SESSION['patient_id'])) {
    header("Location: ../site/log.php");
    exit();
}

$patient_id = $_SESSION['patient_id'];

// Fetch distinct specializations
$specializationQuery = "SELECT DISTINCT doc_spec FROM doc";
$specializations = mysqli_query($conn, $specializationQuery);

$doctors = []; // Initialize empty array for doctors

// Fetch doctors based on specialization selection
if (isset($_POST['search'])) {
    $selected_specialization = mysqli_real_escape_string($conn, $_POST['specialization']);
    $doctorQuery = "SELECT * FROM doc WHERE doc_spec = '$selected_specialization'";
    $doctors = mysqli_query($conn, $doctorQuery);
}

// Handle appointment booking
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['book'])) {
    $doctor_id = mysqli_real_escape_string($conn, $_POST['doctor_id']);
    $appointment_date = mysqli_real_escape_string($conn, $_POST['appointment_date']);
    $appointment_time = mysqli_real_escape_string($conn, $_POST['appointment_time']);

    $insertQuery = "INSERT INTO appointment (patient_id, doc_id, appointment_date, appointment_time, status) 
                    VALUES ('$patient_id', '$doctor_id', '$appointment_date', '$appointment_time', 'Pending')";

    if (mysqli_query($conn, $insertQuery)) {
        echo "<script>alert('Appointment booked successfully!'); window.location='book_appo.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<div class="container mt-5">
    <h2>Book an Appointment</h2>

    <!-- Specialization Search Form -->
    <form method="POST">
        <div class="form-group">
            <label>Select Specialization</label>
            <select name="specialization" class="form-control" required>
                <option value="">-- Select Specialization --</option>
                <?php while ($row = mysqli_fetch_assoc($specializations)) { ?>
                    <option value="<?php echo $row['doc_spec']; ?>">
                        <?php echo $row['doc_spec']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" name="search" class="btn btn-primary">Search Doctor</button>
    </form>

    <hr>

    <!-- If doctors are found, show booking form -->
    <?php if (!empty($doctors) && mysqli_num_rows($doctors) > 0) { ?>
        <form method="POST">
            <div class="form-group">
                <label>Select Doctor</label>
                <select name="doctor_id" class="form-control" required>
                    <option value="">-- Select Doctor --</option>
                    <?php while ($doctor = mysqli_fetch_assoc($doctors)) { ?>
                        <option value="<?php echo $doctor['doc_id']; ?>">
                            <?php echo $doctor['doc_name'] . " - " . $doctor['doc_spec']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>Appointment Date</label>
                <input type="date" name="appointment_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Appointment Time</label>
                <input type="time" name="appointment_time" class="form-control" required>
            </div>

            <button type="submit" name="book" class="btn btn-success">Book Appointment</button>
        </form>
    <?php } elseif (isset($_POST['search'])) { ?>
        <p class="text-danger">No doctors found for the selected specialization.</p>
    <?php } ?>
</div>


<div style="height: 100px;" ></div>
<?php 
include('include/footer.php');
 ?>
