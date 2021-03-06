<?php
require_once("../db/db.php");
session_start();

$fstr = $_POST['name'];
if($fstr != NULL){
    $sql = $db->prepare("SELECT * FROM word_eng WHERE wn_eng like '%$fstr%'");
    $sql->execute();
} else {
    $sql = $db->prepare("SELECT * FROM word_eng WHERE wn_eng = 'NULL' ");
    $sql->execute();
}
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
        <h1>Search word</h1>
        <h4>These are the related words searched.</h4>
        <table class="list-table">
            <thead>
                <tr>
                    <th width="150">English name</th>
                    <th width="900">English interpretation</th>
                </tr>
            </thead>
            <?php
            while ($request = $sql->fetch()) {
            ?>
                <tbody>
                    <tr>
                        <td width="150"><?= $request['wn_eng'] ?></td>
                        <td width="900"><?= $request['wm_eng'] ?></td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
    <?php include("../footer.php"); ?>
</body>

</html>