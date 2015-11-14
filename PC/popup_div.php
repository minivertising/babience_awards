<div style="display:none;">
<!----------------- 후보 등록 개인정보 입력 팝업 ----------------->
<div id="reg_input_popup" class="popup_wrap">
  <div class="p_mid_input p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="$.colorbox.close();return false;" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="title">
          <img src="images/popup/title_input.png" />
        </div>
        <div class="block_wrap">
          <div class="block_input">
            <div class="input_one clearfix">
              <div class="label">
                <img src="images/popup/label_name.png" alt=""/>
              </div>
              <div class="input">
                <input type="text" name="mb_name" id="mb_name">
              </div>
            </div>
            <div class="input_one clearfix">
              <div class="label">
                <img src="images/popup/label_phone.png" alt=""/>
              </div>
              <div class="input_phone clearfix">
                <div class="phone_ip">
                  <select name="mb_phone1" id="mb_phone1">
                    <option value="010">010</option>
                    <option value="011">011</option>
                    <option value="016">016</option>
                    <option value="017">017</option>
                    <option value="018">018</option>
                    <option value="019">019</option>
                  </select>
                </div>
                <div class="phone_ip"><input type="tel" name="mb_phone2" id="mb_phone2" onkeyup="only_num(this);"></div>
                <div class="phone_ip"><input type="tel" name="mb_phone3" id="mb_phone3" onkeyup="only_num(this);"></div>
              </div>
            </div>
            <div class="notice">
              <img src="images/popup/txt_notice_input.png" alt=""/>
            </div>
          </div>
          <div class="check_block">
            <div class="check_one first clearfix">
              <div class="in_check">
                <img src="images/popup/check.png" name="mb_agree" id="mb_agree" onclick="mb_check()" style="cursor:pointer" alt=""/>
              </div>
              <div class="txt_check" onclick="mb_check()" style="cursor:pointer" >
              개인정보 취급동의/광고동의
              </div>
              <div class="btn_check">
                <a href="#" onclick="open_pop('agree_popup');return false;">자세히보기</a>
              </div>
            </div>  
          </div>
        </div>
        <div class="btn_block">
          <a href="#" onclick="ins_info();return false;"><img src="images/popup/btn_ok.png" alt=""/></a>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
<!----------------- 후보 등록 개인정보 입력 팝업 ----------------->

<!----------------- 후보 등록 사진 or 유튜브영상 입력 팝업 ----------------->
<!-- <div id="reg_pic_popup" class="popup_wrap" style="background:white">
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
        <input id="fileupload" type="file" name="files" >
    </span>
    <div id="progress" class="progress">
        <div class="progress-bar progress-bar-success"></div>
    </div>
    <div id="files" class="files"></div>
    유튜브 영상 URL : <input type="text" id="youtube_url"><br /><br />
	<a href="#" onclick="ins_pic_info();return false;">영상 올리기</a>
    </div>
  </div>
</div> -->

<div id="reg_pic_popup" class="popup_wrap">
  <div class="p_mid_input p_position upload">
    <div class="block_close clearfix">
      <a href="#" onclick="$.colorbox.close();return false;" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="title">
          <img src="images/popup/title_upload.png" />
        </div>
        <div class="block_wrap">
          <div class="block_input">
            <div class="input_one nameinput clearfix">
              <div class="label">
                <img src="images/popup/label_baby_name.png" />
              </div>
              <div class="input">
                <input type="text" name="mb_baby_name" id="mb_baby_name">
              </div>
            </div>
            <div class="upload_navi clearfix">
              <a href="#" class="up_pic" onclick="tab_upload_use('pic');return false;"><img src="images/popup/btn_upload_pic_on.png" id="tab_upload_image1" /></a>
              <a href="#" class="up_mv" onclick="tab_upload_use('mov');return false;"><img src="images/popup/btn_upload_movie_off.png" id="tab_upload_image2" /></a>
            </div>
            <div class="input_one file clearfix" id="pic_input_area">
              <div class="inner_file clearfix">
                <div class="input">
                  <input type="text" id="image_up_name">
                </div>
                <div class="btn">
                  <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span><a href="#"><img src="images/popup/btn_select_file.png" alt=""/></a></span>
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" type="file" name="files" >
                  </span>
                  <!-- The global progress bar -->
                  <div id="progress" class="progress">
                    <div class="progress-bar progress-bar-success"></div>
                  </div>
                  <!-- <a href="#"><img src="images/popup/btn_select_file.png" alt=""/></a> -->
                </div>
              </div>
              <div class="pre_img" style="width:175px;height:109px">
                <!-- The container for the uploaded files -->
                <div id="files" class="files">
                  <img src="images/popup/pre_img.jpg" alt=""/>
                </div>
              </div>
            </div>
            <div class="input_one movie clearfix" id="mov_input_area" style="display:none;">
              <div class="inner_movie_url clearfix">
                <div class="input">
                  <input type="text" id="youtube_url">
                </div>
                <div class="btn">
                  <a href="#" onclick="alert('영상이 올라갔습니다.');return false;"><img src="images/popup/btn_select_url.png" alt=""/></a>
                </div>
              </div>
            </div>
            <div class="data_url">
            </div>
          </div><!--end:block_input-->
        </div>
        <div class="notice">
          <img src="images/popup/txt_upload_notice.png" alt=""/>
        </div>
        <div class="btn_block">
          <a href="#" onclick="ins_pic_info();return false;"><img src="images/popup/btn_apply.png" alt=""/></a>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
