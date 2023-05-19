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
       <h2 class="heading" id="headingContact">Give <span>Your</span> Feedback</h2>
        <div class="contactForm">
            <div class="contactDetail" id="point">
                <img src="point.jpg" alt="Not Found" srcset="">

            </div>
            <form action="" method="POST" enctype='multipart/form-data'>
                <input type="text" name="name" id="" placeholder="Name" required autocomplete="off">
                <input type="email" name="email" id="" placeholder="Email" required autocomplete="off">
                <input type="file" name="feedback_img" id="" required autocomplete="off">
                <textarea name="message" placeholder="Message" required></textarea>
                <div class="formBtn">
                    <input type="reset" value="RESET">
                    <input type="submit" value="SUBMIT" name="feedbackSubmit">
                </div>
            </form>
            <?php 
             if(isset($_POST['feedbackSubmit'])){
                $name=$_POST['name'];
                $email=$_POST['email'];
                $message=$_POST['message'];
                $image=$_FILES['feedback_img']['name'];
                $temp_name=$_FILES['feedback_img']['tmp_name'];
                $path="feedbackImg/".$image;
                move_uploaded_file($temp_name,$path);

                $res=mysqli_query($conn,"INSERT INTO `feedback`(`name`,`image`, `email`, `message`) VALUES ('$name','$image','$email','$message')");
                if($res){
                    echo "<script>alert('Thanks for feedback.......');</script>";
                }else{
                    echo "<script>alert('Something Wrong.....');</script>";
                }
            }
            ?>
        </div>

    
        <!-- Footer -->
        <?php include('partials/footer.php');?>
        <!-- Scripts -->
        
    </body>

</html>
