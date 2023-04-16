<?php
include "includes/header.php";
$data = [];

$act = $_GET['act'];
if ($act == "edit") {
	$id = $_GET['id'];
	$categories = getById("categories", $id);
}
?>

<form method="post" action="save.php" enctype='multipart/form-data'>
	<fieldset>
		<legend class="hidden-first">Add New Categories</legend>
		<input name="cat" type="hidden" value="categories">
		<input name="id" type="hidden" value="<?= $id ?>">
		<input name="act" type="hidden" value="<?= $act ?>">

		<label>Name</label>
		<input class="form-control" type="text" name="name" value="<?= $categories['name'] ?>" /><br>

		<label>Icon</label>
		<input class="form-control" type="file" name="icon" value="<?= $categories['icon'] ?>" /><br>

		<label>Description</label>
		<textarea class="form-control" name="description"><?= $categories['description'] ?></textarea><br>

		<br>
		<input type="submit" value=" Save " class="btn btn-success">
</form>
<?php include "includes/footer.php"; ?>