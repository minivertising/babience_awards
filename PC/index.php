<?
	include_once   "./header.php";
?>
<body class="main">
  <div class="sec_right_navi">
    <div>
      <a href="#"><img src="images/btn_sns_fb.png" alt=""/></a>
    </div>
    <div>
      <a href="#"><img src="images/btn_sns_ks.png" alt=""/></a>
    </div>
    <div>
      <a href="#"><img src="images/btn_sns_tw.png" alt=""/></a>
    </div>
    <div>
      <a href="#"><img src="images/btn_top.png" alt=""/></a>
    </div>
  </div>

  <div class="wrap_sec_top">
    <div class="logo"><a href="index.php"><img src="images/logo.png" alt=""/></a></div>
    <div class="bt clearfix">
      <a href="#" onclick="change_tab('2');return false;">후보등록하기</a>
      <a href="#" onclick="change_tab('3');return false;">심사하기</a>
    </div>
    <div class="cu cu_top"></div>
    <div class="cu cu_left"><img src="images/cu_left.png" alt=""/></div>
    <div class="cu cu_right"><img src="images/cu_right.png" alt=""/></div>
  </div>  
  
  <div class="wrap_sec_tab">
    <div class="bg_navi">
      <div class="sec_tab_navi">
        <div class="tab_navi clearfix">
          <a href="#" onclick="change_tab('1');return false;"><img src="images/tab_01_on.png" alt="" id="tab_image1"/></a>
          <a href="#" onclick="change_tab('2');return false;"><img src="images/tab_02_off.png" alt="" id="tab_image2"/></a>
          <a href="#" onclick="change_tab('3');return false;"><img src="images/tab_03_off.png" alt="" id="tab_image3"/></a>
          <a href="#" onclick="change_tab('4');return false;"><img src="images/tab_04_off.png" alt="" id="tab_image4"/></a>
        </div>        
      </div>
    </div>
    <!-- 혜택안내 탭 -->
    <div class="sec_tab change_tab" id="benefit_contents">
      <div class="tab_01">
        <img src="images/main_gift.jpg" alt=""/>
      </div>
    </div>

    <!-- 후보지원 탭 -->
    <div class="wrap_sec_contest change_tab" id="nominee_contents" style="display:none">
      <div class="bg_top">
        <div class="sec_category">
          <div class="block_btn clearfix">
            <a href="#" onclick="reg_nominee('1');return false;" class="cate_1">항목1</a>
            <a href="#" onclick="reg_nominee('2');return false;" class="cate_2">항목2</a>
            <a href="#" onclick="reg_nominee('3');return false;" class="cate_3">항목3</a>
            <a href="#" onclick="reg_nominee('4');return false;" class="cate_4">항목4</a>
            <a href="#" onclick="reg_nominee('5');return false;" class="cate_5">항목5</a>
          </div>
        </div>
      </div>
    </div>

    <!-- 투표 탭 -->
    <div class="wrap_sec_vote change_tab"  id="vote_contents" style="display:none">
      <div class="bg_top">
        <div class="sec_title">
          <img src="images/sub_title_vote.png" alt=""/>
        </div>
        <div class="sear_baby">
          <a href="#" onclick="nominee_search();return false;"><img src="images/btn_sear_baby_off.png" alt=""/></a>
        </div>
        <div class="sec_sorting">
          <div class="inner_sorting clearfix">
            <a href="#" class="cate_all" onclick="sort_list('all');return false;"><img src="images/btn_vote_cate_all_on.png" alt="" id="sort_image0"/></a>
            <a href="#" class="cate_1" onclick="sort_list('1');return false;"><img src="images/btn_vote_cate_1_off.png" alt="" id="sort_image1"/></a>
            <a href="#" class="cate_2" onclick="sort_list('2');return false;"><img src="images/btn_vote_cate_2_off.png" alt="" id="sort_image2"/></a>
            <a href="#" class="cate_3" onclick="sort_list('3');return false;"><img src="images/btn_vote_cate_3_off.png" alt="" id="sort_image3"/></a>
            <a href="#" class="cate_4" onclick="sort_list('4');return false;"><img src="images/btn_vote_cate_4_off.png" alt="" id="sort_image4"/></a>
            <a href="#" class="cate_5" onclick="sort_list('5');return false;"><img src="images/btn_vote_cate_5_off.png" alt="" id="sort_image5"/></a>
          </div>
        </div>
        <div class="sec_list"> <!-- ajax 로 변경할 부분 sec_list-->
          <div class="inner_list clearfix">
