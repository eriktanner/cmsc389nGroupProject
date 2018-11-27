<!doctype html>
<html lang = "en">
	<head>
		<title>Sell Item</title>
		<link rel="stylesheet" href="../Marketplace/marketplaceStyleSheet.css">
		<meta charset="utf-8">
	</head>
</html>
<?php
	session_start();

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

	if (isset($_POST["postItem"])) {
		$itemName = $_POST['itemName'];
		$sellerUID = $_SESSION['user_id'];
        $desc = $_POST['description'];
        $category = $_POST['category'];
		$image = addslashes(file_get_contents($_FILES['productImage']['tmp_name']));
		$price = $_POST['price'];
		$date = getdate();
		$date = $date[0];
        $sql = "INSERT INTO Item (Name, uid, Description, Price, Date, Category, Image)
		VALUES ('$itemName', '$sellerUID', '$desc', '$price', '$date', '$category', '$image')";

		if ($db_connection->query($sql) === TRUE) {
			$date = epochToDate($date);
			$sid = $db_connection->insert_id;
			createPage($itemName, $sid, $sellerUID, $desc, $price, $date, $image);
			$body = <<<EOPAGE
			<div class="container-fluid">
				<h4>The following entry has been added to the databse</h4>
				<p><b>Product: </b>{$itemName}</p>
				<p><b>Seller Name: </b>{$sellerUID}</p>
				<p><b>Date: </b>{$date}</p>
				<p><b>Price: </b>{$price}</p>
				<p><b>Category: </b>{$category}</p>
				<p><b>Description: </b>{$desc}</p>

				<form action="../Marketplace/marketplace.php"">
					<input value="Return to marketplace" type="Submit" name="return">
				</form>
			</div>

EOPAGE;
        }
		
		echo $body;
	}

	function createPage($itemName, $sid, $sellerUID, $desc, $price, $date, $image) {

		

		$host = "localhost";
		$user = "admin";
		$password = "EoqNS14knT98sak6";
		$database = "marketplace";
	
		$db_connection = new mysqli($host, $user, $password, $database);
		if ($db_connection->connect_error) {
			die("Connection failed: " . $db_connection->connect_error);
		}
		$image = mysqli_query($db_connection, "SELECT Image FROM Item WHERE sid = {$sid}");
		$image = mysqli_fetch_array($image)["Image"];
		$image = '<img width="100%" height="70%" src="data:image/jpeg;base64,'.base64_encode( $image ).'"/>';

		$sellerName = mysqli_query($db_connection, "SELECT Name FROM profile WHERE uid = {$sellerUID}");
		$sellerName = mysqli_fetch_array($sellerName)["Name"];


		

		$body = <<<EOBODY
		<!doctype html>
		<html lang = "en">
			<head>
				<title>Profile</title>
				<link rel="stylesheet" href="../itemDetailsStyleSheet.css">
				<meta charset="utf-8">
			</head>
			<body>

				<div class="main">
		
					<div>
						<img src="../../Images/umd_hub_red.jpg" onclick="location.href='../../Marketplace/marketplace.php';" alt = "UmdHub" height = 75>
					</div>
					<div class="outerBox">
						<div class = "box">
							{$image}
							
							<input type= "button" onclick="location.href='';" id="contact_but" value="Contact Seller">

							<br>
						
						</div>
					</div>

					<div class="containerBody">	
						
						<span class="itemTitle">Name: {$itemName}</span>
						<br>
						<span class="email">Seller: {$sellerName}</span>
						<br>
						<span class="email">Date Posted: {$date}</span>
						<br>
						<span class="email">Description: {$desc}</span>
						<br>
					</div>
				

				</div>
				
			</body>
		</html>
EOBODY;

		

		$myFile = "Items/item_".$sid.".php";
		$fh = fopen($myFile, 'w');
		fwrite($fh, $body);
		fclose($fh);
	}
?>