<?php
	require_once('../db/db.php');

	$idx = $_GET['idx']; /* 주소창의 글 번호 가져오기 */ 
    $query = "delete from request where idx = '$idx'";
    $db->exec($query);
    
    header('location:../request/board.php');
?>