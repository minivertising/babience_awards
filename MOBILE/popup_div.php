<div style="display:none;">
<!----------------- 후보 등록 개인정보 입력 팝업 ----------------->
<div id="reg_input_popup" class="popup_wrap">
  <div class="p_mid p_position big input">
    <div class="block_close clearfix">
      <a href="#" onclick="$.colorbox.close();return false;" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="title title_input"><img src="images/popup/title_input.png" /></div>
        <div class="block_input_bg">
          <div class="block_input clearfix">
            <div class="label"><img src="images/popup/label_name.png" /></div>
            <div class="input_txt name">
              <input type="text" name="mb_name" id="mb_name">
            </div>
          </div>
          <div class="block_input clearfix">
            <div class="label"><img src="images/popup/label_phone.png" /></div>
            <div class="input_txt">
              <div class="inner_phone clearfix">
                <div class="in_phone">
                  <select name="mb_phone1" id="mb_phone1">
                    <option value="010">010</option>
                    <option value="011">011</option>
                    <option value="016">016</option>
                    <option value="017">017</option>
                    <option value="018">018</option>
                    <option value="019">019</option>
                  </select>
                </div>
                <div class="in_phone"><input type="text" id="mb_phone2" onkeyup="only_num(this);"></div>
                <div class="in_phone"><input type="text" id="mb_phone3" onkeyup="only_num(this);"></div>
              </div>
            </div>
          </div>
          <div class="block_input clearfix">
            <div class="input_txt notice">
              <img src="images/popup/txt_notice_input.png" />
            </div>
          </div>
          <div class="block_ckeck">
            <div class="inner_check clearfix">
              <div class="in_check"><img src="images/popup/check.png" width="22" name="mb_agree" id="mb_agree" onclick="mb_check()" /></div>
              <div class="label_check" onclick="mb_check()">개인정보활용/개인정보취급/광고 약관동의</div>
              <div class="btn_check"><a href="#" onclick="open_pop('agree_popup');return false;">자세히보기</a></div>
            </div>
          </div>
        </div>    
        <div class="block_btn">
          <a href="#" onclick="ins_info();return false;" class="common_1"><img src="images/popup/btn_input_ok.png" /></a>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
<!----------------- 후보 등록 개인정보 입력 팝업 ----------------->

<!----------------- 후보 등록 개인정보 입력 팝업 ----------------->
<div id="vote_input_popup" class="popup_wrap">
  <div class="p_mid p_position big input">
    <div class="block_close clearfix">
      <a href="#" onclick="$.colorbox.close();return false;" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="title title_input"><img src="images/popup/title_input.png" /></div>
        <div class="block_input_bg">
          <div class="block_input clearfix">
            <div class="label"><img src="images/popup/label_name.png" /></div>
            <div class="input_txt name">
              <input type="text" name="vote_name" id="vote_name">
            </div>
          </div>
          <div class="block_input clearfix">
            <div class="label"><img src="images/popup/label_phone.png" /></div>
            <div class="input_txt">
              <div class="inner_phone clearfix">
                <div class="in_phone">
                  <select name="vote_phone1" id="vote_phone1">
                    <option value="010">010</option>
                    <option value="011">011</option>
                    <option value="016">016</option>
                    <option value="017">017</option>
                    <option value="018">018</option>
                    <option value="019">019</option>
                  </select>
                </div>
                <div class="in_phone"><input type="text" id="vote_phone2" onkeyup="only_num(this);"></div>
                <div class="in_phone"><input type="text" id="vote_phone3" onkeyup="only_num(this);"></div>
              </div>
            </div>
          </div>
          <div class="block_input clearfix">
            <div class="input_txt notice">
              <img src="images/popup/txt_notice_input.png" />
            </div>
          </div>
          <div class="block_ckeck">
            <div class="inner_check clearfix">
              <div class="in_check"><img src="images/popup/check.png" width="22" name="vote_agree" id="vote_agree" onclick="vote_check()" /></div>
              <div class="label_check" onclick="vote_check()">개인정보활용/개인정보취급/광고 약관동의</div>
              <div class="btn_check"><a href="#" onclick="open_pop('agree_popup');return false;">자세히보기</a></div>
            </div>
          </div>
        </div>    
        <div class="block_btn">
          <a href="#" onclick="ins_vote_info();return false;" class="common_1"><img src="images/popup/btn_input_ok.png" /></a>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
<!----------------- 후보 등록 개인정보 입력 팝업 ----------------->

