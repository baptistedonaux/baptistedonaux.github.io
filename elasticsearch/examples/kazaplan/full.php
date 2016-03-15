<?php

$url = "http://elasticsearch:9200/kazaplan/plan/%s";

$plan = json_decode(file_get_contents("/examples/kazaplan/plan.json"), true);

$body = [
	"room" => [],
	];

foreach ($plan["planLite"]["plan"] as $surface) {
	foreach ($surface["floorContent"]["rooms"] as $room) {
		$body["room"][] = [
			"area" => $room["area"],
			"habitable" => $room["Habitable"],
			"name" => $room["name"],
			];
	}
}

$response = file_get_contents(sprintf($url, $plan["planLite"]["uuid"]), false, stream_context_create([
	'http'=> [
		'method' => "PUT",
		'header'  => "Content-Type: application/json",
		'content' => json_encode($body),
	],
]));

echo $response;