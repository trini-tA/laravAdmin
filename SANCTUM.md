<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://laravadmin.test/api/sanctum/token",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"email\":\"administrator@localhost\", \"password\":\"password\", \"device_name\":\"testing\"}",
  CURLOPT_HTTPHEADER => array(
    "authorization: Basic YWRtaW5pc3RyYXRvckBsb2NhbGhvc3Q6cGFzc3dvcmQ=",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

//////////////////////////////////////
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://laravadmin.test/api/user",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer 7|Fwa8sLdqOmlYmC7yZnTEl3gOmnUqq1GcjUeAziDKAUq8eDDqP3wKqd60DOlKc5GmpyT2GYPMsX6GHPTP",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}