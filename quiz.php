<?php
//$db_connect = mysqli_connect("std-mysql", "std_1252_bit", "12345678", "std_1252_bit")
//or die("Ошибка " . mysqli_error($db_connect));
//mysqli_set_charset($db_connect, "utf8");
//$_SERVER['SERVER_NAME'] = 'localhost:63342/bit_protocol';

require "includes/db_connection.php";

function get_type($a){
    if($a=='number') {
        return 'type="number" required';
    }  elseif ($a=='small_text') {
        return 'type="text" pattern="^[0-9a-zA-ZА-Яа-яЁё\s]{,30}" required';
    } elseif ($a=='big_text') {
        return 'type="text" pattern="^[0-9a-zA-ZА-Яа-яЁё\s]{,255}" required';
    } elseif ($a=='checkbox') {
        return 'type="checkbox"';
    } elseif ($a=='radio') {
        return 'type="radio" required';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>BIT Quiz </title>
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
    <meta name="format-detection" content="telephone=no">

    <link rel="stylesheet"  href="css/style.css">


</head>


<div class="quiz">





    <body class="">
    <?php
    if (!empty($_GET['link'])) {
        $query ="SELECT * FROM `projects` WHERE `project_link`= '".$_GET['link']."'";
        $result = mysqli_query($db_connect, $query) or die("Ошибка " . mysqli_error($db_connect));
        if(mysqli_num_rows($result)!=0){
            $session = mysqli_fetch_row($result);
            echo '<div class="quiz-name"><p class="quiz-name__text">'.$session[3].'</p></div>
                <div class="quiz__line"></div>
                <form action="" method="post" class="question dib">';
            if(true){
                $questions = json_decode($session[4], true);
                //print_r ($questions);
                foreach ($questions as $key =>$question){

                    if($question['type']!='checkbox'&&$question['type']!='radio'){
                        echo '<label class="star-rating-title" for="question'.$key.'">'.$question['question'].'</label><br>';
                        echo '<input  style="margin-top: 10px;" class="quiz-review"  id="question'.$key.'" name="question'.$key.'" '. get_type($question['type']) .'>'.$question[$question].'</input><br><br>';
                    }else{
                        echo '
                        <p class="star-rating-title">'.$question['question'].'</p>';
                        $radio=explode(',',$question['options']);
                        if($question['type']=='radio') {
                            echo '<div class="star-rating__group">
                    <img class="star-rating__img" src="assets/img/star.svg" alt="star">
                    <img class="star-rating__img" src="assets/img/star.svg" alt="star">
                    <img class="star-rating__img" src="assets/img/star.svg" alt="star">
                    <img class="star-rating__img" src="assets/img/star.svg" alt="star">
                    <img class="star-rating__img" src="assets/img/star.svg" alt="star">
                </div>
                <input  class="star-rating__value" type="hidden" id="question'.$key.'" name="question' . $key . '" value="0">
                                <br><br>';
                        }
                    else{

                            foreach ($radio as $num => $value) {
                                echo '<input class="form-control " style="display: inline-block;width: 50px;"' . get_type($question['type']) . ' id="question' . $key . $num . '" name="question' . $key . '[]" value="' . $value . '">';
                                echo '<label style="display: inline-block" for="question' . $key . $num . '">' . $value . '</label><br><br>';
                            }
                        }
                    }
                }
                echo '<div  class="btn btn-send" id="btn-send">
                        <input style="-webkit-appearance: none; width:100px; font-family: montserrat, sans-serif;border: white; background: white;" class="btn btn-send__title btn-send" type="submit" value="Отправить"> 
                        </div>';
            }

        }else{
            echo '<h1>Что-то пошло не так</h1> <h2> Попробуйте спросить ссылку еще раз</h2>';
        }
    }
    else {
        echo '<a href="index.php" class="btn btn-primary btn-lg btn-block button_margin">Панель администратора</a>';
    }

    if (!empty($_POST)){
        $true_answers = 0;
        $answers_count=count($questions);
        $answers=Array();
        for ($i = 0; $i < $answers_count; $i++){
            $answers[$i]['type']=$questions[$i]['type'];
            is_array($_POST['question'.$i])?
                $answers[$i]['answer']=implode(",", $_POST['question'.$i]):
                $answers[$i]['answer']=$_POST['question'.$i];
        }
        $answers = json_encode($answers, JSON_UNESCAPED_UNICODE);
        $answer_id = bin2hex(random_bytes(10));
        $project_link=$_GET['link'];
        $answers_query="INSERT INTO `answers` (project_link, answers, answer_id, interview_id)
                        VALUES ('$project_link', '$answers', '$answer_id', NULL)";
        $result = mysqli_query($db_connect, $answers_query) or die("Ошибка " . mysqli_error($db_connect));

        header('Location: /contacts.php?link='.$_GET['link'].'&answer_id='.$answer_id);
    }

    ?>


</div>


    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/authentication/form-1.js"></script>
    <script src="assets/js/quiz.js"></script>
</body>
</html>