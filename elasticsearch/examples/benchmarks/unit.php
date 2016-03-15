<?php

$url = "http://elasticsearch:9200/club/member/%d";
$range = 1000;

$begin = time();

for ($i = 1; $i <= $range; $i++) { 
	$response = file_get_contents(sprintf($url, $i), false, stream_context_create([
		'http'=> [
			'method' => "PUT",
			'header'  => "Content-Type: application/json",
			'content' => json_encode([
				"firstname" => "Anthony",
				"lastname" => "Colas",
				]),
		],
	]));
}

$end = time();

echo sprintf("Time: %d secondes", ($end - $begin));
