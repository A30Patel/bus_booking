<?php
session_start();
include('auth.php');
    include('config/dbcon.php');

    if(isset($_POST['logout_btn']))
    {
      //session_destroy();
      unset($_SESSION['auth']);
      unset($_SESSION['auth_user']);

      $_SESSION['status'] = "logged out successfully";
      header("Location: login.php");
      exit(0);
    }

    if(isset($_POST['check_username']))
    {
        $username = $_POST['username'];

        $checkusername = "SELECT username FROM users WHERE username ='$username'";
        $checkusername_run = mysqli_query($con,$checkusername);

        if(mysqli_num_rows($checkusername_run) > 0)
        {
         echo "username taken";
        }
        else 
        {
            echo "it available";    
        }


    }

    if(isset($_POST['adduser']))
    {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $username =trim($_POST["username"]);
        $password = $_POST['password'];
        $conpassword = $_POST['confirmpassword'];

        if($password == $conpassword)
        {
            $checkusername = "SELECT username FROM users WHERE username ='$username'";
            $checkusername_run = mysqli_query($con,$checkusername);

            if(mysqli_num_rows($checkusername_run) > 0)
            {
              $_SESSION['status']= "Username Taken";
              header("Location:registered.php");
              exit;
            }
              else{
                $user_query = "INSERT into users(name,phone,username,password) values('$name','$phone','$username','$password')";
                $user_query_run = mysqli_query($con ,$user_query);
                if($user_query_run)
                {
                    $_SESSION['status']= "Users Added Successfully";
                    header("Location:registered.php");
                }
           else
           {
            $_SESSION['status']= "Users not Added ";
            header("Location:registered.php");
           }

            }
        }

      else {

        $_SESSION['status']= "Password not match ";
        header("Location:registered.php");

      }
        }



    if(isset($_POST['update']))
    {
        $user_id = $_POST['user_id'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $username =trim($_POST["username"]);
        $password = $_POST['password'];

        $query= "UPDATE users SET name='$name', phone='$phone', username='$username',password='$password' WHERE id='$user_id'";
        $query_run = mysqli_query($con, $query);
        if($query_run)
        {
            $_SESSION['status']= "Users updated Successfully";
            header("Location:registered.php");
        }
   else
   {
    $_SESSION['status']= "Users not updated ";
    header("Location:registered.php");
   }



}
if(isset($_POST['DeleteUserbtn']))
    {
      $user_id = $_POST['delete_id'];
      $query= "DELETE FROM ticket WHERE id='$user_id'";
        $query_run = mysqli_query($con, $query);
        if($query_run)
        {
            $_SESSION['status']= "Ticket deleted Successfully";
            header("Location:booking.php");
        }
   else
   {
    $_SESSION['status']= "Ticket not deleted ";
    header("Location:booking.php");
   }
}


?>
