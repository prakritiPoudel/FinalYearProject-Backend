<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$bookings = getById("bookings", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Bookings</legend>
						<input name="cat" type="hidden" value="bookings">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Venue id</label>
							<input class="form-control" type="text" name="venue_id" value="<?=$bookings['venue_id']?>" /><br>
							
							<label>Slot id</label>
							<input class="form-control" type="text" name="slot_id" value="<?=$bookings['slot_id']?>" /><br>
							
							<label>Quantity</label>
							<input class="form-control" type="text" name="quantity" value="<?=$bookings['quantity']?>" /><br>
							
							<label>Booked date</label>
							<input class="form-control" type="text" name="booked_date" value="<?=$bookings['booked_date']?>" /><br>
							
							<label>Payment id</label>
							<input class="form-control" type="text" name="payment_id" value="<?=$bookings['payment_id']?>" /><br>
							
							<label>User id</label>
							<input class="form-control" type="text" name="user_id" value="<?=$bookings['user_id']?>" /><br>
							
							<label>Created at</label>
							<input class="form-control" type="text" name="created_at" value="<?=$bookings['created_at']?>" /><br>
							
							<label>Updated at</label>
							<input class="form-control" type="text" name="updated_at" value="<?=$bookings['updated_at']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				