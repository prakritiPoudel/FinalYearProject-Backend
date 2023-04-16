<?php
include "includes/header.php";
?>
<link rel="stylesheet" href="includes/custom.css">

<div class="top-bar">
	<div class="title-data">
		<h1>Profiles</h1>
		<p>
			All the users
		</p>
	</div>
	<span class="btn-grp">
		<a class="btn btn-primary" href="?type=all" type="button">All</a>
		<a class="btn btn-primary" href="?type=customer" type="button">Customers</a>
		<a class="btn btn-primary" href="?type=vendor" type="button">Vendors</a>
		<a class="btn btn-primary" href="?type=admin" type="button">Admins</a>
	</span>
</div>
<table id="sorted" class="table table-bordered">
	<thead>
		<tr>
			<th>Id</th>
			<th>Username</th>
			<th>Email</th>
			<th>Full name</th>
			<th>Phone no</th>
			<th>Gender</th>
			<th>Type</th>
			<th>Profile picture</th>
			<th>Created at</th>
			<th>Updated at</th>

			<th class="not">Delete</th>
		</tr>
	</thead>

	<?php
	$type = $_GET['type'] ?? "all";
	if ($type == "customer") {
		$profile = getAll("profile WHERE type='customer'");
	} else if ($type == "vendor") {
		$profile = getAll("profile WHERE type='vendor'");
	} else if ($type == "admin") {
		$profile = getAll("profile WHERE type='admin'");
	} else {
		$profile = getAll("profile");
	}
	if ($profile)
		foreach ($profile as $profiles):
			?>
			<tr>
				<td>
					<?php echo $profiles['id'] ?>
				</td>
				<td>
					<?php echo $profiles['username'] ?>
				</td>
				<td>
					<?php echo $profiles['email'] ?>
				</td>
				<td>
					<?php echo $profiles['full_name'] ?>
				</td>
				<td>
					<?php echo $profiles['phone_no'] ?>
				</td>
				<td>
					<?php echo $profiles['gender'] ?>
				</td>
				<td>
					<?php echo $profiles['type'] ?>
				</td>
				<td>
					<img src="../media/<?php echo $profiles['profile_picture'] ?>" alt="" srcset="" height="80px">

				</td>
				<td>
					<?php echo $profiles['created_at'] ?>
				</td>
				<td>
					<?php echo $profiles['updated_at'] ?>
				</td>
				<td><a href="save.php?act=delete&id=<?php echo $profiles['id'] ?>&cat=profile"
						onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
			</tr>
		<?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>