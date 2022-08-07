function request(verb, endpoint, payload, callback) {
	let xhr = new XMLHttpRequest();
	xhr.open(verb, endpoint);
	payload !== null ? xhr.send(payload) : xhr.send();
	xhr.addEventListener("load", () => {
		if (xhr.status == 200) {
			callback(JSON.parse(xhr.responseText));
		}
	});
}

document.querySelectorAll(".apidocs-endpoint button").forEach((button) => button.addEventListener("click", () => {
	let payload = document.querySelector(`[name="${button.id}"]`).value;
	let verb = button.dataset.verb;
	let endpoint = button.dataset.endpoint;

	if (verb == "GET") endpoint += "?" + payload;
	
	request(verb, endpoint, payload, (e) => {
		document.querySelector(`.tryout-result-${button.id}`).innerText = e;
	});
}));