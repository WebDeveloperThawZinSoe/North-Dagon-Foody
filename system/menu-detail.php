<?php
    include "header.php"
?>
    <body class="sb-nav-fixed">
<?php
    include "nav.php";
?>
        <div id="layoutSidenav">

            <?php
                include "slide_bar.php";
            ?>

            <div id="layoutSidenav_content">
                <main>
					<div class="container col-md-11">
                        <br> <br>
                        <?php
                            if(isset($_GET["menu-id"])){
                                $id = $_GET["menu-id"];
                                $sql = "SELECT * FROM menu WHERE id=$id";
                                $result = mysqli_query($connection,$sql);
                                if(mysqli_num_rows($result)>0){
                                    foreach($result as $r){
                                        ?>
                                        
                                        <img src="upload/<?php echo $r['feature_image'] ?>" class="rounded  " alt="">
                                        <p>Feature Image</p>

                                        <p>Title : <?php echo $r["name"] ?></p>
                                        <p>Price : <?php echo $r["price"] ?></p>
                                        <p>Category : <?php echo $r["category"] ?></p>
                                        <p>Description : <?php echo $r["description"] ?></p>
                                        <hr> 

                                        <a onclick="return confirm('Confirm delete')" class="btn btn-danger" href="backend.php?menu-delete=<?php echo $r['id']  ?>">Delete</a>

                                        <a class="btn btn-warning" href="menu-update.php?menu-id=<?php echo $r['id']  ?>">Update</a>
                                        
                                        <br> <br>
                                        <hr>
                                        <?php
                                        
                                       


                                    }
                                }
                            }
                        ?>
					</div>
					
                </main>
              
            </div>
        </div>
		
<?php
    include "footer.php";
?>
