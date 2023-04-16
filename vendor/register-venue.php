<?php
include("includes/connect.php");
include("includes/data.php");
$data = [];
$categories = getAll('categories');
$cities = getAll('cities');
$amenities = getAll('amenities');
?>
<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-h21C2fcDk/eFsW9sC9h0dhokq5pDinLNklTKoxIZRUn3+hvmgQSffLLQ4G4l2eEr" crossorigin="anonymous">
<link rel="stylesheet" href="includes/style.css">
<link rel="stylesheet" href="includes/custom.css">
<link href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
<div class="top-bar">
	<div class="title-data">
		<h1>Registration</h1>
		<p>Sporty Ways</p>
	</div>
	<a class="btn btn-primary" href="" type="button" data-toggle="modal" data-target="#myModal"> <img width="30px"
			style="padding-right:10px;filter: invert(100%);"
			src="https://cdn-icons-png.flaticon.com/512/1828/1828427.png"> Logout</a>

</div>
<style>
	.container {
		border-radius: 16px;
		min-width: 90vw;
		max-height: 80vh;
		flex-flow: row;
		display: flex;
		overflow: hidden;
	}

	.banner {
		background-color: red;
		min-height: 100%;
		width: 45%;
		border-radius: 16px;
		margin-right: 3rem;
		overflow: hidden;
	}

	.banner img {
		object-fit: cover;
		height: 100%;
		width: 100%;
		background-color: orange;
		display: flex;
	}

	.form {
		max-height: 100%;
		min-width: 45%;
		display: flex;
		flex-flow: column;
		overflow-y: scroll;
	}
</style>
<div class="container">
	<div class="banner">
		<img src="assets/registration.avif" alt="" srcset="">
	</div>
	<form class='form' method="post" action="add_new_venue.php" enctype='multipart/form-data'>
		<h1>Fill form to register</h1>
		<fieldset>
			<h1 class="hidden-first">Add the detail For your venue</h1>
			<input name="cat" type="hidden" value="venue" />
			<input name="id" type="hidden" value="venue" />
			<input name="act" type="hidden" value="addnew" />

			<label>Name</label>
			<input class="form-control" type="text" name="name" required /><br>

			<label>Category</label>
			<select name="category" class="form-control" type="text" required>
				<?php
				foreach ($categories as $cat) {
					?>
					<option class="form-control">
						<?php echo $cat["name"]; ?>
					</option>
					<?php
				}
				?>
			</select><br>

			<label>City</label>
			<select name="city" class="form-control" type="text" required>
				<?php
				foreach ($cities as $city) {
					?>
					<option class="form-control">
						<?php echo $city["name"]; ?>
					</option>
					<?php
				}
				?>
			</select><br>

			<label>Location</label>
			<input class="form-control" type="text" name="location" required /><br>

			<label>Opening time</label>
			<input class="form-control" type="time" name="opening_time" required /><br>

			<label>Closing time</label>
			<input class="form-control" type="time" name="closing_time" required /><br>

			<label>Rules</label>
			<textarea class="form-control" name="rules" required></textarea><br>

			<label>Email</label>
			<input class="form-control" type="email" name="email" required /><br>

			<label>Phone number</label>
			<input class="form-control" type="number" name="phone_number" required /><br>

			<label>Banner image</label>
			<input class="form-control" type="file" name="banner_image" required /><br>
			<br>
			<label>Amenities</label>
			<select name="amenity[]" class="form-control" type="text" multiple required>
				<?php
				foreach ($amenities as $amenity) {
					?>
					<option class="form-control" value="<?php echo $amenity["id"]; ?>">
						<?php echo $amenity["name"]; ?>
					</option>
					<?php
				}
				?>
			</select><br>
			<input type="submit" value=" Save " class="btn btn-success">
	</form>
</div>
<?php include "includes/footer.php"; ?>
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content" style="border-radius:16px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Logout</h4>
			</div>
			<div class="modal-body">
				<p>Are you sure you want to logout?</p>
			</div>
			<div class="modal-footer">
				<a href="logout.php" type="button" class="btn btn-default">Logout</a>
			</div>
		</div>

	</div>
</div>