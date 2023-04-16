<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$fav_venue = getById("fav_venue", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Fav_venue</legend>
						<input name="cat" type="hidden" value="fav_venue">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Id</label>
							<input class="form-control" type="text" name="id" value="<?=$fav_venue['id']?>" /><br>
							
							<label>Venue id</label>
							<input class="form-control" type="text" name="venue_id" value="<?=$fav_venue['venue_id']?>" /><br>
							
							<label>Owner id</label>
							<input class="form-control" type="text" name="owner_id" value="<?=$fav_venue['owner_id']?>" /><br>
							
							<label>Created at</label>
							<input class="form-control" type="text" name="created_at" value="<?=$fav_venue['created_at']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				