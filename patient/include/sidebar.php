<!-- sidebar.php - for patient dashboard sidebar -->
<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
include('include/header.php');
?>
<aside class="sidebar" style=" z-index: 1; " >
      <div class="logo">
        <img src="./assets/img/logo_pat.png" alt="logo" >        
      </div>
      <?php
    if (!isset($_SESSION['patient_user']) || $_SESSION['role'] != "patient") {
        header("Location:../site/log.php");
        exit();
    }
    ?>  
    <p><strong><?php echo $_SESSION['name']; ?></strong> </p>
    <!-- side bar link -->
      <ul class="links">
        <h4>Main Menu</h4>
        <li>
          <span class="material-symbols-outlined">dashboard</span>
          <a href="./dash_db_pat.php">Dashboard</a>
        </li>
        <li>
          <span class="material-symbols-outlined">account_circle</span>
          <a href="./pro_pat.php">Profile</a>
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
          <a href="./patient_appo.php">Manage Appointment</a>
        </li>
        <li>
        <span class="material-symbols-outlined">tab_recent</span>
          <a href="./book_appo.php">Book Appointment</a>
        </li>
        <li class="logout-link">
          <span class="material-symbols-outlined">logout</span>
          <a href="./logout.php">Logout</a>
        </li>
      </ul>
  </aside>

    