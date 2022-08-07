<?php

function apiDocs($schema) {
	$verb = $schema["verb"];
	$endpoint = $schema["endpoint"];
	$synopsis = $schema["synopsis"];
	$parameters = $schema["parameters"];
	$returns = $schema["returns"];

	$id = str_replace(".", "-", str_replace("/", "-", "${verb}-${endpoint}"));

	$render = "<div class=\"apidocs-endpoint\">";
		$render .= "<h2>$verb - $endpoint</h2>";
		$render .= "<h3>Synopsis</h3>";
		$render .= "<p>$synopsis</p>";
		$render .= "<h3>Parameters</h3>";
		$render .= "<ul class=\"apidocs-params\">";
		foreach ($parameters as $paramName => $paramDesc) {
			$render .= "<li>$paramName: $paramDesc</li>";
		}
		$render .= "</ul>";
		$render .= "<h3>Returns</h3>";
		$render .= "<ul class=\"apidocs-params\">";
		foreach ($returns as $retName => $retKey) {
			$render .= "<li>$retName: $retKey</li>";
		}
		$render .= "</ul>";
		$render .= "<h3>Tryout</h3>";
		$render .= "<textarea name=\"$id\"></textarea>";
		$render .= "<div><button id=\"$id\" data-verb=\"$verb\" data-endpoint=\"/api/$endpoint\">SEND</button></div>";
		$render .= "<pre class=\"tryout-result-$id\"></pre>";
	$render .= "</div>";

	return $render;
}

?>