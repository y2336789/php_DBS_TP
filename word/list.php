<?php
require_once("../db/db.php");
session_start();

$sql = $db->prepare("SELECT * FROM word");
$sql->execute();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/c47106c6a7.js" crossorigin="anoymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/list.css">
    <script defer src="../js/main.js?ver=1"></script>
    <title>Word list</title>
</head>

<body>
    <header>
        <div class="inner">
            <h1><a href="../main.php">Be Native</a></h1>

            <ul id="gnb">
                <li><a href="#">1</a></li>
                <li><a href="list.php">Word list</a></li>
                <li><a href="../request/board.php">Request</a></li>
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
    <figure>
        <h1>
            <strong>dfsf</strong><br>
            <span>fsdafdfa</span>
        </h1>
        <!-- <a href="#" class="menu"><i class="fas fa-bars"></i></a> -->
        <p>test</p>
        <section>
            <article class="on">
                <div class="inner">
                    <div class="title">
                        <h1>
                            단어1
                        </h1>
                        <div class="txt">
                            <h2>단어 뜻</h2>
                        </div>
                    </div>
                </div>
            </article>
            <article>
                <div class="inner">
                    <div class="title">
                        <h1>
                            단어1
                        </h1>
                        <div class="txt">
                            <h2>단어 뜻</h2>
                        </div>
                    </div>
                </div>
            </article>
            <article>
                <div class="inner">
                    <div class="title">
                        <h1>
                            단어1
                        </h1>
                        <div class="txt">
                            <h2>단어 뜻</h2>
                        </div>
                    </div>
                </div>
            </article>
            <article>
                <div class="inner"></div>
            </article>
            <article>
                <div class="inner"></div>
            </article>
            <article>
                <div class="inner"></div>
            </article>
            <article>
                <div class="inner"></div>
            </article>
            <article>
                <div class="inner">
                    <div class="title">
                        <h1>
                            단어1
                        </h1>
                        <div class="txt">
                            <h2>단어 뜻</h2>
                        </div>
                    </div>
                </div>
            </article>
        </section>
        <div class="btnPrev">
            <span>PREV WORD</span>
        </div>
        <div class="btnNext">
            <span>Next WORD</span>
        </div>
    </figure>
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