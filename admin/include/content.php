<!-- content.php - for admin dashboard content -->
<?php
include('header.php');
include('./config/dbcon.php');
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
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
  </div>
  <div class="container">
   <h5>Welcome, Admin!</h5>   
    <div class="card-deck" >
      <a class="card custom_card mt-3 mb-4" href="./reg_doc.php"  style="box-shadow:  0 8px 11px 0 rgba(0, 0, 0, 0.2), 0 9px 30px 0 rgba(0, 0, 0, 0.19); text-decoration: none; transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
        <img class="card-img-top" src="./assets/img/card1.png" alt="Card image cap" height="220px" width="200px">
          <div class="card-body">
            <h5 class="card-title">Total No. Doctor</h5>
              <p class="card-text">
                <?php
                    $total_doc_query = "SELECT * FROM doc";
                    $total_doc_query_run = mysqli_query($conn, $total_doc_query);

                    if($total_doc = mysqli_num_rows($total_doc_query_run))
                    {
                      echo $total_doc;
                    }
                    else{
                      echo "No Data";
                    }
                ?>
              </p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
      </a>
      <a class="card custom_card mt-3 mb-4" href="./reg_pat.php"  style="box-shadow:  0 8px 11px 0 rgba(0, 0, 0, 0.2), 0 9px 30px 0 rgba(0, 0, 0, 0.19); text-decoration: none; transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
        <img class="card-img-top" src="./assets/img/card2.png" alt="Card image cap" height="220px" width="200px">
          <div class="card-body">
            <h5 class="card-title">Total No. Patient</h5>
            <p class="card-text"> 
                  <?php
                    $total_patient_query = "SELECT * FROM patient";
                    $total_patient_query_run = mysqli_query($conn, $total_patient_query);

                    if($total_patient = mysqli_num_rows($total_patient_query_run))
                    {
                      echo $total_patient;
                    }
                    else{
                      echo "No Data";
                    }
                  ?>
                  </p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
      </a>
      <a class="card custom_card mt-3 mb-4" href="./admin_appo.php"  style="box-shadow:  0 8px 11px 0 rgba(0, 0, 0, 0.2), 0 9px 30px 0 rgba(0, 0, 0, 0.19); text-decoration: none; transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
        <img class="card-img-top" src="./assets/img/card3.png" alt="Card image cap" height="220px" width="200px">
          <div class="card-body">
            <h5 class="card-title">Total No. Appointment Booking</h5>
            <p class="card-text">  <?php
                    $total_patient_query = "SELECT * FROM appointment";
                    $total_patient_query_run = mysqli_query($conn, $total_patient_query);

                    if($total_patient = mysqli_num_rows($total_patient_query_run))
                    {
                      echo $total_patient;
                    }
                    else{
                      echo "No Data";
                    }
                  ?></p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
     </a>
     </div>
  </div>
</div>