<?php
require_once("../db/db.php");
session_start();

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
    <?php include("../header.php"); ?>
    <div id="board_area">
        <h1>K_neologism Dictionary</h1>
        <h4>Please enter K_neologism in English pronunciation</h4>

        <h4> _ </h4>

        <form action='/search/mean_E.php' method='POST'>
            <input type="text" name="name">
        </form>
    </div>
    <?php include("../footer.php"); ?>
</body>

</html>