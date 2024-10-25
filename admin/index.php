<?php 
include('auth.php');  
include('includes/header.php');
    include('includes/topbar.php');
    include('includes/sidebar.php');
    include('config/dbcon.php');
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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php include('message.php');?>
     <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          
            
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                    <?php 
                    $query= "SELECT id FROM users ORDER BY id";
                    $query_run= mysqli_query($con, $query);
                    $row= mysqli_num_rows($query_run);                  
                    echo '<h3>'.$row.'</h3>';
                    ?>
                </h3>
                <p>Admin</p>
              </div>
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <a href="registered.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <h3>
                    <?php 
                    $query= "SELECT id FROM userss ORDER BY id";
                    $query_run= mysqli_query($con, $query);
                    $row= mysqli_num_rows($query_run);                  
                    echo '<h3>'.$row.'</h3>';
                    ?>
                </h3>

                <p>Users</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="registered-user.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3> <h3>
                    <?php 
                    $query= "SELECT id FROM bus ORDER BY id";
                    $query_run= mysqli_query($con, $query);
                    $row= mysqli_num_rows($query_run);                  
                    echo '<h3>'.$row.'</h3>';
                    ?>
                </h3></h3>

                <p>Buses</p>
              </div>
              <div class="icon">
                <i class="fa fa-bus"></i>
              </div>
              <a href="bus.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3> <h3>
                    <?php 
                    $query= "SELECT id FROM route ORDER BY id";
                    $query_run= mysqli_query($con, $query);
                    $row= mysqli_num_rows($query_run);                  
                    echo '<h3>'.$row.'</h3>';
                    ?>
                </h3></h3>

                <p>Routes</p>
              </div>
              <div class="icon">
                <i class="fa fa-route"></i>
              </div>
              <a href="routes.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
              <h3>
                    <?php 
                   $query= "SELECT SUM(fare) FROM ticket";
                   $query_run= mysqli_query($con, $query);
                   $row= mysqli_fetch_array($query_run);                  
                   echo '<h3>'.$row["SUM(fare)"].'</h3>';
                    ?>
                     
                                          
                                           
                                               
                </h3>

                <p>Earnings</p>
              </div>
              <div class="icon">
                <i class="fas fa-rupee-sign"></i>
              </div>
              <a href="booking.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg">
              <div class="inner">
              <h3>
              <?php 
                    $query= "SELECT id FROM message ORDER BY id";
                    $query_run= mysqli_query($con, $query);
                    $row= mysqli_num_rows($query_run);                  
                    echo '<h3>'.$row.'</h3>';
                    ?>
                     
                                          
                                           
                                               
                </h3>

                <p>Messages</p>
              </div>
              <div class="icon">
                <i class="fas fa-comment"></i>
              </div>
              <a href="messagee.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>
<?php include('includes/script.php');?>


<?php include('includes/footer.php');?>
