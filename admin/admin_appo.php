<!-- admin_appo.php - for admin dashboard manage appointment -->
<?php
include('config/dbcon.php'); // Database connection
include('include/header.php');
include('include/sidebar.php');

// ✅ Ensure admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: log.php"); // Redirect to login page
    exit();
}

// ✅ Check if database connection is established
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// ✅ Fetch all appointments with correct column names
$query = "SELECT a.appointment_id, p.patient_name, d.doc_name, d.doc_spec, 
                 a.appointment_date, a.appointment_time, a.status 
          FROM appointment a
          JOIN patient p ON a.patient_id = p.patient_id
          JOIN doc d ON a.doc_id = d.doc_id
          ORDER BY a.appointment_date DESC";

$appointments = mysqli_query($conn, $query);

// ✅ Check for query execution errors
if (!$appointments) {
    die("Error fetching appointments: " . mysqli_error($conn));
}

// ✅ Handle status updates
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_status'])) {
    $app_id = mysqli_real_escape_string($conn, $_POST['app_id']);
    $new_status = mysqli_real_escape_string($conn, $_POST['status']);

    $updateQuery = "UPDATE appointment SET status='$new_status' WHERE appointment_id='$app_id'";
    
    if (mysqli_query($conn, $updateQuery)) {
        echo "<script>alert('Appointment status updated!'); window.location='admin_appo.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}

// ✅ Include page components
include('include/header.php');
include('include/sidebar.php');
?>

<div class="container mt-5">
    <h2>Manage Appointments</h2>
    <table class="table table-hover table-light mt-3" style="border-radius: 10px; margin: auto; 
        box-shadow:  0 8px 11px 0 rgba(0, 0, 0, 0.2), 0 9px 30px 0 rgba(0, 0, 0, 0.19);">
            <thead class="thead-dark">
      
            <tr>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Specialization</th>
                <th>Appointment Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($appointments)) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['patient_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['doc_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['doc_spec']); ?></td>
                    <td><?php echo htmlspecialchars($row['appointment_date']); ?></td>
                    <td><?php echo htmlspecialchars($row['appointment_time']); ?></td>
                    <td><?php echo htmlspecialchars($row['status']); ?></td>
                    <td>
                        <?php if ($row['status'] == 'Pending') { ?>
                            <form method="POST">
                                <input type="hidden" name="app_id" value="<?php echo $row['appointment_id']; ?>">
                                <input type="hidden" name="status" value="Confirmed">
                                <button type="submit" name="update_status" class="btn btn-success m-1">Confirm</button>
                            </form>
                            <form method="POST">
                                <input type="hidden" name="app_id" value="<?php echo $row['appointment_id']; ?>">
                                <input type="hidden" name="status" value="Rejected">
                                <button type="submit" name="update_status" class="btn btn-danger m-1">Reject</button>
                            </form>
                        <?php } else {
                            echo htmlspecialchars($row['status']);
                        } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    
</div>

<?php include('include/footer.php'); ?>
