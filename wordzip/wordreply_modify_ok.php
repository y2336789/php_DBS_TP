<?php
    require_once('../db/db.php');
    session_start();

    $idx = $_GET['idx'];
    $rno = $_POST['rno'];
    $name = $_SESSION['name'];
    $content = $_POST['contents'];

    $sql = $db -> prepare("UPDATE word_reply SET content=:content WHERE idx=:rno");
    $sql -> bindParam(':content',$content);
    $sql -> bindParam(':rno',$rno);
    $sql -> execute();

    echo "<script>alert('댓글이 수정되었습니다.'); 
        location.href='wordread.php?idx=$idx';</script>";
?> 