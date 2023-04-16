<?php
include "includes/header.php";
$data = [];

$act = $_GET['act'];
if ($act == "edit") {
	$id = $_GET['id'];
	$amenities = getById("amenities", $id);
}
?>

<form method="post" action="save.php" enctype='multipart/form-data'>
	<fieldset>
		<legend class="hidden-first">Add New Amenities</legend>
		<input name="cat" type="hidden" value="amenities">
		<input name="id" type="hidden" value="<?= $id ?>">
		<input name="act" type="hidden" value="<?= $act ?>">

		<label>Name</label>
		<input class="form-control" type="text" name="name" value="<?= $amenities['name'] ?>" required /><br>

		<label>Icon</label>
		<input class="form-control" type="file" name="icon" value="<?= $amenities['icon'] ?>" /><br>
		<br>
		<input type="submit" value=" Save " class="btn btn-success">
</form>
<?php include "includes/footer.php"; ?>