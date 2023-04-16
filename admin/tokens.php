<?php
include "includes/header.php";
?>

<a class="btn btn-primary" href="edit-tokens.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New
	Tokens</a>

<h1>Tokens</h1>
<p>This table includes
	<?php echo counting("tokens", "id"); ?> tokens.
</p>

<table id="sorted" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Id</th>
			<th>Email</th>
			<th>Otp code</th>
			<th>Created at</th>

			<th class="not">Edit</th>
			<th class="not">Delete</th>
		</tr>
	</thead>

	<?php
	$tokens = getAll("tokens");
	if ($tokens)
		foreach ($tokens as $tokenss):
			?>
			<tr>
				<td>
					<?php echo $tokenss['id'] ?>
				</td>
				<td>
					<?php echo $tokenss['email'] ?>
				</td>
				<td>
					<?php echo $tokenss['otp_code'] ?>
				</td>
				<td>
					<?php echo $tokenss['created_at'] ?>
				</td>


				<td><a href="edit-tokens.php?act=edit&id=<?php echo $tokenss['id'] ?>"><i
							class="glyphicon glyphicon-edit"></i></a></td>
				<td><a href="save.php?act=delete&id=<?php echo $tokenss['id'] ?>&cat=tokens"
						onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
			</tr>
		<?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>