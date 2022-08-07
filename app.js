async function getFrontPageContents() {
	let latest = await (await fetch("/api/post/latest.php")).json();
	let excerpts = await Promise.all(latest.map(async (title) => {
		return await (await fetch(`/api/post/excerpt.php?post_title=${title}`)).json();
	}));

	excerpts.forEach((e) => {
		let element = create("div", ["excerpt"], "", {
			"innerHTML": e
		}, {});

		document.querySelector(".front-page").appendChild(element);
	});
}

function create(tagName, classList, id, properties, dataset) {
	let a = document.createElement(tagName);
	classList.forEach((e) => a.classList.add(e));
	if (id !== null) a.id = id;

	for (let i = 0; i < Object.keys(properties).length; i++) {
		let key = Object.keys(properties)[i];
		let value = Object.values(properties)[i];
		a[key] = value;
	}
	
	for (let i = 0; i < Object.keys(dataset).length; i++) {
		let key = Object.keys(dataset)[i];
		let value = Object.values(dataset)[i];
		a.dataset[key] = value;
	}
	return a;
}

getFrontPageContents();