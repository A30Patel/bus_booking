<?php

include('./admin/auth.php');
include('./admin/config/dbcon.php');

if(isset($_POST['bookbtn']))

    { 
        $uid= $_SESSION['auth_user']['user_id'];
        $bus = $_POST['pname'];
        $name = $_POST['busnumber'];
        $phone = $_POST['busname'];
        $date = $_POST['date'];
        $username = $_POST['departure'];
        $password = $_POST['duration'];
        $ss = $_POST['arrival'];
        $sss= $_POST['seat'];
        $ssss = $_POST['price'];
        $sssss = $_POST['pay'];
        
                $user_query = "INSERT INTO ticket (uid,pname,busnumber,busname,date,departure,duration,arrival,seat,fare,pay) VALUES($uid,'$bus','$name','$phone','$date','$username','$password','$ss','$sss','$ssss','$sssss')";
                $user_query_run = mysqli_query($con,$user_query);
                if($user_query_run)
                {
                    
                    $name = $_POST['busnumber'];   
                    $add="SELECT (route.aseats - ticket.seat) as total FROM route, ticket WHERE route.busnumber = '$name' AND ticket.busnumber = '$name'"; 
                    $result = mysqli_query($con, $add); 
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
                    echo $row['total']; 
                
                    
                if($result)
                {
                    $name = $_POST['busnumber'];  
                    $sql = "UPDATE route SET aseats='$row[total]' WHERE busnumber='$name'";
                    $sql_run=mysqli_query($con,$sql);
                    echo"<script>
                    alert('Ticket Booked Succesfully!v Check Ticket Tab.');
                    window.location.href='ticket.php';
                    </script>"; 
                }
                   
                
            }
                         
           else
           {
            $_SESSION['status']= " not Added ";
            header("Location:ticket.php");
           }
  
}
  ?>
