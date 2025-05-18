<!-- dbcon_doc.php - for doctor dashboard db connection -->
<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'hcms';

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    header("Location: ../error/db.php");
    die();
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateDoctor'])) {
    $doc_id = mysqli_real_escape_string($conn, $_POST['doc_id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $qua = mysqli_real_escape_string($conn, $_POST['qua']);
    $spec = mysqli_real_escape_string($conn, $_POST['spec']);
    $mail = mysqli_real_escape_string($conn, $_POST['mail']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $avalible = mysqli_real_escape_string($conn, $_POST['avalible']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

    // Fetch current password
    $fetch_query = "SELECT doc_pass FROM doc WHERE doc_id='$doc_id'";
    $fetch_result = mysqli_query($conn, $fetch_query);
    $row = mysqli_fetch_assoc($fetch_result);
    $existing_password = $row['doc_pass']; // Keep old password

    // Check if a new password is provided
    if (!empty($pass)) {
        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT); // Hash new password
    } else {
        $hashed_pass = $existing_password; // Retain old password
    }

    // Update query
    $update_query = "UPDATE doc SET 
        doc_name='$name', 
        doc_qua='$qua', 
        doc_spec='$spec', 
        doc_email='$mail', 
        doc_phone='$contact', 
        doc_ava='$avalible', 
        doc_pass='$hashed_pass' 
        WHERE doc_id='$doc_id'";

    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {
        echo "<script>alert('Doctor details updated successfully!'); window.location.href='pro_doc.php';</script>";
    } else {
        echo "<script>alert('Update failed: " . mysqli_error($conn) . "');</script>";
    }
}


// Check if form is submitted patient
// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updatePatient'])) {
//     $patient_id = mysqli_real_escape_string($conn, $_POST['patient_id']);
//     $name = mysqli_real_escape_string($conn, $_POST['name']);
//     $age = mysqli_real_escape_string($conn, $_POST['age']);
//     $gen = mysqli_real_escape_string($conn, $_POST['gen']);
//     $contact = mysqli_real_escape_string($conn, $_POST['contact']);
//     $mail = mysqli_real_escape_string($conn, $_POST['mail']);
//     $add = mysqli_real_escape_string($conn, $_POST['add']);
//     $his = mysqli_real_escape_string($conn, $_POST['his']);
//     $pass = mysqli_real_escape_string($conn, $_POST['pass']);
//     // Update query
//     $update_query = "UPDATE patient SET 
//         patient_name='$name', 
//         patient_age='$age', 
//         patient_gender='$gen',  
//         patient_phone='$contact', 
//         patient_email='$mail', 
//         patient_address='$add' ,
//         patient_medical_history='$his',
//         patient_password='$pass' 
//         WHERE patient_id='$patient_id'";

//     $update_result = mysqli_query($conn, $update_query);

//     if ($update_result) {
//         echo "<script>alert('Patient details updated successfully!'); window.location.href='reg_pat.php';</script>";
//     } else {
//         echo "<script>alert('Update failed: " . mysqli_error($conn) . "');</script>";
//     }
// }

?>