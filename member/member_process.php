<?php
require_once('../db/db.php');

switch ($_GET['mode']) {
    case 'register':
        $id = $_POST['id'];
        $pw1 = $_POST['pw1'];
        $pw2 = $_POST['pw2'];
        $name = $_POST['name'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];

        $sql = $db->prepare('INSERT INTO register
        (id, pw, name, tel, email, redate)
        VALUE(:id, :pw, :name, :tel, :email, now())');

        $sql->bindParam(':id', $id);
        $sql->bindParam(':pw', $pw1);
        $sql->bindParam(':name', $name);
        $sql->bindParam(':tel', $tel);
        $sql->bindParam(':email', $email);

        if ($pw1 != $pw2) {
            errMsg("비밀번호가 일치하지 않습니다.");
        }

        $sql->execute();
        header('location:../main.php');
        break;

    case 'login':
        $userid = $_POST['id'];
        $pw = $_POST['pw1'];

        $sql = $db->prepare("SELECT * FROM register WHERE id=:id");
        $sql->bindParam(":id", $userid);
        $sql->execute();
        $row = $sql->fetch();

        if (!$userid) {
            errMsg("아이디를 입력해주세요.");
        } elseif (!isset($row['id'])) {
            errMsg('존재하지 않는 아이디입니다.');
        } elseif (!$pw) {
            errMsg('비밀번호를 입력해주세요.');
        } elseif ($pw != $row['pw']) {
            errMsg('비밀번호가 일치하지 않습니다.');
        }

        session_start();
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];

        header('location:../main.php');
        break;

    case 'logout':
        session_start();
        session_destroy();
        header('location:../main.php');
        break;
}
