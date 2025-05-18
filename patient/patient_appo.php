<!-- patient_appo.php - for patient dashboard see appointment -->
<?php
include('config/dbcon_pat.php');
include('include/header.php');
include('include/sidebar.php');
if (!isset($_SESSION['patient_id'])) {
    header("Location: ../site/log.php");
    exit();
}
$patient_id = $_SESSION['patient_id'];

// Check database connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
// Fetch patient's appointments
$query = "SELECT a.appointment_id, d.doc_name, d.doc_spec, a.appointment_date, a.appointment_time, a.status 
          FROM appointment a
          JOIN doc d ON a.doc_id = d.doc_id
          WHERE a.patient_id = '$patient_id' 
          ORDER BY a.appointment_date DESC";

$appointments = mysqli_query($conn, $query);

// Check for query errors
if (!$appointments) {
    die("Error fetching appointments: " . mysqli_error($conn));
}
?>

<div class="container mt-5">
    <h2>My Appointments</h2>
    <table class="table table-hover table-light mt-3" style="border-radius: 10px; margin: auto; 
        box-shadow:  0 8px 11px 0 rgba(0, 0, 0, 0.2), 0 9px 30px 0 rgba(0, 0, 0, 0.19);">
            <thead class="thead-dark">
        
            <tr>
                <th>Doctor</th>
                <th>Specialization</th>
                <th>Appointment Date</th>
                <th>Time</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($appointments)) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['doc_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['doc_spec']); ?></td>
                    <td><?php echo htmlspecialchars($row['appointment_date']); ?></td>
                    <td><?php echo htmlspecialchars($row['appointment_time']); ?></td>
                    <td><?php echo htmlspecialchars($row['status']); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div style="height: 320px;" ></div>
<?php 
    include('include/footer.php');
?>
