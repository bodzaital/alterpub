<?php require_once "../apiDocs.php"; ?>

<?php

$schemas = [
	[
		"verb" => "GET",
		"endpoint" => "post/get.php",
		"synopsis" => "Gets a single post by its title.",
		"parameters" => [
			"post_title" => "string, title of the post, without extensions."
		],
		"returns" => [
			"200" => "Rendered post contents.",
			"404" => "Post was not found."
		]
	],
	[
		"verb" => "GET",
		"endpoint" => "post/latest.php",
		"synopsis" => "Gets the title of the latest 7 posts.",
		"parameters" => [],
		"returns" => [
			"200" => "Last 7 posts in an array."
		]
	],
	[
		"verb" => "GET",
		"endpoint" => "post/excerpt.php",
		"synopsis" => "Gets the excerpt by the title.",
		"parameters" => [
			"post_title" => "string, title of the post, without extensions."
		],
		"returns" => [
			"200" => "Excerpt.",
			"404" => "Post was not found."
		]
	]
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>alter api /post</title>
	<style>
		body
		{
			font-family: "Inter";
			font-size: 13px;
		}

		.apidocs-endpoint
		{
			border: 1px solid black;
			padding: 1rem;
			margin: 0 0 1rem 0;
		}
		
		.apidocs-endpoint ul
		{
			margin: 0;
			padding: 0;
		}

		.navigate-up { margin: 1rem; }
		.apidocs-endpoint h2 { margin: 0; }
		.apidocs-endpoint h3 { margin: .5rem 0 0 0; }
		.apidocs-endpoint p { margin: 0 0 .25rem 0; }
		.apidocs-endpoint li { list-style-type: none; }
	</style>
</head>
<body>
	<div class="navigate-up"><a href="/api">↑ /api</a></div>
	<?php foreach ($schemas as $schema): echo apiDocs($schema); endforeach; ?>
	<script src="../request.js"></script>
</body>
</html>