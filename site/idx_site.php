<!-- idx_site.php - Home page code -->
<?php
    include('include/head.php');
    include('include/nav.php');
?>


<!--  Carousel -->
<div id="carouselExampleCaptions" class="carousel slide container mt-3" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./assets/images/carousel/img1.png" class="d-block w-100 cour1 " alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./assets/images/carousel/img2.png" class="d-block w-100 cour1" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./assets/images/carousel/img3.png" class="d-block w-100 cour1" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </button>
  </div>

<marquee class="html-marquee" direction="left" behavior="scroll"scrollamount="22" style=" background-color:rgb(225, 231, 231);">
    <h5 style=" ; 
 color:rgb(28, 140, 215); 
 text-align:center;
 text-transform:uppercase;
 text-shadow:0 0 10px rgb(124, 208, 249)">Welcome to the Health Care Management System! | Easily manage patient records, doctor schedules, and appointments. </h5>
</marquee>
<marquee class="html-marquee" direction="right" behavior="scroll"scrollamount="10" style=" background-color:rgb(225, 231, 231);">
    <h5 style=" ; 
 color:black; 
 text-align:center;
 text-transform:uppercase;
 text-shadow:0 0 10px rgb(53, 56, 56)"> Secure, efficient, and user-friendly healthcare management at your fingertips!
    </h5>
</marquee>


  <?php 
    include ('about.php');
    include('reg_section.php');
    include('book_appo_section.php');
  ?>
<?php
    include('include/foot.php');
?>