<?php 
    $res=mysqli_query($conn,"SELECT * FROM `navigation` WHERE STATUS='Published'");
?>
<nav class="resonsiveNav">
                <img src="logo.png" alt="Not Found" srcset="">
                <i class="fa fa-bars fa-2x" aria-hidden="true" id="bars"></i>
                
        </nav>
        <div class="resnavMenu" id="resmenu">
            <i class="fa fa-times-circle-o fa-2x" aria-hidden="true" id="resClose"></i>
            
            <?php 
                    while($data=mysqli_fetch_assoc($res)){
                        ?>
                           <a href="<?php echo $data['link'];?>" class="<?php echo $data['link']=='contact.php'?'btn':'';?>"><?php echo $data['page_name'];?></a>
                        <?php

                    }
                    
                ?>
                
        </div>