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
			<?php echo ($venue['name']) ?>&nbsp; |&nbsp;
			<?php if ($venue['verified'] == 0) {
				echo "Unverified";
			} else {
				echo "Verified";
			} ?>
		</p>
	</div>
	<a class="btn btn-primary" href="" type="button" data-toggle="modal" data-target="#myModal"> <img width="30px"
			style="padding-right:10px;filter: invert(100%);"
			src="https://cdn-icons-png.flaticon.com/512/1828/1828427.png"> Logout</a>

</div>

<div class="cards">
	<a href="edit-venues.php?act=edit">
		<div class="card">
			<span class="title">Edit Venue</span>
			<span class="value-trailing">
				<span class="value">
					Edit
				</span>
				<span class="trailing"></span>
			</span>
		</div>
	</a>
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
</div>

<?php include "includes/footer.php"; ?>