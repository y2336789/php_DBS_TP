<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/c47106c6a7.js" crossorigin="anoymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/list.css">
    <link rel="stylesheet" href="../css/footer.css">
    <script defer src="../js/main.js?ver=1"></script>
    <title>Word list</title>
</head>

<body>
    <?php include("../header.php");?>
    <figure>
        <h1>
            <strong>dfsf</strong><br>
            <span>fsdafdfa</span>
        </h1>
        <!-- <a href="#" class="menu"><i class="fas fa-bars"></i></a> -->
        <p>test</p>
        <section>
            <article class="on">
                <div class="inner">
                    <div class="title", onclick = "location.href = '../word/word_detail.php';">
                        <h1>
                            <?php
                                include_once '../db/db.php';

                                $statement = $db->query("SELECT * FROM word WHERE idx = 1");
                                $row = $statement->fetch(PDO::FETCH_ASSOC);
                                echo htmlentities($row['name']);
                            ?>
                        </h1>
                        <div class="txt">
                            <h2>단어 뜻</h2>
                        </div>
                    </div>
                </div>
            </article>
            <article>
                <div class="inner">
                    <div class="title">
                        <h1>
                            단어1
                        </h1>
                        <div class="txt">
                            <h2>단어 뜻</h2>
                        </div>
                    </div>
                </div>
            </article>
            <article>
                <div class="inner">
                    <div class="title">
                        <h1>
                            단어1
                        </h1>
                        <div class="txt">
                            <h2>단어 뜻</h2>
                        </div>
                    </div>
                </div>
            </article>
            <article>
                <div class="inner"></div>
            </article>
            <article>
                <div class="inner"></div>
            </article>
            <article>
                <div class="inner"></div>
            </article>
            <article>
                <div class="inner"></div>
            </article>
            <article>
                <div class="inner">
                    <div class="title">
                        <h1>
                            단어1
                        </h1>
                        <div class="txt">
                            <h2>단어 뜻</h2>
                        </div>
                    </div>
                </div>
            </article>
        </section>
        <div class="btnPrev">
            <span>PREV WORD</span>
        </div>
        <div class="btnNext">
            <span>Next WORD</span>
        </div>
    </figure>
    <?php include("../footer.php");?>
</body>

</html>