<?php
$result = "";
$query = "select * from word";
if (isset($_POST['name'])){
    $fstr = $_POST['name'];
    if ($fstr != ''){
        $query .= " where wordname_kor like '%$fstr%'";
    }
}
try {
    include_once '../db/db.php';
    $statement = $db->query($query);
    while($record = $statement->fetch(PDO::FETCH_ASSOC)){
        $result .= "<tr>";
        foreach($record as $column){
            $result .= "<td>" . $column . "</td>";
        }
        $result .= "</tr>";
    }
} catch(PDOException $e){
    $result = "#ERR:" . $e->getMessage();
    echo 'pong';
}
$db = null;
?>
<!DOCTYPE html>
<html lang="ko">
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
        <title>sample page</title>
        <style>
        h1 { font-size:14pt;
            padding:5px;
            background-color:#AAFFFF; }
        table tr td {
            padding:5px;
            background-color:#DDFFCC; }
        </style>
    </head>
    <body>
        <h1>Hello PHP!</h1>
        <table>
        <form method="post" action="./search.php">
            <tr><td>검색 문장:</td><td><input type="text" name="name"></td></tr>
            <tr><td></td><td><input type="submit" value="송신"></td></tr>
        </form>
        </table>
        <hr>
        <table>
        <?php echo $result; ?>
        </table>
    </body>
</html>