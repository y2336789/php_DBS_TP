<?php
require_once("../db/db.php");
session_start();

$fstr = $_POST['name'];
$sql = $db->prepare("SELECT * FROM word WHERE wordname_kor like '%$fstr%'");
$sql->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/board.css">
    <title>Request</title>
</head>



<body>
    <?php include("../header.php"); ?>
    <div id="board_area">
        <h1>K_neologism Dictionary</h1>
        <h4>Please enter K_neologism in English pronunciation</h4>

        <h4> _ </h4>

        <form action='/search/mean_E.php' method='POST'>
            <input type="text" name="name">
        </form>
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