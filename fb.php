<?php
	header('Content-Type: text/html; charset=utf-8');
	$mainjson = "";
	$app_id = "536609326429099";
	$app_secret = "748e58cf54e5bf4f81117911c6ae69ed"; 
	$my_url = "http://localhost:8888/fb.php";
	$access_token = "CAACEdEose0cBADw2ib68j6XDggRPTiGKg8GZBppsApRxlJeyRLEiB4ttrXP2xZC2JZAtOFcYDgMqkZB0O3G5QMxf3vvuMgekjqAeUuRGBICWnIn2TmSZC1mHBX30c0CsEKzMMARZAtdfM15qoseQJKUJsuMqqqy7AkLYcRSDZBxlzI4gZAs3FpArhl1TDlKaGAvsSMRKVXXp1gZDZD";
	$code = $_REQUEST["code"];
	// If we get a code, it means that we have re-authed the user 
	//and can get a valid access_token. 
	if (isset($code)) {
		$token_url="https://graph.facebook.com/oauth/access_token?client_id="
		. $app_id . "&redirect_uri=" . urlencode($my_url) 
			. "&client_secret=" . $app_secret 
				. "&code=" . $code . "&display=popup";
		$response = file_get_contents($token_url);
		$params = null;
		parse_str($response, $params);
		$access_token = $params['access_token'];
	}

	//Attempt to query the graph:
	$graph_url = "https://graph.facebook.com/me?"
	. "access_token=" . $access_token;
	$response = curl_get_file_contents($graph_url);
  	$decoded_response = json_decode($response);
	//Check for errors 
	if ($decoded_response->error) {
		//check to see if this is an oAuth error:
			if ($decoded_response->error->type== "OAuthException"){
				// Retrieving a valid access token. 
				$dialog_url= "https://www.facebook.com/dialog/oauth?"
				. "client_id=" . $app_id 
					. "&redirect_uri=" . urlencode($my_url);
				echo("<script> top.location.href='" . $dialog_url 
					. "'</script>");
			}
			else {
				echo "other error has happened";
			}
		} 
		else {
			$json = file_get_contents('https://graph.facebook.com/losdudesmx/posts?limit=2&access_token='.$access_token);
			$mainjson = json_decode(utf8_encode($json));
			$contador = 0;
/*			foreach ($json->data as $data) {
				echo "entro";
							$message = $data->message;
							$picture = $data->picture;
							$findme   = 'http%3A'; // http: no https :3
							$pos = strpos($picture, $findme);
							$newpic = substr($picture, $pos);
							echo "probando";
//							$pics[] = $newpic;
						}*/

		}
		function curl_get_file_contents($URL) {
			$c = curl_init();
			curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($c, CURLOPT_URL, $URL);
			$contents = curl_exec($c);
			$err  = curl_getinfo($c,CURLINFO_HTTP_CODE);
			curl_close($c);
			if ($contents) return $contents;
			else return FALSE;
		}
?>
