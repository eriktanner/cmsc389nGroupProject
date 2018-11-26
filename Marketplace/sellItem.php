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

	if (isset($_POST["postItem"])) {
		$itemName = $_POST['itemName'];
        $desc = $_POST['description'];
		$price = $_POST['price'];
		$sellerName = "Bob";
		$date = getdate();
		$date = $date[0];
        $sql = "INSERT INTO Item (Name, SellerName, Description, Price, Date)
		VALUES ('$itemName', '$sellerName', '$desc', '$price', '$date')";

		if ($db_connection->query($sql) === TRUE) {
			$date = epochToDate($date);
			$body = <<<EOPAGE
			<div class="container-fluid">
				<h4>The following entry has been added to the databse</h4>
				<p><b>Product: </b>{$itemName}</p>
				<p><b>Seller Name: </b>{$sellerName}</p>
				<p><b>Description: </b>{$desc}</p>
				<p><b>Price: </b>{$price}</p>
				<p><b>Date: </b>{$date}</p>

				<form action="marketplace.php"">
					<input value="Return to marketplace" type="Submit" name="return">
				</form> 
			</div>
EOPAGE;
        }
		echo $body;
	}
?>