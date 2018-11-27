<!doctype html>
<html lang = "en">
	<head>
		<title>Sell Item</title>
		<link rel="stylesheet" href="../Marketplace/marketplaceStyleSheet.css">
		<meta charset="utf-8">
	</head>
</html>
<?php

	$host = "localhost";
    $user = "admin";
	$password = "EoqNS14knT98sak6";
    $database = "marketplace";

    $db_connection = new mysqli($host, $user, $password, $database);
    if ($db_connection->connect_error) {
        die("Connection failed: " . $db_connection->connect_error);
    }

	
		
		$sid = $_GET["sid"];

        $sql = "DELETE FROM Item WHERE sid = {$sid}";

		if ($db_connection->query($sql) === TRUE) {
			$body = <<<EOPAGE
			<div class="container-fluid">
				<h4>Succesfully removed item from marketplace.</h4>

				<form action="../Marketplace/marketplace.php"">
					<input value="Return to marketplace" type="Submit" name="return">
				</form>
			</div>

EOPAGE;
        
		
		echo $body;
	}
