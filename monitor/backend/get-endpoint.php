<?php

include_once 'cors.php';

// call api and send back response
$res->status = "OK";
$res->endpoint = $_SESSION['endpoint'];

echo json_encode($res);
