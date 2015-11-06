<?
	// 유입매체 정보 입력
	function BR_InsertTrackingInfo($media, $gubun)
	{
		global $_gl;
		global $my_db;

		$query		= "INSERT INTO ".$_gl['tracking_info_table']."(tracking_media, tracking_refferer, tracking_ipaddr, tracking_date, tracking_gubun) values('".$media."','".$_SERVER['HTTP_REFERER']."','".$_SERVER['REMOTE_ADDR']."',now(),'".$gubun."')";
		$result		= mysqli_query($my_db, $query);
	}

	function BR_getSerial()
	{
		global $_gl;
		global $my_db;

		$query		= "SELECT serial_code FROM ".$_gl['serial_info_table']." WHERE useYN='N' limit 1";
		$result		= mysqli_query($my_db, $query);
		$data			= mysqli_fetch_array($result);

		$query2		= "UPDATE ".$_gl['serial_info_table']." SET useYN='Y' WHERE serial_code='".$data[serial_code]."'";
		$result2		= mysqli_query($my_db, $query2);

		return $data[serial_code];
	}

	// LMS 발송 
	function send_lms($phone, $s_url)
	{
		global $_gl;
		global $my_db;

		$httpmethod = "POST";
		$url = "http://api.openapi.io/ppurio/1/message/lms/minivertising";
		$clientKey = "MTAyMC0xMzg3MzUwNzE3NTQ3LWNlMTU4OTRiLTc4MGItNDQ4MS05NTg5LTRiNzgwYjM0ODEyYw==";
		$contentType = "Content-Type: application/x-www-form-urlencoded";
	
		$response = sendRequest($httpmethod, $url, $clientKey, $contentType, $phone, $s_url);

		$json_data = json_decode($response, true);

		/*
		받아온 결과값을 DB에 저장 및 Variation
		*/
		$query3 = "INSERT INTO sms_info(send_phone, send_status, cmid, send_regdate) values('".$phone."','".$json_data['result_code']."','".$json_data['cmid']."','".date("Y-m-d H:i:s")."')";
		$result3 		= mysqli_query($my_db, $query3);

		$query2 = "UPDATE member_info SET mb_lms='Y' WHERE mb_phone='".$phone."'";
		$result2 		= mysqli_query($my_db, $query2);

		if ($json_data['result_code'] == "200")
			$flag = "Y";
		else
			$flag = "N";

		return $flag;
	}

	function sendRequest($httpMethod, $url, $clientKey, $contentType, $phone, $s_url) {

		//create basic authentication header
		$headerValue = $clientKey;
		$headers = array("x-waple-authorization:" . $headerValue);

		$params = array(
			'send_time' => '', 
			'send_phone' => '025322475', 
			'dest_phone' => $phone, 
			//'dest_phone' => '010-9901-7644',
			'send_name' => '', 
			'dest_name' => '', 
			'subject' => '[베비언스]',
			'msg_body' => "
베비언스 해피 베이비 바캉스 이벤트에 참여해주셔서 감사합니다.

9월 14일 당첨자를 발표합니다.

▶ 베비언스 3,000원 쿠폰 확인
".$s_url."
"
		);

		//curl initialization
		$curl = curl_init();

		//create request url
		//$url = $url."?".$parameters;

		curl_setopt ($curl, CURLOPT_URL , $url);
		curl_setopt ($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt ($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt ($curl, CURLINFO_HEADER_OUT, true);
		curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, false);

		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);

		$response = curl_exec($curl);

		$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		$responseHeaders = curl_getinfo($curl, CURLINFO_HEADER_OUT);


		curl_close($curl);

		return $response;
	}

?>