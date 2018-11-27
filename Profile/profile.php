<!doctype html>
<html lang = "en">
	<head>
		<title>Profile</title>
		<link rel="stylesheet" href="profileStyleSheet.css">
		<meta charset="utf-8">
	</head>
	<body>

		<div class="main">

			<div>
    			<img src="../Images/umd_hub_red.jpg" onclick="location.href='../Marketplace/marketplace.php';" alt = "UmdHub" height = 75>
	    	</div>
	    	<div class="outerBox">
				<div class = "box">
				
					<img src="../Images/pillow.jpg" width="100%" height="70%">
							
				    <br>
				    <span class="name">
				    	John Jonathan
				    </span>
				    <br>
				    <span class="email">
				    	johnyj@terpmail.umd.edu
				    </span>
				    <input type= "button" onclick="location.href='editProfile.php';" id="editProfile" value="Edit Profile"><br>
				
				</div>
			</div>

				<span class="yourOrdersTitle">Your Orders</span>
			<div class="containerBody">	
				<div class="content">	
					<span id="span"><?php main();?></span>	

				</div>


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


				session_start();

				$session_userid = $_SESSION['user_id'];

				$query = 'SELECT * FROM Item WHERE uid = "' . $session_userid . '"';

				$result = mysqli_query($db_connection, $query);

				return $result;
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
				$id = $item['sid'];
				$body = "<div class=\"containerItemBorder\" onclick=\"location.href='../Item/Items/item_{$id}.php';\">";
				$body .= "<div class=\"containerItem\" >";
				$body .= genImage("pillow");
				$body .= genItemTitle($item['Name']);
				$body .= genRemoveItem($item['sid']);
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

			function genRemoveItem($sid) {
				return "<div class=\"removeItem\"><form action=\"../Item/removeItem.php?sid={$sid}\" method=\"POST\"><input type=\"submit\" value=\"Remove\"></form></div>";
			}



		?>
 		
	</body>
</html>
