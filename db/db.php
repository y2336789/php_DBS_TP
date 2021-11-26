<?php
    $dns = "mysql:host=localhost;dbname=new;charset=utf8";
    $username="root";
    $pw="root";
    global $db;
    
    try {
        $db = new PDO($dns, $username,$pw);
        // echo '접속성공 축하합니다!';
    } catch (PDOException $th) {
        echo '접속실패 : ' . $th->getMessage();
    }

    function errMsg($msg){
        echo "<script>
            window.alert('$msg');
            history.back(1);
        </script>";
        exit;
    }
