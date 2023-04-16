<?php
				include "includes/header.php";
				?>

				<a class="btn btn-primary" href="edit-fav_venue.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Fav_venue</a>

				<h1>Fav_venue</h1>
				<p>This table includes <?php echo counting("fav_venue", "id");?> fav_venue.</p>

				<table id="sorted" class="table table-striped table-bordered">
				<thead>
				<tr>
							<th>Id</th>
			<th>Venue id</th>
			<th>Owner id</th>
			<th>Created at</th>

				<th class="not">Edit</th>
				<th class="not">Delete</th>
				</tr>
				</thead>

				<?php
				$fav_venue = getAll("fav_venue");
				if($fav_venue) foreach ($fav_venue as $fav_venues):
					?>
					<tr>
		<td><?php echo $fav_venues['id']?></td>
		<td><?php echo $fav_venues['venue_id']?></td>
		<td><?php echo $fav_venues['owner_id']?></td>
		<td><?php echo $fav_venues['created_at']?></td>


						<td><a href="edit-fav_venue.php?act=edit&id=<?php echo $fav_venues['id']?>"><i class="glyphicon glyphicon-edit"></i></a></td>
						<td><a href="save.php?act=delete&id=<?php echo $fav_venues['id']?>&cat=fav_venue" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
						</tr>
					<?php endforeach; ?>
					</table>
					<?php include "includes/footer.php";?>
				