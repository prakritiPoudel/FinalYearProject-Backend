<?php
include "includes/header.php";
?>

<a class="btn btn-primary" href="edit-categories.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New
	Categories</a>

<h1>Categories</h1>
<p>This table includes
	<?php echo counting("categories", "id"); ?> categories.
</p>

<table id="sorted" class="table table-bordered">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Icon</th>
			<th>Description</th>

			<th class="not">Edit</th>
			<th class="not">Delete</th>
		</tr>
	</thead>

	<?php
	$categories = getAll("categories");
	if ($categories)
		foreach ($categories as $categoriess):
			?>
			<tr>
				<td>
					<?php echo $categoriess['id'] ?>
				</td>
				<td>
					<?php echo $categoriess['name'] ?>
				</td>
				<td>
					<img src="../media/<?php echo $categoriess['icon'] ?>" alt="" srcset="" height="40px">

				</td>
				<td>
					<?php echo $categoriess['description'] ?>
				</td>
				<td><a href="edit-categories.php?act=edit&id=<?php echo $categoriess['id'] ?>"><i
							class="glyphicon glyphicon-edit"></i></a></td>
				<td><a href="save.php?act=delete&id=<?php echo $categoriess['id'] ?>&cat=categories"
						onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
			</tr>
		<?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>