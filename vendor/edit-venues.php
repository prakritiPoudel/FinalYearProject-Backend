<?php
include "includes/header.php";
include("includes/connect.php");

$data = [];

$act = $_GET['act'];
if ($act == "edit") {
	$id = $_COOKIE['admin_id'];
	$query = mysqli_query($link, "SELECT * FROM venues WHERE owner_id = $id");
	$row = mysqli_fetch_array($query);
	$venue_id = $row['id'];
	$venues = getById("venues", $venue_id);

	$categories = getAll('categories');
	$cities = getAll('cities');
	$venue_amenities = getAll("venue_amenities WHERE venue_id=$venue_id");
	$amenities = getAll('amenities');
}
?>

<form method="post" action="save.php" enctype='multipart/form-data'>
	<fieldset>
		<legend class="hidden-first">Edit Venue :
			<?php echo ($row['name']) ?>
		</legend>
		<input name="cat" type="hidden" value="venues">
		<input name="id" type="hidden" value="<?= $venue_id ?>">
		<input name="act" type="hidden" value="edit">

		<label>Name</label>
		<input class="form-control" type="text" name="name" value="<?= $venues['name'] ?>" /><br>

		<label>Category</label>
		<select name="category" class="form-control" type="text" required>
			<?php
			foreach ($categories as $cat) {
				?>
				<option value="<?php echo $cat["id"]; ?>" <?php if ($cat['id'] == $venues['category']) {
					   echo "Selected";
				   } ?>>
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
				<option value="<?php echo $city["id"]; ?>" <?php if ($city['id'] == $venues['city']) {
					   echo "Selected";
				   } ?>>
					<?php echo $city["name"]; ?>
				</option>
				<?php
			}
			?>
		</select><br>


		<label>Location</label>
		<input class="form-control" type="text" name="location" value="<?= $venues['location'] ?>" /><br>

		<label>Opening time</label>
		<input class="form-control" type="text" name="opening_time" value="<?= $venues['opening_time'] ?>" /><br>

		<label>Closing time</label>
		<input class="form-control" type="text" name="closing_time" value="<?= $venues['closing_time'] ?>" /><br>

		<label>Rules</label>
		<textarea class="form-control" name="rules"><?= $venues['rules'] ?></textarea><br>

		<label>Email</label>
		<input class="form-control" type="text" name="email" value="<?= $venues['email'] ?>" /><br>

		<label>Phone number</label>
		<input class="form-control" type="text" name="phone_number" value="<?= $venues['phone_number'] ?>" /><br>

		<label>Banner image</label>
		<input class="form-control" type="file" name="banner_image" value="<?= $venues['banner_image'] ?>" /><br>

		<label>Amenities</label>
		<select name="amenity[]" class="form-control" type="text" multiple required>
			<?php
			foreach ($amenities as $amenity) {
				$selected = '';
				foreach ($venue_amenities as $va) {
					if ($va['amenity_id'] == $amenity['id']) {
						$selected = 'selected';
						break;
					}
				}
				echo '<option value="' . $amenity['id'] . '" ' . $selected . '>' . $amenity['name'] . '</option>';
			}
			?>
		</select><br>
		<br>
		<input type="submit" value=" Save " class="btn btn-success">
</form>
<?php include "includes/footer.php"; ?>