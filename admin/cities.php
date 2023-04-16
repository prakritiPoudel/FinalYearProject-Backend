<?php
include "includes/header.php";
?>

<a class="btn btn-primary" href="edit-cities.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New
	Cities</a>

<h1>Cities</h1>
<p>This table includes
	<?php echo counting("cities", "id"); ?> cities.
</p>

<table id="sorted" class="table table-bordered">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>

			<th class="not">Edit</th>
			<th class="not">Delete</th>
		</tr>
	</thead>

	<?php
	$cities = getAll("cities");
	if ($cities)
		foreach ($cities as $citiess):
			?>
			<tr>
				<td>
					<?php echo $citiess['id'] ?>
				</td>
				<td>
					<?php echo $citiess['name'] ?>
				</td>

				<td><a href="edit-cities.php?act=edit&id=<?php echo $citiess['id'] ?>"><i
							class="glyphicon glyphicon-edit"></i></a></td>
				<td><a href="save.php?act=delete&id=<?php echo $citiess['id'] ?>&cat=cities"
						onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
			</tr>
		<?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>