<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$booking_slots = getById("booking_slots", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Booking_slots</legend>
						<input name="cat" type="hidden" value="booking_slots">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Venue id</label>
							<input class="form-control" type="text" name="venue_id" value="<?=$booking_slots['venue_id']?>" /><br>
							
							<label>Begin time</label>
							<input class="form-control" type="text" name="begin_time" value="<?=$booking_slots['begin_time']?>" /><br>
							
							<label>End time</label>
							<input class="form-control" type="text" name="end_time" value="<?=$booking_slots['end_time']?>" /><br>
							
							<label>Capacity</label>
							<input class="form-control" type="text" name="capacity" value="<?=$booking_slots['capacity']?>" /><br>
							
							<label>Price</label>
							<input class="form-control" type="text" name="price" value="<?=$booking_slots['price']?>" /><br>
							
							<label>Discount</label>
							<input class="form-control" type="text" name="discount" value="<?=$booking_slots['discount']?>" /><br>
							
							<label>Message</label>
							<textarea class="form-control" name="message"><?=$booking_slots['message']?></textarea><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				