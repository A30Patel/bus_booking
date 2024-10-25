<?php

include('auth.php');
    include('config/dbcon.php');


    if(isset($_POST['update']))
    {
        $id = $_POST['bus_id'];
        $reply = $_POST['message'];
        $query= "UPDATE message SET reply='$reply' WHERE id='$id'";
        $query_run = mysqli_query($con, $query);
        if($query_run)
        {
            $_SESSION['status']= "Reply  Successfully";  
            header("Location:messagee.php");
        }
   else
   {
    $_SESSION['status']= "Route not updated ";
    header("Location:reply.php");
   }
    }

   

?>