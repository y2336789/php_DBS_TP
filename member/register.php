<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
    <header>
        <div class="inner">
            <h1><a href="../main.php">제목</a></h1>

            <ul id="gnb">
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
            </ul>

            <ul class="util">
              <?php if(!isset($_SESSION['userid'])){
                echo '<li><a href="../member/login.php">Login</a></li>';
                echo '<li><a href="../member/register.php">Join</a></li>';
              } else {
                echo '<div class="helloUser">Welcome '.$_SESSION['name'].'!</li>';
                echo '<li><a href="member/member_process.php?mode=logout">Log out</a></li>';
                echo '<li><a href="member/update.php">Info</a></li>';
              }
              ?>
                <!-- <li><a href="#">Login</a></li>
                <li><a href="member/register.php">Join</a></li> -->
            </ul>
        </div>
    </header>
    <section>
        <div class="mainCon">
            <div class="registerTitle">회원가입</div>
            <div class="registerBox">
            <form name="register" action="member_process.php?mode=register" method="post">
                <input type="hidden" name="id" value="register">
                <table class="registerTable">
                    <tr>
                        <td>아이디 :</td>
                        <td><input type="text" name="userid" required></td>
                        <td><input type="button" value="중복확인" onclick="checkId();"></td>
                        <script>
                            function checkId() {
                                window.open("checkId.php?userid=" + document.register.userid.value,"IDcheck","left=50, top=50, width=50, height=10, scrollbars=no, resizeable=no");
                            }
                        </script>
                    </tr>
                    <tr>
                        <td>비밀번호 :</td>
                        <td><input type="password" name="pw1" required></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>비밀번호 확인 :</td>
                        <td><input type="password" name="pw2" required></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>이름 :</td>
                        <td><input type="text" name="name" required></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>전화번호 :</td>
                        <td><input type="text" name="tel" placeholder="010-1234-5678"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>이메일 :</td>
                        <td><input type="text" name="email" required></td>
                        <td></td>
                    </tr>
                </table>
                <div class="registerSubmit">
                    <input type="submit" value="가입"></input>
                    <button onClick="history.back(-1)">취소</button>
                </div>
            </form>
            </div>
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