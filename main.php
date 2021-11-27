<!DOCTYPE html>
<?php
session_start();
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome </title>
    <script src="https://kit.fontawesome.com/c47106c6a7.js" crossorigin="anoymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <script defer src="js/ie.js"></script>
</head>

<body>
    <header>
        <div class="inner">
            <h1><a href="main.php">Be Native</a></h1>

            <ul id="gnb">
                <li><a href="#">1</a></li>
                <li><a href="word/list.php">Word list</a></li>
                <li><a href="request/board.php">Request</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
            </ul>

            <ul class="util">
                <?php if (!isset($_SESSION['id'])) {
                    echo '<li><a href="member/login.php">Login</a></li>';
                    echo '<li><a href="member/register.php">Join</a></li>';
                } else {
                    echo '<div class="helloUser">Welcome ' . $_SESSION['name'] . '!</li>';
                    echo '<li><a href="member/member_process.php?mode=logout">Log out</a></li>';
                    echo '<li><a href="member/update.php">Info</a></li>';
                }
                ?>
            </ul>
        </div>
    </header>
    <figure>
        <video src="img/talking.mp4" autoplay muted loop></video>
        <div class="inner">
            <h1>Do you know Korean Slang?</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum, labore. Soluta, error! Beatae blanditiis quam ut modi nemo porro at voluptatibus iste adipisci! Provident!</p>
            <a href="member/register.php">Join us!</a>
        </div>
    </figure>
    <section class="introduce">
        <div class="inner">
            <h1>Introduction of service</h1>
            <div class="wrap">
                <ul>
                    <li>
                        <h2>1. This is a Slang dictionary.</h2>
                        <p>You can check the list of slang words and search them.</p>
                    </li>
                    <li>
                        <h2>2. The dictionary is created with the participation of users.</h2>
                        <p>Users can add and modify words themselves.</p>
                    </li>
                    <li>
                        <h2>3. You can talk like a native Korean.</h2>
                        <p>You can see the meaning, origin, and situation of the slangs used by Koreans.</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="mainCon">

        </div>
    </section>
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