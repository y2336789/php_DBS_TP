<?php
    require_once('../db/db.php');

    switch ($_GET['mode']){
        case 'register':
        $id = $_POST['id'];
        $userid = $_POST['userid'];
        $pw1 = $_POST['pw1'];
        $pw2 = $_POST['pw2'];
        $name = $_POST['name'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];

        $sql = $db -> prepare('INSERT INTO register
        (id, userid, pw, name, tel, email, redate) /*이 부분은 DB 테이블에서 만든 이름과 똑같이 입력해줍니다.*/
        VALUE(:id, :userid, :pw, :name, :tel, :email, now())');

        $sql -> bindParam(':id',$id);
        $sql -> bindParam(':userid',$userid);
        $sql -> bindParam(':pw',$pw1);
        $sql -> bindParam(':name',$name);
        $sql -> bindParam(':tel',$tel);
        $sql -> bindParam(':email',$email);

        if($pw1 != $pw2){
           errMsg("비밀번호가 일치하지 않습니다.");
        }

        $sql -> execute();
        header('location:../main.php');
        break;

        case 'login':
      	    $userid = $_POST['userid'];
            $pw = $_POST['pw'];

            $sql = $db -> prepare("SELECT * FROM register WHERE userid=:userid");
            $sql -> bindParam(":userid", $userid);
            $sql -> execute();
            $row = $sql -> fetch();

            if(!$userid){
                errMsg("아이디를 입력해주세요.");
            } elseif(!isset($row['userid'])){
                errMsg('존재하지 않는 아이디입니다.');
            } elseif(!$pw){
                errMsg('비밀번호를 입력해주세요.');
            } elseif($pw != $row['pw']){
                errMsg('비밀번호가 일치하지 않습니다.');
            }

            session_start();
            $_SESSION['userid'] = $row['userid'];
            $_SESSION['name'] = $row['name'];

            header('location:../main.php');
        break;

        case 'logout':
            session_start();
            session_destroy();
            header('location:../main.php');
        break;
    }
?>