<!----------------- 후보 등록 사진 or 유튜브영상 입력 팝업 ----------------->
<div id="reg_pic_popup" class="popup_wrap">
  <div class="p_mid p_position big input">
    <div class="block_close clearfix">
      <a href="#" onclick="$.colorbox.close();return false;" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="title title_input"><img src="images/popup/title_input_file.png" /></div>
        <div class="block_input_bg upload">
          <div class="block_input baby clearfix">
            <div class="label baby"><img src="images/popup/label_name_baby.png" /></div>
            <div class="input_txt name"><input type="text" name="mb_baby_name" id="mb_baby_name"></div>
          </div>
          <!--사진올리기-->
          <div class="up_pic" id="pic_input_area">
            <div class="navi_upload">  
              <div class="inner_navi_up clearfix">
                <a href="#" onclick="tab_upload_use('pic');return false;"><img src="images/popup/btn_upload_navi_1_on.png" /></a>
                <a href="#" onclick="tab_upload_use('mov');return false;"><img src="images/popup/btn_upload_navi_2_off.png" /></a>
              </div>
            </div>
            <div class="input_upload">
              <div class="inner_input_upload clearfix">
                <div class="input">
                  <input type="text" id="image_up_name">
                </div>
                <div class="btn2">
                  <span class="btn btn-success fileinput-button" style="width:100%">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span><a href="#"><img src="images/popup/btn_file_select.png" /></a></span>
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" type="file" name="files" >
                  </span>
                  <!-- The global progress bar -->
                  <div id="progress" class="progress">
                    <div class="progress-bar progress-bar-success"></div>
                  </div>

                </div>
              </div>
            </div>
            <div class="pre_img">
              <!-- The container for the uploaded files -->
              <div id="files" class="files">
                <img src="images/popup/pre_pic.png" />
              </div>
            </div>
          </div>
          <!--사진올리기-->
          <!--영상올리기-->
          <div class="up_mv" id="mov_input_area" style="display:none;">
            <div class="navi_upload">  
              <div class="inner_navi_up clearfix">
                <a href="#" onclick="tab_upload_use('pic');return false;"><img src="images/popup/btn_upload_navi_1_off.png" /></a>
                <a href="#" onclick="tab_upload_use('mov');return false;"><img src="images/popup/btn_upload_navi_2_on.png" /></a>
              </div>
            </div>
            <div class="input_upload">
              <div class="inner_input_upload clearfix">
                <div class="input">
                  <input type="text" id="youtube_url">
                </div>
                <div class="btn">
                  <img src="images/popup/btn_url_select.png" onclick="alert('영상이 올라갔습니다.');return false;" />
                </div>
              </div>
            </div>
          </div>
          <!--영상올리기-->
        </div>    
        <div class="txt_notice">
          <img src="images/popup/txt_notice_upload.png" />
        </div>
        <div class="block_btn">
          <a href="#" class="common_45" onclick="ins_pic_info();return false;"><img src="images/popup/btn_apply.png" /></a>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
<!----------------- 후보 등록 사진 or 유튜브영상 입력 팝업 ----------------->

<!----------------- 후보 등록 중복(동일항목 참여) 팝업 ----------------->
<div id="dupli_nominee_popup" class="popup_wrap">
  <div class="p_mid p_position aleardy">
    <div class="block_close clearfix">
      <a href="#" onclick="$.colorbox.close();return false;" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="title title_input"><img src="images/popup/title_already_apply.png" /></div>   
        <div class=" block_btn two clearfix">
          <a href="#" onclick="$.colorbox.close();change_tab('3');return false;" class="first"><img src="images/popup/btn_go_to_vote.png" /></a>
          <a href="#" onclick="$.colorbox.close();return false;"><img src="images/popup/btn_apply_other.png" /></a>
        </div>  
      </div><!--inner-->
    </div>
  </div>
</div>
<!----------------- 후보 등록 중복(동일항목 참여) 팝업 ----------------->

<!----------------- 후보 등록 중복(5가지 모두 참여) 팝업 ----------------->
<div id="all_dupli_nominee_popup" class="popup_wrap">
  <div class="p_mid p_position aleardy">
    <div class="block_close clearfix">
      <a href="#" onclick="$.colorbox.close();return false;" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="title title_input"><img src="images/popup/title_all_apply.png" /></div>   
        <div class=" block_btn">
          <a href="#" onclick="$.colorbox.close();change_tab('3');return false;" class="common_40"><img src="images/popup/btn_go_to_vote.png" /></a>
        </div>  
      </div><!--inner-->
    </div>
  </div>
