# alterpub
An exercise in futility.

This is a content publishing system/set of API's for *alternatív*,  a small fictional news site.

To run this project, just yeet it over a server with PHP 7.4.

The `apiDocs` function takes an associative array and displays an endpoint description (like SwaggerAPI, but worse):

```php
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
]
```

With requests.js, this description can be tried out with a payload (not guaranteed to work with verbs other than "GET").

Posts are formatted in a markdown document in the /posts folder. The name of the document is the unique identifier (will be renamed ID later). In the posts, the front matter describes the excerpt and post type:

```markdown

```meta```
- Excerpt: This is the post excerpt, *formatted*.
- Type: Has Image
```meta```

# Post title

```

Parsing the front matter is rudimentary at best, so it will be fixed later.

This project is done, when a complete CRUD interface to the posts is done with authentication, through a set of REST API endpoints:

/posts

- [x] GET post.php: get single post contents by title
- [ ] POST post.php: create single post and get its title
- [ ] PUT post.php: update post by title
- [ ] DELETE post.php: delete post by title
- [x] GET latest.php: get n number of latest post titles
- [x] GET excerpt.php: get excerpt by title