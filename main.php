<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Dashboard</title>
<link rel="stylesheet" type="text/css" href="css/dashboard.css">
</head>
<body>
	<div class="container">
		<div class="navigation">
			<ul>
				<li>
					<a href="#">
						<span class="icon"><ion-icon name="cube-outline"></ion-icon></span>
						<span class="title"><img src="images/logo2.png"></span>
					</a>
				</li>
				<li>
					<a href="dashboard.php">
						<span class="icon"><ion-icon name="home-outline"></ion-icon></span>
						<span class="title">Dashboard</span>
					</a>
				</li>
				<li>
					<a href="Inventory.php">
						<span class="icon"><ion-icon name="documents-outline"></ion-icon></span>
						<span class="title">Inventory</span>
					</a>
				</li>
				<li>
					<a href="category.php">
						<span class="icon"><ion-icon name="duplicate-outline"></ion-icon></span>
						<span class="title">Category</span>
					</a>
				</li>
				<li>
					<a href="InventoryTag.php">
						<span class="icon"><ion-icon name="pricetag-outline"></ion-icon></span>
						<span class="title">Inventory Tag</span>
					</a>
				</li>
				<li>
					<a href="Reports.php">
						<span class="icon"><ion-icon name="bar-chart-outline"></ion-icon></span>
						<span class="title">Reports</span>
					</a>
				</li>
				<li>
					<a href="help.php">
						<span class="icon"><ion-icon name="help-outline"></ion-icon></span>
						<span class="title">Help</span>
					</a>
				</li>
				<li>
					<a href="setting.php">
						<span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
						<span class="title">Setting</span>
					</a>
				</li>
			</ul>
		</div>

		<!-- main -->
		<div class="main">
			<div class="topbar">
				<div class="toggle">
					<ion-icon name="menu-outline"></ion-icon>
				</div>

				<h1><b>Dashboard</b></h1>

				<!-- search -->
				<div class ="search">
					<label>
						<input type="text" placeholder="Search here">
						<ion-icon name="search-outline"></ion-icon>
					</label>
				</div>

				<!-- QR Code -->
				<div class ="qrCode">
					<ion-icon name="qr-code-outline"></ion-icon>
				</div>

				<!-- userImg -->
				<div class="user">
					<img src="images/user.jpg">
				</div>
			</div>

			<div class="Inventory">
				<div class="List">

				</div>
			</div>
		</div>

	</div>

	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

	<script>
		// MenuToggle
		let toggle = document.querySelector('.toggle');
		let navigation = document.querySelector('.navigation');
		let main = document.querySelector('.main');

		toggle.onclick= function(){
			navigation.classList.toggle('active');
			main.classList.toggle('active');
		}

		// add hovered class in selected list item
		let list  = document.querySelectorAll('.navigation li');
		function activeLink(){
			list.forEach((item) =>
			item.classList.remove('hovered'));
			this.classList.add('hovered');
		}

			list.forEach((item) =>
			item.addEventListener('mouseover', activeLink));
	</script>

</body>
</html>
