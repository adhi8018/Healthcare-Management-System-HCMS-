<!-- admin.php - Regestration from of admin submission-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- Bootstrap 4 Cdn link  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

  <!--  Google Font Link -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap"
    rel="stylesheet">

  <!--  Font Awesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        *{
            margin : 0;
            padding :0 ;
        }
        
        </style>
</head>
<body>

<?php
session_start();
// Include database connection
include("config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $mail = $_POST['email'];
    $phone = $_POST['contact'];
    $pass = $_POST['pass'];

    if ($conn) {   // Check if email exists
        $stmt = $conn->prepare("SELECT admin_email FROM adminn WHERE admin_email = ?");
        $stmt->bind_param("s", $mail);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
          $_SESSION['status'] = "Email ID already taken!";
          header('Location: ../../admin/index.php');
          exit();
      } else {
          // Insert new admin
          $stmt = $conn->prepare("INSERT INTO adminn (admin_name, admin_email, admin_phone, admin_password) VALUES (?, ?, ?, ?)");
          $stmt->bind_param("ssss", $name, $mail, $phone, $pass);

          if ($stmt->execute()) {
              $_SESSION['status'] = "Registration Successful! Please login.";
              header('Location: ../log.php');
              exit();
          } else {
              echo '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
          }
      }
  } else {
      die("Connection Failed: " . mysqli_connect_error());
  }
}
?>


 <!-- Bootstrap 4 cdn link for JS -->
 <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
    integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
    crossorigin="anonymous"></script>
</body>
</html>