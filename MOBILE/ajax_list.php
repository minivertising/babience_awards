<?
	include_once "../config.php";

	$vote_param			= $_REQUEST['vote_param'];
	$pg						= $_REQUEST['pg'];
	$search_baby_name	= $_REQUEST['search_baby_name'];
	if ($vote_param == "all")
		$query_txt	= "";
	else if ($vote_param == "1")
		$query_txt	= " AND mb_sel_nominees='1'";
	else if ($vote_param == "2")
		$query_txt	= " AND mb_sel_nominees='2'";
	else if ($vote_param == "3")
		$query_txt	= " AND mb_sel_nominees='3'";
	else if ($vote_param == "4")
		$query_txt	= " AND mb_sel_nominees='4'";
	else
		$query_txt	= " AND mb_sel_nominees='5'";

	if ($search_baby_name)
		$query_txt	.= " AND mb_baby_name like '%".$search_baby_name."%'";
?>
<div class="sec_vote_list change_tab"  id="vote_contents3">
  <div class="inner clearfix">
<?
	if(isset($pg) == false) $pg = 1;	// $pg가 없으면 1로 생성
	$page_size = 4;	// 한 페이지에 나타날 개수
	$block_size = 5;	// 한 화면에 나타낼 페이지 번호 개수

	$nominees_count_query = "SELECT count(*) FROM ".$_gl['member_info_table']." WHERE mb_upload_url is not null ".$query_txt."";

	list($nominees_count) = @mysqli_fetch_array(mysqli_query($my_db, $nominees_count_query));
	$PAGE_CLASS = new Page($pg,$nominees_count,$page_size,$block_size);

	$BLOCK_LIST = $PAGE_CLASS->blockList6();
	$PAGE_UNCOUNT = $PAGE_CLASS->page_uncount;

	$nominees_query		= "SELECT * FROM ".$_gl['member_info_table']." WHERE mb_upload_url is not null ".$query_txt." LIMIT $PAGE_CLASS->page_start, $page_size";
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
<div class="sec_pagination change_tab"  id="vote_contents4">
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
<div class="btn_also_apply change_tab"  id="vote_contents5">
  <a href="#"><img src="images/btn_also_apply.png" alt=""/></a>
</div>
<div class="sec_vote_gift change_tab"  id="vote_contents6">
  <div class="bg"><img src="images/bg_vote_gift.jpg" alt=""/></div>
</div>
