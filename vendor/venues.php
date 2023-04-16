<?php
				include "includes/header.php";
				?>

				<a class="btn btn-primary" href="edit-venues.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Venues</a>

				<h1>Venues</h1>
				<p>This table includes <?php echo counting("venues", "id");?> venues.</p>

				<table id="sorted" class="table table-striped table-bordered">
				<thead>
				<tr>
							<th>Id</th>
			<th>Name</th>
			<th>Category</th>
			<th>City</th>
			<th>Location</th>
			<th>Opening time</th>
			<th>Closing time</th>
			<th>Rules</th>
			<th>Email</th>
			<th>Phone number</th>
			<th>Banner image</th>
			<th>Owner id</th>
			<th>Created at</th>
			<th>Updated at</th>

				<th class="not">Edit</th>
				<th class="not">Delete</th>
				</tr>
				</thead>

				<?php
				$venues = getAll("venues");
				if($venues) foreach ($venues as $venuess):
					?>
					<tr>
		<td><?php echo $venuess['id']?></td>
		<td><?php echo $venuess['name']?></td>
		<td><?php echo $venuess['category']?></td>
		<td><?php echo $venuess['city']?></td>
		<td><?php echo $venuess['location']?></td>
		<td><?php echo $venuess['opening_time']?></td>
		<td><?php echo $venuess['closing_time']?></td>
		<td><?php echo $venuess['rules']?></td>
		<td><?php echo $venuess['email']?></td>
		<td><?php echo $venuess['phone_number']?></td>
		<td><?php echo $venuess['banner_image']?></td>
		<td><?php echo $venuess['owner_id']?></td>
		<td><?php echo $venuess['created_at']?></td>
		<td><?php echo $venuess['updated_at']?></td>


						<td><a href="edit-venues.php?act=edit&id=<?php echo $venuess['id']?>"><i class="glyphicon glyphicon-edit"></i></a></td>
						<td><a href="save.php?act=delete&id=<?php echo $venuess['id']?>&cat=venues" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
						</tr>
					<?php endforeach; ?>
					</table>
					<?php include "includes/footer.php";?>
				