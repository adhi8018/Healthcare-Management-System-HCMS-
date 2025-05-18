<!-- doc_appo.php - for doctor dashboard manage appointment -->
<?php
session_start();
include('include/header.php');
include('include/sidebar.php');
include('config/dbcon_doc.php'); 

if (!isset($_SESSION['doc_id'])) {
    header("Location: ../site/log.php"); 
    exit();
}

$doc_id = $_SESSION['doc_id'];

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Fetch doctor's appointments with a fallback for NULL status
$query = "SELECT a.appointment_id, p.patient_name, a.appointment_date, a.appointment_time, 
                 COALESCE(a.status, 'Pending') AS status
          FROM appointment a
          JOIN patient p ON a.patient_id = p.patient_id
          WHERE a.doc_id = '$doc_id' 
          ORDER BY a.appointment_date DESC";

$appointments = mysqli_query($conn, $query);

if (!$appointments) {
    die("Error fetching appointments: " . mysqli_error($conn));
}

// ✅ Handle status updates (Confirm/Reject)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_status'], $_POST['app_id'])) {
    $app_id = mysqli_real_escape_string($conn, $_POST['app_id']);
    $new_status = mysqli_real_escape_string($conn, $_POST['update_status']); // Fixed input

    // ✅ Validate status values
    if (in_array($new_status, ['Confirmed', 'Rejected'])) {
        $updateQuery = "UPDATE appointment SET status='$new_status' WHERE appointment_id='$app_id'";
        if (mysqli_query($conn, $updateQuery)) {
            echo "<script>alert('Appointment status updated successfully!'); window.location='doc_appo.php';</script>";
            exit();
        } else {
            die("Error updating status: " . mysqli_error($conn));
        }
    } else {
        die("Invalid status update request.");
    }
}
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
                            <li class="breadcrumb-item active">Manage Appointment</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5" >
        <h2>Doctor's Appointments</h2>
        <table class="table table-hover table-light mt-3" style="border-radius: 10px; margin: auto; 
        box-shadow:  0 8px 11px 0 rgba(0, 0, 0, 0.2), 0 9px 30px 0 rgba(0, 0, 0, 0.19);">
            <thead class="thead-dark">
                <tr>
                    <th>Patient</th>
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
                        <td><?php echo htmlspecialchars($row['appointment_date']); ?></td>
                        <td><?php echo htmlspecialchars($row['appointment_time']); ?></td>
                        <td><?php echo htmlspecialchars($row['status']); ?></td>
                        <td>
                            <?php if ($row['status'] == 'Pending') { ?>
                                <form method="POST">
                                    <input type="hidden" name="app_id" value="<?php echo $row['appointment_id']; ?>">
                                    <button type="submit" name="update_status" class="btn btn-success" value="Confirmed">Confirm</button>
                                    <button type="submit" name="update_status" class="btn btn-danger" value="Rejected">Reject</button>
                                </form>
                            <?php } else {
                                echo $row['status']; // Show updated status
                            } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('include/footer.php'); ?>         