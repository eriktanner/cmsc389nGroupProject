main();


function main() {
	generateItems();
}

function generateItems() {
	var body = "";


	for (let i = 0; i < 30; i++) {
		body += generateItem("pillow");
	}


	document.getElementById("span").innerHTML = body;
	
}

function generateItem(name) {
	var body = "<div class=\"containerItemBorder\" onclick=\"location.href='../Item/itemDetails.php';\">";
	body += "<div class=\"containerItem\" >";
	body += genImage("pillow");
	body += genItemTitle("Red Pillow");
	body += genItemPrice("15.50");
	body += "</div></div>";
	return body;
}

function genImage(name) {
	return "<img src=\"../Images/" + name + ".jpg\" width=\"100%\" height=\"70%\">";
}

function genItemTitle(name) {
	return "<div class=\"itemTitle\">" + name + "</div>";
}

function genItemPrice(price) {
	return "<div class=\"price\">$" + price + "</div>";
}
