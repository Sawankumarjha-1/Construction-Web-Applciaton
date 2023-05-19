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

        <!-- Our Team -->
       

        <div class="team">
        <?php 
    $res=mysqli_query($conn,"SELECT * FROM `team`");
    while($data=mysqli_fetch_assoc($res)){
        ?>
         <div class="individualTeam">
                <div class="teamImg">
                    <img src="<?php echo $data['image'];?>" alt="Not Found" srcset="">
                </div>
                <div class="teamContent">
                    <h3><?php echo $data['name'];?></h3>
                    <b><?php echo $data['designation'];?></b>
                    <p><?php echo $data['less_details'];?></p>
                    <a href="readmore.php?id=<?php echo $data['id'];?>" class="btn">Read More</a>
                </div>

            </div>
        <?php
    }
?>
           
            
        </div>


        <!-- Footer -->
        <?php include('partials/footer.php');?>
        <!-- Scripts -->

    </body>

</html>
