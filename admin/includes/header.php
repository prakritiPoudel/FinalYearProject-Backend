<?php
error_reporting(0);
session_start();
if ($_COOKIE["auth"] != "admin_in") {
	header("location:" . "./");
}
include("includes/connect.php");
include("includes/data.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="@housamz">

	<meta name="description" content="Mass Admin Panel">
	<title>Sporty_way Admin Panel</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-h21C2fcDk/eFsW9sC9h0dhokq5pDinLNklTKoxIZRUn3+hvmgQSffLLQ4G4l2eEr" crossorigin="anonymous">

	<!-- Custom CSS -->

	<link href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
	<style>
		body {
			background-color: #b8d3ff;
		}

		nav {
			border-radius: 16px;
			margin: 10px;
			background-color: white;
			/* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); */
		}

		.header {
			background-color: white;
			height: 20vh;
			border: 1px solid black;
			display: flex;
			align-items: center;
			place-content: center;
			flex-direction: column;
			border-radius: 16px;
			margin-bottom: 20px;
		}

		.header span {
			color: black;
			font-size: 2rem;
		}

		.header img {
			height: 15vh;
			width: 15vh;
		}

		ul li {
			background-color: white;
		}



		ul li:checked {
			color: blue;
		}

		#active {
			background-color: #b8d3ff;
		}

		#active a:hover {
			background-color: transparent !important;
			margin-left: 0;
		}

		#sidebar ul li a span {
			margin-right: 10px;

		}


		.small-list-tile {
			display: flex;
			justify-content: space-between;
			align-items: center;
		}



		.small-list-tile .title {
			display: flex;
			flex-flow: row;
			align-items: center;
			max-width: 70%;
			min-height: 2.5rem;
			margin: 1px;
			padding-left: 10px;
			color: black;
		}


		.small-list-tile img {
			height: 20px;
			width: 20px;
		}


		.title img:first-child {
			margin-right: 15px;
			height: 15px;
			width: 15px;
			transform: scale(120%);
			color: orange;
			filter: hue-rotate(275deg) !important;

		}


		.form-control {
			border: none;
			border: solid 1px #ccc;
			border-radius: 10px !important;
		}

		#active {
			background-color: #ffe2ac;
			margin-left: 10px;
			border-radius: 50px 0 0 50px;
		}

		.btn {
			border-radius: 8px !important;
			background-color: #00BEF3 !important;
			padding: 1rem 2rem;
			border: none;
		}
	</style>
	<link rel="stylesheet" href="includes/style.css">
</head>

<body>

	<div class="wrapper">
		<!-- Sidebar Holder -->
		<nav id="sidebar">
			<div class="header">
				<img src="assets/sporty.webp" alt="LOGO">
				<span>Admin Panel</span>
			</div>
			<!-- start sidebar -->
			<ul class="list-unstyled components">
				<li>
					<a href="home.php">
						<span class="small-list-tile">
							<span class="title">
								<img class="leading" src="https://cdn-icons-png.flaticon.com/512/1828/1828765.png">
								Home
							</span>
						</span>
					</a>
				</li>
				<li>
					<a href="amenities.php">
						<span class="small-list-tile">
							<span class="title">
								<img class="leading" src="https://cdn-icons-png.flaticon.com/512/5569/5569304.png">
								Amenities
							</span>
							<span class="trailing">
								<?= counting("amenities", "id") ?>
							</span>
						</span>
					</a>
				</li>
				<li>
					<a href="banners.php">
						<span class="small-list-tile">
							<span class="title">
								<img class="leading" src="https://cdn-icons-png.flaticon.com/512/2907/2907972.png">
								Banners
							</span>
							<span class="trailing">
								<?= counting("banners", "id") ?>
							</span>
						</span>
					</a>
				</li>
				<li>
					<a href="categories.php">
						<span class="small-list-tile">
							<span class="title">
								<img class="leading" src="https://cdn-icons-png.flaticon.com/512/3405/3405828.png">
								Categories
							</span>
							<span class="trailing">
								<?= counting("categories", "id") ?>
							</span>
						</span>
					</a>
				</li>
				<li>
					<a href="cities.php">
						<span class="small-list-tile">
							<span class="title">
								<img class="leading" src="https://cdn-icons-png.flaticon.com/512/2838/2838912.png">
								Cities
							</span>
							<span class="trailing">
								<?= counting("cities", "id") ?>
							</span>
						</span>
					</a>
				</li>
				<li>
					<a href="payments.php">
						<span class="small-list-tile">
							<span class="title">
								<img class="leading" src="https://cdn-icons-png.flaticon.com/512/1989/1989125.png">
								Payments
							</span>
							<span class="trailing">
								<?= counting("payments", "id") ?>
							</span>
						</span>
					</a>
				</li>
				<li>
					<a href="profile.php">
						<span class="small-list-tile">
							<span class="title">
								<img class="leading" src="https://cdn-icons-png.flaticon.com/512/1077/1077063.png">
								Profile
							</span>
							<span class="trailing">
								<?= counting("profile", "id") ?>
							</span>
						</span>
					</a>
				</li>
				<li>
					<a href="ratings_reviews.php">
						<span class="small-list-tile">
							<span class="title">
								<img class="leading" src="https://cdn-icons-png.flaticon.com/512/813/813419.png">
								Feedbacks
							</span>
							<span class="trailing">
								<?= counting("ratings_reviews", "id") ?>
							</span>
						</span>
					</a>
				</li>

				<li>
					<a href="venues.php">
						<span class="small-list-tile">
							<span class="title">
								<img class="leading" src="https://cdn-icons-png.flaticon.com/512/6018/6018476.png">
								Venues
							</span>
							<span class="trailing">
								<?= counting("venues", "id") ?>
							</span>
						</span>
					</a>
				</li>

				<li>
					<a href="" type="button" data-toggle="modal" data-target="#myModal">
						<span class="small-list-tile">
							<span class="title">
								<img class="leading" src="https://cdn-icons-png.flaticon.com/512/1828/1828427.png">
								Logout</span>

						</span>
					</a>
				</li>
			</ul>

		</nav><!-- /end sidebar -->
		<!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content" style="border-radius:16px;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Logout</h4>
					</div>
					<div class="modal-body">
						<p>Are you sure you want to logout?</p>
					</div>
					<div class="modal-footer">
						<a href="logout.php" type="button" class="btn btn-default">Logout</a>
					</div>
				</div>

			</div>
		</div>
		<!-- Page Content Holder -->
		<div id="content">