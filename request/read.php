<?php
	require_once('../db/db.php');
	$idx = $_GET['idx']; /* 주소창의 글 번호 가져오기 */
	
	$hit = "UPDATE request SET hits=hits+1 WHERE idx=$idx";
    $db->query($hit);

	$sql = $db -> prepare("SELECT * FROM request WHERE idx=:idx");
    $sql -> bindParam("idx",$idx);
    $sql -> execute();
    $request = $sql -> fetch();

    $sql3 = $db->prepare("SELECT * FROM request_reply WHERE req_num=:req_num");
    $sql3 -> bindParam("req_num",$idx);
    $sql3 -> execute();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/read.css">
	<title>Request Board</title>
</head>
<body>
	<header>
        <div class="inner">
            <h1><a href="../main.php">Be Native</a></h1>

            <ul id="gnb">
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="board.php">Request</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
            </ul>
            <ul class="util">
                <?php if (!isset($_SESSION['id'])) {
                    echo '<li><a href="../member/login.php">Login</a></li>';
                    echo '<li><a href="../member/register.php">Join</a></li>';
                } else {
                    echo '<div class="helloUser">Welcome ' . $_SESSION['name'] . '!</li>';
                    echo '<li><a href="../member/member_process.php?mode=logout">Log out</a></li>';
                    echo '<li><a href="../member/update.php">Info</a></li>';
                }
                ?>
            </ul>
        </div>
    </header>
	<div id="board_read">
		<h2><?php echo $request['title']; ?></h2>
			<div id="user_info">
				<?php echo $request['name']; ?> <?php echo $request['date']; ?> 조회:<?php echo $request['hits']; ?>
					<div id="bo_line"></div>
				</div>
				<div id="bo_content">
					<?php echo nl2br("$request[content]"); ?>
				</div>
		<!-- 목록, 수정, 삭제 -->
		<div id="bo_ser">
			<ul>
				<li><a href="board.php">[목록으로]</a></li>
				<li><a href="modify.php?idx=<?php echo $request['idx']; ?>">[수정]</a></li>
				<li><a href="delete.php?idx=<?php echo $request['idx']; ?>">[삭제]</a></li>
			</ul>
		</div>
	</div>
    <div class="reply_view">
	<h3>댓글목록</h3>
		<?php
			while($reply = $sql3 -> fetch()) {
		?>
		<div class="dap_lo">
			<div><b><?= $reply['name'] ?></b></div>
			<div class="dap_to comt_edit"><?php echo nl2br("$reply[content]"); ?></div>
			<div class="rep_me dap_to"><?php echo $reply['date']; ?></div>
			<div class="rep_me rep_menu">
				<a class="dat_edit_bt" href="#">수정</a>
				<a class="dat_delete_bt" href="#">삭제</a>
			</div>
			<!-- 댓글 수정 폼 dialog -->
			<!-- 댓글 삭제 비밀번호 확인 -->
		</div>
	<?php } ?>
        <!--- 댓글 입력 폼 -->
        <div class="dap_ins">
            <form action="reply_ok.php?idx=<?php echo $idx; ?>" method="post">
                <div style="margin-top:10px; ">
                    <textarea name="reply_content" class="reply_content" id="re_content" ></textarea>
                    <button id="rep_bt" class="re_bt">댓글</button>
                </div>
            </form>
        </div>
    </div><!--- 댓글 불러오기 끝 -->
	<footer>
        <div class="inner">
            <div class="upper">
                <h1>NAME</h1>

            </div>

            <div class="lower">
                <address>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, sunt?<br>
                    TEL : XXX-XXX-XXXX C.P : 010-5193-6603
                </address>
                <p>2021 Database System TEAM '도원결의' &copy; copyright all right reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>