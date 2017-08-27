<?php 
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	function sendMessage($userId, $messageText)
	{
		$messageUrl = "https://www.facebook.com/messaging/send/?dpr=1";
		
		$currentTimestampMiliseconds = round(microtime(true) * 1000);
		$currentTimestampSeconds = time();
		
		$fields = array(
			"client" => "mercury",
			"action_type" => "ma-type:user-generated-message",
			"body" => "lalalalalalalalalalalaalalala",
			"has_attachment" => "false",	
			"ephemeral_ttl_mode" => "0",
			"message_id" =>	"6289738861605195927",
			"offline_threading_id" => "6288738861605190927",
			"other_user_fbid" => "100019164030659",
			"signature_id" => "7a2a80d3",
			"source" =>	"source:titan:web",
			"specific_to_list[0]" => "fbid:100019164030659",
			"specific_to_list[1]" =>"fbid:100012293529512",
			"timestamp" => $currentTimestampMiliseconds,
			"ui_push_phase"	=>"C3",
			"__user"	=>"100012293529512",
			"__a"	=>"1",
			"__dyn"	=>"7AgNeS-aF398jgDxyIGzGomzEdpbGAdy8VdLFwgoqwWhE98nwgUaqG2yaBxebkwy6UnGi7VXDG4XzErz8iGt0Tz9VojxC4oK9CDxi5-78OEiUlwnoCQum2m4oqyUfe5FLK4VZ1G6XwCx248uxqawDDgswVwjpUhCK6pESm9yaBy8CfxO12zVolyoK7Uy5ubz8K13w",
			"__af"	=>"j0",
			"__req"	=>"q",
			"__be"=>	"0",
			"__pc"=>	"PHASED:DEFAULT",
			"__rev"	=>"3137186",
			"fb_dtsg"=>	"AQEOOMHXBqmN:AQF7Bxf2kyEA",
			"jazoest"	=>"265816979797772886611310978586581705566120102501071216965",
			"__spin_r"=>	"3137186",
			"__spin_b"	=>"trunk",
			"__spin_t"	=> $currentTimestampSeconds
		);
		
		$postString = makePostString($fields);
		
		$messageRequestHeaders = array(
			"Host: www.facebook.com",
			"User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64; rv:54.0) Gecko/20100101 Firefox/54.0",
			"Accept: */*",
			"Accept-Language: ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3",	
			"Accept-Encoding: gzip, deflate, br",
			"Content-Type: application/x-www-form-urlencoded",
			"X-MSGR-Region: FRC",
			"Referer: https://www.facebook.com/",
			"Content-Length: " . strlen($postString),
			"Cookie: fr=0cdkgTymq6OHLOakC.AWVoVqo0…2F2CC; act=1499352170775%2F0",
			"DNT: 1",
			"Proxy-Authorization: Basic cnAzMDcwNzA2OjVjQVl6bUtFWlY=",
			"X-Requested-With: XMLHttpRequest"
		);
	
		$ch = curl_init($messageUrl);
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POST, count($fields));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
		//curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $messageRequestHeaders);
		
		$result = gzdecode(curl_exec($ch));
		
		var_dump($result);
	}
	
	function makePostString($fields)
	{
		$postData = '';
		foreach($fields as $k => $v)
		{
			$postData .= $k.'='.$v.'&';
		}
	
		$postData = rtrim($postData, '&');     
		return $postData;    
	}
?>