</div>
<!----------------- 후보 등록 중복(5가지 모두 참여) 팝업 ----------------->

<!----------------- 투표 중복 참여 팝업 ----------------->
<div id="dupli_vote_popup" class="popup_wrap">
  <div class="p_mid p_position aleardy">
    <div class="block_close clearfix">
      <a href="#" onclick="$.colorbox.close();return false;" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="title title_input"><img src="images/popup/title_already_vote.png" /></div>   
        <div class=" block_btn">
          <a href="#" onclick="$.colorbox.close();change_tab('2');return false;" class="common_50"><img src="images/popup/btn_apply_go.png" /></a>
        </div>  
      </div><!--inner-->
    </div>
  </div>
</div>
<!----------------- 투표 중복 참여 팝업 ----------------->

<!----------------- 후보 등록 완료 팝업 ----------------->
<div id="nominee_comp_popup" class="popup_wrap">
  <div class="p_mid p_position big">
    <div class="block_close clearfix">
      <a href="#" onclick="$.colorbox.close();return false;" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content gift_comp">
      <div class="inner">
        <div class="title"><img src="images/popup/title_apply_comp.png" /></div>
        <div class="block_gift">
          <!--후보지원 선물 100%-->
          <img src="images/popup/gift_coupon.png" id="nominee_gift_image" /> <!--3000원 쿠폰-->
          <!--<img src="images/popup/gift_coupon_delivery.png" /><!--무료배송쿠폰-->
        </div>
        <div class="btn_home">
          <a href="http://www.babience.com/m/index.jsp" target="_blank"><img src="images/popup/btn_home_gift.png" /></a>
        </div>
        <div class="btn_block two clearfix">
          <a href="#" onclick="$.colorbox.close();return false;" class="first"><img src="images/popup/btn_apply_other.png" /></a>
          <a href="#" onclick="$.colorbox.close();change_tab('3');return false;" class=""><img src="images/popup/btn_go_to_vote.png" /></a>
        </div>
        <div class="block_sns">
          <a href="#" class="kt"><img src="images/popup/btn_share_kt.png" /></a>
          <a href="#" class="ks"><img src="images/popup/btn_share_ks.png" /></a>
          <a href="#" class="fb"><img src="images/popup/btn_share_fb.png" /></a>
          <a href="#" class="tw"><img src="images/popup/btn_share_tw.png" /></a>
          <div class="bg"><img src="images/popup/bg_sns.png" /></div>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
<!----------------- 후보 등록 완료 팝업 ----------------->

<!----------------- 투표 완료 팝업 ----------------->
<div id="vote_comp_popup" class="popup_wrap">
  <div class="p_mid p_position big">
    <div class="block_close clearfix">
      <a href="#" onclick="$.colorbox.close();return false;" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content gift_comp">
      <div class="inner">
        <div class="title"><img src="images/popup/title_vote_comp.png" /></div>
        <div class="block_gift">
          <!--심사 100% 선물 2쿠폰-->
          <img src="images/popup/gift_coupon.png" id="vote_gift_image" /> <!--3000원 쿠폰-->
          <!--<img src="images/popup/gift_coupon_delivery.png" /> 무료배송쿠폰-->
          <!--쿠폰중복 외 중복당첨 불가 선물 3가지-->
          <!-- <img src="images/popup/gift_coupon_waterbox.png" /> 베이비워터 1박스 30명-->
          <!--<img src="images/popup/gift_coupon_fabric.png" /> 섬유유연제 30명-->
          <!--<img src="images/popup/gift_coupon_skincare.png" /> 스킨케어세트 30명-->
        </div>
        <div class="btn_home">
          <a href="http://www.babience.com/m/index.jsp" target="_blank"><img src="images/popup/btn_home_gift.png" /></a>
        </div>
        <div class="btn_block one">
          <a href="#" onclick="$.colorbox.close();change_tab('2');return false;" class=""><img src="images/popup/btn_apply_go.png" /></a>
        </div>
        <div class="block_sns">
          <a href="#" class="kt"><img src="images/popup/btn_share_kt.png" /></a>
          <a href="#" class="ks"><img src="images/popup/btn_share_ks.png" /></a>
          <a href="#" class="fb"><img src="images/popup/btn_share_fb.png" /></a>
          <a href="#" class="tw"><img src="images/popup/btn_share_tw.png" /></a>
          <div class="bg"><img src="images/popup/bg_sns.png" /></div>
        </div>
      </div><!--inner-->
    </div>
  </div>
