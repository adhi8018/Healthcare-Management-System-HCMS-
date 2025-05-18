<!-- patient.php - Registration from of patient submission-->
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
//For connection
include("config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gen = $_POST['gen'];
    $mail = $_POST['mail'];
    $phone = $_POST['contact'];
    $add = $_POST['add'];
    $his = $_POST['his'];
    $pass = $_POST['pass'];

if($conn){	

  $checkemail = "SELECT patient_email FROM patient WHERE patient_email='$mail'";
  $checkemail_run = mysqli_query($conn, $checkemail);
  
  if(mysqli_num_rows($checkemail_run)>0){
      $_SESSION['status']="Email id already taken.!";
      
      header('Location:../patient/dash_db_pat.php');
  }
   
  else{
   $sql = " INSERT INTO `patient` ( `patient_name`, `patient_age`, `patient_gender`, `patient_phone`, `patient_email`, `patient_address`, `patient_medical_history`, `patient_password`) VALUES ('$name', '$age', '$gen', '$phone', '$mail', '$add', '$his', '$pass')";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo '<div class="container">
        <div class="mess mt-5 ">
        <div class="alert alert-success alert-dismissible fade show" role="alert" >
        <strong>Success!</strong> Your entry has been submitted successfully!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <center><a href="../log.php"><button type="button" class="btn btn-outline-info">Go To Login Page </button></center></a>
      </div>
      </div>';
      header('Refresh: 5; url=../log.php');
      }
      else{
          // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>';
      
      }
    }
      
}
else{
      echo "Connection Failed";
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
