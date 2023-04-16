<?php
				include "includes/header.php";
				?>

				<a class="btn btn-primary" href="edit-venue_amenities.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Venue_amenities</a>

				<h1>Venue_amenities</h1>
				<p>This table includes <?php echo counting("venue_amenities", "id");?> venue_amenities.</p>

				<table id="sorted" class="table table-striped table-bordered">
				<thead>
				<tr>
							<th>Id</th>
			<th>Venue id</th>
			<th>Amenity id</th>
			<th>Created at</th>

				<th class="not">Edit</th>
				<th class="not">Delete</th>
				</tr>
				</thead>

				<?php
				$venue_amenities = getAll("venue_amenities");
				if($venue_amenities) foreach ($venue_amenities as $venue_amenitiess):
					?>
					<tr>
		<td><?php echo $venue_amenitiess['id']?></td>
		<td><?php echo $venue_amenitiess['venue_id']?></td>
		<td><?php echo $venue_amenitiess['amenity_id']?></td>
		<td><?php echo $venue_amenitiess['created_at']?></td>


						<td><a href="edit-venue_amenities.php?act=edit&id=<?php echo $venue_amenitiess['id']?>"><i class="glyphicon glyphicon-edit"></i></a></td>
						<td><a href="save.php?act=delete&id=<?php echo $venue_amenitiess['id']?>&cat=venue_amenities" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
						</tr>
					<?php endforeach; ?>
					</table>
					<?php include "includes/footer.php";?>
				