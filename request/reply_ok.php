<?php
	require_once('../db/db.php');
    session_start();

    $idx = $_GET['idx'];
    $name = $_SESSION['name'];
    $content = $_POST['reply_content'];
    
    $sql = $db -> prepare('INSERT INTO request_reply 
    (req_num ,name, content, date) /*이 부분은 DB 테이블에서 만든 이름과 똑같이 입력해줍니다.*/
    VALUE(:idx, :name, :content, now())');

    $sql -> bindParam(':name',$name);
    $sql -> bindParam(':idx',$idx);
    $sql -> bindParam(':content',$content);

    $sql -> execute();
    
    echo "<script>alert('댓글이 작성되었습니다.'); 
        location.href='read.php?idx=$idx';</script>";
   
?>