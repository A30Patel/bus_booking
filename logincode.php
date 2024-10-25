<?php

session_start();
include('./admin/config/dbcon.php');

if(isset($_POST['logout_btn']))
    {
      session_destroy();
      unset($_SESSION['auth']);
      unset($_SESSION['auth_user']);

      $_SESSION['status'] = "logged out successfully";
      header("Location: login.php");
      exit(0);
    }
    
if(isset($_POST['login_btn']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $log_query= "SELECT * FROM userss WHERE username='$username' AND password='$password'   LIMIT 1";
    $log_query_run = mysqli_query($con, $log_query);
    
    if(mysqli_num_rows($log_query_run) > 0)
    {
        foreach($log_query_run as $row){
            $user_id = $row['id'];
            $user_name = $row['name'];
            $user_username = $row['username'];
           
        }

        $_SESSION['auth']= true;
        $_SESSION['auth_user'] = [
            'user_id'=>$user_id,
            'user_name'=>$user_name,
            'user_username'=>$user_username,
            
        ];

        echo"<script>
        alert('Welcome $username');
        window.location.href='user.php';
        </script>";
        
    }
    else
    {
      echo"<script>
      alert(' Credential Not Matched');
      window.location.href='login.php';
      </script>";
       
       }
}



if(isset($_POST['adduser']))
{
    $name = $_POST['name'];
    $username =trim($_POST["username"]);
    $password = $_POST['password'];
    $conpassword = $_POST['confirmpassword'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = "profile/upload_img/".$filename;
    if($password == $conpassword)
    {
        $checkusername = "SELECT username FROM userss WHERE username ='$username'";
        $checkusername_run = mysqli_query($con,$checkusername);

        if(mysqli_num_rows($checkusername_run) > 0)
        {
          echo"<script>
          alert('User Name Taken');
          window.location.href='login.php';
          </script>";
          exit;
        }
          else{
            $user_query = "INSERT into userss (name,username,password,img) values('$name','$username','$password','$filename')";
            $user_query_run = mysqli_query($con ,$user_query);
            if($user_query_run)
            {
              move_uploaded_file($tempname, $folder);
              echo"<script>
              alert('User Added Successfully'); 
              window.location.href='login.php';
              </script>";
            }
       else
       {
        echo"<script>
        alert('User Name Taken');
        window.location.href='login.php';
        </script>";
       }

        }
    }

  else {

    echo"<script>
  alert('Password not match');
  window.location.href='login.php';
  </script>";
  }
}
?>