<?php

if( !function_exists('send_sms')) {
    
    function send_sms($recipients, $messagetext, $flash = 0, $sendername = "DP Ltd" ) {
    	global $CI;
		$gsm = array();
		$country_code = '234';
		$arr_recipient = is_array($recipients) ? $recipients : explode(',', $recipients);
		foreach($arr_recipient as $recipient) {
			$mobilenumber = trim($recipient);
			if (substr($mobilenumber, 0, 1) == '0'){
                $mobilenumber = $country_code . substr($mobilenumber, 1);
            }
            elseif (substr($mobilenumber, 0, 1) == '+'){
                $mobilenumber = substr($mobilenumber, 1);
            }
			$generated_id = uniqid('int', false);
			$gsm['gsm'][] = array('msidn' => $mobilenumber, 'msgid' => $generated_id);
		}
		
		$message = array('sender' => $sendername, 'messagetext' => $messagetext, 'flash' => $flash);
		$request = array(
					'SMS' => array(
						'auth' => array(
							'username' => config('settings.sms_username'),
							'apikey' => config('settings.sms_apikey')
						),
						'message' => $message,
						'recipients' => $gsm
					)
				);
		$json_data = json_encode($request);
		if ($json_data) {
			$response = do_post_request(config('settings.sms_url'), $json_data, array('Content-Type: application/json'));
			$result = json_decode($response);
			if ($result->response->status == "SUCCESS") {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
}

if( !function_exists('do_post_request')) {
    
	function do_post_request($url, $data, $headers = array('Content-Type: application/x-www-form-urlencoded')) {
		$php_errormsg = '';
		if (is_array($data)) {
			$data = http_build_query($data, '', '&');
		}
		$params = array('http' => array(
				'method' => 'POST',
				'content' => $data)
		);
		if ($headers !== null) {
			$params['http']['header'] = $headers;
		}
		$ctx = stream_context_create($params);
		$fp = fopen($url, 'rb', false, $ctx);
		if (!$fp) {
			return "Error: gateway is inaccessible";
		}
		//stream_set_timeout($fp, 0, 250);
		try {
			$response = stream_get_contents($fp);
			if ($response === false) {
				throw new Exception("Problem reading data from $url, $php_errormsg");
			}
			return $response;
		} catch (Exception $e) {
			$response = $e->getMessage();
			return $response;
		}
	}
	
}


if( !function_exists('generate_username')) {
    
    function generate_username($name, $additional_symbols, $max_size = 8) {
        $names = explode(" ", $name, 2);
        $first_name = $names[0];
        $last_name = (isset($names[1]) && !empty($names[1])) ? $names[1] : '';
        $result = false;
        $i = 0;
        $n = substr($first_name, 0, 1);
        while($result == false && $n != $first_name && $i<15)
        {
            $a = $last_name.substr($additional_symbols, 0, $i);
            $n = substr($first_name, 0, (strlen($a)  + strlen($n) > $max_size)?(strlen($n) + 1):1);
            $result = substr($n.$a, 0, $max_size);
            if((\DB::table('users')->where('username',  '=', $result)->exists() or \DB::table('admin')->where('username', '=', $result)->exists()) && strlen($result) >= 5) {
                //This function check if the tentative username is available
                $result = false;
            }
            $i++;
        }
        return strtolower($result);
    }
}

if( !function_exists('generate_token')) {
    
    function generate_token($len = 8) {
        if( function_exists('openssl_random_pseudo_bytes')) {
			$token = base64_encode(openssl_random_pseudo_bytes($len, $strong));
			if($strong == TRUE)
				return strtr(substr($token, 0, $len), '+/=', 'AVM');
		} else {
			$chars = '0123456789';
			$chars.= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz/+';
			$charsLen = strlen($chars)-1;
			$token = '';
			for($i=0; $i<$len; $i++) {
				$token .= $chars[mt_rand(0, $charsLen)];
			}
			return $token;
		}
    }
    
}