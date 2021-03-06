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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/write.css">
    <script defer src="js/ie.js"></script>
</head>

<body>
    <?php include("../header.php");?>
    <div id="board_write">
        <h1><a href="/">자유게시판</a></h1>
        <h4>글을 작성하는 공간입니다.</h4>
        <div id="write_area">
            <form name="write" action="board_process.php" method="post">
                <div id="in_title">
                    <textarea class="form-control" name="title" id="utitle" rows="1" placeholder="Title" maxlength="100" required></textarea>
                </div>
                <!-- <div class="wi_line"></div>
                <div id="in_name">
                    <textarea name="name" id="uname" rows="1" cols="55" placeholder="글쓴이" maxlength="100" required></textarea>
                    // 여기 세션 아이디 값 불러오기!
                </div> -->
                <div class="wi_line"></div>
                <div id="in_content">
                    <textarea  class="form-control" rows="3" name="content" id="ucontent" placeholder="Content" required></textarea>
                </div>
                <div id="in_pw">
                    <input type="password" name="pw" id="upw" placeholder="비밀번호" required />
                </div>
                <div class="bt_se">
                    <input type="submit" value="작성"></button>
                </div>
            </form>
        </div>
    </div>
    <?php include("../footer.php");?>
</body>

</html>