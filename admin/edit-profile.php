<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$profile = getById("profile", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Profile</legend>
						<input name="cat" type="hidden" value="profile">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Username</label>
							<input class="form-control" type="text" name="username" value="<?=$profile['username']?>" /><br>
							
							<label>Email</label>
							<input class="form-control" type="text" name="email" value="<?=$profile['email']?>" /><br>
							
							<label>Full name</label>
							<input class="form-control" type="text" name="full_name" value="<?=$profile['full_name']?>" /><br>
							
							<label>Phone no</label>
							<input class="form-control" type="text" name="phone_no" value="<?=$profile['phone_no']?>" /><br>
							
							<label>Password</label>
							<input class="form-control" type="text" name="password" value="<?=$profile['password']?>" /><br>
							
							<label>Gender</label>
							<input class="form-control" type="text" name="gender" value="<?=$profile['gender']?>" /><br>
							
							<label>Type</label>
							<input class="form-control" type="text" name="type" value="<?=$profile['type']?>" /><br>
							
							<label>Profile picture</label>
							<input class="form-control" type="text" name="profile_picture" value="<?=$profile['profile_picture']?>" /><br>
							
							<label>Created at</label>
							<input class="form-control" type="text" name="created_at" value="<?=$profile['created_at']?>" /><br>
							
							<label>Updated at</label>
							<input class="form-control" type="text" name="updated_at" value="<?=$profile['updated_at']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				