<?php

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => 'https://api.rajaongkir.com/starter/city' . ($_POST['PROVINCE_ID'] ? '?province=' . $_POST['PROVINCE_ID'] : ''),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => ['key: af4ff3b9eb0ef2b51c5adf77b18dcff2'],
]);

$response_city = curl_exec($curl);
$err_city = curl_error($curl);

curl_close($curl);

if ($err_city) {
    echo 'cURL Error #:' . $err_city;
    var_dump($err_city);
} else {
    $city = json_decode($response_city, true);
}

echo json_encode($city["rajaongkir"]["results"]);

?>
