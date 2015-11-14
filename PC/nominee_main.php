<?
	include_once   "./header.php";
?>
<body>
  <div>
    <h1>2015 베비언스 어워즈</h1>
    <h2>특별한 시상식으로의 초대</h2>
    <h3>나만보기 아까운 우리아기의 명품 연기를 보여주세요</h3>
  <div>
  <div>
    <a href="./vote_main.php">심사하기</a>
  </div>
  <div>
    <a href="#" onclick="reg_nominee('1');">심쿵미소 연기상 후보지원</a>
    <a href="#" onclick="reg_nominee('2');">혼신의 눈물 연기상 후보지원</a>
    <a href="#" onclick="reg_nominee('3');">코믹 표정 연기상 후보지원</a>
    <a href="#" onclick="reg_nominee('4');">베비언스 먹방상 후보지원</a>
    <a href="#" onclick="reg_nominee('5');">폭풍수면 연기상 후보지원</a>
  </div>
<?
	include_once   "./popup_div.php";
?>
</body>
</html>
<script type="text/javascript">
var sel_nominee	= null;

$(document).ready(function() {
	//Kakao.init('9cfec622990737690124c0fd063e368b');
	$("#cboxTopLeft").hide();
	$("#cboxTopRight").hide();
	$("#cboxBottomLeft").hide();
	$("#cboxBottomRight").hide();
	$("#cboxMiddleLeft").hide();
	$("#cboxMiddleRight").hide();
	$("#cboxTopCenter").hide();
	$("#cboxBottomCenter").hide();
	//$("#cboxContent").css("background","none");
});

function reg_nominee(param)
{
	if (param == "1")
	{
		sel_nominee	= "1";
	}else if (param == "2"){
		sel_nominee	= "2";
	}else if (param == "3"){
		sel_nominee	= "3";
	}else if (param == "4"){
		sel_nominee	= "4";
	}

	$.colorbox({width:"542px", height:"342px", inline:true, opacity:"0.9", scrolling:false, closeButton:false, overlayClose: false, fadeOut: 300, href:"#reg_input_popup", onComplete: function(){
		$("#cboxLoadedContent").height(302);
		$("#cboxContent").css("background","none");
	}});

}

function ins_info()
{
	var mb_name		= $("#mb_name").val();
	var mb_phone		= $("#mb_phone").val();

	if (mb_name == "")
	{
		alert('이름을 입력해 주세요.');
		$("#mb_name").focus();
		//chk_ins = 0;
		return false;
	}

	if (mb_phone == "")
	{
		alert('전화번호를 입력해 주세요.');
		$("#mb_phone").focus();
		//chk_ins = 0;
		return false;
	}

	if ($('#mb_agree').is(":checked") == false)
	{
		alert("약관에 동의를 안 하셨습니다");
		return false;
	}

	$.ajax({
		type:"POST",
		data:{
			"exec"				: "insert_info",
			"mb_name"		: mb_name,
			"mb_phone"		: mb_phone,
			"sel_nominee"	: sel_nominee
		},
		url: "../main_exec.php",
		success: function(response){
			alert(response);
			if (response	== "Y")
			{
				alert(sel_nominee);
				$.colorbox({width:"542px", height:"642px", inline:true, opacity:"0.9", scrolling:false, closeButton:false, overlayClose: false, fadeOut: 300, href:"#reg_pic_popup", onComplete: function(){
					$("#cboxLoadedContent").height(602);
					$("#cboxContent").css("background","none");
				}});
			}else{
				alert("접속자가 많아 참여가 지연되고 있습니다. 다시 참여해 주세요.");
			}
		}
	});
}

$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = 'file_upload.php',
        //uploadButton = $('<button/>')
        uploadButton = $('#upload_pic')
            .addClass('btn btn-primary')
            //.prop('disabled', true)
            .text('Processing...')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('Abort')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            });
			/*
		$("#upload_pic").on('click', function(){
                var $this = $(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('Abort')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
		});
		*/
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: false,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        maxFileSize: 99900000,
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
        previewMaxWidth: 100,
        previewMaxHeight: 100,
        previewCrop: true
    }).on('fileuploadadd', function (e, data) {
        data.context = $('<div/>').appendTo('#files');
        $.each(data.files, function (index, file) {
            var node = $('<p/>')
                    .append($('<span/>').text(file.name));
            if (!index) {
                //node
                  //  .append('<br>')
                    //.append(uploadButton.clone(true).data(data));
				//uploadButton.clone(true).data(data);
				data.submit();
            }

            node.appendTo(data.context);
        });
    }).on('fileuploadprocessalways', function (e, data) {
        var index = data.index,
            file = data.files[index],
            node = $(data.context.children()[index]);
        if (file.preview) {
            node
                .prepend('<br>')
                .prepend(file.preview);
        }
        if (file.error) {
            node
                .append('<br>')
                .append($('<span class="text-danger"/>').text(file.error));
        }
        if (index + 1 === data.files.length) {
            data.context.find('button')
                .text('Upload')
                .prop('disabled', !!data.files.error);
        }
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {
            if (file.url) {
                var link = $('<a>')
                    .attr('target', '_blank')
                    .prop('href', file.url);
                $(data.context.children()[index])
                    .wrap(link);
            } else if (file.error) {
                var error = $('<span class="text-danger"/>').text(file.error);
                $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
            }
        });
    }).on('fileuploadfail', function (e, data) {
        $.each(data.files, function (index) {
  var error = $('<span class="text-danger"/>').text('File upload failed.');
            $(data.context.children()[index])
                .append('<br>')
                .append(error);
        });
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});

</script>