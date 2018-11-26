<!doctype html>
<html lang = "en">
	<head>
		<title>UMD Marketplace</title>
		<link rel="stylesheet" href="marketplaceStyleSheet.css">
		<link rel="stylesheet" href="marketplaceHeaderStyle.css">

		<meta charset="utf-8">
	</head>

	<body>
		<div class="header">
			<div class="containerHeader">
				<div class="logo">
					<img src="../Images/umd_hub_red.jpg" alt = "UmdHub" height = 75>
				</div>
				
				<div class="nav">
					<ul>
						<li style="padding-left: 55px;"><a href="#">All</li>
						<li><a href="#">Clothing</li>
						<li><a href="#">Electronics</li>
						<li><a href="#">School Supplies</li>
						<li><a href="#">Miscellaneous</li>
						<li style="padding-top: 18px; padding-left:25px;"><input type="text" placeholder="Search.." id="search_bar" size="60"></li>
						<li><input type="button" name=submit value="Search"></li>
						<li><select name="sort">
								<option value="Newest">Newest</option>
								<option value="Oldest">Oldest</option>
							  	<option value="nameUp">Name asc</option>
								<option value="NameDown">Name desc</option>
							  	<option value="Cheapest">$ -> $$$</option>
							  	<option value="Expensive">$$$ -> $</option>
							</select></li>
						<li style="padding-left: 25px;"><a href="../Profile/profile.php">Profile</li>
						<li><a href="#">Sign Out</li>	
						<li><form action="sellItem.html"><input type="submit" value="Sell item" /></form></li>

				
							
					</ul>
				</div>
			</div>
		</div>

		<div class="containerBody">	

		<?php
			function epochToDate($date) {
				return date("Y-m-d H:i:s", substr($date, 0, 10));
			}
			
			$host = "localhost";
			$user = "admin";
			$password = "EoqNS14knT98sak6";
			$database = "marketplace";

			$db_connection = new mysqli($host, $user, $password, $database);
			if ($db_connection->connect_error) {
				die("Connection failed: " . $db_connection->connect_error);
			}

			$result = mysqli_query($db_connection,'SELECT * FROM Item ORDER BY Date DESC');

			/*

			echo '<table border="1">';
			echo '<tr>';
			echo '<th>Item Name</th>';
			echo '<th>Price</th>';
			echo '<th>Description</th>';
			echo '<th>Date</th>';
			echo '</tr>';

			while($row = mysqli_fetch_array($result))
			{
				$date = epochToDate($row['Date']);
				echo "<tr>";
				echo "<td>" . $row['Name'] . "</td>";
				echo "<td>" . $row['Price'] . "</td>";
				echo "<td>" . $row['Description'] . "</td>";
				echo "<td>" . $date . "</td>";
				echo "</tr>";
			}
			echo "</table>";
			*/

		?>
			<div class="content">
					<span id="span"></span>	

				
			</div>

		</div>




		<script src="marketplace.js"></script>

	</body>
</html>