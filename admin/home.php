<?php
include "includes/header.php";
$id = $_COOKIE['admin_id'];
$query = mysqli_query($link, "SELECT * FROM venues WHERE owner_id = $id");
$venue = mysqli_fetch_array($query);

?>
<style>
	.cards {
		max-width: 1200px;
		margin: 0 auto;
		display: grid;
		gap: 1rem;
	}

	.card {
		background-color: white;
		color: #2b2b2b;
		padding: 1rem;
		height: 14rem;
		border-radius: 8px;
		display: flex;
		flex-flow: column;
		justify-content: center;
		padding-left: 3rem;
		padding-top: 1rem;
	}

	.card:hover {
		opacity: .9;
	}

	.card .title {
		font-size: 30px;
		font-weight: 800;
		opacity: .9;
	}

	.card .value {
		font-size: 45px;
		font-weight: 800;
		opacity: .9;
	}

	@media (min-width: 600px) {
		.cards {
			grid-template-columns: repeat(2, 1fr);
		}
	}

	@media (min-width: 900px) {
		.cards {
			grid-template-columns: repeat(3, 1fr);
		}


	}
</style>
<link rel="stylesheet" href="includes/custom.css">

<div class="top-bar">
	<div class="title-data">
		<h1>Dashboard</h1>

		<p>
			<?php echo ($venue['name']) ?>
		</p>
	</div>
	<a class="btn btn-primary" href="" type="button" data-toggle="modal" data-target="#myModal"> <img width="30px"
			style="padding-right:10px;filter: invert(100%);"
			src="https://cdn-icons-png.flaticon.com/512/1828/1828427.png"> Logout</a>

</div>

<div class="cards">
	<a href="">
		<div class="card">
			<span class="title">Total earning</span>
			<span class="value-trailing">
				<span class="value">
					<?= getTotalEarning() ?>
				</span>
				<span class="trailing">approx</span>
			</span>
		</div>
	</a>

	<a href="amenities.php">
		<div class="card">
			<span class="title">Amenities</span>
			<span class="value-trailing">
				<span class="value">
					<?= counting("amenities", "id") ?>
				</span>
				<span class="trailing">entries</span>
			</span>
		</div>
	</a>
	<a href="banners.php">
		<div class="card">
			<span class="title">Banners</span>
			<span class="value-trailing">
				<span class="value">
					<?= counting("banners", "id") ?>
				</span>
				<span class="trailing">entries</span>
			</span>
		</div>
	</a>
	<a href="booking_slots.php">
		<div class="card">
			<span class="title">Booking Slots</span>
			<span class="value-trailing">
				<span class="value">
					<?= counting("booking_slots", "id") ?>
				</span>
				<span class="trailing">entries</span>
			</span>
		</div>
	</a>
	<a href="bookings.php">
		<div class="card">
			<span class="title">Bookings</span>
			<span class="value-trailing">
				<span class="value">
					<?= counting("bookings", "id") ?>
				</span>
				<span class="trailing">entries</span>
			</span>
		</div>
	</a>
	<a href="categories.php">
		<div class="card">
			<span class="title">Categories</span>
			<span class="value-trailing">
				<span class="value">
					<?= counting("categories", "id") ?>
				</span>
				<span class="trailing">entries</span>
			</span>
		</div>
	</a>
	<a href="cities.php">
		<div class="card">
			<span class="title">Cities</span>
			<span class="value-trailing">
				<span class="value">
					<?= counting("cities", "id") ?>
				</span>
				<span class="trailing">entries</span>
			</span>
		</div>
	</a>

	<a href="payments.php">
		<div class="card">
			<span class="title">Payments</span>
			<span class="value-trailing">
				<span class="value">
					<?= counting("payments", "id") ?>
				</span>
				<span class="trailing">tranctions</span>
			</span>
		</div>
	</a>

	<a href="profile.php?type=customer">
		<div class="card">
			<span class="title">Customer</span>
			<span class="value-trailing">
				<span class="value">
					<?= counting("profile WHERE type='customer'", "id") ?>
				</span>
				<span class="trailing">users</span>
			</span>
		</div>
	</a>

	<a href="profile.php?type=vendor">
		<div class="card">
			<span class="title">Vendor</span>
			<span class="value-trailing">
				<span class="value">
					<?= counting("profile WHERE type='vendor'", "id") ?>
				</span>
				<span class="trailing">users</span>
			</span>
		</div>
	</a>
	<a href="profile.php?type=admin">
		<div class="card">
			<span class="title">Admin</span>
			<span class="value-trailing">
				<span class="value">
					<?= counting("profile WHERE type='admin'", "id") ?>
				</span>
				<span class="trailing">users</span>
			</span>
		</div>
	</a>
</div>

<?php include "includes/footer.php"; ?>