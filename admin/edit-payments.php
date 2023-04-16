<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$payments = getById("payments", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Payments</legend>
						<input name="cat" type="hidden" value="payments">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Amount</label>
							<input class="form-control" type="text" name="amount" value="<?=$payments['amount']?>" /><br>
							
							<label>Transaction id</label>
							<input class="form-control" type="text" name="transaction_id" value="<?=$payments['transaction_id']?>" /><br>
							
							<label>User id</label>
							<input class="form-control" type="text" name="user_id" value="<?=$payments['user_id']?>" /><br>
							
							<label>Venue id</label>
							<input class="form-control" type="text" name="venue_id" value="<?=$payments['venue_id']?>" /><br>
							
							<label>Created at</label>
							<input class="form-control" type="text" name="created_at" value="<?=$payments['created_at']?>" /><br>
							
							<label>Updated at</label>
							<input class="form-control" type="text" name="updated_at" value="<?=$payments['updated_at']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				