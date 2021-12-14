<?php
require_once("../db/db.php");
session_start();

$fstr = $_POST['name'];
$sql = $db->prepare("SELECT * FROM word_kor WHERE wn_kor like '%$fstr%'");
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
    <link rel="stylesheet" href="../css/footer.css">
    <title>Request</title>
</head>
<body>
    <?php include("../header.php");?>
    <div id="board_area">
        <h1>검색된 단어</h1>
        <h4>검색된 연관 단어들입니다. </h4>
        <table class="list-table">
            <thead>
                <tr>
                    <th width="150">한글 이름</th>
                    <th width="900">한글 해석</th>
                </tr>
            </thead>
            <?php
            while ($request = $sql->fetch()) {
            ?>
                <tbody>
                    <tr>
                        <td width="150"><?= $request['wn_kor'] ?></td>
                        <td width="900"><?= $request['wm_kor'] ?></td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
    <?php include("../footer.php"); ?>
</body>

</html>