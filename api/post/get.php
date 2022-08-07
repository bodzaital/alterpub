<?php
include_once "../../modules/parsedown.php";

header('Content-type: application/json');

$postTitle = $_GET["post_title"];

if (!file_exists("../../posts/$postTitle.md")) {
    http_response_code(404);
    return;
}

$Parsedown = new Parsedown();
    
$content = file_get_contents("../../posts/$postTitle.md");
$render = $Parsedown->text($content);

http_response_code(200);
echo json_encode($render);

?>