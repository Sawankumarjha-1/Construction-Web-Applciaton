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

    <!-- Project Navigation -->
    <div class="projectNav">
        <?php 
                $projectNav=mysqli_query($conn,"Select * from project_category");
                $projectVar=0;
                while($proDataNav=mysqli_fetch_assoc($projectNav)){
                    ?>
        <span id="<?php echo $proDataNav['category_name'];?>Nav"
              class="<?php echo $projectVar==0?'activeProject':'';?>"
              onclick="showProject('#<?php echo $proDataNav['category_name'];?>','#<?php echo $proDataNav['category_name'];?>Nav');"><?php echo $proDataNav['category_name'];?></span>
        <?php
                    $projectVar=1;
                }
            ?>
    </div>
    <!-- Projects -->

    <?php 
        $categoryNav=mysqli_query($conn,"Select * from project_category");
        $projectVar=0;
        while($dataNav=mysqli_fetch_assoc($categoryNav)){
            ?>
    <div class="project <?php echo $projectVar==0?'':'hideClass'?>"
         id="<?php echo $dataNav['category_name'];?>">
        <?php
            $category=$dataNav['category_name'];
            $project=mysqli_query($conn,"Select * from projects where category='$category'");
            if(mysqli_num_rows($project)){
                while($projectImgData=mysqli_fetch_assoc($project)){
                   $imgarr=explode(',',$projectImgData['image']);
                   ?>
        <img src="projectImg/<?php echo $imgarr[0];?>"
             alt="Not Found"
             onclick="showPopup('#popup<?php echo $projectImgData['id']?>'); ">

        <!-- Project Popup -->
        <div class="projectPopUp"
             id="popup<?php echo $projectImgData['id']?>">
            <div class="projectPopUpContent">
                <h3><?php echo $projectImgData['project_name'];?></h3>
                <p><?php echo $projectImgData['detail'];?></p>
            </div>
            <div class="projectPopUpImg"
                 id="project_popup_img<?php echo $projectImgData['id']; ?>"
                 style="background-image:url('projectImg/<?php echo $imgarr[0];?>');background-size:100% 100%');">
                <i class="fa fa-times-circle fa-2x"
                   aria-hidden="true"
                   id="closeProject"
                   onclick="closePopup('#popup<?php echo $projectImgData['id']?>');"></i>
                <div>
                    <?php 
                    
                    for($i=0;$i<count($imgarr);$i++){
                        ?>
                    <img src="projectImg/<?php echo $imgarr[$i];?>"
                         alt="Not Found"
                         srcset=""
                         onclick="changeBackground('project_popup_img<?php echo $projectImgData['id'];?>','<?php echo $imgarr[$i];?>');">
                    <?php
                    }
                    
                    ?>

                </div>

            </div>


        </div>
        <?php
                    $projectVar=1;
                }
            }else{
                ?>
        <h2>Data Not Found !</h2>
        <?php
            }
           
            
            ?>
    </div>
    <?php
        }
        ?>




    <!-- Footer -->
    <?php include('partials/footer.php');?>
    <!-- Scripts -->
    <script>
    function showProject(showProject, showProjectNav) {
        <?php 
                    $hideNav=mysqli_query($conn,"Select * from project_category");
                    while($hideNavData=mysqli_fetch_assoc($hideNav)){
                        ?>
        $('#<?php echo $hideNavData['category_name'];?>Nav').removeClass('activeProject');

        <?php

                    }
                ?>
        <?php 
                    $hideDiv=mysqli_query($conn,"Select * from projects");
                    while($hideDivData=mysqli_fetch_assoc($hideNav)){
                        ?>

        $('#<?php echo $hideDivData['category'];?>').addClass('hideClass');
        <?php

                    }
                ?>
        $('#tilingNav').removeClass('activeProject');
        $('#electricalNav').removeClass('activeProject');
        $('#carpentryNav').removeClass('activeProject');
        $('#plumbingNav').removeClass('activeProject');
        $('#Tiling').addClass('hideClass');
        $('#Electrical').addClass('hideClass');
        $('#Carpentry').addClass('hideClass');
        $('#Plumbing').addClass('hideClass');





        $(showProjectNav).addClass('activeProject');
        $(showProject).removeClass('hideClass');

    }

    function showPopup(popupId) {
        $(popupId).css('display', 'flex');

    }

    function closePopup(popupId) {
        $(popupId).css('display', 'none');

    }

    function changeBackground(popupid, imgsrc) {

        let element = document.getElementById(popupid);
        element.style.backgroundImage = `url(projectImg/${imgsrc})`;
        element.style.backgroundSize = '100% 100%';

    }
    </script>


</body>

</html>