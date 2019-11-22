fetch("navbar.html")
	.then(response => {
		return response.text();
		console.log(response);
	})
	.then(data => {
		document.querySelector("header").innerHTML = data;
		
	})