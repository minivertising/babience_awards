<div style="display:none;">
<!----------------- 후보 등록 개인정보 입력 팝업 ----------------->
<div id="reg_input_popup" class="popup_wrap" style="background:white">
  <div class="p_mid_alert p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="$.colorbox.close();return false;" class="btn_close">X</a>
    </div>
    <div class="block_content">
      <h3>2015 베비언스 어워즈</h3>
      <h3>개인정보를 입력해주세요</h3>
      엄마(아빠)이름 <input type="text" name="mb_name" id="mb_name"><br />
      전화번호 <input type="text" name="mb_phone" id="mb_phone"><br />
      <input type="checkbox" name="mb_agree" id="mb_agree"> <a href="#">개인정보 취급동의/광고동의 자세히보기</a><br />
	  <a href="#" onclick="ins_info();return false;">확인</a>
    </div>
  </div>
</div>
<!----------------- 후보 등록 개인정보 입력 팝업 ----------------->

<!----------------- 후보 등록 사진 or 유튜브영상 입력 팝업 ----------------->
<div id="reg_pic_popup" class="popup_wrap" style="background:white">
  <div class="p_mid_alert p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="$.colorbox.close();return false;" class="btn_close">X</a>
    </div>
    <div class="block_content">
      <h3>2015 베비언스 어워즈</h3>
      <h3>후보자 등록을 위해</h3>
      <h3>사진 또는 영상 url을 올려주세요</h3>
      아기이름 <input type="text" name="mb_baby_name" id="mb_baby_name"><br />
    <span class="btn btn-success fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>사진 올리기</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="files[]" multiple>
    </span>
    <!-- The global progress bar -->
    <div id="progress" class="progress">
        <div class="progress-bar progress-bar-success"></div>
    </div>
    <!-- The container for the uploaded files -->
    <div id="files" class="files"></div>
    유튜브 영상 URL : <input type="text" id="youtube_url">
	<button id="upload_pic" text="영상 올리기" />
    </div>
  </div>
</div>
<!----------------- 후보 등록 사진 or 유튜브영상 입력 팝업 ----------------->
</div>