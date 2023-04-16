<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$venue_amenities = getById("venue_amenities", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Venue_amenities</legend>
						<input name="cat" type="hidden" value="venue_amenities">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Venue id</label>
							<input class="form-control" type="text" name="venue_id" value="<?=$venue_amenities['venue_id']?>" /><br>
							
							<label>Amenity id</label>
							<input class="form-control" type="text" name="amenity_id" value="<?=$venue_amenities['amenity_id']?>" /><br>
							
							<label>Created at</label>
							<input class="form-control" type="text" name="created_at" value="<?=$venue_amenities['created_at']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				