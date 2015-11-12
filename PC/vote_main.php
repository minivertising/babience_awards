<?
	include_once   "./header.php";
?>
<body>
  <div>
    <a href="./nominee_main.php">후보 지원하기</a>
    <a href="./vote_main.php">투표하기</a>
  <div>
  <div>
    <a href="#" onmouseover="change_tab('1');">혜택 안내</a>
    <a href="#" onmouseover="change_tab('2');">참여 방법</a>
    <a href="#" onmouseover="change_tab('3');">오프라인 시상식</a>
    <a href="#" onmouseover="change_tab('4');">나의 선물 확인</a>
    <div id="benefit_contents" class="tab_contents" style="background:skyblue">
      후보지원혜택 내용
      Blah~Blah~Blah~Blah~Blah~
    </div>
    <div id="join_contents" class="tab_contents" style="display:none;background:gray">
      참여방법 내용
      Blah~Blah~Blah~Blah~Blah~
    </div>
    <div id="awards_contents" class="tab_contents" style="display:none;background:pink">
      오프라인 시상식 내용
      Blah~Blah~Blah~Blah~Blah~
    </div>
    <div id="mygift_contents" class="tab_contents" style="display:none;background:green">
      나의 선물확인 내용
      Blah~Blah~Blah~Blah~Blah~
    </div>
  <div>
  <div>
    <a href="#">스토리 공유</a>
    <a href="#">페이스북 공유</a>
    <a href="#">트위터 공유</a>
  </div>
</body>
</html>
<script type="text/javascript">
function change_tab(param)
{
	if (param == "1")
	{
		$(".tab_contents").hide();
		$("#benefit_contents").show();
	}else if (param == "2"){
		$(".tab_contents").hide();
		$("#join_contents").show();
	}else if (param == "3"){
		$(".tab_contents").hide();
		$("#awards_contents").show();
	}else if (param == "4"){
		$(".tab_contents").hide();
		$("#mygift_contents").show();
	}
}
</script>