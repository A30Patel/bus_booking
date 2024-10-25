<?php
$host= "sql12.freemysqlhosting.net";
$username= "sql12740588";
$password= "D4Bk3REvKV";
$database= "sql12740588";

// connections 

$con = mysqli_connect("$host","$username","$password","$database");

if(!$con)
{
    header("Location: ../errors/db.php");
    die();
}
//else
//{
//    echo"connected";
//}
?>
