<?php
include('auth.php');

include('includes/header.php');
    include('includes/topbar.php');
    include('includes/sidebar.php');
    include('config\dbcon.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
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
        <input type="text" name="busnumber" class="form-control" placeholder="busno"  required>
          </div>
          <div class="form-group">
        <label for=""> Available Seats</label>
        <input type="number" name="aseats" class="form-control" placeholder="busno" min="15" max="30" required>
          </div>
          <div class="form-group">
        <label for=""> Bus Name</label>
        <input type="text" name="name" class="form-control" placeholder="name"  required>
          </div>
          <div class="form-group">
        <label for="">Departure</label>
        <input type="text" name="depart" class="form-control" placeholder="phone number" required>
          </div>
          <div class="form-group">
        <label for="">Duration</label>
        <input type="time" name="duration" class="form-control" placeholder="username" required>
          </div>
          <div class="form-group">
        <label for="">Arrival</label>
        <input type="text" name="arrival" class="form-control" placeholder="username" required>
          </div>
          
          <div class="form-group">
        <label for="">Departure Date</label>
        <input type="date" name="arrival" class="form-control" placeholder="username" required>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Fare</label>
                  <input type="text" name="fare" class="form-control" placeholder="password" required>
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
                <li class="breadcrumb-item active">Schedule </li>
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
                        <div class="card" >
                            <div class="card-header">
                                <h2 class="card-title"><b>Schedule</b> </h2>
                               
                                <div class=" btn-sm float-right">
                                <form action="" method="post">
          
          
            
             
          
                                <th><b>Bus Number:</b>
              <input type="text" name="date" placeholder="busnumber" required>
            
          <input type="submit" class="btn btn-primary noprint" name="search_btn"value="Search Buses"></th>
       
      </form>
                                </div>
                            </div>
                            <!-- /.card-header -->
                               



                            <div class="card-body"  id="printableArea">
                            <div>
                               

                                </div>
                             


                                <table id="example1" class="table table-bordered table-hover printthis" style="margin-top: 9px;">
                                        <thead>
                                            <tr>
                                            <th>Bus Number</th>
                                                <th>Total Earnning</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                                    if(isset($_POST['search_btn']))
                                                    {
                                                       
                                                        $date = $_POST['date'];

                                                    $query = "SELECT SUM(fare),busnumber FROM ticket WHERE  busnumber='$date'";
                                                    $query_run = mysqli_query($con, $query);

                                                    if(mysqli_num_rows($query_run)>0)
                                                    {
                                                        foreach($query_run as $row) 
                                                        {
                                                        //  echo $row['name'];
                                                        
                                                ?>
                                             
                                            <tr>
                                            <td>    <?php echo $row['busnumber']; ?></td>
                                                <td>₹<?php echo $row['SUM(fare)']; ?></td>
                                               
                                                
                                            </tr>
                                            <?php
                                                    }
                                                }   
                                                    }else{
                                                    ?>
                                                    <tr>
                                                        <td>Search Busnumber to See Earning</td>
                                                    </tr>
                                                    <?php
                                                        }
                                                ?>

                                        </tbody>
                                </table>
                            </div>
                            
                        </div>
                        <input type="button"  class="btn btn-primary btn-sm float-right" onclick="printDiv('printableArea')" value="Print" />
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
  <script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
  </script>
  
</body>
</html>s
<?php include('includes/footer.php');?>
