<!-- reg.php - Registeration page code -->
<?php
  include('include/head.php');
?>
  <div class="register">
    <div class="container">
        <center><p class="reg_para">Register Yourself</p></center>
        
        <div class="row justify-content-center"> <!-- Center align the row -->
          
            <!-- Doctor -->
            <div class="col-md-4 col-lg-4 col-sm-6 text-center"> <!-- Reduced size for centering -->
                <a class="a" href="form/docF.html" style="text-decoration: none; color: inherit;">
                    <div class="card box_reg mx-auto" style="width: 100%; max-width: 300px;">
                        <img class="card-img-top " src="assets/images/reg/doc.png" alt="Doctor" style="height: 230px;">
                        <hr>
                        <h5>Doctor</h5>
                    </div>
                </a>
            </div>
          
            <!-- Patient -->
            <div class="col-md-4 col-lg-4 col-sm-6 text-center">
                <a class="a" href="form/patientF.html" style="text-decoration: none; color: inherit;">
                    <div class="card box_reg mx-auto" style="width: 100%; max-width: 300px;">
                        <img class="card-img-top " src="assets/images/reg/patient.png" alt="Patient" style="height: 230px; ">
                        <hr>
                        <h5>Patient</h5>
                    </div>
                </a>
            </div>
          
        </div>
     </div>
     <div class="space"></div>
  </div>
    
<?php
  include('include/foot.php');
?>
