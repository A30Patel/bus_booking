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
        <h5 class="modal-title" id="exampleModalLabel">Register Admin</h5>
      </div>
      <form action="code.php" method="POST">
      <div class="modal-body">
          <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" class="form-control" placeholder="name"  required>
          </div>
          <div class="form-group">
        <label for="">Phone Number</label>
        <input type="text" name="phone" class="form-control" placeholder="phone number" required>
          </div>
          <div class="form-group">
        <label for="">Username</label>
        <span class="username_error"></span>
        <input type="text" name="username" class="form-control username_id" placeholder="username" required>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="password" required>
                </div>
              </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" name="confirmpassword" class="form-control" placeholder="confirm password" required>
                  </div>
                </div>
              </div>



          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="adduser" class="btn btn-primary">Save</button>
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
      <form action="usercode.php" method="POST">
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
                <li class="breadcrumb-item active">Registered Users</li>
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
                                <h3 class="card-title"><b>Registered Users</b></h3>
                                <a href="export/exportuser.php"  class="btn btn-primary btn-sm float-right" style="margin-right: 2px;">Export to Excel </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Birth Date</th>
                                                <th>Address</th>
                                                <th>City</th>
                                                <th>State</th>
                                                <th>Pincode</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                                <?php
                                                    $query = "SELECT * FROM userss";
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
                                                <td><?php echo $row['username']; ?></td>
                                                <td><?php echo $row['password']; ?></td>
                                                <td><?php echo $row['dob']; ?></td>
                                                <td><?php echo $row['address']; ?></td>
                                                <td><?php echo $row['city']; ?></td>
                                                <td><?php echo $row['state']; ?></td>
                                                <td><?php echo $row['pincode']; ?></td>
                                                <td>
                                                
                                                    <a href="registered-user-edit.php?user_id=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
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
