<?php
include('auth.php');

include('includes/header.php');
    include('includes/topbar.php');
    include('includes/sidebar.php');
    include('config\dbcon.php');

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Add Modal -->
<div class="modal fade" id="AddUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Routes</h5>
      </div>
      <form action="routecode.php" method="POST">
      <div class="modal-body">
      <div class="form-group">
        <label for=""> Bus No</label>
        <input type="text" name="busnumber" class="form-control" placeholder="busno" minlength="3" maxlength="12"  required>
          </div>
          <div class="form-group">
        <label for=""> Available Seats</label>
        <input type="number" name="aseats" class="form-control" placeholder="total seats" min="15" max="30" required>
          </div>
          <div class="form-group">
        <label for=""> Bus Name</label>
        <input type="text" name="name" class="form-control" placeholder="bus name" minlength="3" maxlength="12" required>
          </div>
          <div class="form-group">
        <label for="">Departure</label>
        <input type="text" name="depart" class="form-control" placeholder="from" minlength="3" maxlength="12" required>
          </div>
          <div class="form-group">
        <label for="">Duration</label>
        <input type="time" name="duration" class="form-control" placeholder="time" required>
          </div>
          <div class="form-group">
        <label for="">Arrival</label>
        <input type="text" name="arrival" class="form-control" placeholder="to"  minlength="3" maxlength="12" required>
          </div>
          
          <div class="form-group">
        <label for="">Departure Date</label>
        <input type="date" name="arrival" class="form-control" placeholder="on" required>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Fare</label>
                  <input type="text" name="fare" class="form-control" placeholder="fare"  minlength="3" maxlength="5"required>
                </div>
              </div>
                
              </div>



          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="addroute" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
    </div>

    <!--Delete Modal -->
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="routecode.php" method="POST">
      <div class="modal-body">
        <input type="hidden" name="delete_id" class="delete_user_id">
        <p>
          Are u Sure want delete?
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>  
        <button type="submit" name="DeleteUserbtn" class="btn btn-primary">Yes</button>
      </div>
      </form>

  </div>
    </div>
  </div>

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
                <li class="breadcrumb-item active">Routes</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php

                        if (isset($_SESSION['status'])) {
                        echo '<h2  >' . $_SESSION['status'] . '</h2>';
                        unset($_SESSION['status']);
                        }
                        ?>
                        <div class="card" id="printableArea">
                            <div class="card-header" >
                                <h2 class="card-title" ><b>Routes</b></h2>
                                <a href="#" data-toggle="modal" data-target="#AddUserModal" class="btn btn-primary btn-sm float-right">Add Routes</a>
                                <a href="export/exportroute.php"  class="btn btn-primary btn-sm float-right" style="margin-right: 2px;">Export to Excel </a>
                            </div>
                            
                            <!-- /.card-header -->
                            <div class="card-body" id="printableArea" >
                                <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Bus Number</th>
                                                <th>Bus Name</th>
                                                <th>Departure</th>
                                                <th>Departure Date</th>
                                                <th>Departure Time</th>
                                                <th>Arrival</th>
                                                <th>Availabie Seats</th>
                                                <th>Fare</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>

                                                <?php
                                                    $query = "SELECT * FROM route";
                                                    $query_run = mysqli_query($con, $query);

                                                    if(mysqli_num_rows($query_run)>0)
                                                    {
                                                        foreach($query_run as $row)
                                                        {
                                                        //  echo $row['name'];
                                                ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['busnumber']; ?></td>
                                                <td><?php echo $row['busname']; ?></td>
                                                <td><?php echo $row['departure']; ?></td>
                                                <td><?php echo $row['date']; ?></td>
                                                <td><?php echo $row['duration']; ?></td>
                                                <td><?php echo $row['arrival']; ?></td>
                                                <td><?php echo $row['aseats']; ?></td>
                                                <td>₹<?php echo $row['fare']; ?></td>
                                                <td><a href="route-edit.php?route_id=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                                                <button type="button" value="<?php echo $row['id']; ?>" data-target="#DeleteModal" class="btn btn-danger deletebtn">Delete</button>
                                                </td>
                                            </tr>
                                                <?php
                                                    }
                                                    }else{
                                                    ?>
                                                    <tr>
                                                        <td>No data Found</td>
                                                    </tr>
                                                    <?php
                                                        }
                                                ?>

                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php include('includes/script.php');?>








  <script>
    $(document).ready(function() {
      $('.deletebtn').click(function(e) {

        e.preventDefault();
        var $route_id = $(this).val();
      //  console.log(route_id);

        $('.delete_user_id').val($route_id);
        $('#DeleteModal').modal('show');
      });
    });

   
  </script>

<?php include('includes/footer.php');?>
