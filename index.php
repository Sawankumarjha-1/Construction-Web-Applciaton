<?php include('partials/conn.php');?>
<!DOCTYPE html>
<html lang="en">

    <head>
    <?php include('partials/head.php');?>
    </head>

    <body>
        <!-- Navigation Bar -->
        <?php include('partials/navbar.php');?>
        <!-- Banner / Hero Section -->
        <div class="banner">
            <div class="bannerLeft">
                <div>
                    <h1>We Shape Our buildings therafter, they shape us</h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam minus, quam repellendus quibusdam
                        nulla cupiditate delectus, veniam molestias ipsa illo distinctio doloremque pariatur error sit
                        qui
                        quae eos natus asperiores.
                    </p>
                    <a href="project.php" class="btn">PROJECTS</a>
                </div>
            </div>
        </div>
        <!-- Stats -->
        <div class="stats">
            <div>
                <img src="bar-graph.png" alt="Not Found" srcset="">
                <h2>$11.4</h2>
                <p>Profit Before Tax</p>
            </div>
            <div>
                <img src="miner.png" alt="Not Found" srcset="">
                <h2>$114</h2>
                <p>Average month and Cash</p>
            </div>
            <div>
                <img src="coins.png" alt="Not Found" srcset="">
                <h2>4.5p</h2>
                <p>Full year Dividend</p>
            </div>
            <div>
                <img src="edit.png" alt="Not Found" srcset="">
                <h2>3</h2>
                <p>Order Bok</p>
            </div>
        </div>
        <!-- About US -->
        <div class="aboutUs" id="about">
            <div class="aboutImg">
                <img src="ceo.jpg" alt="Not Found" srcset="">
            </div>
            <div class="aboutContent">
                <h2>CEO OF JHAJI CO<span>NSTRUCTI</span>ON</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora adipisci odit quae debitis animi
                    quam enim non reiciendis optio voluptatum asperiores inventore dolor nobis harum cumque velit ab
                    atque, ex repudiandae. Laudantium laboriosam aperiam praesentium odio suscipit, perspiciatis at eius
                    inventore sit sunt recusandae quae blanditiis saepe impedit eveniet quia!
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora adipisci odit quae debitis animi
                    quam enim non reiciendis optio voluptatum asperiores inventore dolor nobis harum cumque velit ab
                    atque, ex repudiandae. Laudantium laboriosam aperiam praesentium odio suscipit, perspiciatis at eius
                    inventore sit sunt recusandae quae blanditiis saepe impedit eveniet quia!
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora adipisci odit quae debitis animi
                    quam enim non reiciendis optio voluptatum asperiores inventore dolor nobis harum cumque velit ab
                    atque, ex repudiandae. Laudantium laboriosam aperiam praesentium odio suscipit, perspiciatis at eius
                    inventore sit sunt recusandae quae blanditiis saepe impedit eveniet quia!
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora adipisci odit quae debitis animi
                    quam enim non reiciendis optio voluptatum asperiores inventore dolor nobis harum cumque velit ab
                    atque, ex repudiandae. Laudantium laboriosam aperiam praesentium odio suscipit, perspiciatis at eius
                    inventore sit sunt recusandae quae blanditiis saepe impedit eveniet quia!
                </p>
            </div>
        </div>


        <!-- Why Choose Us ? -->
        <h2 class="heading">Why <span>Choose</span> Us ?</h2>
        <div class="choose" id="why">
            <div class="individualChooseDiv">
                <div class="chooseImg"><img src="risks.png" alt="" srcset=""></div>
                <div class="chooseContent">
                    <b>Strong <span>Risk</span> Management</b>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit dolorem libero mollitia facilis
                        cupiditate minus adipisci necessitatibus laborum consectetur eligendi.</p>
                </div>

            </div>
            <div class="individualChooseDiv">
                <div class="chooseImg"><img src="link.png" alt="" srcset=""></div>
                <div class="chooseContent">
                    <b>A <span>Skilled</span> Team</b>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit dolorem libero mollitia facilis
                        cupiditate minus adipisci necessitatibus laborum consectetur eligendi.</p>
                </div>

            </div>
            <div class="individualChooseDiv">
                <div class="chooseImg"><img src="helmet.png" alt="" srcset=""></div>
                <div class="chooseContent">
                    <b>Modern Equipment <span>And</span> Technology</b>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit dolorem libero mollitia facilis
                        cupiditate minus adipisci necessitatibus laborum consectetur eligendi.</p>
                </div>

            </div>
            <div class="individualChooseDiv">
                <div class="chooseImg"><img src="worker.png" alt="" srcset=""></div>
                <div class="chooseContent">
                    <b>An Unnwavering <span>Commitment</span> to safety</b>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit dolorem libero mollitia facilis
                        cupiditate minus adipisci necessitatibus laborum consectetur eligendi.</p>
                </div>

            </div>
        </div>
        <!-- Testimonial -->
        <h2 class="heading" id="testimonial">Te<span>stimoni</span>al</h2>
        <?php 
            $test=mysqli_query($conn,"Select * from feedback order by id DESC LIMIT 3");
            $testVar=0;
            while($testimonial=mysqli_fetch_assoc($test)){
                ?>
            <div class="testimonial <?php echo $testVar==0?'':'hideClass';?>" id="testimonial<?php echo $testimonial['id'];?>">
                <img src="feedbackImg/<?php echo $testimonial['image'];?>" alt="Not Found" srcset="">
                <b style="margin-bottom:10px;"><?php echo $testimonial['name'];?></b>
                <q><?php echo $testimonial['message'];?></q>
             </div>
                <?php
                $testVar=1;
            }
        ?>
        <div class="testimonialNavigate">
            <?php 
            $testNav=mysqli_query($conn,"Select * from feedback order by id DESC LIMIT 3");
            $testVar=0;
            while($navigate=mysqli_fetch_assoc($testNav)){
                ?>
 <span class="<?php echo $testVar==0?'activeTestimonial':'';?>" id="testmonialid<?php echo $navigate['id'];?>"
                onclick="showTestimonial('#testimonial<?php echo $navigate['id'];?>','#testmonialid<?php echo $navigate['id'];?>')"></span>
                <?php
                $testVar=1;
            }
            ?>

           
            
        </div>
        <!-- Our Clients -->
        <h2 class="heading">Our C<span>lient</span>s</h2>
        <div class="clients">
            <img src="ats.png" alt="Not Found" srcset="">
            <img src="parasnath.jpg" alt="Not Found" srcset="">
            <img src="jaypee.png" alt="Not Found" srcset="">
            <img src="supertech.png" alt="Not Found" srcset="">
        </div>
        <!-- Get In Touch -->
        <div class="getintouch">
            <h2>Get In touch With Us</h2>
            <div>
                
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora adipisci odit quae debitis animi
                </p>
                <a href="contact.php" class="btn">Contact Us</a>
            </div>
        </div>
        <!-- Footer -->
      <?php include('partials/footer.php');?>
        <!-- Scripts -->
        <script src="partials/navbar.js"></script>
        <script>
           
            function showTestimonial(showDivId, showNavId) {
                <?php 
                $scriptFeed=mysqli_query($conn,"Select * from feedback");
                while($feedback=mysqli_fetch_assoc($scriptFeed)){
                    ?>
                $('#testimonial<?php echo $feedback['id'];?>').addClass('hideClass');
                $('#testmonialid<?php echo $feedback['id'];?>').removeClass('activeTestimonial');
                    <?php
                }
                ?>
               
                $(showDivId).removeClass('hideClass');
                $(showNavId).addClass('activeTestimonial');


            }
        </script>
    </body>

</html>
