<?php

$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => "http://www.cali.org/lessonapi/taxonomy_vocabulary/getTree",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => "{\"vid\":\"2\"}",
CURLOPT_HTTPHEADER => array(
  "cache-control: no-cache",
  "content-type: application/json",
  "postman-token: 75ffc19d-9e53-0dad-7eb2-f9a99152739d"
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