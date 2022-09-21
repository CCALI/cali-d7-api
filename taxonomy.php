<?php

$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => "https://www.cali.org/lessonapi/taxonomy_vocabulary/getTree.json",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => "{\"vid\":\"3\",\"load_entities\":\"TRUE\"}",
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
  //echo "<pre>";
  //print_r(json_decode($response, true));
  //echo "</pre>";
  $topics = json_decode($response, true);
  foreach ($topics as $key => $value) {
    //echo "Key: $key; Value: ".print_r($value, true)."<br />\n";
    //$topic = $topics[$key][$value]['name'];
    //echo $topic."<br />\n";
    echo "<a href=\"taxonomy.php?tid=".$topics[$key]['tid']."\">".$topics[$key]['name']."</a><br />\n";
}
}
// Lessons per topic

$tid = $_GET['tid'];

$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => "https://www.cali.org/lessonapi/taxonomy_term/selectNodes.json",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => "{\"tid\":\"".$tid."\",\"pager\":\"false\"}",
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
  //echo "<pre>";
  //print_r(json_decode($response, true));
  //echo "</pre>";
  $lessons = json_decode($response, true);
  foreach ($lessons as $key => $value) {
    //echo "Key: $key; Value: ".print_r($value, true)."<br />\n";
    //$topic = $topics[$key][$value]['name'];
    //echo $topic."<br />\n";
    if ($lessons[$key]['type'] = "lesson") {
      echo $lessons[$key]['title']."<br />\n";
    }
    
}
}