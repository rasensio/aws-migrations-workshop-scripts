<?php

include_once 'cors.php';

// call api and send back response
$res->timestamp = date(DateTime::ISO8601);
$res->status = "OK";
$res->endpoint = $_SESSION['endpoint'];

echo json_encode($res);
