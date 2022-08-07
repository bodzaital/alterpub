<?php

function latestFirstComparer($a, $b) {
	$subA = substr($a, 0, 10);
	$subB = substr($b, 0, 10);

	if (strtotime($subA) > strtotime($subB)) {
		return -1;
	}

	return 1;
}

header('Content-type: application/json');

$postTitles = array_values(array_diff(scandir("../../posts/"), [".", ".."]));

usort($postTitles, "latestFirstComparer");

$postTitles = array_slice($postTitles, 0, 7);

for ($i = 0; $i < count($postTitles); $i++) { 
	$postTitles[$i] = substr($postTitles[$i], 0, strpos($postTitles[$i], ".md"));
}

echo json_encode($postTitles);

?>