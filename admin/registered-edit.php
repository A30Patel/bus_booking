<?php
include('auth.php');

include('includes/header.php');
    include('includes/topbar.php');
    include('includes/sidebar.php');
    include('config\dbcon.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

 <!-- Content Header (Page header) -->
 <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Registered Admin</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
     <!-- /.content-header -->
     <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><b>Edit Registered Admin</b></h3>
                                <a href="registered.php"  class="btn btn-danger btn-sm float-right">Back</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row"><div class="col-md-6">
                            <form action="code.php" method="POST">
                                          <div class="modal-body">
                                        <?php
                                    if(isset($_GET['user_id']))
                                    {
                                    $user_id = $_GET['user_id'];
                                    $query= "SELECT * FROM users WHERE id='$user_id'";
                                    $query_run = mysqli_query($con, $query);
                                    if(mysqli_num_rows ($query_run) > 0)
                                    {
                                    foreach($query_run as $row)
                                    {
                                             ?>
                                                <div class="form-group">
                                                  <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['id']; ?>">
                                                        <label for="">Name</label>
                                                        <input type="text" name="name" class="form-control"  minlength="3" maxlength="12" value="<?php echo $row['name']; ?>" placeholder="name" required>
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="">Phone Number</label>
                                                        <input type="text" name="phone" class="form-control"  minlength="10" maxlength="10" value="<?php echo $row['phone']; ?>" placeholder="phone number" required >
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="">Username</label>
                                                <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>"  minlength="3" maxlength="12" placeholder="username" required>
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="">Password</label>
                                                        <input type="password" name="password" class="form-control" value="<?php echo $row['password']; ?>" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number min char6."  placeholder="password" required>
                                                        </div>
                                                    </div>

                                                <?php
                                                                }
                                                                }
                                                                else
                                                                {
                                                                echo "<h4>No Record Found. !</h4>";
                                                                }
                                                                }
                                                                 ?>


                                                                    <div class="modal-footer">

                                                                        <button type="submit" name="update" class="btn btn-info">Update</button>
                                                                    </div>
                                                                    </form>
                                                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
     </section>
 </div>
</div>


<?php include('includes/script.php');?>


<?php include('includes/footer.php');?>
