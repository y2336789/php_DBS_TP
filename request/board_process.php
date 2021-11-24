<?php
    require_once('../db/db.php');

   
    $name = $_POST['name'];
    $pw = $_POST['pw'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    // echo $name.','.$pw.','.$title.','.$content;
    
    $sql = $db -> prepare('INSERT INTO request 
    (name, pw, title, content, date) /*이 부분은 DB 테이블에서 만든 이름과 똑같이 입력해줍니다.*/
    VALUE(:name, :pw, :title, :content, now())');

    $sql -> bindParam(':name',$name);
    $sql -> bindParam(':pw',$pw);
    $sql -> bindParam(':title',$title);
    $sql -> bindParam(':content',$content);

    $sql -> execute();
    header('location:../main.php');




    // $date = date('Y-m-d');
    // if($username && $userpw && $title && $content){
    //     $sql = mq("insert into request(name,pw,title,content,date) values('".$username."','".$userpw."','".$title."','".$content."','".$date."')"); 
    //     echo "<script>
    //     alert('글쓰기 완료되었습니다.');
    //     location.href='/';</script>";
    // }else{
    //     echo "<script>
    //     alert('글쓰기에 실패했습니다.');
    //     history.back();</script>";
    // }
?>