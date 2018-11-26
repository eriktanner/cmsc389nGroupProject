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

			<div class="containerBody">	
				<span class="yourOrdersTitle">Your Orders</span>
				<div class="content">	
					<span id="span"></span>	

				</div>


			</div>
		

		</div>
 		

		<script src="../Marketplace/marketplace.js"></script>
	</body>
</html>
