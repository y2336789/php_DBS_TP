<?php
    require_once('../db/db.php');
    session_start();
   
    $name = $_SESSION['name'];
    $pw = $_POST['pw'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    
    $sql = $db -> prepare('INSERT INTO request 
    (name, pw, title, content, date) /*이 부분은 DB 테이블에서 만든 이름과 똑같이 입력해줍니다.*/
    VALUE(:name, :pw, :title, :content, now())');

    $sql -> bindParam(':name',$name);
    $sql -> bindParam(':pw',$pw);
    $sql -> bindParam(':title',$title);
    $sql -> bindParam(':content',$content);

    $sql -> execute();
    header('location:../request/board.php');

?>