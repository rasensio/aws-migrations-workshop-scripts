<?php

function bad($message) {
	$res->status = "error";
	$res->message = $message;
	http_response_code(400);
	echo json_encode($res);
}

function ok($key, $payload) {
	$res->status = "ok";
	$res->$key = $payload;
	echo json_encode($res);
}