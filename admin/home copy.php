<?php
include "includes/header.php";
?>
<table class="table table-striped">
	<tr>
		<th class="not">Table</th>
		<th class="not">Entries</th>
	</tr>

	<tr>
		<td><a href="amenities.php">Amenities</a></td>
		<td>
			<?= counting("amenities", "id") ?>
		</td>
	</tr>

	<tr>
		<td><a href="banners.php">Banners</a></td>
		<td>
			<?= counting("banners", "id") ?>
		</td>
	</tr>

	<tr>
		<td><a href="booking_slots.php">Booking_slots</a></td>
		<td>
			<?= counting("booking_slots", "id") ?>
		</td>
	</tr>

	<tr>
		<td><a href="bookings.php">Bookings</a></td>
		<td>
			<?= counting("bookings", "id") ?>
		</td>
	</tr>

	<tr>
		<td><a href="categories.php">Categories</a></td>
		<td>
			<?= counting("categories", "id") ?>
		</td>
	</tr>

	<tr>
		<td><a href="cities.php">Cities</a></td>
		<td>
			<?= counting("cities", "id") ?>
		</td>
	</tr>

	<tr>
		<td><a href="fav_venue.php">Fav_venue</a></td>
		<td>
			<?= counting("fav_venue", "id") ?>
		</td>
	</tr>

	<tr>
		<td><a href="payments.php">Payments</a></td>
		<td>
			<?= counting("payments", "id") ?>
		</td>
	</tr>

	<tr>
		<td><a href="profile.php">Profile</a></td>
		<td>
			<?= counting("profile", "id") ?>
		</td>
	</tr>

	<tr>
		<td><a href="ratings_reviews.php">Ratings_reviews</a></td>
		<td>
			<?= counting("ratings_reviews", "id") ?>
		</td>
	</tr>

	<tr>
		<td><a href="tokens.php">Tokens</a></td>
		<td>
			<?= counting("tokens", "id") ?>
		</td>
	</tr>

	<tr>
		<td><a href="users.php">Users</a></td>
		<td>
			<?= counting("users", "id") ?>
		</td>
	</tr>

	<tr>
		<td><a href="venue_amenities.php">Venue_amenities</a></td>
		<td>
			<?= counting("venue_amenities", "id") ?>
		</td>
	</tr>

	<tr>
		<td><a href="venues.php">Venues</a></td>
		<td>
			<?= counting("venues", "id") ?>
		</td>
	</tr>
</table>
<?php include "includes/footer.php"; ?>