<!DOCTYPE html>
<?php
    session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>let's go</title>
    <script src="https://kit.fontawesome.com/c47106c6a7.js" crossorigin="anoymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <script defer src="js/ie.js"></script>
</head>
<body>
<header>
        <div class="inner">
            <h1><a href="/main.php">Be Native</a></h1>
    
            <ul id="gnb">
                <li><a href="/wordzip/wordlist.php?page=1">Word zip</a></li>
                <li><a href="/word/list.php">Word list</a></li>
                <li><a href="/request/board.php">Request</a></li>
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
    
            <ul class="util2">
                <form action='/search/search.php' method='POST'>
                    <div class="search-box">
                        <input type="text" class="search-txt" name="name" placeholder="Type to search">
                        <a class="search-btn" href="#">
                            <i class="fas fa-search"></i>
                        </a>
                    </div>
                </form>
            </ul>
            
        </div>
    </header>
</body>
</html>