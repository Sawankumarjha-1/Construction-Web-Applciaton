
<?php
// Program to display URL of current page.
  
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $link = "https";
else
    $link = "http";
  
// Here append the common URL characters.
$link .= "://";
  
// Append the host(domain name, ip) to the URL.
$link .= $_SERVER['HTTP_HOST'];
  
// Append the requested resource location to the URL
$link .= $_SERVER['REQUEST_URI'];


?>

<?php 
    $res=mysqli_query($conn,"SELECT * FROM `navigation` WHERE STATUS='Published'");
?>

<nav class="navigation" id="nav" >
            <img src="logo.png" alt="Not Found" srcset="">
            <div class="navLeft">
                <?php 
                    while($data=mysqli_fetch_assoc($res)){
                        ?>
                           <a href="<?php echo $data['link'];?>" class="<?php echo $data['link']=='contact.php'?'btn':'';?>" id="<?php echo basename($link)==$data['link']?basename($link)=='contact.php'?'contactActive':'activeNav':'';?>"><?php echo $data['page_name'];?></a>
                        <?php

                    }
                    
                ?>
                
            </div>
        </nav>

        <!-- Responsive Nav -->
        <?php include('responsivenav.php');?>
        <script>
            $('#bars').click(()=>{
                $('#resmenu').css('display','flex');
            });
            $('#resClose').click(()=>{
                $('#resmenu').css('display','none');
            });
        </script>
