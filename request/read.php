<?php
	require_once('../db/db.php');
	$idx = $_GET['idx']; /* 주소창의 글 번호 가져오기 */
	

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
	<link rel="stylesheet" href="../css/footer.css">
	<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="/js/jquery-ui.js"></script>
	<script type="text/javascript" src="../js/common.js"></script>
	<title>Request Board</title>
</head>
<body>
    <?php include("../header.php");?>
	<div id="board_read">
		<h2><?php echo $request['title']; ?></h2>
			<div id="user_info">
				<?php echo $request['name']; ?> <?php echo $request['date']; ?>
					<div id="bo_line"></div>
				</div>
				<div id="bo_content">
					<?php echo nl2br("$request[content]"); ?>
				</div>
		<!-- 목록, 수정, 삭제 -->
		<div id="bo_ser">
			<ul>
				<li><a href="board.php">[목록으로]</a></li>
				<!-- <li><a href="modify.php?idx=<?php echo $request['idx']; ?>">[수정]</a></li> -->
				<li><a href="delete.php?idx=<?= $request['idx'] ?>">[삭제]</a></li>
			</ul>
		</div>
	</div>
	<!-- 댓글 불러오기 -->
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
				
				<?php
					$idx2 = $reply['idx']; /* idx 잠시 값가져오기 */

					$sql5 = $db->prepare("SELECT name FROM request_reply WHERE idx=:idx");
					$sql5->bindParam("idx", $idx2);
					$sql5->execute();
					$request3 = $sql5->fetch();
					?>
					<?php if ( $request3['name'] == $_SESSION['name'] ) {  ?>
						<a class="dat_delete_bt" href="/request/board_r_del.php?idx=<?= $reply['idx'] ?>">삭제</a>
					<?php } else { ?>
						<a class="dat_delete_bt">삭제</a>
					<?php } ?>
			</div>
			<!-- 댓글 수정 폼 dialog -->
			<div class="dat_edit">
                <form method="post" action="boardr_modify.php?idx=<?php echo $idx; ?>">
                    <input type="hidden" name="rno" value="<?= $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?= $reply['req_num']; ?>">
                    <textarea name="contents" class="dap_edit_t"><?= $reply['content']; ?></textarea>
                    <input type="submit" value="수정하기" class="re_mo_bt">
                </form>
            </div>
			<!-- 댓글 삭제 비밀번호 확인 -->
		</div>
	<?php } ?>
        <!--- 댓글 입력 폼 -->
        <div class="dap_ins">
			<?php 
				if (!isset($_SESSION['id'])) {
					echo '<a href="../member/login.php"></a>';
				}
			?>		
            <form action="reply_ok.php?idx=<?php echo $idx; ?>" method="post">
                <div style="margin-top:10px; " class="inputt">
                    <textarea name="reply_content" class="reply_content" id="re_content" ></textarea>
                    <button id="rep_bt" class="re_bt">댓글</button>
                </div>
            </form>
        </div>
    </div><!--- 댓글 불러오기 끝 -->
	<?php include("../footer.php");?>
</body>

</html>