<?
	if(isset($pg) == false) $pg = 1;	// $pg가 없으면 1로 생성
	$page_size = 10;	// 한 페이지에 나타날 개수
	$block_size = 10;	// 한 화면에 나타낼 페이지 번호 개수

	$nominees_count_query = "SELECT count(*) FROM ".$_gl['member_info_table']." WHERE mb_upload_url is not null";

	list($nominees_count) = @mysqli_fetch_array(mysqli_query($my_db, $nominees_count_query));
	$PAGE_CLASS = new Page($pg,$nominees_count,$page_size,$block_size);

	$BLOCK_LIST = $PAGE_CLASS->blockList5();
	$PAGE_UNCOUNT = $PAGE_CLASS->page_uncount;

	$nominees_query		= "SELECT * FROM ".$_gl['member_info_table']." WHERE mb_upload_url is not null LIMIT $PAGE_CLASS->page_start, $page_size";
	$nominees_result		= mysqli_query($my_db, $nominees_query);
	
	while ($nominees_data = mysqli_fetch_array($nominees_result))
	{
?>
            <div class="block_one">
              <div class="img_thumb">
                <a href="#" onclick="open_pop('detail_pic_popup<?=$nominees_data['idx']?>');return false;"><img src="<?=$nominees_data['mb_thumb_url']?>" alt="" style="width:180px;height:120px"/></a>
              </div>
              <div class="txt_ct">
                <div class="inner_txt clearfix">
                  <div class="num">
                    <div class="inner_num clearfix">
                      <div class="icon"><img src="images/icon_heart.png" alt=""/></div>
                      <div class="nbs"><?=number_format($nominees_data['mb_vote'])?></div>
                    </div>
                  </div> 
                  <div class="btn_vote"><a href="#" onclick="go_vote('<?=$nominees_data['idx']?>');return false;"><img src="images/btn_vote_off.png" alt=""/></a></div>
                </div>
              </div>
            </div>

            <div style="display:none;">
            <!----------------- 후보 등록 사진 or 유튜브영상 자세히보기 팝업 ----------------->
              <div id="detail_pic_popup<?=$nominees_data['idx']?>" class="popup_wrap">
                <div class="p_mid_view p_position">
                  <div class="block_close clearfix">
                    <a href="#" onclick="$.colorbox.close();return false;" class="btn_close"><img src="images/popup/btn_close.png" /></a>
                  </div>
                  <div class="block_content">
                    <div class="inner">
                      <div class="title">
                        <img src="images/popup/title_contest_cate_<?=$nominees_data['mb_sel_nominees']?>.png" />
                      </div>
                      <div class="pic">
<?
	if ($nominees_data['mb_upload_flag'] == "P")
	{
?>
                        <img src="<?=$nominees_data['mb_upload_url']?>" style="width:530px;height:300px">
<?
	}else{
?>
                        <iframe allowfullscreen src="<?=$nominees_data['mb_upload_url']?>" frameborder="0" width="530" height="300"></iframe>
<?
	}
?>
                      </div>
                      <div class="pic_info">
                        <div class="inner clearfix">
                          <div class="name"><?=$nominees_data['mb_baby_name']?> 후보</div>
                          <div class="num">
                            <div class="inner_num clearfix">
                              <div class="n">
                              <?=$nominees_data['mb_vote']?>
                              </div>
                              <div class="icon">
                                <img src="images/popup/icon_h.png" />
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="btn_vote">
                        <a href="#" onclick="go_vote('<?=$nominees_data['idx']?>');return false;"><img src="images/popup/btn_vote_big.png" /></a>
                      </div>
                    </div><!--inner-->
                  </div>
                </div>
              </div>
            <!----------------- 후보 등록 사진 or 유튜브영상 자세히보기 팝업 ----------------->
            </div>
<?
	}
