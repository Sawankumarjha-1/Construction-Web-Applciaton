<?php include('partials/conn.php');?>
<!DOCTYPE html>
<html lang="en">

    <head>
    <?php include('partials/head.php');?>
    <style>
        body {
                display: flex;
                flex-direction: column;
                min-height: 100vh;
            }

            .navigation {
                background-color: rgba(0, 0, 0, 0.8);
                box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.2);
            }

            footer {
                margin-top: auto;
                padding-top: 50px;
            }
    </style>
    </head>

    <body>
        <!-- Navigation Bar -->
        <?php include('partials/navbar.php');?>
       
        <!-- Contact Form -->
        <h2 class="heading" id="headingContact">Get in <span>touch</span> with us</h2>
        <div class="contactForm">
            <div class="contactDetail">
                <div>
                    <i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>
                    <div>
                        <p>Address : </p>
                        <b>Greater Noida</b>
                    </div>
                </div>
                <div>
                    <i class="fa fa-phone fa-2x" aria-hidden="true"></i>
                    <div>
                        <p>Phone : </p>
                        <b>+911234567890</b>
                    </div>
                </div>
                <div>
                   <i class="fa fa-envelope-open fa-2x" aria-hidden="true"></i>
                    <div>
                        <p>Email Address : </p>
                        <b>abc@gmail.com</b>
                    </div>
                </div>

            </div>
            <form action="" method="POST">
                <input type="text" name="name" id="" placeholder="Name" required autocomplete="off">
                <input type="phone" name="phone" id="" placeholder="Phone" required autocomplete="off">
                <input type="email" name="email" id="" placeholder="Email" required autocomplete="off">
                <textarea name="message" placeholder="Message" required autocomplete="off"></textarea>
                <div class="formBtn">
                    <input type="reset" value="RESET">
                    <input type="submit" value="SUBMIT" name="contactSubmit">
                </div>
            </form>
            <?php 
                if(isset($_POST['contactSubmit'])){
                    $name=$_POST['name'];
                    $phone=$_POST['phone'];
                    $email=$_POST['email'];
                    $message=$_POST['message'];
                    $res=mysqli_query($conn,"INSERT INTO `contact`(`name`, `phone`, `email`, `message`) VALUES ('$name','$phone','$email','$message')");
                    if($res){
                        echo "<script>alert('Thank you for contacting us,We will response within 24 hours.....');</script>";
                    }else{
                        echo "<script>alert('Something Wrong.....');</script>";
                    }
                }
            ?>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d224369.03562454425!2d77.2580443994236!3d28.516681710933348!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce5a43173357b%3A0x37ffce30c87cc03f!2sNoida%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1632129373727!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

    
        <!-- Footer -->
        <?php include('partials/footer.php');?>
        <!-- Scripts -->
       
        
    </body>

</html>
