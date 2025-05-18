<!-- book_appo_section.php - Book Appointment Section code -->
<?php
    include('include/head.php');
?>

    <div class="mt-5 reg_section_main" style="text-align: center; place-items: center; justify-content: center; background-image: repeating-linear-gradient(white,rgb(160, 247, 255), white); margin:auto;">
        <h1 class="m-3">Book Your Appointment <span class="material-symbols-outlined">tab_recent</span></h1>
        <hr width="600px">
        <div class="row" class="container">
            <a class="card" href="log.php" style="text-decoration:none; height:350px; width:350px; border:2px gray; border-radius: 15px; 
     box-shadow:  0 8px 11px 0 rgba(0, 0, 0, 0.2), 0 9px 30px 0 rgba(0, 0, 0, 0.19); transition: transform 0.3s;"
           onmouseover="this.style.transform='scale(1.05)'" 
           onmouseout="this.style.transform='scale(1)';">
                <img src="./assets/images/appointment.jpeg" class="p-1" alt="..." srcset="" height="300px" style="border-radius: 15px" >
                <h4 class="card-text p-2"><small class="text-muted">Book an Appointment</small></h4>
            </a>
        </div>
    </div>