<?php
    
    if(isset($_SESSION["success"])){
        ?>
       <p class='alert alert-success'> <?php echo $_SESSION["success"] ?> </p> <br>
        <?php
        $_SESSION["success"] = null;
    }

    if(isset($_SESSION["error"])){
        ?>
       <p class='alert alert-danger'> <?php echo $_SESSION["error"] ?> </p> <br>
        <?php
        $_SESSION["error"] = null;
    }
?>