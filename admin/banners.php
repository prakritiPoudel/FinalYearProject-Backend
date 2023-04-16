<?php
include "includes/header.php";
?>

<a class="btn btn-primary" href="edit-banners.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New
	Banners</a>

<h1>Banners</h1>
<p>This table includes
	<?php echo counting("banners", "id"); ?> banners.
</p>

<table id="sorted" class="table table-bordered">
	<thead>
		<tr>
			<th>Id</th>
			<th>Banner</th>
			<th class="not">Delete</th>
		</tr>
	</thead>

	<?php
	$banners = getAll("banners");
	if ($banners)
		foreach ($banners as $bannerss):
			?>
			<tr>
				<td>
					<?php echo $bannerss['id'] ?>
				</td>
				<td>
					<img src="../media/<?php echo $bannerss['banner'] ?>" alt="" srcset="" height="80px">
				</td>
				<td><a href="save.php?act=delete&id=<?php echo $bannerss['id'] ?>&cat=banners"
						onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
			</tr>
		<?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>