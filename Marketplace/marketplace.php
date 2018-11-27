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
						<form action = "<?php $_SERVER['PHP_SELF'] ?>" method="GET">
							<li style="padding-top: 18px; padding-left:25px;"><input type="text" placeholder="Search.." id="search_bar" name="searchVal" size="40"></li>
							<li><input type="submit" name="search" value="Search"></li>
						</form>
						<form action = "<?php $_SERVER['PHP_SELF'] ?>" method="GET">
							<li><select name="sortVal">
									<option value="Date DESC">Newest</option>
									<option value="Date ASC">Oldest</option>
									<option value="Name ASC">A-Z</option>
									<option value="Name DESC">Z-A</option>
									<option value="Price ASC">$ -> $$$</option>
									<option value="Price DESC">$$$ -> $</option>
								</select></li>
							<li><input type="submit" name="sort" value="sort"</li>
						</form>
						<li style="padding-left: 25px;"><a href="../Profile/profile.php">Profile</li>
						<li><a href="#">Sign Out</li>
						<li><form action="../Item/sellItem.html"><input type="submit" value="Sell item" /></form></li>



					</ul>
				</div>
			</div>
		</div>

		<div class="containerBody">	


		<?php
				/*

		<div class="containerBody">

			<?php=
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


				

				$query = 'SELECT * FROM Item';
							  
				$sort = '';
				if (isset($_POST["sort"])) {
					$sort = $_POST["sortVal"];
				}
							  
				$search = '';
				if (isset($_POST["search"])) {
					$search = $_POST["searchVal"];
				}
							  
				if ($search != '') {
					$query = $query . ' WHERE Name Like "%' . $search . '%"';
				}
							  
				if ($sort != '') {
					$query = $query . ' ORDER BY ' . $sort;
				} else {
					$query = $query . ' ORDER BY Date DESC';
				}



				$result = mysqli_query($db_connection, $query);

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
					<span id="span"><?php main();?></span>	

			</div>


		</div>




		<?php

			function main() {
				generateItems(filter());
			}

			function filter() {

				$host = "localhost";
				$user = "admin";
				$password = "EoqNS14knT98sak6";
				$database = "marketplace";

				$db_connection = new mysqli($host, $user, $password, $database);
				if ($db_connection->connect_error) {
					die("Connection failed: " . $db_connection->connect_error);
				}

				$result = 'SELECT * FROM Item';
							  
				$sort = '';
				if (isset($_GET["sort"])) {
					$sort = $_GET["sortVal"];
				}
							  
				$search = '';
				if (isset($_GET["search"])) {
					$search = $_GET["searchVal"];
				}
							  
				if ($search != '') {
					$result = $result . ' WHERE Name Like "%' . $search . '%"';
				}
							  
				if ($sort != '') {
					$result = $result . ' ORDER BY ' . $sort;
				} else {
					$result = $result . ' ORDER BY Date DESC';
				}

				return mysqli_query($db_connection, $result);;
			}

			function generateItems($filteredResult) {
				$body = "";

				while($row = mysqli_fetch_array($filteredResult))
				{
					$body .= generateItem($row);
				}

				echo $body;
				
			}

			function generateItem($item) {
				$body = "<div class=\"containerItemBorder\" onclick=\"location.href='../Item/itemDetails.php';\">";
				$body .= "<div class=\"containerItem\" >";
				$body .= genImage("pillow");
				$body .= genItemTitle($item['Name']);
				$body .= genItemPrice($item['Price']);
				$body .= "</div></div>";
				return $body;
			}

			function genImage($name) {
				return "<img src=\"../Images/${name}.jpg\" width=\"100%\" height=\"70%\">";
			}

			function genItemTitle($name) {
				return "<div class=\"itemTitle\">${name}</div>";
			}

			function genItemPrice($price) {
				return "<div class=\"price\">\$${price}</div>";
			}


		?>



	</body>
</html>
