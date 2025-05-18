<!-- nav.php - nav bar code -->
<?php
 include('head.php');
 ?>

 <!--  Navbar -->
 <nav class="navbar navbar-expand-lg navbar-light sticky-top" >
 <p class="para"><span class="material-symbols-outlined">
heart_plus
</span>HCMS</p>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link navl" href="./idx_site.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link navl" href="#about">About Us</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle navl" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
            Login
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="./log.php">Login</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="./reg.php">Register</a>
          </div>
        </li>
        <li class="nav-item navl">
          <a class="nav-link disabled">Contact Us</a>
        </li>
      </ul>
    </div>
  </nav>
