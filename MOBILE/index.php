<?
	include_once   "./header.php";
?>
<body>
<div class="sec_top">
  <div class="logo"><a href="#"><img src="images/logo.png" width="95" alt=""/></a></div>
  <div class="btn_block">
    <a href="#" onclick="change_tab('2');return false;"><img src="images/btn_apply_main.png" alt=""/></a>
    <a href="#" onclick="change_tab('3');return false;"><img src="images/btn_vote_main.png" alt=""/></a>
  </div>
  <div class="bg"><img src="images/bg_top.jpg" alt=""/></div>
</div>

<div class="navi clearfix">
  <a href="#" onclick="change_tab('1');return false;"><img src="images/gnb_navi_1_on.png" alt="" id="tab_image1"/></a>
  <a href="#" onclick="change_tab('2');return false;"><img src="images/gnb_navi_2_off.png" alt="" id="tab_image2"/></a>
  <a href="#" onclick="change_tab('3');return false;"><img src="images/gnb_navi_3_off.png" alt="" id="tab_image3"/></a>
  <a href="#" onclick="change_tab('4');return false;"><img src="images/gnb_navi_4_off.png" alt="" id="tab_image4"/></a>
</div>

    <!------------------ 혜택안내 탭 ------------------>
<div class="sec_main_img change_tab" id="benefit_contents">
  <a href="popup_off.php" class="btn_off">시상식보기</a>
  <div class="bg"><img src="images/bg_main_img.jpg" alt=""/></div>
</div>

    <!------------------ 후보지원 탭 ------------------>
<div class="sec_contest_title change_tab" id="nominee_contents" style="display:none;">
  <div class="bg"><img src="images/title_contest.jpg" alt=""/></div>
</div>
<div class="sec_contest change_tab" id="nominee_contents2" style="display:none;">
  <div class="inner clearfix">
    <a href="#" onclick="reg_nominee('1');return false;" class="cate_1"><img src="images/img_contest_cate_1.jpg" alt=""/></a>
    <a href="#" onclick="reg_nominee('2');return false;" class="cate_2"><img src="images/img_contest_cate_2.jpg" alt=""/></a>
    <a href="#" onclick="reg_nominee('3');return false;" class="cate_3"><img src="images/img_contest_cate_3.jpg" alt=""/></a>
    <a href="#" onclick="reg_nominee('4');return false;" class="cate_4"><img src="images/img_contest_cate_4.jpg" alt=""/></a>
    <a href="#" onclick="reg_nominee('5');return false;" class="cate_5"><img src="images/img_contest_cate_5.jpg" alt=""/></a>
  </div>
</div>
<div class="sec_howto change_tab" id="nominee_contents3" style="display:none;">
  <div class="bg"><img src="images/howto.jpg" alt=""/></div>
</div>
<div class="sec_contest_gift change_tab" id="nominee_contents4" style="display:none;">
  <a href="popup_off.php" class="btn_off">시상식보기</a>
  <div class="bg"><img src="images/img_contest.jpg" alt=""/></div>
</div>

    <!------------------ 심사하기 탭 ------------------>
<div class="sec_vote_title change_tab"  id="vote_contents" style="display:none">
  <div class="bg"><img src="images/title_vote.jpg" alt=""/></div>
  <div class="btn_block">
    <a href="#" onclick="nominee_search();return false;"><img src="images/btn_sear.png" alt=""/></a>
  </div>
</div>
<div class="sec_sorting change_tab"  id="vote_contents2" style="display:none">
  <div class="inner_sort clearfix">
    <a href="#" class="sort_1" onclick="sort_list('all');return false;"><img src="images/btn_sort_1_on.jpg" alt="" id="sort_image0"/></a>
    <a href="#" class="sort_2" onclick="sort_list('1');return false;"><img src="images/btn_sort_2_off.jpg" alt="" id="sort_image1"/></a>
    <a href="#" class="sort_3" onclick="sort_list('2');return false;"><img src="images/btn_sort_3_off.jpg" alt="" id="sort_image2"/></a>
  </div>
  <div class="inner_sort clearfix second">
    <a href="#" class="sort_1" onclick="sort_list('3');return false;"><img src="images/btn_sort_4_off.jpg" alt="" id="sort_image3"/></a>
    <a href="#" class="sort_2" onclick="sort_list('4');return false;"><img src="images/btn_sort_5_off.jpg" alt="" id="sort_image4"/></a>
    <a href="#" class="sort_3" onclick="sort_list('5');return false;"><img src="images/btn_sort_6_off.jpg" alt="" id="sort_image5"/></a>
  </div>
</div>
<div id="ajax_change">
<div class="sec_vote_list change_tab"  id="vote_contents3" style="display:none">
  <div class="inner clearfix">
