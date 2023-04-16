<?php
include "includes/header.php";
$data = [];

$act = $_GET['act'];
if ($act == "edit") {
	$id = $_GET['id'];
	$banners = getById("banners", $id);
}
?>

<form method="post" action="save.php" enctype='multipart/form-data'>
	<fieldset>
		<legend class="hidden-first">Add New Banners</legend>
		<input name="cat" type="hidden" value="banners">
		<input name="id" type="hidden" value="<?= $id ?>">
		<input name="act" type="hidden" value="<?= $act ?>">

		<label>Banner</label>
		<input class="form-control" type="file" name="banner" value="<?= $banners['banner'] ?>" /><br>
		<br>
		<input type="submit" value=" Save " class="btn btn-success">
</form>
<?php include "includes/footer.php"; ?>