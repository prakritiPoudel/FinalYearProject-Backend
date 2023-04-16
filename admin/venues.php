<?php
include "includes/header.php";
?>
<link rel="stylesheet" href="includes/custom.css">
<style>
	.table {
		max-width: 78vw !important;
		overflow-X: scroll;

	}

	.top-bar {
		width: 78vw;
	}

	.btn-grp {
		display: flex;
		align-items: end;
		gap: 1rem;
	}

	.button {
		border-radius: 8px !important;
		background-color: #97C4FD !important;
		padding: 1rem 2rem;
	}

	.table {
		padding: 1rem;
	}
</style>
<div class="top-bar">
	<div class="title-data">
		<h1>Venues</h1>
		<p>
			All the venues
		</p>
	</div>
	<span class="btn-grp">
		<a class="button button-primary" href="?type=all" type="button">All</a>
		<a class="button button-primary" href="?type=verified" type="button">Veried</a>
		<a class="button button-primary" href="?type=unverified" type="button">Unverified</a>
	</span>
</div>

<div class="table">
	<table id="sorted" class="table table-bordered">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Category</th>
				<th>City</th>
				<th>Location</th>
				<th>Opening time</th>
				<th>Closing time</th>
				<th>Rules</th>
				<th>Email</th>
				<th>Phone number</th>
				<th>Banner image</th>
				<th>Owner</th>
				<th class="not">View</th>
				<th class="not">Delete</th>
			</tr>
		</thead>

		<?php
		$type = $_GET['type'] ?? "all";
		$value = 0;
		if ($type == "verified") {
			$venues = getAll("venues WHERE verified=1");
		} else if ($type == "unverified") {
			$venues = getAll("venues WHERE verified=0");
		} else {
			$venues = getAll("venues");
		}
		if ($venues)
			foreach ($venues as $venuess):
				?>
				<tr>
					<td>
						<?php echo $venuess['id'] ?>
					</td>
					<td>
						<?php echo $venuess['name'] ?>
					</td>
					<td>
						<?php
						$cat_id = $venuess['category'];
						$query = mysqli_query($link, "SELECT * FROM categories WHERE id = $cat_id");
						$row = mysqli_fetch_array($query);
						echo $row['name'];
						?>
					</td>
					<td>
						<?php
						$city_id = $venuess['city'];
						$query = mysqli_query($link, "SELECT * FROM cities WHERE id = $city_id");
						$row = mysqli_fetch_array($query);
						echo $row['name'];
						?>
					</td>
					<td>
						<?php echo $venuess['location'] ?>
					</td>
					<td>
						<?php echo $venuess['opening_time'] ?>
					</td>
					<td>
						<?php echo $venuess['closing_time'] ?>
					</td>
					<td>
						<?php echo $venuess['rules'] ?>
					</td>
					<td>
						<?php echo $venuess['email'] ?>
					</td>
					<td>
						<?php echo $venuess['phone_number'] ?>
					</td>
					<td>
						<img src="../media/<?php echo $venuess['banner_image'] ?>" alt="" srcset="" height="80px">

					</td>
					<td>
						<?php
						$owner_id = $venuess['owner_id'];
						$query = mysqli_query($link, "SELECT * FROM profile WHERE id = $owner_id");
						$row = mysqli_fetch_array($query);
						echo $row['email'];
						?>
					</td>
					<td>
						<a href="venue_detail_page.php?id=<?php echo $venuess['id'] ?>" class="btn btn-primary">View</a>
					</td>
					<td><a href="save.php?act=delete&id=<?php echo $venuess['id'] ?>&cat=venues"
							onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
				</tr>
			<?php endforeach; ?>
	</table>
</div>
<?php include "includes/footer.php"; ?>