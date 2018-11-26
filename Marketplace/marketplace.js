main();


function main() {
	generateItems();
}

function generateItems() {
	var body = "<tr>";


	for (let i = 0; i < 20; i++) {
		body += "<td>" + generateItem("pillow") + "</td>";
	}


	body += "</tr>";
	document.getElementById("span").innerHTML = body;
	
}

function generateItem(name) {
	var body = "<div class=\"containerItemBorder\">";
	body += "<div class=\"containerItem\">";
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
