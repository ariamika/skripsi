<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "origin=151" . ($_POST['CITY_ID'] ? "&destination=" . $_POST['CITY_ID'] : "")  . ($_POST['WEIGHT'] ? "&weight=" . $_POST['WEIGHT'] : "") . ($_POST['EXPEDITION'] ? "&courier=" . $_POST['EXPEDITION'] : ""),
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    "key: af4ff3b9eb0ef2b51c5adf77b18dcff2"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
    $cost = json_decode($response, true);
}

echo json_encode($cost["rajaongkir"]["results"]);