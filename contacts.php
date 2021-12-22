<?php
//$db_connect = mysqli_connect("std-mysql", "std_1252_bit", "12345678", "std_1252_bit")
//or die("Ошибка " . mysqli_error($db_connect));
//mysqli_set_charset($db_connect, "utf8");
//$_SERVER['SERVER_NAME'] = 'localhost:63342/bit_protocol';

require "includes/db_connection.php";
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <title>BIT Contacts </title>
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
    <body class="form mt-5">

    <div class="quiz">

        <div class="quiz-name"><h1 class="quiz-name__text" style="font-size: 36px">Введите</h1></div>
                        <form action="" method="post" class="question dib">

                            <input id="name" type="name" name="name" placeholder="name" class="quiz-review" required=""><br>

                            <input id="email" type="email" name="email" placeholder="email" class="quiz-review" required=""><br>

                            <input id="phone" type="tel" name="phone" placeholder="phone" class="quiz-review" required=""><br>
                            <div  class="btn btn-send" id="btn-send">
                            <input value="Далее" style="font-family: montserrat, sans-serif;border: white; background: white; width:100px" class="btn btn-send__title btn-send" type="submit" >
                            </div>
                        </form>
                        <?php
                        if (!empty($_POST)){
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $phone = $_POST['phone'];
                            $project_link = $_GET['link'];
                            $answer_id = $_GET['answer_id'];

                            $answers_query="INSERT INTO `contacts` (answer_id, project_link, name, email, phone)
                                VALUES ('$answer_id', '$project_link', '$name', '$email', '$phone')";
                            $result = mysqli_query($db_connect, $answers_query) or die("Ошибка " . mysqli_error($db_connect));
                            header('Location: /reward.php?link='.$_GET['link'].'&answer_id='.$answer_id);

                        }
                        ?>


    </div>


    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/authentication/form-1.js"></script>

    </body>
    </html>





