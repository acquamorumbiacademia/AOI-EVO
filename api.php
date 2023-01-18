<?php

$URL_API = 'http://www.google.com/';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
$ch = curl_init($URL_API);

$endpoint = htmlspecialchars($_GET["endpoint"]);

$data = json_decode(file_get_contents("php://input"));

$response = curl_exec($ch . $endpoint);

$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

$curl_info = curl_getinfo($ch);

curl_close($ch);

http_response_code($http_code);         
echo json_encode($response);

?>
