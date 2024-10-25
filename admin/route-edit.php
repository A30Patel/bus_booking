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
                <li class="breadcrumb-item active">Registered Users</li>
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
                                <h3 class="card-title">Edit Route </h3>
                                <a href="routes.php"  class="btn btn-danger btn-sm float-right">Back</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row"><div class="col-md-6">
                            <form action="routecode.php" method="POST">
                                          <div class="modal-body">
                                        <?php
                                    if(isset($_GET['route_id']))
                                    {
                                    $route_id = $_GET['route_id'];
                                    $query = "SELECT * FROM route WHERE id='$route_id'";
                                    $query_run = mysqli_query($con, $query);
                                    if(mysqli_num_rows ($query_run) > 0)
                                    {
                                    foreach($query_run as $row)
                                    {
                                             ?>
                                                <div class="form-group">
                                                  <input type="hidden" name="route_id" class="form-control" value="<?php echo $row['id']; ?>">
                                                  <div class="form-group">
                                                        <label for="">Bus Number</label>
                                                        <input type="text" name="busnumber" class="form-control" value="<?php echo $row['busnumber']; ?>" placeholder="Bus number" required >
                                                        </div>
                                                        <label for="">Bus Name</label>
                                                        <input type="text" name="name" class="form-control" value="<?php echo $row['busname']; ?>" placeholder="name" required>
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="">Depature</label>
                                                        <input type="text" name="depart" class="form-control" value="<?php echo $row['departure']; ?>" placeholder="phone number" required >
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                        <label for="">Duration</label>
                                                <input type="time" name="duration" class="form-control" value="<?php echo $row['duration']; ?>" placeholder="username" required>
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="">Arrival</label>
                                                        <input type="text" name="arrival" class="form-control" value="<?php echo $row['arrival']; ?>" placeholder="password" required>
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="">Fare</label>
                                                        <input type="text" name="fare" class="form-control" value="<?php echo $row['fare']; ?>" placeholder="password" required>
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="">Available Seats</label>
                                                        <input type="number" name="aseats" min="15" max="30"class="form-control" value="<?php echo $row['aseats']; ?>" placeholder="password" required>
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="">Depature Date</label>
                                                        <input type="date" name="date" class="form-control" value="<?php echo $row['date']; ?>" placeholder="phone number" required >
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
