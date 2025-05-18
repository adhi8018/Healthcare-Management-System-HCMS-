<!-- index.php - for admin dashboard  -->
<?php 
include('include/header.php');
include('include/sidebar.php');
?>

<?php if (isset($_SESSION['status'])): ?>
    <div class="alert alert-info alert-dismissible fade show container" role="alert">
        <?= $_SESSION['status']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php unset($_SESSION['status']); // Clear message after displaying ?>
<?php endif; ?>



<?php   
include('include/content.php');
include('include/footer.php');
?>