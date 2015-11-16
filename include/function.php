<?
	// 유입매체 정보 입력
	function BR_InsertTrackingInfo($media, $gubun)
	{
		global $_gl;
		global $my_db;

		$query		= "INSERT INTO ".$_gl['tracking_info_table']."(tracking_media, tracking_refferer, tracking_ipaddr, tracking_date, tracking_gubun) values('".$media."','".$_SERVER['HTTP_REFERER']."','".$_SERVER['REMOTE_ADDR']."',now(),'".$gubun."')";
		$result		= mysqli_query($my_db, $query);
	}

	function BA_winner_draw($mb_phone)
	{
		global $_gl;
		global $my_db;

		$water_winner		= 30;	// 베이비 워터 1박스
		$skin_winner			= 30;	// 스킨케어 2종 세트(로션+워시)
		$clean_winner		= 30;	// 클린 4종세트(세제섬유유연제용기+리필
		$delivery_winner	= 50000;	// 무료 배송 쿠폰
		$discount_winner	= 50000;	// 3천원 할인 쿠폰

		$water_array = array(200000);
		$skin_array = array(200000);
		$clean_array = array(200000);
		$delivery_array = array(200000);
		$discount_array = array(200000);
		$delivery_array = array("Y","N");
		$discount_array = array("Y","N");

		// 오늘의 이벤트 참여자 수 구하기
		$total_query		= "SELECT * FROM ".$_gl['voter_info_table']." WHERE vote_regdate like '%".date("Y-m-d")."%'";
		$total_result		= mysqli_query($my_db, $total_query);
		$total_num		= mysqli_num_rows($total_result);

		// 중복 당첨 체크
		$dupli_query		= "SELECT * FROM ".$_gl['voter_info_table']." WHERE vote_phone='".$mb_phone."' AND vote_winner like '%Y%'";
		$dupli_result		= mysqli_query($my_db, $dupli_query);
		$dupli_num		= mysqli_num_rows($dupli_result);

		// 중복 참여자 체크
		$dupli0_query		= "SELECT * FROM ".$_gl['voter_info_table']." WHERE vote_phone='".$mb_phone."'";
		$dupli0_result		= mysqli_query($my_db, $dupli0_query);
		$dupli0_num		= mysqli_num_rows($dupli0_result);

		if ($dupli_num > 0)
		{
			$winner = "N||DISCOUNT";
		}else{
			if ($dupli0_num == 0)
			{
				$winner = "N||DELIVERY";
			}

			if ($winner != "N||DELIVERY")
			{
				if ($dupli0_num < 3)
				{
					$winner = "N||DISCOUNT";
				}else{
					foreach ($water_array as $key => $val)
					{
						if ($total_num == $val)
						{
							$winner = "Y||WATER";
							break;
						}
						$winner = "N||DISCOUNT";
					}

					foreach ($skin_array as $key => $val)
					{
						if ($total_num == $val)
						{
							$winner = "Y||SKIN";
							break;
						}
						$winner = "N||DISCOUNT";
					}

					foreach ($clean_array as $key => $val)
					{
						if ($total_num == $val)
						{
							$winner = "Y||CLEAN";
							break;
						}
						$winner = "N||DISCOUNT";
					}
				}
			}
		}
		return $winner;
	}



	function BA_getSerial($gift)
	{
		global $_gl;
		global $my_db;

		$query		= "SELECT serial_code FROM ".$_gl['serial_info_table']." WHERE gift='".$gift."' AND useYN='N' limit 1";
		$result		= mysqli_query($my_db, $query);
		$data			= mysqli_fetch_array($result);

		$query2		= "UPDATE ".$_gl['serial_info_table']." SET useYN='Y' WHERE serial_code='".$data[serial_code]."'";
		$result2		= mysqli_query($my_db, $query2);

		return $data['serial_code'];
	}

	// LMS 발송 
	function send_lms($phone, $serial)
	{
		global $_gl;
		global $my_db;

		$s_url		= "http://award.babience-event.com/MOBILE/coupon_page.php?mid=".$serial;
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
			'subject' => '[2015 베비언스 어워즈]',
			'msg_body' => "
2015 베비언스 어워즈 캠페인에 후보 지원을 해주셔서 감사드립니다.

▶ 나의 선물 번호 확인
".$s_url."

*문자를 지우지 마세요*
발송문자를 통해서만 선물번호를 확인하실 수 있습니다.
또한 참여할때마다 받는 선물을 계속 확인하실 수 있습니다.

이벤트 관련 문의 : 070-4888-3580
/jh.woo@minivertising.kr (평일 10시 ~ 18시)
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