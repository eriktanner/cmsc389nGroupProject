<!doctype html>
<html lang = "en">
	<head>
		<title>Sell Item</title>
		<link rel="stylesheet" href="marketplaceStyleSheet.css">
		<meta charset="utf-8">
	</head>

	<body>
		<div class="header">
			<div class="containerHeader">
				<div class="logo">
					<img src="../Images/umd_hub_red.jpg" alt = "UmdHub" height = 75>
				</div>
			</div>
		</div>
		<div class="containerBody">	
			<h1>Edit Profile</h1>
			<!--Need to add Image and Category-->
			<form action="sellItem.php" method="post">
				<label for="itemName">Name:</label>
 				<input required name="itemName" id="itemName">
				<br>
				<label for="price">Price:</label>
 				<input required name="price" id="price">
				<br>
				<label for="description">Description:</label><br>
				<textarea required name="description" id="description" name ="comments" rows="7" cols="50"></textarea>
				<br>
				<input type="submit" value="Submit" name="postItem">
				<input type="reset" value="Reset">
				<input type="button" onclick="location.href='profile.php';" value="Cancel">
			</form>
		</div>
	</body>
</html>