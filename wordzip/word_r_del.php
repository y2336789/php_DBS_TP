<?php
    $prevPage = $_SERVER['HTTP_REFERER'];
	require_once('../db/db.php');
    session_start();
	$idx = $_GET['idx']; /* 주소창의 글 번호 가져오기 */

    

    $sql = $db -> prepare("DELETE FROM word_reply WHERE idx=:idx");
    $sql -> bindParam("idx",$idx);
    $sql -> execute();
    $request = $sql -> fetch();

    header('location:'.$prevPage);
?>