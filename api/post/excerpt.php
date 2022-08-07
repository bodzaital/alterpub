<?php
include_once "../../modules/parsedown.php";
include_once "../../modules/preprocessor.php";

header('Content-type: application/json');

$postTitle = $_GET["post_title"];

if (!file_exists("../../posts/$postTitle.md")) {
    http_response_code(404);
    return;
}

$preprocessor = new Preprocessor();
$Parsedown = new Parsedown();

$excerpt = $Parsedown->text($preprocessor->GetExcerpt("../../posts/$postTitle.md"));

http_response_code(200);
echo json_encode($excerpt);

?>