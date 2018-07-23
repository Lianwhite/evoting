<?php
// where are we posting to?
$url = '../controller/register.php';

// what post fields?
$fields = array(
   'vr' => 1,
   'Ind' => 0,
   'user' => 0
);

// build the urlencoded data
$postvars = http_build_query($fields);

// open connection
$ch = curl_init();

// set the url, number of POST vars, POST data
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, count($fields));
curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);

// execute post
$result = curl_exec($ch);

// close connection
curl_close($ch);
?>