?>
          </div><!--end:inner_list-->
          <div class="block_pagination">
            <div class="inner_pagination clearfix">
              <div class="pageing"><?php echo $BLOCK_LIST?></div>
              <!-- <a href="#" class="arrow"><img src="images/arrow_left.png" alt=""/></a>
              <a href="#">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#" class="arrow"><img src="images/arrow_right.png" alt=""/></a> -->
            </div>
          </div>
          <div class="sec_btn_block">
            <a href="#" onclick="change_tab('2');">우리 아기도 후보 지원하기</a>
          </div>
        </div>
      </div>
    </div>

    <!-- 나의 선물 확인 탭 -->
    <div id="mygift_contents" class="wrap_sec_gift_num change_tab" style="display:none">
      <div class="sec_gift_num">
        <div class="title">
          <img src="images/title_gift_num.jpg" alt=""/>
        </div>
        <div class="gift_check">
          <div class="inner_gift_check clearfix">
            <div class="input_block">
              <div class="in_name">
                <input type="text" id="search_name">
              </div>
              <div class="input_phone">
                <div class="inner_phone clearfix">
                  <div class="phone_ip">
                    <select id="search_phone1">
                      <option value="010">010</option>
                      <option value="011">011</option>
                      <option value="016">016</option>
                      <option value="017">017</option>
                      <option value="018">018</option>
                      <option value="019">019</option>
                    </select>
                  </div>
                  <div class="phone_ip"><input type="tel" id="search_phone2"></div>
                  <div class="phone_ip"><input type="tel" id="search_phone4"></div>
                </div>
              </div>
            </div>
            <div class="btn">
              <a href="#" onclick="search_gift();return false;">찾기</a>
            </div>
          </div>
        </div>
        <div class="gift">
          <div class="inner_gift">
            <img src="images/gift_coupon.jpg" alt=""/>
          </div>
        </div>
        <div class="btn_go_home">
          <a href="http://www.babience.com/index.jsp" target="_blank"><img src="images/btn_go_home.jpg" alt=""/></a>
        </div>
        <div class="notice_gift_num">
          <img src="images/txt_notice_gift_num.jpg" alt=""/>
        </div>
      </div>
    </div>

    <div class="wrap_sec_contest_gift">              
      <div class="sec_contest_gift">
      선물이미지(메인이미지와 동일)
      </div>
    </div>

  <div class="wrap_sec_sns">
    <div class="sec_sns">
      <a href="#"><img src="images/btn_sns_ks.png" alt=""/></a>
      <a href="#"><img src="images/btn_sns_fb.png" alt=""/></a>
      <a href="#"><img src="images/btn_sns_tw.png" alt=""/></a>
      <span><img src="images/txt_sns.png" alt=""/></span>
    </div>
  </div>
    
  <div class="wrap_sec_footer">
    <div class="sec_footer">
      <img src="images/footer.png" alt=""/>
    </div>
  </div>
<?
	include_once   "./popup_div.php";
?>
</body>
</html>
<script type="text/javascript">
var sel_nominee	= null;
var img_name		= null;
var vote_idx			= null;
var vote_sort		= "all";
var chk_mb_flag	= 0;
var chk_vote_flag	= 0;
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

var quickTop;
$(window).scroll(function() {
	quickTop = ($(window).height()-$('.sec_right_navi').height()) /2;
	$('.sec_right_navi').stop().animate({top:$(window).scrollTop()+quickTop},400,'easeOutExpo');
});

function pageRun(num)
{
	$.ajax({
		type:"POST",
		data:{
			"pg"		: num,
			"vote_param": vote_sort
		},
		url: "./ajax_list.php",
		success: function(response){
			$(".sec_list").html(response);
		}
	});
}

</script>