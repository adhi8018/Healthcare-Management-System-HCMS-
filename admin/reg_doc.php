<!-- reg_doc.php - for admin dashboard manage doctor -->
<?php
include('include/header.php');
include('include/sidebar.php');
include('config/dbcon.php');
?>

<div class="content-wrapper" >
    <!-- Modal -->
    <div class="modal fade" id="AddUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Doctor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form for enter doc details -->
                    <form class="needs-validation" novalidate action="../site/php/doc.php" method="post">
                        <!--  Enter Name -->
                        <div class="form-group row">
                            <label for="validationCustom01" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="validationCustom01" placeholder="Full Name" required name="name">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            </div>
                        </div>
                        <!-- Enter the Qualification -->
                        <div class="form-group row">
                            <label for="validationCustom01" class="col-sm-3 col-form-label">Qualification</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="validationCustom01" placeholder="Qualification" required name="qua">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            </div>
                        </div>
                        <!-- Enter the Specialization -->
                        <div class="form-group row">
                            <label for="validationCustom01" class="col-sm-3 col-form-label">Specialization</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="validationCustom01" placeholder="Specialization" required name="spec">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            </div>
                        </div>
                        <!--  Enter Email -->
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="abc@gmail.com" name="mail">
                            </div>
                        </div>
                        <!--    Enter Contact No. -->
                        <div class="form-group row">
                            <label for="inputPhone3" class="col-sm-3 col-form-label">Contact </label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputPhone3" placeholder="Contact no" name="contact">
                            </div>
                        </div>
                        <!-- Enter the Availability -->
                        <div class="form-group row">
                            <label for="validationCustom01" class="col-sm-3 col-form-label">Availability</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="validationCustom01" placeholder="In this Form (Mon-Sat,9 Am to 5PM)" required name="avalible">
                            <div class="valid-feedback" >
                                Looks good!
                            </div>
                            </div>
                        </div>           
                        <!--  Enter the password -->
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                            <input type="password" class="form-control" id="inputPassword3" name="pass">
                            <small id="passwordHelpInline" class="text-muted">
                                Must be 8-20 characters long.
                            </small>
                            </div>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Breadcrumb -->
    <div class="content-header" style="margin: 35px; margin-left: 110px;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item active">Manage Doctor</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content  -->
<div class="container">
    <div class="row">
        <div class="col-md-10 sm-6"><h2>Manage Doctor</h2></div>
        <div class="col-md-2 sm-6 ms-auto"><button data-toggle="modal" data-target="#AddUserModal" class="btn btn-primary btn-sm m-2 float-right" >Add Doctor</button></div>
    </div>
    <table id="myTable" class="table table-light table-hover" style=" box-shadow:  0 8px 11px 0 rgba(0, 0, 0, 0.2), 0 9px 30px 0 rgba(0, 0, 0, 0.19); width:100%; border-radius: 15px;">
        <thead class="table-primary">
            <tr>
                <th >ID</th>
                <th >Name</th>
                <th>Qualification</th>
                <th>Specialization</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Availability</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query="SELECT*FROM doc";
                $query_run = mysqli_query($conn,$query);
                if(mysqli_num_rows($query_run)>0)
                {
                    foreach($query_run as $row)
                    {
                        echo '<tr>
                        <td>'.$row['doc_id'].'</td>
                        <td>'.$row['doc_name'].'</td>
                        <td>'.$row['doc_qua'].'</td>
                        <td>'.$row['doc_spec'].'</td>
                        <td>'.$row['doc_email'].'</td>
                        <td>'.$row['doc_phone'].'</td>
                        <td>'.$row['doc_ava'].'</td>
                        <td>
                            <a href="reg_doc_edit.php?doc_id='.$row['doc_id'].'" class="btn btn-info btn-sm m-2">Edit </<a>
                            <a href="del_doc.php?doc_id='.$row['doc_id'].'" class="btn btn-info btn-sm" onclick="return confirm(`Are you sure you want to delete this doctor?`);">Delete </<a>
                        </td>
                    </tr>';
                    }
                }
            ?>
        </tbody>   
    </table>
</div>
<?php
include('include/footer.php');
?>