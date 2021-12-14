<!DOCTYPE html>
<?php
session_start();
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome </title>
    <script src="https://kit.fontawesome.com/c47106c6a7.js" crossorigin="anoymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link rel="stylesheet" href="css/style.css?ver=1">
    <script defer src="js/ie.js"></script>
    </script>
</head>
<body>
    <?php include("header.php");?>
    <figure>
        <video src="img/talking.mp4" autoplay muted loop></video>
        <div class="inner">
            <h1>Do you know Korean Slang?</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum, labore. Soluta, error! Beatae blanditiis quam ut modi nemo porro at voluptatibus iste adipisci! Provident!</p>
            <a href="member/register.php">Join us!</a>
        </div>
    </figure>
    <section class="introduce">
        <div class="inner">
            <h1>Introduction of service</h1>
            <div class="wrap">
                <ul>
                    <li>
                        <h2>1. This is a Slang dictionary.</h2>
                        <p>You can check the list of slang words and search them.</p>
                    </li>
                    <li>
                        <h2>2. The dictionary is created with the participation of users.</h2>
                        <p>Users can add and modify words themselves.</p>
                    </li>
                    <li>
                        <h2>3. You can talk like a native Korean.</h2>
                        <p>You can see the meaning, origin, and situation of the slangs used by Koreans.</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="mainCon">

        </div>
    </section>
    <?php include("footer.php");?>
</body>

</html>