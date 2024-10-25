<?php
session_start();
include('auth.php');
    include('config/dbcon.php');

if(isset($_POST['addbus']))
    {
        $name = $_POST['name'];
        $number = $_POST['number'];              
                $user_query = "INSERT into bus(busname,busnumber) values('$name','$number')";
                $user_query_run = mysqli_query($con ,$user_query);
                if($user_query_run)
                {
                    $_SESSION['status']= "Bus Added Successfully";
                    header("Location:bus.php");
                }
           else
           {
            $_SESSION['status']= "Bus not Added ";
            header("Location:bus.php");
           }
  }

  if(isset($_POST['update']))
    {
        $bus_id = $_POST['bus_id'];
        $name = $_POST['busname'];
        $phone = $_POST['busnumber'];  
        $query= "UPDATE bus SET busname='$name', busnumber='$phone' WHERE id='$bus_id'";
        $query_run = mysqli_query($con, $query);
        if($query_run)
        {
            $_SESSION['status']= "Bus Info updated Successfully";
            header("Location:bus.php");
        }
   else
   {
    $_SESSION['status']= "Bus Info not updated ";
    header("Location:bus.php");
   }
    }

    if(isset($_POST['DeleteUserbtn']))
    {
      $bus_id = $_POST['delete_id'];
      $query= "DELETE FROM bus WHERE id='$bus_id'";
        $query_run = mysqli_query($con, $query);
        if($query_run)
        {
            $_SESSION['status']= "Route deleted Successfully";
            header("Location:bus.php");
        }
   else
   {
    $_SESSION['status']= "Route not deleted ";
    header("Location:bus.php");
   }
}

?>