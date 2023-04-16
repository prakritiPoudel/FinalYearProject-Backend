<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$venues = getById("venues", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Venues</legend>
						<input name="cat" type="hidden" value="venues">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Name</label>
							<input class="form-control" type="text" name="name" value="<?=$venues['name']?>" /><br>
							
							<label>Category</label>
							<input class="form-control" type="text" name="category" value="<?=$venues['category']?>" /><br>
							
							<label>City</label>
							<input class="form-control" type="text" name="city" value="<?=$venues['city']?>" /><br>
							
							<label>Location</label>
							<input class="form-control" type="text" name="location" value="<?=$venues['location']?>" /><br>
							
							<label>Opening time</label>
							<input class="form-control" type="text" name="opening_time" value="<?=$venues['opening_time']?>" /><br>
							
							<label>Closing time</label>
							<input class="form-control" type="text" name="closing_time" value="<?=$venues['closing_time']?>" /><br>
							
							<label>Rules</label>
							<textarea class="form-control" name="rules"><?=$venues['rules']?></textarea><br>
							
							<label>Email</label>
							<input class="form-control" type="text" name="email" value="<?=$venues['email']?>" /><br>
							
							<label>Phone number</label>
							<input class="form-control" type="text" name="phone_number" value="<?=$venues['phone_number']?>" /><br>
							
							<label>Banner image</label>
							<input class="form-control" type="text" name="banner_image" value="<?=$venues['banner_image']?>" /><br>
							
							<label>Owner id</label>
							<input class="form-control" type="text" name="owner_id" value="<?=$venues['owner_id']?>" /><br>
							
							<label>Created at</label>
							<input class="form-control" type="text" name="created_at" value="<?=$venues['created_at']?>" /><br>
							
							<label>Updated at</label>
							<input class="form-control" type="text" name="updated_at" value="<?=$venues['updated_at']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				