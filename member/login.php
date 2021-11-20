<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>let's go</title>
    <script src="https://kit.fontawesome.com/c47106c6a7.js" crossorigin="anoymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <script defer src="js/ie.js"></script>
</head>
<body>
    <header>
        <div class="inner">
            <h1><a href="#">제목</a></h1>

            <ul id="gnb">
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
            </ul>

            <ul class="util">
                <li><a href="#">Login</a></li>
                <li><a href="member/register.php">Join</a></li>
            </ul>
        </div>
    </header>
    <section>
       <div class="mainCon">
           <div class="loginTitle">로그인</div>
           <form action="member_process.php?mode=login" method="post" class="loginForm">
               <p class="loginId">아이디 : <input type="text" name="userid"></p>
               <p class="loginPw">비밀번호 : <input type="password" name="pw"></p>
               <div class="loginButton">
               <input type="submit" value="로그인">
               <input type="button" value="취소" onclick="location.href='../main.php'">
               </div>
           </form>
           <div class="registerAndFind">
           <a href="register.php">회원가입</a>&nbsp;|
           <a href="">아이디/비밀번호 찾기</a>
           </div>
       </div>
   </section>
   <footer></footer>
</body>
</html>
