 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <div class="dropdown">
         
          <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
          <i class="fa fa-user"></i>
          
            <?php 
            if(isset($_SESSION['auth']))
            {
            echo $_SESSION['auth_user']['user_name']; 
            }
            else{
               echo "not logged in";
            }
            ?>
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
         
            <a class="dropdown-item" href="admininfo.php" name="user">Profile</a>
            
          
              <form action="code.php" method="POST">
              <button type="submit" name="logout_btn" class="dropdown-item">Logout</button>
            </form>
          </div>
        </div>        
      </li>
      <!-- Messages Dropdown Menu -->
    </ul>
  </nav>
  