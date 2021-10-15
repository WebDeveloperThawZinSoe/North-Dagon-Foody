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
							<label for="exampleInputEmail1" class="form-label">Usename </label>
							<input required type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
							<div id="emailHelp" class="form-text">Username is unique.</div>
						</div>
						<div class="mb-3">
							<label for="password"  class="form-label">Password</label>
							<input required type="password" name="password" onkeyup="is_match()" class="form-control" id="password">
						</div>
						<div class="mb-3">
							<label for="confirm_password" class="form-label">Confirm Password</label>
							<input required type="password" onkeyup="is_match()"  class="form-control" id="confirm_password">
						</div>
						<div class="mb-3">
							<label for="image" class="form-label">Image</label>
							<input required type="file" class="form-control" id="image" name="image">
						</div>
						<div class="mb-3 form-check">
							<p id="display"></p>
						</div>
						<button id="btn" name="add_user" type="submit" class="btn btn-primary">Create Member</button>
					</form>
					</div>
					<hr>
					<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                All Member List
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
											$sql = "SELECT * FROM member ORDER BY id DESC";
											$result = mysqli_query($connection,$sql);
											if(mysqli_num_rows($result) > 0){
												foreach($result as $key=>$r){
													?>
												<tr>
													<td><?php echo ++$key ?></td>
													<td><img src="upload/<?php echo $r['image'] ?>" class="img-responsive" width="300px" height="200px" alt=""></td>
													<td><?php echo $r['username'] ?></td>
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
		<script>
			    var password = document.getElementById("password");
				var confirm_password = document.getElementById("confirm_password");
				var message = document.getElementById("display");
				var btn = document.getElementById("btn");

				function is_match(){
					if(password.value == confirm_password.value){
						message.innerHTML = "<span style='color:green'> Password and Confirm Password Match. </span>";
						btn.removeAttribute("disabled");
					}else{
						message.innerHTML = "<span style='color:red'>  Password and Confirm Password Is Not Match. </span>";
						btn.setAttribute("disabled","");
						
					}
           }         
		</script>
<?php
    include "footer.php";
?>
