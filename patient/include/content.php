<!-- content.php - for patient dashboard content -->
<?php
include('include/header.php');
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
    <div class="card-deck">
      <div class="card">
        <img class="card-img-top" src="./assets/img/card1.png" alt="Card image cap" height="220px" width="200px">
          <div class="card-body">
            <h5 class="card-title">Manage Doctor</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="./assets/img/card2.png" alt="Card image cap" height="220px" width="200px">
          <div class="card-body">
            <h5 class="card-title">Patient</h5>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
      </div>
      <div class="card">
       <img class="card-img-top" src="./assets/img/card3.png" alt="Card image cap" height="220px" width="200px">
          <div class="card-body">
            <h5 class="card-title">Appointment Booking</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
     </div>
     </div>
  </div>
</div>