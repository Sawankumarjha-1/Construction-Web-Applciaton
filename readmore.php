<?php include('partials/conn.php');
if(isset($_GET['id']))
{   $memberId=$_GET['id'];
   
    $res=mysqli_query($conn,"SELECT * FROM `team` where id=$memberId");
    $readmore=mysqli_fetch_array($res);
    
}
?>

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

            .banner{
                height:70vh;
                
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

        <!-- Banner -->
        <div class="banner"></div>
        <!-- Read More  -->
        <div class="readmore">
            <div class="readmoreimg">
                <img src="<?php echo $readmore['image'];?>" alt="Not Found" srcset="">
            </div>
            <div class="readmoreContent">
            <h3><?php echo $readmore['name'];?></h3>
                    <b><?php echo $readmore['designation'];?></b>
                    <p><?php echo $readmore['details'];?></p>
                
            </div>
        </div>

        <!-- Footer -->
        <?php include('partials/footer.php');?>
        <!-- Scripts -->
        <script src="partials/navbar.js"></script>

    </body>

</html>
