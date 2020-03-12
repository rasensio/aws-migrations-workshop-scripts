<?php

include 'cors.php';
include 'functions.php';

// set in memory the $GLOBAL endpoint
if (!empty($_POST)) {
	// get and set the endpoint
	$endpoint = htmlspecialchars($_POST["endpoint"]);
	$_SESSION['endpoint'] = $endpoint;
	ok("endpoint set to: ".$_SESSION['endpoint']);
} else {
	bad("missing endpoint");
}

