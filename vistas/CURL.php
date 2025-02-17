<?php

	class CURL
	{
		function curlData($url, $fields, $respuestaDecode = true)
		{
			$postvars = http_build_query($fields);
			
			// open connection
			$ch = curl_init();
			
			// set the url, number of POST vars, POST data
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, count($fields));
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

			// https://thisinterestsme.com/php-curl-ssl-certificate-error/
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			
			// execute post
			$jsonData = curl_exec($ch);
			if (curl_error($ch)) {
				$error_msg = curl_error($ch);
				echo "Error=".$error_msg;
			}
			// close connection
			curl_close($ch);
			
			$jsonData = preg_replace("/[\r\n]+/", " ", trim($jsonData));
			$jsonData = preg_replace('/[ ]{2,}|[\t]/', ' ', trim($jsonData));
			$jsonData = str_replace("\\'", "'", $jsonData);
			//$jsonData = str_replace("\\&#39;", "'", $jsonData);
			$jsonData = str_replace("\\\'", "'", $jsonData);
			//$jsonData = str_replace("\\", "", $jsonData);
			$jsonData = utf8_encode($jsonData);
			//print_r($jsonData);
			
			if($respuestaDecode) { $jsonData = json_decode($jsonData,true); }
			return $jsonData;
		}
	}



/*
	class CURL
	{
		function curlData($url, $fields, $respuestaDecode = true)
		{
			$postvars = http_build_query($fields);
			
			// open connection
			$ch = curl_init();
			
			// set the url, number of POST vars, POST data
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, count($fields));
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			
			// execute post
			$jsonData = curl_exec($ch);
			if (curl_error($ch)) {
				$error_msg = curl_error($ch);
				//echo "Error=".$error_msg;
			}
			// close connection
			curl_close($ch);
			
			$jsonData = preg_replace("/[\r\n]+/", " ", trim($jsonData));
			$jsonData = preg_replace('/[ ]{2,}|[\t]/', ' ', trim($jsonData));
			$jsonData = str_replace("\\'", "'", $jsonData);
			//$jsonData = str_replace("\\&#39;", "'", $jsonData);
			$jsonData = str_replace("\\\'", "'", $jsonData);
			//$jsonData = str_replace("\\", "", $jsonData);
			$jsonData = utf8_encode($jsonData);
			//print_r($jsonData);
			
			if($respuestaDecode) { $jsonData = json_decode($jsonData,true); }
			return $jsonData;
		}
	}
*/

?>