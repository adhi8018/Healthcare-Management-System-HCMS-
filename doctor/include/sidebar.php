<!-- sidebar.php - for doctor dashboard sidebar -->
<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
include('include/header.php');
?>


<aside class="sidebar" style=" z-index: 1; " >
      <div class="logo">
        <img src="./assets/img/logo.png" alt="logo"  >        
      </div>
      <?php
    if (!isset($_SESSION['doc_user']) || $_SESSION['role'] != "doc") {
        header("Location:../site/log.php");
        exit();
    }
    ?>  
    <p><center><strong> Dr.<?php echo $_SESSION['name']; ?></strong></center> </p>
    <!-- side bar link -->
      <ul class="links">
        <h4>Main Menu</h4>
        <li>
          <span class="material-symbols-outlined">dashboard</span>
          <a href="./dash_db_doc.php">Dashboard</a>
        </li>
        <li>
          <span class="material-symbols-outlined">account_circle</span>
          <a href="./pro_doc.php">Profile</a>
        </li>
       <hr>
        <h4>Patient</h4>
        <li>
        <span class="material-symbols-outlined">patient_list</span>
          <a href="../site/form/patientF.html">Add Patient</a>
        </li>
        <hr>
        <h4>Appointment</h4>
        <li>
        <span class="material-symbols-outlined">heart_plus</span>
          <a href="./doc_appo.php">Manage Appointment</a>
        </li>
        <li class="logout-link">
          <span class="material-symbols-outlined">logout</span>
          <a href="./logout.php">Logout</a>
        </li>
      </ul>
  </aside>

    