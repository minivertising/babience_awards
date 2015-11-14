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
          <div class="inner_list clearfix">
<?
	if(isset($pg) == false) $pg = 1;	// $pg가 없으면 1로 생성
	$page_size = 10;	// 한 페이지에 나타날 개수
	$block_size = 10;	// 한 화면에 나타낼 페이지 번호 개수

	$nominees_count_query = "SELECT count(*) FROM ".$_gl['member_info_table']." WHERE mb_upload_url is not null ".$query_txt."";

	list($nominees_count) = @mysqli_fetch_array(mysqli_query($my_db, $nominees_count_query));
	$PAGE_CLASS = new Page($pg,$nominees_count,$page_size,$block_size);

	$BLOCK_LIST = $PAGE_CLASS->blockList5();
	$PAGE_UNCOUNT = $PAGE_CLASS->page_uncount;

	$nominees_query		= "SELECT * FROM ".$_gl['member_info_table']." WHERE mb_upload_url is not null ".$query_txt." LIMIT $PAGE_CLASS->page_start, $page_size";
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
            </div>
          </div>
          <div class="sec_btn_block">
            <a href="#" onclick="change_tab('2');return false;">우리 아기도 후보 지원하기</a>
          </div>