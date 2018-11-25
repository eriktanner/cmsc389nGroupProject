



main();


function main() {
	generateItems();
}

function generateItems() {
	var body = "<tr>";


	for (let i = 0; i < 4; i++) {
		body += "<td>" + genImage("pillow") + "</td>";
	}


	body += "</tr>";
	document.getElementById("span").innerHTML = body;
	
}

function genImage(name) {
	return "<img src=\"../Images/" + name + ".jpg\" width=\"100\" height=\"100\">";
}
