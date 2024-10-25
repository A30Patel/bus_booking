<?php
include('./admin/config/dbcon.php');  
                                    if(isset($_POST['cancelbtn']))
                                    {
                                        $name = $_POST['busnumber'];   
                                        $add="SELECT (ticket.seat + route.aseats) as total FROM  ticket,route WHERE route.busnumber = '$name' AND ticket.busnumber = '$name'"; 
                                        $result = mysqli_query($con, $add); 
                                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
                                        echo $row['total']; 
                                    if($result)
                                    {
                                        $name = $_POST['busnumber'];  
                                        $sql = "UPDATE route SET aseats='$row[total]' WHERE busnumber='$name'";
                                        $sql_run=mysqli_query($con,$sql);
                                        
                                    
                                        
                                    if($sql_run)
                                    {
                                        $user_id = $_POST['cancel'];
                                    $query= "DELETE FROM ticket WHERE id='$user_id'";
                                    $query_run = mysqli_query($con, $query);
                                        
                                    echo"<script>
                                    alert('Ticket Cancelled');
                                    window.location.href='ticket.php';
                                    </script>";
                                    }
                                       
                                    
                                
                                    
                                    }
                                    else
                                    {
                                        header('location: ticket.php');
                                        echo "Ticket Canceled Unsuccessfully";
                                    }
                                }
                            
                                             ?>
     