<?php

$range = 1000;

$body = [];

for ($i = 1; $i <= $range; $i++) {
	$body[] = json_encode([
		"index" => [
			"_index" => "club",
			"_type" => "member",
			"_id" => 1000 + $i,
			]
		]);

	$body[] = json_encode([
		"firstname" => "Anthony",
		"lastname" => "Colas",
		]);
}

$begin = time();

$response = file_get_contents("http://elasticsearch:9200/_bulk", false, stream_context_create([
		'http'=> [
			'method' => "PUT",
			'header'  => "Content-Type: application/json",
			'content' => implode("\n", $body)."\n",
		],
	]));

$end = time();

echo sprintf("Time: %d secondes", ($end - $begin));
