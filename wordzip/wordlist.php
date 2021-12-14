<?php
require_once("../db/db.php");
session_start();

if(isset($_GET['page'])){
    $page = $_GET['page']; //1,2,3,4,5
      }else{
        $page = 1;
      }
$sql = $db->prepare("SELECT count(*) FROM word");
$sql->execute();
$row_num = $sql->fetchColumn(); //게시판 총 레코드 수
$list = 15; //한 페이지에 보여줄 개수
$block_ct = 5; //블록당 보여줄 페이지 개수

$block_num = ceil($page/$block_ct); // 현재 페이지 블록 구하기
$block_start = (($block_num - 1) * $block_ct) + 1; // 블록의 시작번호
$block_end = $block_start + $block_ct - 1; //블록 마지막 번호

$total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
if($block_end > $total_page) {
    $block_end = $total_page; //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수
}
$total_block = ceil($total_page/$block_ct); //블럭 총 개수
$start_num = ($page-1) * $list; //시작번호 (page-1)에서 $list를 곱한다.

$sql2 = $db->prepare("SELECT * FROM word ORDER BY idx ASC LIMIT $start_num, $list"); //$start_num를 시작으로 $list의 수만큼 보여주도록 가져옴
$sql2->execute();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/wordzip.css">
    <title>word</title>
</head>

<body>
    <header>
        <div class="inner">
            <h1><a href="../main.php">Be Native</a></h1>

            <ul id="gnb">
                <li><a href="../wordzip/wordlist.php?page=1">Word zip</a></li>
                <li><a href="../word/list.php">Word list</a></li>
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
    <div id="wordzip_area">
        <h1>All Slang</h1>
        <h4>모든 신조어들을 모아놓았습니다.</h4>
        <table class="list-table">
            <thead>
                <tr>
                    <th width="500">번호</th>
                    <th width="3000">단어이름</th>
                </tr>
            </thead>
            <?php
            while ($request = $sql2->fetch()) {
            ?>
                <tbody>
                    <tr>
                        <td width="70"><?= $request['idx'] ?></td>
                        <td width="500">
                            <!-- 기존에 read.php에서 wordread로 바꿈 -->
                        <a href="wordread.php?idx=<?= $request['idx'] ?>"><?= $request['wordname_kor'] ?></a></td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
        <!---페이징 넘버 --->
        <div id="page_num">
            <ul>
                <?php
                  if($page <= 1)
                    { //만약 page가 1보다 작거나 같다면
                    echo "<li class='fo_re'>처음</li>"; //처음이라는 글자에 빨간색 표시 
                    }else{
                    echo "<li><a href='?page=1'>처음</a></li>"; //아니라면 처음글자에 1번페이지로 갈 수있게 링크
                    }
                  if($page <= 1)
                    {   //만약 page가 1보다 작거나 같다면 빈값
            
                    }else{
                    $pre = $page-1; //pre변수에 page-1을 해준다 만약 현재 페이지가 3인데 이전버튼을 누르면 2번페이지로 갈 수 있게 함
                    echo "<li><a href='?page=$pre'>이전</a></li>"; //이전글자에 pre변수를 링크한다. 이러면 이전버튼을 누를때마다 현재 페이지에서 -1하게 된다.
                    }
                    for($i=$block_start; $i<=$block_end; $i++){ 
                    //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                        if($page == $i){ //만약 page가 $i와 같다면 
                            echo "<li class='fo_re'>[$i]</li>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                            }else{      
                            echo "<li><a href='?page=$i'>[$i]</a></li>"; //아니라면 $i
                        }
                   }
                  if($block_num >= $total_block){ //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                  }else{    
                    $next = $page + 1; //next변수에 page + 1을 해준다.
                    echo "<li><a href='?page=$next'>다음</a></li>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                  }
                  if($page >= $total_page){ //만약 page가 페이지수보다 크거나 같다면
                    echo "<li class='fo_re'>마지막</li>"; //마지막 글자에 긁은 빨간색을 적용한다.
                }else{
                    echo "<li><a href='?page=$total_page'>마지막</a></li>"; //아니라면 마지막글자에 total_page를 링크한다.
          }
        ?>
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