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
						
						
					<form action="backend.php" method="post" enctype="multipart/form-data">
                    
						<br> 
						<?php
							include "message.php";
                            if(isset($_GET["menu-id"])){
                                $id = $_GET["menu-id"];
                                $sql = "SELECT * FROM menu WHERE id=$id";
                                $result = mysqli_query($connection,$sql);
                                if(mysqli_num_rows($result)>0){
                                    foreach($result as $rr){
						    ?>
                            <input type="hidden" name="id" value="<?php echo $rr['id'] ?>">
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Menu Name : </label>
							<input value="<?php echo $rr['name'] ?>" required  type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
							
						</div>

						<div class="mb-3">
							<label for="price" class="form-label">Price : </label>
							<input value="<?php echo $rr['price'] ?>" required  type="text" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
							
						</div>


						<div class="mb-3">
							<label for="price" class="form-label">category : </label>
						    <select required  class="form-control" name="category" id="">
								<?php 
											$sql = "SELECT * FROM category ORDER BY id DESC";
											$result = mysqli_query($connection,$sql);
											if(mysqli_num_rows($result) > 0){
												foreach($result as $key=>$r){
													?>
								<option value="<?php echo $r['name'] ?>">
									<?php echo $r['name'] ?>
								</option>

								<?php
												}
											}
										?>
							</select>
							
						</div>
					
						<div class="mb-3">
							<label for="image" class="form-label">Feature Image</label>
							<input required  type="file" class="form-control" id="image" name="feature_image">
						</div>

					
						<div class="mb-3">
							<label for="image" class="form-label">Descripton</label>
							<textarea required  class="form-control" id="image" name="description"> <?php echo $rr['description'] ?> </textarea>
						</div>

						
						<button id="btn" name="update_menu" type="submit" class="btn btn-warning">Update Menu</button>
					</form>
                    <?php
                                        
                                       


                                    }
                                }
                            }
                        ?>
					</div>
					<hr>

                </main>
              
            </div>
        </div>
		
<?php
    include "footer.php";
?>
