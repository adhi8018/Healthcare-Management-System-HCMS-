<!-- profile.php - for admin dashboard admin profile -->
<?php 
include('include/header.php');
include('include/sidebar.php');
?>
<?php
if (!isset($_SESSION['user']) || $_SESSION['role'] != "admin") {
    header("Location:../site/log.php");
    exit();
}
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
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
</div> 

<div class="container">
    <section class="profile" style=" height: 500px;">
        <div class="card shadow-lg p-2 mb-3 bg-body-tertiary rounded" style="box-shadow:  0 8px 11px 0 rgba(0, 0, 0, 0.2), 0 9px 30px 0 rgba(0, 0, 0, 0.19); max-width: 38rem; justify-content: center; text-align: center; align-item:center; margin: auto;">
            <div class="card-header">
                Admin Details
            </div>
            <div class="card-body">
                <table class="table table-hover ">
                    <tr>
                        <th>Name</th>
                        <td><?php echo $_SESSION['name']; ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo $_SESSION['user']; ?></td>
                    </tr>
                    <tr>
                        <th>Contact</th>
                        <td><?php echo $_SESSION['cont']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
</div>   
<?php
include('include/footer.php');
?>