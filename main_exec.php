<?php
include_once "config.php";

switch ($_REQUEST['exec'])
{
	case "insert_share_info" :
		$sns_media	= $_REQUEST['sns_media'];

		$query 		= "INSERT INTO ".$_gl['share_info_table']."(sns_media, sns_ipaddr, sns_gubun, inner_media, sns_regdate) values('".$sns_media."','".$_SERVER['REMOTE_ADDR']."','".$gubun."','".$_SESSION['ss_media']."','".date("Y-m-d H:i:s")."')";
		$result 	= mysqli_query($my_db, $query);

		if ($result)
			$flag = "Y";
		else
			$flag = "N";

		echo $flag;

	break;

	case "insert_info" :
		$mb_name			= $_REQUEST['mb_name'];
		$mb_phone			= $_REQUEST['mb_phone'];
		$sel_nominee		= $_REQUEST['sel_nominee'];

		$query 	= "INSERT INTO ".$_gl['member_info_table']."(mb_ipaddr,mb_name,mb_phone,mb_regdate,mb_gubun,mb_media) values('".$_SERVER['REMOTE_ADDR']."','".$mb_name."','".$mb_phone."','".date("Y-m-d H:i:s")."','".$gubun."','".$media."')";
		$result 	= mysqli_query($my_db, $query);

		// 전화번호 세션 생성
		$_SESSION['mb_phone']		= $mb_phone;
		// 선택한 카테고리 세션 생성
		$_SESSION['sel_nominee']		= $sel_nominee;

		if ($result)
			$flag	= "Y";
		else
			$flag	= "N";
		echo $flag;
	break;

	case "send_lms" :
		$mb_phone			= $_REQUEST['mb_phone'];
		$mb_gift				= $_REQUEST['mb_gift'];
		$mb_nation			= $_REQUEST['mb_nation'];

		$gift_query		= "SELECT * FROM ".$_gl['member_info_table']." WHERE mb_phone='".$mb_phone."'";
		$gift_result		= mysqli_query($my_db, $gift_query);
		$gift_num		= mysqli_num_rows($gift_result);

		$winner_query		= "SELECT * FROM ".$_gl['member_info_table']." WHERE mb_phone='".$mb_phone."' AND mb_winner like '%Y%'";
		$winner_result		= mysqli_query($my_db, $winner_query);
		$winner_num		= mysqli_num_rows($winner_result);

		if ($mb_gift == "0D")
			$result	= "N";
		else if ($mb_gift == "2D")
			$result	= "N";
		else if ($mb_gift == "3D")
			$result	= "N";
		else
			$result	= send_lms($mb_phone, $mb_gift, $mb_nation);
		echo $gift_num;
	break;

	case "use_coupon" :
		$mb_phone			= $_REQUEST['mb_phone'];

		$query 	= "UPDATE ".$_gl['member_info_table']." SET mb_use='Y' WHERE mb_phone='".$mb_phone."'";
		$result 	= mysqli_query($my_db, $query);

		if ($result)
			$flag	= "Y";
		else
			$flag	= "N";
		
		echo $flag;
	break;
}
?>