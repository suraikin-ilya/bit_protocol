<?php



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>BIT Reward </title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <!--    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />-->
    <!--    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />-->
    <!--    <link href="assets/css/authentication/form-1.css" rel="stylesheet" type="text/css" />-->
    <!-- END GLOBAL MANDATORY STYLES -->
    <!--    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">-->
    <!--    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">-->
    <link rel="stylesheet"  href="css/style.css">


</head>
<body class="">
    <div class="quiz" style="background-color: #ffc107">
        <div class="bc">
            <div class="quiz-name ">
                <h1 class="quiz-name__text " style="font-size: 36px ">Спасибо за участие</h1>
                <p style="margin-bottom: 16px;">Для получения карты выберите мессенджер</p>
            </div>
        </div>
    </div>

    <div class="quiz">
        <div style="display:inline-block;">
            <img src="img/messenger.png" alt="Messenger" style="margin-right: 20px;">
            <img src="img/telegram.png" alt="Telegram" style="margin-right: 20px; ">
            <img src="img/viber.png" alt="Viber" style="margin-right: 20px; ">
            <img src="img/vk.png" alt="Vkontakte" style="margin-right: 20px; ">
        </div>
        <div class="quiz__line"></div>
        <span class="quiz-name__text" style="margin-bottom: 15px">Ваш уникальный ID         <?php echo $_GET['answer_id'] ?> </span>
        <div  class="btn btn-send" id="btn-send">

            <a href="#" onclick="history.back();return false;" style="color: black; text-decoration: none; montserrat, sans-serif;border: white; " class="btn btn-send__title btn-send">Назад</a>
        </div>
    </div>



<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="assets/js/libs/jquery-3.1.1.min.js"></script>
<script src="bootstrap/js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- END GLOBAL MANDATORY SCRIPTS -->
<script src="assets/js/authentication/form-1.js"></script>

</body>
</html>

