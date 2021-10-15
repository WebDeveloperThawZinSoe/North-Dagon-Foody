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
							<label for="exampleInputEmail1" class="form-label">Category Name : </label>
							<input required type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
							
						</div>
					
						<div class="mb-3">
							<label for="image" class="form-label">Image</label>
							<input required type="file" class="form-control" id="image" name="image">
						</div>
						
						<button id="btn" name="add_category" type="submit" class="btn btn-primary">Create Category</button>
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
                                            <th>Create Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
									<tbody>
										<?php 
											$sql = "SELECT * FROM category ORDER BY id DESC";
											$result = mysqli_query($connection,$sql);
											if(mysqli_num_rows($result) > 0){
												foreach($result as $key=>$r){
													?>
												<tr>
													<td><?php echo ++$key ?></td>
													<td><img src="upload/<?php echo $r['image'] ?>" class="img-responsive" width="300px" height="200px" alt=""></td>
													<td><?php echo $r['name'] ?></td>
													<td><?php echo $r['create_date'] ?></td>
													<td><a class="btn btn-danger" href="backend.php?delete_category=<?php echo
													 $r['id'] ?>" onclick="return confirm('Delete Confirm Account')">Delete</a></td>
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