<!----------------- 후보 등록 사진 or 유튜브영상 입력 팝업 ----------------->

<!----------------- 후보자 검색 팝업 ----------------->
<div id="nominee_search_popup" class="popup_wrap">
  <div class="p_mid small p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="$.colorbox.close();return false;" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="title sear">
          <img src="images/popup/title_search.png" />
        </div>
        <div class="search_input">
          <div class="inner_search clearfix">
            <div class="label">
              <img src="images/popup/label_sear_name.png" />
            </div>
            <div class="input">
              <input type="text" id="search_baby_name">
            </div>
          </div>
        </div>
        <div class="block_btn">
          <a href="#" onclick="pop_search_nominee();return false;"><img src="images/popup/btn_search.png" /></a>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
<!----------------- 후보자 검색 팝업 ----------------->

<!----------------- 후보 등록 중복(동일항목 참여) 팝업 ----------------->
<div id="dupli_nominee_popup" class="popup_wrap">
  <div class="p_mid small p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="$.colorbox.close();return false;" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="title">
          <img src="images/popup/title_contest_done.png" />
        </div>
        <div class="block_btn two clearfix">
          <a href="#" onclick="$.colorbox.close();change_tab('3');return false;" class="first"><img src="images/popup/btn_go_vote.png" /></a>
          <a href="#" onclick="$.colorbox.close();"><img src="images/popup/btn_other_apply.png" /></a>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
<!----------------- 후보 등록 중복(동일항목 참여) 팝업 ----------------->

<!----------------- 후보 등록 중복(동일항목 참여) 팝업 ----------------->
<div id="all_dupli_nominee_popup" class="popup_wrap">
  <div class="p_mid small p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="$.colorbox.close();return false;" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="title">
          <img src="images/popup/title_contest_all_done.png" />
        </div>
        <div class="block_btn">
          <a href="#" onclick="$.colorbox.close();change_tab('3');return false;"><img src="images/popup/btn_go_vote.png" /></a>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
<!----------------- 후보 등록 중복(동일항목 참여) 팝업 ----------------->

<!----------------- 후보 등록 완료 팝업 ----------------->
<div id="nominee_comp_popup" class="popup_wrap">
  <div class="p_mid ending p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="$.colorbox.close();return false;" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="title">
          <img src="images/popup/title_thanks_applyer.png" />
        </div>
        <div class="img_gift">
          <!--후보지원 선물 100%-->
          <img src="images/popup/gift_coupon_delivery.png" /> <!--3000원 쿠폰-->
          <!--<img src="images/popup/gift_coupon_delivery.png" /><!--무료배송쿠폰-->
        </div>
        <div class="block_btn_home">
          <a href="http://www.babience.com/index.jsp" target="_blank"><img src="images/popup/btn_go_home.png" /></a>
        </div>
        <div class="block_btn_one_more clearfix">
          <a href="#" onclick="$.colorbox.close();return false;" class="first"><img src="images/popup/btn_other_apply.png" /></a>
          <a href="#" onclick="$.colorbox.close();change_tab('3');return false;"><img src="images/popup/btn_go_vote.png" /></a>
        </div>
        <div class="sns_event">
          <a href="#" class="ks">ks</a>
          <a href="#" class="fb">fb</a>
          <a href="#" class="tw">tw</a>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
<!----------------- 후보 등록 완료 팝업 ----------------->

