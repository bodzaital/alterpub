<?php

class Preprocessor {
	public function GetExcerpt(string $file) {
		$meta = $this->ParseMeta($file);
		$excerpt = "";

		foreach ($meta as $line) {
			if (strpos($line, "Excerpt:")) {
				$excerpt = $line;
				break;
			}
		}
		
		$excerpt = substr($excerpt, 0);
		return trim(substr($excerpt, strpos("Excerpt:") + 10));
	}

	public function GetType(string $file) {
		$meta = $this->ParseMeta($file);
		
		foreach ($meta as $line) {
			if (strpos($line, "Type:")) return explode(",", $line);
		}
	}

	private function ParseMeta(string $file) {
		$postContents = file_get_contents($file);

		$postLines = explode("\n", $postContents);
		$meta = [];

		$metaCounter = 0;
		foreach ($postLines as $line) {
			if (strpos($line, "meta")) {
				$metaCounter++;
				continue;
			}
			if ($metaCounter == 2) break;
			if ($metaCounter == 1) {
				$meta[] = $line;
			}
		}

		return $meta;
	}
}


?>