<?
	if(isset($pg) == false) $pg = 1;	// $pg가 없으면 1로 생성
	$page_size = 4;	// 한 페이지에 나타날 개수
	$block_size = 5;	// 한 화면에 나타낼 페이지 번호 개수

	$nominees_count_query = "SELECT count(*) FROM ".$_gl['member_info_table']." WHERE mb_upload_url is not null";

	list($nominees_count) = @mysqli_fetch_array(mysqli_query($my_db, $nominees_count_query));
	$PAGE_CLASS = new Page($pg,$nominees_count,$page_size,$block_size);

	$BLOCK_LIST = $PAGE_CLASS->blockList6();
	$PAGE_UNCOUNT = $PAGE_CLASS->page_uncount;

	$nominees_query		= "SELECT * FROM ".$_gl['member_info_table']." WHERE mb_upload_url is not null LIMIT $PAGE_CLASS->page_start, $page_size";
	$nominees_result		= mysqli_query($my_db, $nominees_query);
	
	while ($nominees_data = mysqli_fetch_array($nominees_result))
	{
?>
    <div class="one">
      <div class="thumb">
        <a href="#" onclick="open_pop('detail_pic_popup<?=$nominees_data['idx']?>');return false;"><img src="<?=$nominees_data['mb_thumb_url']?>"></a>
      </div>
      <div class="info_txt">
        <div class="inner_info_txt clearfix">
          <div class="num">
            <div class="inner_num">
              <div class="icon"><img src="images/icon_h.png" alt=""/></div>
              <div class="n"><?=number_format($nominees_data['mb_vote'])?></div>
            </div>
          </div>
          <div class="btn"><a href="#" onclick="go_vote('<?=$nominees_data['idx']?>');return false;"><img src="images/btn_vote_sub.jpg" alt=""/></a></div>
        </div>
      </div>
    </div>

<div style="display:none;">
<!----------------- 후보 등록 사진 or 유튜브영상 자세히보기 팝업 ----------------->
<div id="detail_pic_popup<?=$nominees_data['idx']?>" class="popup_wrap">
  <div class="p_mid p_position pic">
    <div class="block_close clearfix">
      <a href="#" onclick="$.colorbox.close();return false;" class="btn_close"><img src="images/popup/btn_close.png" /></a>
    </div>
    <div class="block_content view_pic">
      <div class="inner">
        <div class="title"><img src="images/popup/title_cate_<?=$nominees_data['mb_sel_nominees']?>.png" /></div>
        <div class="img_pic">
<?
	if ($nominees_data['mb_upload_flag'] == "P")
	{
?>
                        <div class="pic"><img src="<?=$nominees_data['mb_upload_url']?>"></div>
<?
	}else{
?>
                        <div class="pic"><iframe allowfullscreen src="<?=$nominees_data['mb_upload_url']?>" frameborder="0"></iframe></div>
<?
	}
?>

          <!-- <div class="pic">사진 or 영상영역</div> -->
          <div class="info">
            <div class="inner_info clearfix">
              <div class="name"><?=$nominees_data['mb_baby_name']?> 후보</div>
              <div class="num"><?=$nominees_data['mb_vote']?></div>
            </div>
          </div>
        </div>
        <div class="btn_block">
          <a href="#" onclick="go_vote('<?=$nominees_data['idx']?>');return false;" class="common_45"><img src="images/popup/btn_vote_this.png" /></a>
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

  </div>
</div>
<!--5페이지씩 페이지네이션 노출--->
<div class="sec_pagination change_tab"  id="vote_contents4" style="display:none">
  <div class="inner clearfix">
    <div class="pageing"><?php echo $BLOCK_LIST?></div>
    <!-- <a href="#" class="arrow"><img src="images/arrow_left.png" width="24" alt=""/></a>
    <a href="#" class="cnt selected"> 1 </a>
    <a href="#" class="cnt"> 2 </a>
    <a href="#" class="cnt"> 3 </a>
    <a href="#" class="cnt"> 4 </a>
    <a href="#" class="cnt"> 5 </a>
    <a href="#" class="arrow"><img src="images/arrow_right.png" width="24" alt=""/></a> -->
  </div>
</div>
<div class="btn_also_apply change_tab"  id="vote_contents5" style="display:none">
  <a href="#" onclick="change_tab('2');"><img src="images/btn_also_apply.png" alt=""/></a>
</div>
<div class="sec_vote_gift change_tab"  id="vote_contents6" style="display:none">
  <div class="bg"><img src="images/bg_vote_gift.jpg" alt=""/></div>
</div>
</div>
    <!------------------ 나의선물확인 탭 ------------------>
<div class="sec_gift_title change_tab" id="mygift_contents" style="display:none;">
  <div class="bg"><img src="images/title_gift.jpg" alt=""/></div>
</div>
<div class="sec_gift_check change_tab" id="mygift_contents2" style="display:none;">
  <div class="inner_gift_check clearfix">
    <div class="block_input">
      <div class="inner_input clearfix">
        <div class="label">엄마(아빠)이름</div>
        <div class="input"><input type="text"></div>
      </div>
      <div class="inner_input clearfix">
        <div class="label">휴대폰 번호</div>
        <div class="input phone">
          <select></select>
          <input type="tel">
          <input type="tel">
        </div>
      </div>
    </div>
    <div class="btn_block">
      <a href="#">
        <img src="images/btn_num_sear.png" alt=""/>
      </a>
    </div>
  </div>
</div>
<div class="sec_gift_img change_tab" id="mygift_contents3" style="display:none;">
  <div class="bg"><img src="images/gift_skincare.jpg" alt=""/></div>
</div>
<div class="sec_go_home change_tab" id="mygift_contents4" style="display:none;">
  <div class="bg"><a href="#"><img src="images/btn_go_home.jpg" alt=""/></a></div>
</div>
<div class="sec_gift_notice mrg-2 change_tab" id="mygift_contents5" style="display:none;">
  <div class="bg"><img src="images/txt_gift_notice.jpg" alt=""/></div>
</div>



<div class="sec_sns">
  <div class="inner_sec_sns clearfix">
    <div class="btn_block">
      <div class="inner clearfix">
        <a href="#"><img src="images/btn_kt.jpg" alt=""/></a>
        <a href="#"><img src="images/btn_ks.jpg" alt=""/></a>
        <a href="#"><img src="images/btn_fb.jpg" alt=""/></a>
        <a href="#"><img src="images/btn_tw.jpg" alt=""/></a>
      </div>
    </div>
    <div class="txt"><img src="images/txt_sns.png" alt=""/></div>
  </div>
</div>

<div class="sec_footer">
  <img src="images/img_footer.jpg" alt=""/>
</div>
<div class="mask"></div>
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
			$("#ajax_change").html(response);
		}
	});
}

</script>