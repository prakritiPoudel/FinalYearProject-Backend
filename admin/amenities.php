<?php
include "includes/header.php";
?>

<a class="btn btn-primary" href="edit-amenities.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New
	Amenities</a>

<h1>Amenities</h1>
<p>This table includes
	<?php echo counting("amenities", "id"); ?> amenities.
</p>

<table id="sorted" class="table table-bordered">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Icon</th>

			<th class="not">Edit</th>
			<th class="not">Delete</th>
		</tr>
	</thead>

	<?php
	$amenities = getAll("amenities");
	if ($amenities)
		foreach ($amenities as $amenitiess):
			?>
			<tr>
				<td>
					<?php echo $amenitiess['id'] ?>
				</td>
				<td>
					<?php echo $amenitiess['name'] ?>
				</td>
				<td>
					<img src="../media/<?php echo $amenitiess['icon'] ?>" alt="" srcset="" height="40px">
				</td>


				<td><a href="edit-amenities.php?act=edit&id=<?php echo $amenitiess['id'] ?>"><i
							class="glyphicon glyphicon-edit"></i></a></td>
				<td><a href="save.php?act=delete&id=<?php echo $amenitiess['id'] ?>&cat=amenities"
						onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
			</tr>
		<?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>