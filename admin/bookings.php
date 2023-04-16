<?php
				include "includes/header.php";
				?>

				<a class="btn btn-primary" href="edit-bookings.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Bookings</a>

				<h1>Bookings</h1>
				<p>This table includes <?php echo counting("bookings", "id");?> bookings.</p>

				<table id="sorted" class="table table-striped table-bordered">
				<thead>
				<tr>
							<th>Id</th>
			<th>Venue id</th>
			<th>Slot id</th>
			<th>Quantity</th>
			<th>Booked date</th>
			<th>Payment id</th>
			<th>User id</th>
			<th>Created at</th>
			<th>Updated at</th>

				<th class="not">Edit</th>
				<th class="not">Delete</th>
				</tr>
				</thead>

				<?php
				$bookings = getAll("bookings");
				if($bookings) foreach ($bookings as $bookingss):
					?>
					<tr>
		<td><?php echo $bookingss['id']?></td>
		<td><?php echo $bookingss['venue_id']?></td>
		<td><?php echo $bookingss['slot_id']?></td>
		<td><?php echo $bookingss['quantity']?></td>
		<td><?php echo $bookingss['booked_date']?></td>
		<td><?php echo $bookingss['payment_id']?></td>
		<td><?php echo $bookingss['user_id']?></td>
		<td><?php echo $bookingss['created_at']?></td>
		<td><?php echo $bookingss['updated_at']?></td>


						<td><a href="edit-bookings.php?act=edit&id=<?php echo $bookingss['id']?>"><i class="glyphicon glyphicon-edit"></i></a></td>
						<td><a href="save.php?act=delete&id=<?php echo $bookingss['id']?>&cat=bookings" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
						</tr>
					<?php endforeach; ?>
					</table>
					<?php include "includes/footer.php";?>
				