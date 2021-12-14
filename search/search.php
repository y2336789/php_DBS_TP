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
                    <th width="70">번호</th>
                    <th width="150">한글 이름</th>
                    <th width="150">영어 이름</th>
                    <th width="350">한글 해석</th>
                    <th width="350">영어 해석</th>
                    <th width="250">예시</th>
                </tr>
            </thead>
            <?php
            while ($request = $sql->fetch()) {
            ?>
                <tbody>
                    <tr>
                        <td width="70"><?= $request['idx'] ?></td>
                        <td width="150"><?= $request['wordname_kor'] ?></td>
                        <td width="150"><?= $request['wordname_eng'] ?></td>
                        <td width="350"><?= $request['wordmeaning_kor'] ?></td>
                        <td width="350"><?= $request['wordmeaning_eng'] ?></td>
                        <td width="250"><?= $request['word_example'] ?></td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
    <?php include("../footer.php");?>
</body>

</html>