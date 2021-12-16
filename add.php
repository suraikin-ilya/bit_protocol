<?php
$db_connect = mysqli_connect("std-mysql", "std_1252_bit", "12345678", "std_1252_bit")
or die("Ошибка " . mysqli_error($db_connect));
mysqli_set_charset($db_connect, "utf8");

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>BIT Admin</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <link href="assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/loader.js"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<?php
if($_COOKIE['user']== ''):
    header('Location: ../bit_protocol/auth_login.php');
    ?>
<?php else: ?>
<body class="form">
    <div class="form-container ml-5 mr-5">
        <?php
        echo '
        <div class="card- col-10 mt-5" >
            <h3>Добавление нового проекта</h3></br>
            <form method="post">
                <label for="theme" >Название проекта</label>
                <br>
                <input type="text" id="theme" name="theme" value="' . $_POST['theme'] . '" class="form-control mlr"></br>
                <label for="count_questions">Количество вопросов в проекте</label>
                <br>
                <input type="number" id="count_questions" name="count_questions" value="' . $_POST['count_questions'].'" class="form-control mlr"></hr>
        </div>';
        if(!$_POST['count_questions']){
            echo '<input type="submit" value="Добавить" class="button_margin btn btn-secondary my-2 ml-3 mt-3">';
        }
        if($_POST['theme']){
            echo '<h2>Название проекта '.$_POST['theme'].'</h2>';
        }
        for ($i = 0; $i < $_POST['count_questions']; $i++) {
            echo '
                <label for="theme' . $i . '">Вопрос №' . ($i+1) . '</label>
                <select name="theme' . $i . '" id="theme' . $i . '" value="'.$_POST['theme'.$i].'">
                    <option value="small_text"'; if($_POST['theme'.$i]=='small_text')echo 'selected';echo '>Вопрос с коротким ответом</option>
                    <option value="big_text"'; if($_POST['theme'.$i]=='big_text')echo 'selected';echo '>Вопрос с развёрнутым</option>
                    <option value="radio"'; if($_POST['theme'.$i]=='radio')echo 'selected';echo '>Звёздный рейтинг</option>
                    <option value="checkbox"'; if($_POST['theme'.$i]=='checkbox')echo 'selected';echo '>С множественным выбором</option>
                </select>
                <br><br>
                '; }
        if($_POST['count_questions'] && !$_POST['theme0']){
            echo '<input type="submit" value="Выбрать типы вопросов" class="button_margin btn btn-secondary my-2">';
        }
                    if($_POST['count_questions'] && $_POST['theme0']) {
                        for ($i = 0; $i < $_POST['count_questions']; $i++) {
                            echo '<label for="question' . $i . '">Вопрос №' . ($i + 1) . ': </label>
                                <input type="text" class="form-control mlrb mr-5" id="question' . $i . '"  name="question' . $i . '"required>';
                                                if ($_POST['theme' . $i] == 'checkbox') {
                                                    echo '<label for="options' . $i . '">Варианты ответов через запятую: </label>
                                                    <input type="text" class="form-control mlrb mb-5" id="options' . $i . '" name="options' . $i . '" required>';
                                                }
                                            }
                                            echo '
                                <label for="project_link">Ссылка на проект</label> <input class="form-control mlrb col-12" name="project_link" id="project_link" type="text">
                                <input type="submit" value="Создать проект" class="btn btn-primary btn-lg btn-block button_margin col-12 mr-lg-5 mt-5" >';
        }
        echo '</form>';
        if($_POST['question0']) {
            if (empty($_POST['project_link'])) {
                $project_link = bin2hex(random_bytes(5));
            } else {
                $project_link = $_POST['project_link'];
            }
            $questions = array();
            for ($i = 0; $i < $_POST['count_questions']; $i++) {
                $questions[$i]['type'] = $_POST['theme' . $i];
                $questions[$i]['question'] = $_POST['question' . $i];
                $questions[$i]['options'] = $_POST['options' . $i];
                $questions[$i]['answer'] = $_POST['answer' . $i];
            }
            $questions = json_encode($questions, JSON_UNESCAPED_UNICODE);
            $theme = $_POST['theme'];
            $user_project = $_COOKIE['user'];
            $questions_query = "INSERT INTO `projects` (user_project, project_link, project_name, questions)
            VALUES ('$user_project', '$project_link', '$theme', '$questions')";
            $result = mysqli_query($db_connect, $questions_query) or die("Ошибка " . mysqli_error($db_connect));
            if($result){
                echo '<a href="index.php" class="btn btn-primary btn-lg btn-block button_margin">Admin</a>';
                $success = 1;
            }
            unset($_POST);
            header('location: index.php');
        }
        ?>




    </div>

<script src="assets/js/libs/jquery-3.1.1.min.js"></script>
<script src="bootstrap/js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/js/app.js"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="assets/js/custom.js"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="plugins/apex/apexcharts.min.js"></script>
<script src="assets/js/dashboard/dash_2.js"></script>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>
<?php endif; ?>