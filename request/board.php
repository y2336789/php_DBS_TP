<?php
require_once("../db/db.php");
session_start();

$sql = $db->prepare("SELECT * FROM request order by idx DESC");
$sql->execute();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/board.css">
    <title>Request</title>
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
    <div id="board_area">
        <h1>요청게시판</h1>
        <h4>새롭게 등재했으면 좋겠다 싶은 단어를 적어주세요!</h4>
        <table class="list-table">
            <thead>
                <tr>
                    <th width="70">번호</th>
                    <th width="500">제목</th>
                    <th width="120">글쓴이</th>
                    <th width="100">작성일</th>
                    <th width="100">조회수</th>
                </tr>
            </thead>
            <?php
            while ($request = $sql->fetch()) {
            ?>
                <tbody>
                    <tr>
                        <td width="70"><?= $request['idx'] ?></td>
                        <td width="500">
                            <!-- 기존에 read.php에서 ck_read로 바꿈 -->
                        <a href="ck_read.php?idx=<?= $request['idx'] ?>"><?= $request['title'] ?></a></td>
                        <td width="120"><?= $request['name'] ?></td>
                        <td width="100"><?= $request['date'] ?></td>
                        <td width="100"><?= $request['hits'] ?></td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
        <div id="write_btn">
            <?php 
                if (!isset($_SESSION['id'])) {
                    echo '<a href="../member/login.php"><button>글쓰기</button></a>';
                } else {
                    echo '<a href="write.php"><button>글쓰기</button></a>';
                }
            ?>
           
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