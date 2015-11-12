var chk_ins = 0;
function input_info()
{
	var mb_name			= $("#mb_name").val();
	var mb_phone			= $("#mb_phone").val();
	var sel_movie			= $("#movie_num").val();
	var use_agree			= $("#usechk").val();
	var privacy_agree		= $("#privacychk").val();
	var adver_agree		= $("#adverchk").val();

	if (mb_name == "" || mb_name == "성함을 입력해 주세요.")
	{

		alert('이름을 입력해 주세요.');

		$("#mb_name").focus();
		chk_ins = 0;
		return false;
	}

	if (mb_phone == "" || mb_phone == "휴대폰 번호를 입력해 주세요.(숫자만)")
	{

		alert('전화번호를 입력해 주세요.');

		$("#mb_phone").focus();
		chk_ins = 0;
		return false;
	}

	if (use_agree == "N")
	{
		alert("개인정보 이용 약관에 동의를 안 하셨습니다");
		chk_ins = 0;
		return false;
	}

/*
	if (privacy_agree == "N")
	{
		alert("개인정보 취급 위탁 동의를 안 하셨습니다");
		chk_ins = 0;
		return false;
	}

	if (adver_agree == "N")
	{
		alert("광고성 정보전송 약관에 동의를 안 하셨습니다");
		chk_ins = 0;
		return false;
	}
*/
/*
	if ($('#use_agree').is(":checked") == false)
	{
		alert("개인정보 활용 동의를 안 하셨습니다");
		chk_ins = 0;
		return false;
	}

	if ($('#privacy_agree').is(":checked") == false)
	{
		alert("개인정보 취급 위탁 동의를 안 하셨습니다");
		chk_ins = 0;
		return false;
	}

	if ($('#adver_agree').is(":checked") == false)
	{
		alert("광고 동의 약관에 동의를 안 하셨습니다");
		chk_ins = 0;
		return false;
	}
*/

	$.ajax({
		type:"POST",
		data:{
			"exec"					: "insert_info",
			"mb_name"			: mb_name,
			"mb_phone"			: mb_phone,
			"sel_movie"			: sel_movie
		},
		url: "../main_exec.php",
		success: function(response){
			$.colorbox({width:"542px", height:"742px", inline:true, opacity:"0.9", closeButton:false, href:"#thanks_popup"});
		}
	});

}

function show_gift()
{
	$("#gift_link").colorbox({width:"712px", height:"652px", inline:true, opacity:"0.9", scrolling:false, closeButton:false, overlayClose: true, fadeOut: 300, href:"#gift_popup", onComplete: function(){
		$("#cboxLoadedContent").height(610);
		$("#cboxContent").css("background","none");

	},
	onClosed: function(){
		$("#cboxContent").css("background","#fff");
	}});

}
function show_gift2()
{
	$.colorbox({width:"712px", height:"652px", inline:true, opacity:"0.9", scrolling:false, closeButton:false, overlayClose: true, fadeOut: 300, href:"#gift_popup", onComplete: function(){
		$("#cboxLoadedContent").height(610);
		$("#cboxContent").css("background","none");
	},
	onClosed: function(){
		$("#cboxContent").css("background","#fff");
	}});
}

function show_join()
{
	$.colorbox({width:"592px", height:"522px", inline:true, opacity:"0.9", scrolling:false, closeButton:false, overlayClose: true, fadeOut: 300, href:"#join_popup", onComplete: function(){
		$("#cboxLoadedContent").height(480);
		$("#cboxContent").css("background","none");
	},
	onClosed: function(){
		$("#cboxContent").css("background","#fff");
	}});
}

function show_notice()
{
	$.colorbox({width:"492px", height:"567px", inline:true, opacity:"0.9", scrolling:false, closeButton:false, overlayClose: true, fadeOut: 300, href:"#notice_popup", onComplete: function(){
		$("#cboxLoadedContent").height(526);
		$("#cboxContent").css("background","none");
	},
	onClosed: function(){
		$("#cboxContent").css("background","#fff");
	}});
}

function back_input()
{
	$.colorbox({width:"492px", height:"632px", inline:true, opacity:"0.9", closeButton:false, href:"#insert_popup", onComplete:function(){
		$("#cboxLoadedContent").height(592);
		$("#cboxContent").css("background","none");
	},
	onClosed: function(){
		$("#cboxContent").css("background","#fff");
	}});
}

function show_use_agree()
{
	$.colorbox({width:"492px", height:"566px", inline:true, opacity:"0.9", scrolling:false, closeButton:false, overlayClose: true, fadeOut: 300, href:"#use_agree_popup", onComplete: function(){
		$("#cboxLoadedContent").height(526);
		$("#cboxContent").css("background","none");
	}});
}

function show_privacy_agree()
{
	$.colorbox({width:"492px", height:"566px", inline:true, opacity:"0.9", scrolling:false, closeButton:false, overlayClose: true, fadeOut: 300, href:"#privacy_agree_popup", onComplete: function(){
		$("#cboxLoadedContent").height(526);
		$("#cboxContent").css("background","none");
	}});
}

function show_adver_agree()
{
	$.colorbox({width:"492px", height:"566px", inline:true, opacity:"0.9", scrolling:false, closeButton:false, overlayClose: true, fadeOut: 300, href:"#adver_agree_popup", onComplete: function(){
		$("#cboxLoadedContent").height(526);
		$("#cboxContent").css("background","none");
	}});
}

function show_confirm()
{
	$.colorbox({width:"452px", height:"312px", inline:true, opacity:"0.9", scrolling:false, closeButton:false, overlayClose: true, fadeOut: 300, href:"#confirm_popup", onComplete: function(){
		$("#cboxLoadedContent").height(526);
		$("#cboxContent").css("background","none");
	}});
}
