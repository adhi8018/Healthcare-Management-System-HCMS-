<!-- sidebar.php - for admin dashboard sidebar -->
<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

include('header.php');
?>
  <aside class="sidebar" style=" z-index: 1; " >
      <div class="logo">
        <img src="./assets/img/image.png" alt="logo"  style="box-shadow:  0 8px 11px 0 rgba(61, 60, 60, 0.2), 0 9px 30px 0 rgba(37, 37, 37, 0.19);">        
      </div>
      <?php
    if (!isset($_SESSION['user']) || $_SESSION['role'] != "admin") {
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
          <a href="./index.php">Dashboard</a>
        </li>
        <li>
          <span class="material-symbols-outlined">account_circle</span>
          <a href="./profile.php">Profile</a>
        </li>
       <hr>
        <h4>Doctor</h4>
        <li>
        <span class="material-symbols-outlined">stethoscope</span>
          <a href="./reg_doc.php">Manage Doctor</a>
        </li>
        <hr>
        <h4>Patient</h4>
        <li>
        <span class="material-symbols-outlined">patient_list</span>
          <a href="./reg_pat.php">Manage Patient</a>
        </li>
        <hr>
        <h4>Appointment</h4>
        <li>
        <span class="material-symbols-outlined">heart_plus</span>
          <a href="./admin_appo.php">Manage Appointment</a>
        </li>
        
        <li class="logout-link">
          <span class="material-symbols-outlined">logout</span>
          <a href="./logout.php">Logout</a>
        </li>
      </ul>
  </aside>

    