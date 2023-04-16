<?php
include "includes/header.php";
?>

<a class="btn btn-primary" href="edit-booking_slots.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New
	Booking_slots</a>

<h1>Booking_slots</h1>
<p>This table includes
	<?php echo counting("booking_slots", "id"); ?> booking_slots.
</p>

<table id="sorted" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Id</th>
			<th>Begin time</th>
			<th>End time</th>
			<th>Capacity</th>
			<th>Price</th>
			<th>Discount</th>
			<th>Message</th>

			<th class="not">Edit</th>
			<th class="not">Delete</th>
		</tr>
	</thead>

	<?php
	$id = $_COOKIE['admin_id'];
	$query = mysqli_query($link, "SELECT * FROM venues WHERE owner_id = $id");
	$row = mysqli_fetch_array($query);
	$venue_id = $row['id'];
	$booking_slots = getAll("booking_slots WHERE venue_id=$venue_id");
	if ($booking_slots)
		foreach ($booking_slots as $booking_slotss):
			?>
			<tr>
				<td>
					<?php echo $booking_slotss['id'] ?>
				</td>
				<td>
					<?php echo $booking_slotss['begin_time'] ?>
				</td>
				<td>
					<?php echo $booking_slotss['end_time'] ?>
				</td>
				<td>
					<?php echo $booking_slotss['capacity'] ?>
				</td>
				<td>
					<?php echo $booking_slotss['price'] ?>
				</td>
				<td>
					<?php echo $booking_slotss['discount'] ?>
				</td>
				<td>
					<?php echo $booking_slotss['message'] ?>
				</td>


				<td><a href="edit-booking_slots.php?act=edit&id=<?php echo $booking_slotss['id'] ?>"><i
							class="glyphicon glyphicon-edit"></i></a></td>
				<td><a href="save.php?act=delete&id=<?php echo $booking_slotss['id'] ?>&cat=booking_slots"
						onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
			</tr>
		<?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>