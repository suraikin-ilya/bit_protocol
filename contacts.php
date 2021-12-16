<?php
$db_connect = mysqli_connect("std-mysql", "std_1252_bit", "12345678", "std_1252_bit")
or die("Ошибка " . mysqli_error($db_connect));
mysqli_set_charset($db_connect, "utf8");
$_SERVER['SERVER_NAME'] = 'localhost:63342/bit_protocol';


?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <title>BIT contacnts</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/authentication/form-1.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
        <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">
    </head>
    <body class="form mt-5">

    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                    <div class="form-content ">
                        <form action="" method="post" >
                            <label for="name" class="sr-only mt-3">Name</label>
                            <input id="name" type="name" name="name" placeholder="name" class="form-control" required="">
                            <label for="email" class="sr-only mt-3">Email</label>
                            <input id="email" type="email" name="email" placeholder="email" class="form-control" required="">
                            <label for="phone" class="sr-only mt-3">Name</label>
                            <input id="phone" type="tel" name="phone" placeholder="phone" class="form-control" required="">
                            <input type="submit" class="mt-4 btn btn-primary">
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
            </div>
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





