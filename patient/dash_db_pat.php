<!-- dash_db_pat.php - for patient dashboard -->
<?php
    include('config/dbcon_pat.php');
    include('include/header.php');
    include('include/sidebar.php');
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
                            <li class="breadcrumb-item"><a href="dash_db_pat.php">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
   <h5>Welcome, Patient <?php echo htmlspecialchars($_SESSION['name']); ?>!</h5>   
   <div class="card-deck">
        <a class="card custom_card mt-3 mb-4" href="book_appo.php" 
           style="max-width: 350px;box-shadow: 0 8px 11px 0 rgba(0, 0, 0, 0.2), 0 9px 30px 0 rgba(0, 0, 0, 0.19); text-decoration: none; transition: transform 0.3s;"
           onmouseover="this.style.transform='scale(1.05)'" 
           onmouseout="this.style.transform='scale(1)';">
            <img class="card-img-top" src="./assets/img/card3.png" alt="Card image cap" height="220px" width="200px">
            <div class="card-body"> 
                <h5 class="card-title">Total No. Appointment Booking</h5>
                <p class="card-text"> <?php
                        $patient_id = $_SESSION['patient_id']; // Get logged-in patient ID
                        $query = "SELECT COUNT(*) as total FROM appointment WHERE patient_id = '$patient_id'";
                        $result = mysqli_query($conn, $query);
                        $row = mysqli_fetch_assoc($result);
                        echo $row['total'] > 0 ? $row['total'] : "No Data";
                    ?></p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </a>
    </div>
</div>
<?php
    
    include('include/footer.php');
?>