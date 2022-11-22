<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Dashboard</title>
	<link rel="stylesheet" type="text/css" href="css/InventoryAdd.css">
</head>
<body>
	<?php include 'main.php';?>
	<div class="topbar"></div>

	<div class="container">
		<div class="main">

			<!-- Inventory Item Title -->
			<form action="/action_page.php">
				<div class="title3">
					<fieldset>
						<legend>New Item</legend>
						<div class="inputField">
							<label1>Date Received</label1>
						    <input type="text1" class="input">
						    <ion-icon name="calendar-outline"></ion-icon>
					    </div>
					    <div class="inputField">
						    <label>Name</label>
						    <input type="text" class="input">
						</div>
						<div class="inputField">
							<label>ID</label>
						    <input type="text" class="input">
						</div>
						<div class="inputField">
							<label>Category</label>
						    	<select>
						    		<option value=""></option>
						    	</select>
						</div>
						<div class="inputField">
							<label>Unit</label>
						    	<select>
						    		<option value=""></option>
						    	</select>
						</div>
						<div class="inputField">
							<label>Quantity</label>
						    	<select>
						    		<option value=""></option>
						    	</select>
						</div>
						<div class="inputField">
							<label>Minimum Stock</label>
						    	<select>
						    		<option value=""></option>
						    	</select>
						</div>
						<div class="inputField">
							<label>Maximum Stock</label>
						    	<select>
						    		<option value=""></option>
						    	</select>
						</div>
						<div class="inputField">
							<label>Description</label>
						    <input type="textarea" class="input">
						</div>
						<div class="inputField1">
						    <input type="submit" value="Submit">
						    <input type="submit" value="Cancel">
						</div>
						<div class="dragpicture">
							<div class="pic">
								<img src="photocapture.png">
							</div>
								<ion-icon name="qr-code-outline"></ion-icon>
						</div>

						<div><span class="drag">Drag image here</span></div>
						<div><span class="or">or</span></div>
						<div><span class="browse"><b>Browse image</b></span></div>

					</fieldset>
				</div>
			</form>

			<!-- Inventory List Title -->
			<div class="title4">
				<fieldset>
					<legend>List of Item</legend>
				</fieldset>
			</div>

		</div>
	</div>

</body>
</html>
