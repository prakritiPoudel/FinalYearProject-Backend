<?php
include "includes/header.php";
?>


<h1>Bookings</h1>
<p>This table includes
	<?php echo counting("bookings", "id"); ?> bookings.
</p>

<table id="sorted" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Id</th>
			<th>Duration</th>
			<th>People Count</th>
			<th>Booked date</th>
			<th>User id</th>
			<th class="not">Delete</th>
		</tr>
	</thead>

	<?php
	$id = $_COOKIE['admin_id'];
	$query = mysqli_query($link, "SELECT * FROM venues WHERE owner_id = $id");
	$row = mysqli_fetch_array($query);
	$venue_id = $row['id'];
	$bookings = getAll("bookings WHERE venue_id=$venue_id");
	if ($bookings)
		foreach ($bookings as $bookingss):
			?>
			<tr>
				<td>
					<?php echo $bookingss['id'] ?>
				</td>
				<td>
					<?php
					$slot = $bookingss['slot_id'];
					$sql = "SELECT * FROM booking_slots WHERE id = $id";
					$query = mysqli_query($link, "SELECT * FROM booking_slots WHERE id = $slot");
					$row = mysqli_fetch_array($query);
					echo ($row['begin_time'] . " - " . $row['end_time']);
					?>
				</td>
				<td>
					<?php echo $bookingss['quantity'] ?>
				</td>
				<td>
					<?php echo $bookingss['booked_date'] ?>
				</td>
				<td>
					<?php
					$user_id = $bookingss['user_id'];
					$query = mysqli_query($link, "SELECT * FROM profile WHERE id = $id");
					$row = mysqli_fetch_array($query);

					echo $row['username']
						?>
				</td>
				<td><a href="save.php?act=delete&id=<?php echo $bookingss['id'] ?>&cat=bookings"
						onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
			</tr>
		<?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>