<!-- auth.php - for authentcation  -->
<?php
session_start();
include("config.php"); // Include database connection

if (isset($_POST['login'])) {
    $email = $_POST['email'];   
    $name = $_POST['name'];       
    // Doctor 
    $doc_name = $_POST['doc_name']; 
    $doc_id = $_POST['doc_id'];   
    $doc_qua = $_POST['doc_qua'];   
    $doc_spec = $_POST['doc_spec'];
    $doc_email = $_POST['doc_email'];   
    $doc_phone = $_POST['doc_phone'];   
    $doc_ava = $_POST['doc_ava'];    
    // Patient
    $patient_name = $_POST['patient_name']; 
    $patient_id = $_POST['patient_id']; 
    $patient_age = $_POST['patient_age']; 
    $patient_gender = $_POST['patient_gender']; 
    $patient_phone = $_POST['patient_phone'];  
    $patient_email = $_POST['patient_email']; 
    $patient_address = $_POST['patient_address'];    
    $patient_medical_history = $_POST['patient_medical_history']; 

    $password = $_POST['pass'];

    // Check in Admin Table
    $query = "SELECT * FROM adminn WHERE admin_email='$email'";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password == $row['admin_password']) { // Plain text (change to hash for security)
            $_SESSION['user'] = $email;
            $_SESSION['role'] = "admin"; 
            
            // ✅ Ensure name is set correctly
            if (!empty($row['admin_name'])) {
                $_SESSION['name'] = $row['admin_name'];
            } else {
                $_SESSION['name'] = "Admin"; // Fallback value
            }
            // ✅ Ensure name is set correctly
            if (!empty($row['admin_id'])) {
                $_SESSION['admin_id'] = $row['admin_id'];
            } else {
                $_SESSION['admin_id'] = "admin_id"; // Fallback value
            }
            // ✅ Ensure phone is set correctly
            if (!empty($row['admin_phone'])) {
                $_SESSION['cont'] = $row['admin_phone'];
            } else {
                $_SESSION['cont'] = "...."; // Fallback value
            }
            header("Location:../../admin/index.php");
            exit();
        }
    }
    

    // Check in Doctor Table
    $query = "SELECT * FROM doc WHERE doc_email='$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password == $row['doc_pass']) {
            $_SESSION['doc_user'] = $email;
            $_SESSION['role'] = "doc";
           
            // ✅ Ensure name is set correctly
            if (!empty($row['doc_name'])) {
                $_SESSION['name'] = $row['doc_name'];
            } else {
                $_SESSION['name'] = "Doctor"; // Fallback value
            }
            // ✅ Ensure name is set correctly
            if (!empty($row['doc_id'])) {
                $_SESSION['doc_id'] = $row['doc_id'];
            } else {
                $_SESSION['doc_id'] = "doc_id"; // Fallback value
            }
            // ✅ Ensure phone is set correctly
            if (!empty($row['doc_phone'])) {
                $_SESSION['cont'] = $row['doc_phone'];
            } else {
                $_SESSION['cont'] = "...."; // Fallback value
            }
             // ✅ Ensure phone is set correctly
             if (!empty($row['doc_qua'])) {
                $_SESSION['qua'] = $row['doc_qua'];
            } else {
                $_SESSION['qua'] = "...."; // Fallback value
            }
             // ✅ Ensure phone is set correctly
             if (!empty($row['doc_spec'])) {
                $_SESSION['spec'] = $row['doc_spec'];
            } else {
                $_SESSION['spec'] = "...."; // Fallback value
            }
             // ✅ Ensure phone is set correctly
             if (!empty($row['doc_ava'])) {
                $_SESSION['ava'] = $row['doc_ava'];
            } else {
                $_SESSION['ava'] = "...."; // Fallback value
            }
            header("Location:../../doctor/dash_db_doc.php");
            exit();
        }
    }





    
    // Check in Doctor Table
    $query = "SELECT * FROM patient WHERE patient_email='$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password == $row['patient_password']) {
            $_SESSION['patient_user'] = $email;
            $_SESSION['role'] = "patient";
           
            // ✅ Ensure name is set correctly
            if (!empty($row['patient_name'])) {
                $_SESSION['name'] = $row['patient_name'];
            } else {
                $_SESSION['name'] = "Patient"; // Fallback value
            }
            // ✅ Ensure name is set correctly
            if (!empty($row['patient_id'])) {
                $_SESSION['patient_id'] = $row['patient_id'];
            } else {
                $_SESSION['patient_id'] = "patient_id"; // Fallback value
            }
            // ✅ Ensure name is set correctly
            if (!empty($row['patient_age'])) {
                $_SESSION['patient_age'] = $row['patient_age'];
            } else {
                $_SESSION['patient_age'] = "patient_age"; // Fallback value
            }
             // ✅ Ensure name is set correctly
             if (!empty($row['patient_gender'])) {
                $_SESSION['patient_gender'] = $row['patient_gender'];
            } else {
                $_SESSION['patient_gender'] = "patient_gender"; // Fallback value
            }
             // ✅ Ensure phone is set correctly
             if (!empty($row['patient_phone'])) {
                $_SESSION['cont'] = $row['patient_phone'];
            } else {
                $_SESSION['cont'] = "...."; // Fallback value
            }
              // ✅ Ensure name is set correctly
              if (!empty($row['patient_address'])) {
                $_SESSION['patient_address'] = $row['patient_address'];
            } else {
                $_SESSION['patient_address'] = "patient_address"; // Fallback value
            }
              // ✅ Ensure name is set correctly
              if (!empty($row['patient_medical_history'])) {
                $_SESSION['patient_medical_history'] = $row['patient_medical_history'];
            } else {
                $_SESSION['patient_medical_history'] = "patient_medical_history"; // Fallback value
            }
           
         
            header("Location:../../patient/dash_db_pat.php");
            exit();
        }
    }
    
    // If login fails
    echo "<script>alert('Invalid Email or Password'); window.location.href='../log.php';</script>";
}
?>

