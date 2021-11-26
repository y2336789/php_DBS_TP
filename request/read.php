<?php
	require_once('../db/db.php');
	$idx = $_GET['idx']; /* 주소창의 글 번호 가져오기 */
	$query = "SELECT * FROM request WHERE idx=$idx";
    $result = $db->query($query);
	
	$hit = "UPDATE request SET hits=hits+1 WHERE idx=$idx";
    $db->query($hit);

	$sql = $db -> prepare("SELECT * FROM request WHERE idx=:idx");
    $sql -> bindParam("idx",$idx);
    $sql -> execute();
    $request = $sql -> fetch();

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