<?php
include "includes/header.php";
?>

<h1>Ratings_reviews</h1>
<p>This table includes
	<?php echo counting("ratings_reviews", "id"); ?> ratings_reviews.
</p>

<table id="sorted" class="table table-bordered">
	<thead>
		<tr>
			<th>Id</th>
			<th>Venue id</th>
			<th>User id</th>
			<th>Rating</th>
			<th>Review</th>
			<th>Created at</th>
			<th class="not">Delete</th>
		</tr>
	</thead>

	<?php
	$ratings_reviews = getAll("ratings_reviews");
	if ($ratings_reviews)
		foreach ($ratings_reviews as $ratings_reviewss):
			?>
			<tr>
				<td>
					<?php echo $ratings_reviewss['id'] ?>
				</td>
				<td>
					<?php
					$venue_id = $ratings_reviewss['venue_id'];
					$query = mysqli_query($link, "SELECT * FROM venues WHERE id = $venue_id");
					$row = mysqli_fetch_array($query);

					echo $row['name'];
					?>
				</td>
				<td>
					<?php
					$user_id = $ratings_reviewss['user_id'];
					$query = mysqli_query($link, "SELECT * FROM profile WHERE id = $user_id");
					$row = mysqli_fetch_array($query);
					echo $row['username'];
					?>
				</td>
				<td>
					<?php echo $ratings_reviewss['rating'] ?> ⭐
				</td>
				<td>
					<?php echo $ratings_reviewss['review'] ?>
				</td>
				<td>
					<?php echo $ratings_reviewss['created_at'] ?>
				</td>


				<td><a href="save.php?act=delete&id=<?php echo $ratings_reviewss['id'] ?>&cat=ratings_reviews"
						onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
			</tr>
		<?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>