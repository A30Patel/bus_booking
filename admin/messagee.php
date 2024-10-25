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
        <h5 class="modal-title" id="exampleModalLabel">Add Bus</h5>
      </div>
      <form action="buscode.php" method="POST">
      <div class="modal-body">
          <div class="form-group">
        <label for="">Bus Name</label>
        <input type="text" name="name" class="form-control" placeholder=" Bus name"  required>
          </div>
          <div class="form-group">
        <label for="">Bus Number</label>
        <input type="text" name="number" class="form-control" placeholder="Bus number" required>
          </div>
          <div class="form-group">
        
          </div>
          <div class="form-group">
            

          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="addbus" class="btn btn-primary">Save</button>
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
                <li class="breadcrumb-item active">Message</li>
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><b>Messages</b> </h3>
                               
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th> Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                                <?php
                                                    $query = "SELECT * FROM message";
                                                    $query_run = mysqli_query($con, $query);

                                                    if(mysqli_num_rows($query_run)>0)
                                                    {
                                                        foreach($query_run as $row)
                                                        {
                                                        //  echo $row['name'];
                                                ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['number']; ?></td>     
                                                <td><?php echo $row['subject']; ?></td>     
                                                <td><?php echo $row['message']; ?></td>                                       
                                                <td><a href="reply.php?reply_id=<?php echo $row['id']; ?>" class="btn btn-info">Reply</a>
                                                
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
        var $user_id = $(this).val();
      //  console.log(user_id);

        $('.delete_user_id').val($user_id);
        $('#DeleteModal').modal('show');
      });
    });
  </script>

<?php include('includes/footer.php');?>
