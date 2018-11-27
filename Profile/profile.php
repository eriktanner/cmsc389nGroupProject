<!doctype html>
<html lang = "en">
	<head>
		<title>Profile</title>
		<link rel="stylesheet" href="profileStyleSheet.css">
		<meta charset="utf-8">
		<?php session_start(); ?>
	</head>
	<body>

		<div class="main">

			<div>
    			<img src="../Images/umd_hub_red.jpg" onclick="location.href='../Marketplace/marketplace.php';" alt = "UmdHub" height = 75>
	    	</div>
	    	<div class="outerBox">
				<div class = "box">
					<?php getUserData(); ?>
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

			function getUserData() {
				$host = "localhost";
				$user = "admin";
				$password = "EoqNS14knT98sak6";
				$database = "marketplace";

				$session_userid = $_SESSION['user_id'];

				$db_connection = new mysqli($host, $user, $password, $database);
				if ($db_connection->connect_error) {
					die("Connection failed: " . $db_connection->connect_error);
				}

				$query = 'SELECT * FROM profile WHERE uid = "' . $session_userid .'"';
				$userResult = mysqli_query($db_connection, $query);
				$userResult = mysqli_fetch_array($userResult);
				$userName = $userResult['Name'];
				$userEmail = $userResult['Email'];
				$userImage = $userResult['ProPic'];

				$image = '<img height="400px" src="data:image/jpeg;base64,'.base64_encode( $userImage ).'"/>';
				
				echo $image;
				echo "<br>";
				echo "<span class='name'>";
				echo $userName;
				echo "</span>";
				echo "<br>";
				echo "<span class='email'>";
				echo $userEmail;
				echo "</span>";
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
				$body .= genImage($item['Image']);
				$body .= genItemTitle($item['Name']);
				$body .= genRemoveItem($item['sid']);
				$body .= genItemPrice($item['Price']);
				$body .= "</div></div>";
				return $body;
			}

			function genImage($image) {
				return '<img height="400px" src="data:image/jpeg;base64,'.base64_encode( $image ).'"/>';
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
