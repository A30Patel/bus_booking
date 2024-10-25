<?php
    include('./admin/auth.php');
    include('./admin/config/dbcon.php');
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bus India| <?php   echo $_SESSION['auth_user']['user_name']; ?></title>

    <!-- swiper css link  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <!-- custom css file link  -->
        <link rel="stylesheet" href="index.css">
       <style>
           .review .box-container:hover {
    box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.1);
}

       </style>
    </head>

    <body>

        <!-- header section starts  -->

        <header>

            <div id="menu-bar" class="fas fa-bars"></div>

            <a href="#" class="logo"><span>B</span>us India</a>

            <nav class="navbar">
                
                <a href="#home" > Home</a>
                <a href="#book" >Search</a>
                <a href="#services" >services</a>
                <a href="#gallery" >Gallery</a>
                <a href="#review" >About Us</a>
                <a href="#contact" >Contact Us</a>
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

            



        </header>

    <!-- header section ends -->
   <!-- home section starts  -->

<section class="home" id="home">

<div class="swiper home-slider">

   <div class="swiper-wrapper">

      <div class="swiper-slide slide" style="background:url(images1/home-slide-1.jpg) no-repeat">
         <div class="content">
            
           
            
         </div>
      </div>

      <div class="swiper-slide slide" style="background:url(images1/home-slide-2.jpg) no-repeat">
         <div class="content">
            
            
         </div>
      </div>

      <div class="swiper-slide slide" style="background:url(images1/home-slide-3.jpg) no-repeat">
         <div class="content">
            

            
         </div>
      </div>
      
   </div>

   <div class="swiper-button-next"></div>
   <div class="swiper-button-prev"></div>

</div>

</section>

<!-- home section ends -->


    <!-- book section starts  -->

    <section class="book" id="book">

        <h1 class="heading">
            <span>S</span>
            <span>E</span>
            <span>A</span>
            <span>R</span>
            <span>C</span>
            <span>H</span>
            <span class="space"></span>
            <span>B</span>
             <span>U</span>
              <span>S</span>
              <span>E</span>
              <span>S</span>
        </h1>

        <div class="row">

            <div class="image">
                <img src="images/book-img.png" alt="">
            </div>

            <form action="searchcode.php" method="post">
          
                <div class="inputBox">
                    <h3>Source</h3>
                    <input type="text" name="form" placeholder="from" required>
                </div>
                <div class="inputBox">
                    <h3>Destination</h3>
                    <input type="text" name="to" placeholder="to" required>
                </div>
                <div class="inputBox">
                    <h3>Travel Date</h3>
                    <input type="date" name="date" placeholder="to" required>
                </div>
                <input type="submit" class="btn" name="search_btn"value="Search Buses">
            </form>

        </div>

    </section>

    <!-- book section ends -->

   

    <!-- services section starts  -->

    <section class="services" id="services">

        <h1 class="heading">
            <span>s</span>
            <span>e</span>
            <span>r</span>
            <span>v</span>
            <span>i</span>
            <span>c</span>
            <span>e</span>
            <span>s</span>
        </h1>

        <div class="box-container">

            
            
            <div class="box">
                <i class="fas fa-bullhorn"></i>
                <h3>safty guide</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore commodi earum, quis voluptate exercitationem ut minima itaque iusto ipsum corrupti!</p>
            </div>
            <div class="box">
                <img src="images/c.png"></img>
                <h3>around the India</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore commodi earum, quis voluptate exercitationem ut minima itaque iusto ipsum corrupti!</p>
            </div>
           <div class="box">
                <i class="fas fa-utensils"></i>
                <h3>food and drinks</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore commodi earum, quis voluptate exercitationem ut minima itaque iusto ipsum corrupti!</p>
            </div>
            

        </div>

    </section>

    <!-- services section ends -->

    <!-- gallery section starts  -->

    <section class="gallery" id="gallery">

        <h1 class="heading">
            <span>g</span>
            <span>a</span>
            <span>l</span>
            <span>l</span>
            <span>e</span>
            <span>r</span>
            <span>y</span>
        </h1>

        <div class="box-container">

            <div class="box">
                <img src="images/g-1.jpg" alt="">
                <div class="content">
                    <h3>Maharashtra</h3>
                    
                   
                </div>
            </div>
            <div class="box">
                <img src="images/g-2.jpg" alt="">
                <div class="content">
                    <h3>Punjab</h3>
                   
                </div>
            </div>
            <div class="box">
                <img src="images/g-3.jpg" alt="">
                <div class="content">
                    <h3>Assam</h3>
                    
                </div>
            </div>
            <div class="box">
                <img src="images/g-4.jpg" alt="">
                <div class="content">
                    <h3>Gujarat</h3>
                   
                </div>
            </div>
            <div class="box">
                <img src="images/g-5.jpg" alt="">
                <div class="content">
                    <h3>Ladkah</h3>
                    
                </div>
            </div>
            <div class="box">
                <img src="images/g-6.jpg" alt="">
                <div class="content">
                    <h3>Goa</h3>
                    
                </div>
            </div>
            <div class="box">
                <img src="images/g-7.jpg" alt="">
                <div class="content">
                    <h3>Bandra Worli Ceiling</h3>
                   
                </div>
            </div>
            <div class="box">
                <img src="images/g-8.jpg" alt="">
                <div class="content">
                    <h3>Sabarmati River Front</h3>
                    
                </div>
            </div>
            <div class="box">
                <img src="images/g-9.jpg" alt="">
                <div class="content">
                    <h3>Howrah Bridge</h3>
                   
                </div>
            </div>

        </div>

    </section>

    <!-- gallery section ends -->

    <!-- review section starts  -->

    <section class="review">

        <h1 class="heading">
            <span>A</span>
            <span>B</span>
            <span>O</span>
            <span>U</span>
            <span>T</span>
             <span class="space"></span>
            <span>U</span>
            <span>S</span>
        </h1>
        <div class="box-container" style="margin-left: 15rem;margin-right: 15rem;">
        
                
                <h4>Wanna know were it all started?</h4>
               <p style="padding: 5rem 5rem;line-height: 3rem;">
                    Lorem ipsum dolor sit amet consecteturadipisicing elit. Perferendis soluta voluptas eaque, numquam veritatis aperiam expedita deleniti, nesciunt cum alias velit. Cupiditate commodi
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus cum nisi ea optio unde aliquam quia reprehenderit atque eum tenetur! 
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed placeat debitis corporis voluptates modi quibusdam quidem voluptatibus illum, maiores sequi.
                </p>
            
        </div>
    </section>

    <!-- review section ends -->
    <section class="contact" id="contact">
    
    <h1 class="heading">
        <span>c</span>
        <span>o</span>
        <span>n</span>
        <span>t</span>
        <span>a</span>
        <span>c</span>
        <span>t</span>
    </h1>

    <div class="row">

        <div class="image">
            <img src="images/contact-img.svg" alt="">
        </div>

        <form action="message.php" method="post">
            <div class="inputBox">
                <input type="text" name="name" placeholder="name" minlength="3" maxlength="12" required>
                <input type="email" placeholder="email" name="email">
            </div>
            <div class="inputBox">
                <input type="text" placeholder="number" name="number"minlength="10" maxlength="10" required>
                <input type="text" placeholder="subject" name="subject" minlength="20" maxlength="50" required>
            </div>
            <textarea name="message" placeholder="message" id="" cols="30" rows="10"></textarea>
            <input type="submit" class="btn" name="sendbtn" value="send message">
        </form>

    </div>
    
</section>


    

    <!-- footer section  -->

    <section class="footer">

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
                















    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="index.js"></script>
    
</body>

</html>