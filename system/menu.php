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
						?>
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Menu Name : </label>
							<input required  type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
							
						</div>

						<div class="mb-3">
							<label for="price" class="form-label">Price : </label>
							<input required  type="text" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
							
						</div>


						<div class="mb-3">
							<label for="price" class="form-label">Price : </label>
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
							<textarea required  class="form-control" id="image" name="description"> </textarea>
						</div>

						
						<button id="btn" name="add_menu" type="submit" class="btn btn-primary">Create Menu</button>
					</form>
					</div>
					<hr>
					<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                All Category List
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Name</th>
											<th>Price</th>
											<th>Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
									<tbody>
										<?php 
											$sql = "SELECT * FROM menu ORDER BY id DESC";
											$result = mysqli_query($connection,$sql);
											if(mysqli_num_rows($result) > 0){
												foreach($result as $key=>$r){
													?>
												<tr>
													<td><?php echo ++$key ?></td>
													<td><?php echo $r['name'] ?></td>
													<td><img src="upload/<?php echo $r['feature_image'] ?>" class="img-responsive" width="300px" height="200px" alt=""></td>
													<td><?php echo $r['price'] ?></td>
													<td><?php echo $r['category'] ?></td>
												
													<td><a class="btn btn-info" href="menu-detail.php?menu-id=<?php echo
													 $r['id'] ?>">View Detail</a></td>
												</tr>
													<?php
												}
											}
										?>
									</tbody>                                    
                                </table>
                            </div>
                        </div>
                </main>
              
            </div>
        </div>
		
<?php
    include "footer.php";
?>
