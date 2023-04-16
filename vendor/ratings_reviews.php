<?php
include "includes/header.php";
?>
<h1>Feedbacks</h1>
<p>This table includes
	<?php echo counting("ratings_reviews", "id"); ?> feedbacks.
</p>

<table id="sorted" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Id</th>
			<th>Rating</th>
			<th>Review</th>
			<th>Submitted at</th>
		</tr>
	</thead>

	<?php
	$id = $_COOKIE['admin_id'];
	$query = mysqli_query($link, "SELECT * FROM venues WHERE owner_id = $id");
	$row = mysqli_fetch_array($query);
	$venue_id = $row['id'];
	$ratings_reviews = getAll("ratings_reviews WHERE venue_id=$venue_id");
	if ($ratings_reviews)
		foreach ($ratings_reviews as $ratings_reviewss):
			?>
			<tr>
				<td>
					<?php echo $ratings_reviewss['id'] ?>
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
			</tr>
		<?php endforeach; ?>
</table>
<?php include "includes/footer.php"; ?>