<!----------------- 투표 개인정보 입력 팝업 ----------------->
<div id="vote_input_popup" class="popup_wrap">
  <div class="p_mid_input p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="$.colorbox.close();return false;" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="title">
          <img src="images/popup/title_input.png" />
        </div>
        <div class="block_wrap">
          <div class="block_input">
            <div class="input_one clearfix">
              <div class="label">
              엄마/아빠 이름
              </div>
              <div class="input">
                <input type="text" id="vote_name">
              </div>
            </div>
            <div class="input_one clearfix">
              <div class="label">
              휴대폰 번호
              </div>
              <div class="input_phone clearfix">
                <div class="phone_ip">
                  <select id="vote_phone1">
                    <option value="010">010</option>
                    <option value="011">011</option>
                    <option value="016">016</option>
                    <option value="017">017</option>
                    <option value="018">018</option>
                    <option value="019">019</option>
                  </select>
                </div>
                <div class="phone_ip"><input type="tel" id="vote_phone2"></div>
                <div class="phone_ip"><input type="tel" id="vote_phone3"></div>
              </div>
            </div>
            <div>
            * 입력하신 전화번호로 선물번호를 확인할 수 있는 문자가 발송됩니다.
            * 입력하신 전화번호로 선물번호를 확인할 수 있는 문자가 발송됩니다.
            </div>
          </div>

          <div class="check_block">
            <div class="check_one first clearfix">
              <div class="in_check">
                <input type="checkbox" name="vote_agree" id="vote_agree">
              </div>
              <div class="txt_check">
              개인정보 취급동의/광고동의
              </div>
              <div class="btn_agree">
                <a href="#" onclick="open_pop('agree_popup');return false;">자세히보기</a>
              </div>
            </div>  
          </div>
        </div>
        <div class="btn_block">
          <a href="#" onclick="ins_vote_info();return false;"><img src="images/popup/btn_ok.png" alt=""/></a>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
<!----------------- 투표 개인정보 입력 팝업 ----------------->

<!----------------- 약관 팝업 ----------------->
<div id="agree_popup" class="popup_wrap">
  <div class="p_mid_agree p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="$.colorbox.close();return false;" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <span class="bold">[개인정보 수집 · 이용에 대한 동의]</span> <br><br>
        (주)LG생활건강(이하 "LG생활건강")는 이벤트 진행을 위한 개인정보 
        수집 이용을 위하여 다음과 같이 귀하의 동의를 받고자 합니다.
        LG생활건강은 보다 원활한 서비스 제공을 위하여 고객의 정보를 
        수집하고 있습니다. 고객의 정보는 이벤트 서비스에 참여하기 
        위한 필수정보로서 제공을 원하지 않을 경우 수집하지 않으며, 
        동의 거부 시 이벤트 참여에 제한을 받을 수 있습니다.
        (주)LG생활건강은 본 이벤트를 위하여 다음과 같이 고객님의 
        개인정보를 수집 및 이용합니다.<br><br>
        이벤트 참여를 위해 업로드 하신 사진이나 영상은 마케팅 용도로 
        소비자 동의없이 사용할 수 있습니다.<br><br>
        > 수집 · 이용 목적: 이벤트 혜택을 제공하기 위한 정보 전달
        : 이벤트 혜택 이용에 따른 본인확인, 고지사항 전달: 접속 빈도 
        파악 또는 회원의 서비스 이용에 대한 통계 <br><br>
        > 수집 필수 항목 : 
        이름, 연락처<br><br>
        > 보유/이용기간 : 이벤트 종료 후 3개월까지
        (단, 관계 법령에 따라 필요한 경우 해당 법률에서 정한 기간까지)
      </div><!--inner-->
      <div class="inner">
        <span class="bold">[개인정보의 취급 위탁 동의]</span><br><br>
        (주)LG생활건강은 서비스 향상과 원활한 진행을 위하여 개인정보
        처리 업무를 외부 전문 업체에 위탁하여 처리하고 있습니다.
        고객은 아래와 같은 개인정보 취급 위탁에 동의하지 않을 권리가 
        있으며 동의 거부시 이벤트 참여에 제한을 받을 수 있습니다.<br><br>
        > 취급위탁업체 위탁업무 및 이용목적 : 
        미니버타이징 (주) / 이벤트 대행 및 운영<br><br>
        > 보유 및 이용기간 : 이벤트 종료 후 3개월까지<br>
        (단, 관계 법령에 따라 필요한 경우 해당 법률에서 정한 기간까지)
      </div><!--inner-->
      <div class="inner">
        <span class="bold">[광고성 정보 전송 동의]</span><br><br>   
        - (주)LG생활건강은 수집된 개인정보를 이용하여 각종 서비스•상품 및 타사 서비스와 결합된 상품에 대하여 홍보, 가입권유, 프로모션, 이벤트 목적으로 본인에게 정보/광고를 전화, SMS, MMS, 이메일, 우편등을 통해 전달합니다.<br><br>
        - (주)LG생활건강이 마케팅 / 홍보를 위하여 고객의 개인정보를 이용에 동의를 구하며, 동의 거부시에도 이벤트 참여는 가능하나 할인 및 이벤트 정보 안내 등 서비스는 제한될 수 있습니다.
      </div><!--inner-->
    </div>
  </div>
</div>
<!----------------- 약관 팝업 ----------------->

</div>