</div>
<!----------------- 투표 완료 팝업 ----------------->

<!----------------- 후보자 검색 팝업 ----------------->
<div id="nominee_search_popup" class="popup_wrap">
  <div class="p_mid p_position aleardy">
    <div class="block_close clearfix">
      <a href="#" onclick="$.colorbox.close();return false;" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="inner">
        <div class="title title_input"><img src="images/popup/title_sear.png" /></div>   
        <div class="sear_block">
          <div class="inner_sear_block clearfix">
            <div class="label"><img src="images/popup/label_name_sear.png" /></div>
            <div class="input"><input type="text" id="search_baby_name"></div>
          </div>
        </div>
        <div class=" block_btn">
          <a href="#" onclick="pop_search_nominee();return false;" class="sear"><img src="images/popup/btn_sear.png" /></a>
        </div>    
      </div><!--inner-->
    </div>
  </div>
</div>
<!----------------- 후보자 검색 팝업 ----------------->


<!----------------- 약관 팝업 ----------------->
<div id="agree_popup" class="popup_wrap">
  <div class="p_mid agree p_position">
    <div class="block_close clearfix">
      <a href="#" onclick="back_input();return false;" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content">
      <div class="agree_inner">
        <span class="bold">[개인정보 수집 · 이용에 대한 동의]</span> <br><br>
        (주)LG생활건강(이하 "LG생활건강")는 이벤트 진행을 위한 개인정보 
        수집 이용을 위하여 다음과 같이 귀하의 동의를 받고자 합니다.
        LG생활건강은 보다 원활한 서비스 제공을 위하여 고객의 정보를 
        수집하고 있습니다. 고객의 정보는 이벤트 서비스에 참여하기 
        위한 필수정보로서 제공을 원하지 않을 경우 수집하지 않으며, 
        동의 거부 시 이벤트 참여에 제한을 받을 수 있습니다.
        (주)LG생활건강은 본 이벤트를 위하여 다음과 같이 고객님의 
        개인정보를 수집 및 이용합니다.<br><br>
        이벤트 참여를 위해 업로드 하신 사진이나 영상은 마케팅 용도로 소비자 동의없이 사용할 수 있습니다.

        > 수집 · 이용 목적: 이벤트 혜택을 제공하기 위한 정보 전달
        : 이벤트 혜택 이용에 따른 본인확인, 고지사항 전달: 접속 빈도 
        파악 또는 회원의 서비스 이용에 대한 통계 <br><br>
        > 수집 필수 항목 : 
        이름, 연락처> 보유/이용기간 : 이벤트 종료 후 3개월까지
        (단, 관계 법령에 따라 필요한 경우 해당 법률에서 정한 기간까지)
      </div><!--inner-->

      <div class="agree_inner">
        <span class="bold">[개인정보의 취급 위탁 동의]</span><br><br>
        (주)LG생활건강은 서비스 향상과 원활한 진행을 위하여 개인정보
        처리 업무를 외부 전문 업체에 위탁하여 처리하고 있습니다.
        고객은 아래와 같은 개인정보 취급 위탁에 동의하지 않을 권리가 
        있으며 동의 거부시 이벤트 참여에 제한을 받을 수 있습니다.<br><br>
        > 취급위탁업체 위탁업무 및 이용목적 : 
        미니버타이징 (주) / 이벤트 대행 및 운영> 
        보유 및 이용기간 : 이벤트 종료 후 3개월까지<br>
        (단, 관계 법령에 따라 필요한 경우 해당 법률에서 정한 기간까지)
      </div><!--inner-->

      <div class="agree_inner">
        <span class="bold">[광고성 정보 전송 동의]</span><br><br>   
        - (주)엘지생활건강은 수집된 개인정보를 이용하여 각종 서비스•상품 및 타사 서비스와 결합된 상품에 대하여 홍보, 가입권유, 프로모션, 이벤트 목적으로 본인에게 정보/광고를 전화, SMS, MMS, 이메일, 우편등을 통해 전달합니다.<br><br>
        - (주)엘지생활건강이 마케팅 / 홍보를 위하여 고객의 개인정보를 이용에 동의를 구하며, 동의 거부시에도 이벤트 참여는 가능하나 할인 및 이벤트 정보 안내 등 서비스는 제한될 수 있습니다.
      </div><!--inner-->
    </div>
  </div>
</div>
<!----------------- 약관 팝업 ----------------->

</div>