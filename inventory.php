<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!----======== CSS ======== -->
	<link rel="stylesheet" href="css/style.css">

	<!----===== Iconscout CSS ===== -->
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

	<title> Inventory</title>

	<link rel="stylesheet" type="text/css" href="css/Inventory.css">
</head>
<body>

	<nav>
				<?php include 'sidebar.php'?>
	</nav>

	<section class="page">
			<div class="top">
					<i class="uil uil-bars sidebar-toggle"></i>

					<div class="search-box">
							<i class="uil uil-search"></i>
							<input type="text" placeholder="Search here...">
					</div>
			</div>

			<div class="page-content">

					<div class="title">
							<i class="uil uil-tachometer-fast-alt"></i>
							<span class="text">Inventory</span>
					</div>

						<!-- Search Bar and Date -->
						<div class ="search1">
							<div class="searchDate">
								<div class="searchs">
									<label>
										<input type="text" placeholder="Search an item here">
										<ion-icon name="search-outline"></ion-icon>
									</label>
								</div>
							</div>
						</div>
							<div class="searchs">
								<form action="/action_page.php">
									<select name="date" id="date">
										<option value="volvo">Date</option>
									</select>
									<select name="category" id="category">
									    <option value="volvo">Category</option>
									</select>
									<select name="status" id="status">
									    <option value="volvo">Status</option>
									</select>
								</form>
							</div>

							<div class="AddBtn">
								<button>Export to Excel<ion-icon name="download-outline"></ion-icon></button>
								<button><a href="InventoryAdd.php">New Inventory</a><ion-icon name="add-outline"></ion-icon></button>
							</div>

							<div class="Inventory">
								<div class="List">

								</div>
							</div>

							<div class="AddBtn1">
								<button>Delete</button>
								<button>Update</button>
							</div>

			</div>

		</section>

		<script src="script/navbarscript.js"></script>

</body>
</html>
