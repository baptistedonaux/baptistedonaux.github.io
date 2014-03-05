<?php

$firstnames = array(
	"foo@fake.io" => "Foo",
	"bar@fake.io" => "Bar",
	"baptiste@fake.io" => "Baptiste",
	"zang@fake.io" => "Zang"
);
$i = 0;

if (array_key_exists("q", $_GET)) {
	$query = $_GET["q"];
	foreach ($firstnames as $index => $firstname) {
		if (stripos($firstname, $query) === false || $i > 10) {
			unset($firstnames[$index]);
		} else {
			$i++;
		}
	}
} else {
	$firstnames = array();
}

echo json_encode($firstnames);