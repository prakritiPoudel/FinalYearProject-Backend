<?php
include "includes/header.php";
?>
<h1>Payments</h1>
<p>This table includes
	<?php echo counting("payments", "id"); ?> payments.
</p>

<table id="sorted" class="table table-bordered">
	<thead>
		<tr>
			<th>Id</th>
			<th>Amount</th>
			<th>Transaction id</th>
			<th>User id</th>
			<th>Venue id</th>
			<th>Created at</th>
		</tr>
	</thead>

	<?php
	$payments = getAll("payments");
	if ($payments)
		foreach ($payments as $paymentss):
			?>
			<tr>
				<td>
					<?php echo $paymentss['id'] ?>
				</td>
				<td>
					<?php echo $paymentss['amount'] ?>
				</td>
				<td>
					<?php echo $paymentss['transaction_id'] ?>
				</td>
				<td>
					<?php
					$user_id = $paymentss['user_id'];
					$query = mysqli_query($link, "SELECT * FROM profile WHERE id = $user_id");
					$row = mysqli_fetch_array($query);

					echo $row['email'];
					?>
				</td>
				<td>
					<?php
					$venue_id = $paymentss['venue_id'];
					$query = mysqli_query($link, "SELECT * FROM venues WHERE id = $venue_id");
					$row = mysqli_fetch_array($query);

					echo $row['name'];
					?>
				</td>
				<td>
					<?php echo $paymentss['created_at'] ?>
				</td>
			</tr>
		<?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>