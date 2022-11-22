<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Dashboard</title>
	<link rel="stylesheet" type="text/css" href="css/categoryAdd.css">
</head>
<body>
	<?php include 'main.php';?>
	<div class="topbar"></div>

	<div class="container">
		<div class="main">

			<!-- Inventory tag Form -->
			<div class="title6">
				<fieldset>
					<legend>New Category</legend>
					<div class="inputField">
						<label>ID</label>
						<input type="text" class="input">
					</div>
					<div class="inputField1">
						<label>Name</label>
						<input type="text" class="input">
					</div>
					<div class="inputField2">
						<label>Category</label>
						<select>
						    <option value=""></option>
						</select>
					</div>
					<div class="inputField1">
						<input type="submit" value="Submit">
						<input type="submit" value="Cancel">
					</div>
				</fieldset>
			</div>

			<!-- Inventory List Title -->
			<div class="title4">
				<fieldset>
					<legend>List of Category</legend>
				</fieldset>
			</div>
		</div>

</body>
</html>
