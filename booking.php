<?php
include('./admin/auth.php');
include('./admin/config/dbcon.php');

 


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus India | Ticket Form</title>
    <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>
<!-- swiper css link  -->
<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="style1.css">
    <script language="javascript" type="text/javascript" src="f.js"></script>
    <style> 
.btn:hover {
  background: rgba(255, 165, 0, 0.2);
  color: #ffa500 !important;
}
.btn-increment-decrement {
  display: inline-block;
  padding: 5px 0px;
  background: #e2e2e2;
  width: 30px;
  text-align: center;
  cursor:pointer;
}

</style>
<script language="javascript" type="text/javascript" src="f.js"></script>
<script>
    var inputLtc = document.getElementById('input-ltc'),
    inputBtc = document.getElementById('input-btc');

var constantNumber = <?php echo $row['fare']?>;

inputLtc.onchange = function() {
    var result = parseFloat(inputLtc.value) * constantNumber;
    inputBtc.value = !isNaN(result) ? result : '';
};
</script>
</head>

<body>
    
   

    <!-- header section starts  -->

    <header>

        <div id="menu-bar" class="fas fa-bars"></div>

        <a href="#" class="logo"><span>B</span>us India</a>

        <nav class="navbar">
        <a href="user.php" > Home</a>
                
                <a href="ticket.php" >Ticket</a>
                <a href="profile/profile.php" >
            
                <?php 
                if(isset($_SESSION['auth']))
                {
                echo $_SESSION['auth_user']['user_name']; 
                }
                else{
                echo "not logged in";
                }
                ?></a>
            
            <a href="logout.php" >Logout</a>
            </nav>

        </nav>

        

        

    </header>

    <!-- header section ends -->
   <!-- home section starts  -->

<section class="home" id="home">

</section>



    <section class="book" id="book">
    <script>function myfun()
    {
        var a=document.getElementById('num1').value;
        var b=document.getElementById('num2').value;
        document.getElementById('result').value=(a*b);
    }
    </script>
        

        <div class="row">

            <div class="image">
                <img src="images/book-img.png" alt="">
            </div>
            

           <form action="tickett.php" method="post">
           <?php

                                    if(isset($_GET['route_id']))
                                    {
                                        
                                    $route_id = $_GET['route_id'];
                                    $query = "SELECT * FROM route WHERE id='$route_id'";
                                    $query_run = mysqli_query($con, $query);
                                    if(mysqli_num_rows ($query_run) > 0)
                                    {
                                    foreach($query_run as $row)
                                    {
                                             ?>
                                              

           <h1 class="heading" style="margin-top: 50px; padding-bottom:2rem;">
            <span>B</span>
            <span>O</span>
            <span>O</span>
            <span>K</span>
            
            <span class="space"></span>
            <span>N</span>
             <span>O</span>
              <span>W</span>
             </h1>
             <input type="hidden" name="id" placeholder="" required>
                <div class="inputBox">
                    <h3>Name</h3>
                    <input type="text" name="pname" placeholder="" minlength="3" maxlength="20" required>
                </div>
                <div class="inputBox">
                    <h3>Date of Travel</h3>
                    <input type="date"   name="date" placeholder="" value="<?php echo $row['date']; ?>" required>
                </div>
                <div class="inputBox">
                    <h3>Bus Number</h3>
                    <input type="text" name="busnumber" placeholder="" value="<?php echo $row['busnumber']; ?>" >
                    
                </div>
                <div class="inputBox">
                    <h3>Bus Name</h3>
                    <input type="text" name="busname" placeholder="" value="<?php echo $row['busname']; ?>" >
                    
                </div>
                <div class="inputBox">
                    
                <div class="inputBox">
                    <h3>Departure</h3>
                    <input type="text" name="departure" placeholder="" value="<?php echo $row['departure']; ?>" >
                </div>
                <div class="inputBox">
                    <h3>Departure Time</h3>
                    <input type="text" name="duration" placeholder="" value="<?php echo $row['duration']; ?>" >
                </div>
                <div class="inputBox">
                    <h3>Arrival</h3>
                    <input type="text" name="arrival" placeholder="" value="<?php echo $row['arrival']; ?>" >
                </div>
               <div class="inputBox">
    <h3>Seat</h3>
    <input type="number" name="seat" min="1" max="5" id="num1" required>
</div>
                                        
                
                <div class="inputBox">
                    <h3>Fare</h3>
                    <input type="text" name="fare" id="num2" value="<?php echo $row['fare']; ?>" disabled>
                    
                </div>
               
               
                <div class="inputBox">
                    <h3>Total Fare</h3>
                    <input type="text" name="price" id="result" required>
                    
                </div>
                <div class="inputBox" >
                    <h3>Paymnet</h3>
                    <select name="pay" style="width: -moz-available;
  padding-top: 1.25rem;padding-bottom: 1.25rem; font-size:2rem; display: flex; text-align:center;  margin-bottom: 1.5rem;">
                        <option value="select" hidden>Select</option>
                        <option value="Cash">Cash Payment</option>
                        <option value="Net Banking">Net Banking</option>
                        <option value="Card Payment">Card Payment</option>
                    </select>
                    
                </div>
                <button type="submit" class="btn" name="bookbtn" style="color: #fff;"  onclick="bookNow()">Book</button>
                
                <?php
                                                                }
                                                                }
                                                                else
                                                                {
                                                                echo "<h4>No Record Found. !</h4>";
                                                                }
                                                                }
                                                                 ?>
                
            </form>

        </div>

    </section>

  
  
    <!-- brand section  -->
    <section class="brand-container">

      

    </section>

    <!-- footer section  -->

    <section class="footer" style="margin-top: 50px;">

        <div class="box-container">

        
            <div class="box">
            <label>follow us</label>
                <a href="https://www.facebook.com/login/" class="fab fa-facebook-f"></a>
                <a href="https://www.instagram.com/accounts/login/" class="fab fa-instagram"></a>
                <a href="https://twitter.com/i/flow/login" class="fab fa-twitter"></a>
                <a href="https://www.linkedin.com/login?fromSignIn=true&trk=guest_homepage-basic_nav-header-signin" class="fab fa-linkedin"></a>

            </div>

        </div>

        <h1 class="credit"> created by: Bus India<span>  </span> | &#169 2022 all rights reserved! </h1>

    </section>










    <script>
function bookNow() {
    const seatInput = document.getElementById("num1");
    const seatNumber = parseInt(seatInput.value);

    // Check if the seat number is within the valid range
    if (seatNumber >= 1 && seatNumber <= 5) {
        alert("Booking successful!");
    } else {
        alert("Please enter a valid seat number between 1 and 5.");
        seatInput.focus(); // Focus back on the input field for correction
    }
}
</script>





    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="index.js"></script>
    
</body>
<script src="booking.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</html>
