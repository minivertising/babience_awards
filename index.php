<?
	include_once "config.php";

	//unset($media);
	$media	= $_REQUEST['media'];
	$testurl	= $_REQUEST['testurl'];

	$_SESSION['ss_media'] = $media;
	$_SESSION['ss_testurl'] = $testurl;

	BR_InsertTrackingInfo($media, $gubun);

	if($gubun == "MOBILE")
	{
		//if ($testurl == "imsi")
			Header("Location:http://award.babience-event.com/MOBILE/index.php");
		//else
		//	Header("Location:https://www.facebook.com/173760885976143/posts/1146150778737144");
		exit;
	}else{
		//if ($testurl == "imsi")
			Header("Location:http://award.babience-event.com/PC/index.php");
		//else
		//	Header("Location:https://www.facebook.com/173760885976143/posts/1146150778737144");
		exit;
	}

?>
