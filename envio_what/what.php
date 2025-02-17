<?php

$curl = curl_init();

curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api-messaging.movile.com/v1/whatsapp/send",
	
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\r\n\"destinations\": [{\r\n\"correlationId\": \"001\",\r\n\"destination\": \"525528497844\"\r\n}],\r\n\"message\": {\r\n\"hsm\": {\r\n\"namespace\": \"whatsapp:hsm:ecommerce:movile\",\r\n\"elementName\": \"chatclub_open_session_v2\",\r\n\"parameters\": [\r\n\"CHS\",\r\n\"Hola, prueba de envío de whatsapp mediante appi.\"\r\n],\r\n\"languagePolicy\": \"DETERMINISTIC\"\r\n}\r\n}\r\n}",
  CURLOPT_HTTPHEADER => array(
    "Accept: */*",
    "AuthenticationToken: TxbWvzvsw8QvQwokQ9GzdAMDaH_Hk8iYsHYiRTQE",
    "Cache-Control: no-cache",
    "Connection: keep-alive",
    "Content-Type: application/json",
    "Host: api-messaging.movile.com",
    "Postman-Token: fb1e405f-06ba-4b88-9db4-4150e8b4a847,41d95e60-9d9a-4857-8977-c60d048f24c7",
    "User-Agent: PostmanRuntime/7.15.0",
    "UserName: WA_HospitalSatelite_MX",
    "accept-encoding: gzip, deflate",
    "cache-control: no-cache",
    "content-length: 323"
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

?>