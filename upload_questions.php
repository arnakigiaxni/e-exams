<head>
    <meta charset="UTF-8">
</head>

<?php
    include_once 'db_connect.php';
    mysql_query("SET NAMES utf8");
    //error_reporting(0);
    
    session_start();
    if($_SESSION['success_login']!=1){
        header('Location: login.php');
    }

    $teams = $_POST['hidden4'];
    $quest_numb = $_POST['hidden'];
    $lesson = $_POST['hidden2'];
    $time = $_POST['hidden3'];
    
    mysql_query("UPDATE xronos SET time='".$time."' WHERE lesson=$lesson");
    mysql_query("UPDATE teams SET teams='".$teams."' WHERE lesson=$lesson");
    
    if ($teams == 2){
            for($x=1;$x<=$quest_numb;$x++){
                $quest_type = $_POST['quest_type'.$x];

                if($quest_type==1){
                    $question = $_POST['quest_arithm_apotel'.$x];
                    $right = $_POST['right_arithm_apotel'.$x];
                    $points = $_POST['points_arithm_apotel'.$x];

                    mysql_query("INSERT INTO arithm_apotel (lesson, question, right_answer, points, team)
                        VALUES ('".$lesson."', '".$question."', '".$right."', '".$points."', 1)");
                }

                else if($quest_type==2){
                    $question = $_POST['quest_pollaplis'.$x];
                    $answer1 = $_POST['answer1'.$x];
                    $answer2 = $_POST['answer2'.$x];
                    $answer3 = $_POST['answer3'.$x];
                    $answer4 = $_POST['answer4'.$x];
                    $right = $_POST['radio1'.$x];
                    $points = $_POST['points_pollaplis'.$x];

                    mysql_query("INSERT INTO pollaplis (lesson, question, answer1, answer2, answer3, answer4, right_answer, points, team)
                        VALUES ('".$lesson."', '".$question."', '".$answer1."', '".$answer2."', '".$answer3."', '".$answer4."', '".$right."', '".$points."', 1)");
                }

                else if ($quest_type==3){
                    $question = $_POST['quest_sl'.$x];
                    $right = $_POST['radio2'.$x];
                    $points = $_POST['points_sl'.$x];

                    mysql_query("INSERT INTO sosto_lathos (lesson, question, right_answer, points, team)
                        VALUES ('".$lesson."', '".$question."', '".$right."', '".$points."', 1)");
                }
            }

            for($y=1;$y<=$quest_numb;$y++){
                $quest_type = $_POST['quest_type2'.$y];

                if($quest_type==1){
                    $question = $_POST['quest_arithm_apotel2'.$y];
                    $right = $_POST['right_arithm_apotel2'.$y];
                    $points = $_POST['points_arithm_apotel2'.$y];

                    mysql_query("INSERT INTO arithm_apotel (lesson, question, right_answer, points, team)
                        VALUES ('".$lesson."', '".$question."', '".$right."', '".$points."', 2)");
                }

                else if($quest_type==2){
                    $question = $_POST['quest_pollaplis2'.$y];
                    $answer1 = $_POST['answer5'.$y];
                    $answer2 = $_POST['answer6'.$y];
                    $answer3 = $_POST['answer7'.$y];
                    $answer4 = $_POST['answer8'.$y];
                    $right = $_POST['radio3'.$y];
                    $points = $_POST['points_pollaplis2'.$y];

                    mysql_query("INSERT INTO pollaplis (lesson, question, answer1, answer2, answer3, answer4, right_answer, points, team)
                        VALUES ('".$lesson."', '".$question."', '".$answer1."', '".$answer2."', '".$answer3."', '".$answer4."', '".$right."', '".$points."', 2)");
                }

                else if ($quest_type==3){
                    $question = $_POST['quest_sl2'.$y];
                    $right = $_POST['radio4'.$y];
                    $points = $_POST['points_sl2'.$y];

                    mysql_query("INSERT INTO sosto_lathos (lesson, question, right_answer, points, team)
                        VALUES ('".$lesson."', '".$question."', '".$right."', '".$points."', 2)");
                }
            }
        }
        
        else {
            for($x=1;$x<=$quest_numb;$x++){
                $quest_type = $_POST['quest_type'.$x];

                if($quest_type==1){
                    $question = $_POST['quest_arithm_apotel'.$x];
                    $right = $_POST['right_arithm_apotel'.$x];
                    $points = $_POST['points_arithm_apotel'.$x];

                    mysql_query("INSERT INTO arithm_apotel (lesson, question, right_answer, points, team)
                        VALUES ('".$lesson."', '".$question."', '".$right."', '".$points."', 1)");
                }

                else if($quest_type==2){
                    $question = $_POST['quest_pollaplis'.$x];
                    $answer1 = $_POST['answer1'.$x];
                    $answer2 = $_POST['answer2'.$x];
                    $answer3 = $_POST['answer3'.$x];
                    $answer4 = $_POST['answer4'.$x];
                    $right = $_POST['radio1'.$x];
                    $points = $_POST['points_pollaplis'.$x];

                    mysql_query("INSERT INTO pollaplis (lesson, question, answer1, answer2, answer3, answer4, right_answer, points, team)
                        VALUES ('".$lesson."', '".$question."', '".$answer1."', '".$answer2."', '".$answer3."', '".$answer4."', '".$right."', '".$points."', 1)");
                }

                else if ($quest_type==3){
                    $question = $_POST['quest_sl'.$x];
                    $right = $_POST['radio2'.$x];
                    $points = $_POST['points_sl'.$x];

                    mysql_query("INSERT INTO sosto_lathos (lesson, question, right_answer, points, team)
                        VALUES ('".$lesson."', '".$question."', '".$right."', '".$points."', 1)");
                }
            }

            for($y=1;$y<=$quest_numb;$y++){
                $quest_type = $_POST['quest_type2'.$y];

                if($quest_type==1){
                    $question = $_POST['quest_arithm_apotel2'.$y];
                    $right = $_POST['right_arithm_apotel2'.$y];
                    $points = $_POST['points_arithm_apotel2'.$y];

                    mysql_query("INSERT INTO arithm_apotel (lesson, question, right_answer, points, team)
                        VALUES ('".$lesson."', '".$question."', '".$right."', '".$points."', 2)");
                }

                else if($quest_type==2){
                    $question = $_POST['quest_pollaplis2'.$y];
                    $answer1 = $_POST['answer5'.$y];
                    $answer2 = $_POST['answer6'.$y];
                    $answer3 = $_POST['answer7'.$y];
                    $answer4 = $_POST['answer8'.$y];
                    $right = $_POST['radio3'.$y];
                    $points = $_POST['points_pollaplis2'.$y];

                    mysql_query("INSERT INTO pollaplis (lesson, question, answer1, answer2, answer3, answer4, right_answer, points, team)
                        VALUES ('".$lesson."', '".$question."', '".$answer1."', '".$answer2."', '".$answer3."', '".$answer4."', '".$right."', '".$points."', 2)");
                }

                else if ($quest_type==3){
                    $question = $_POST['quest_sl2'.$y];
                    $right = $_POST['radio4'.$y];
                    $points = $_POST['points_sl2'.$y];

                    mysql_query("INSERT INTO sosto_lathos (lesson, question, right_answer, points, team)
                        VALUES ('".$lesson."', '".$question."', '".$right."', '".$points."', 2)");
                }
            }
            
            for($z=1;$z<=$quest_numb;$z++){
                $quest_type = $_POST['quest_type3'.$z];

                if($quest_type==1){
                    $question = $_POST['quest_arithm_apotel3'.$z];
                    $right = $_POST['right_arithm_apotel3'.$z];
                    $points = $_POST['points_arithm_apotel3'.$z];

                    mysql_query("INSERT INTO arithm_apotel (lesson, question, right_answer, points, team)
                        VALUES ('".$lesson."', '".$question."', '".$right."', '".$points."', 3)");
                }

                else if($quest_type==2){
                    $question = $_POST['quest_pollaplis3'.$z];
                    $answer1 = $_POST['answer9'.$z];
                    $answer2 = $_POST['answer10'.$z];
                    $answer3 = $_POST['answer11'.$z];
                    $answer4 = $_POST['answer12'.$z];
                    $right = $_POST['radio5'.$z];
                    $points = $_POST['points_pollaplis3'.$z];

                    mysql_query("INSERT INTO pollaplis (lesson, question, answer1, answer2, answer3, answer4, right_answer, points, team)
                        VALUES ('".$lesson."', '".$question."', '".$answer1."', '".$answer2."', '".$answer3."', '".$answer4."', '".$right."', '".$points."', 3)");
                }

                else if ($quest_type==3){
                    $question = $_POST['quest_sl3'.$z];
                    $right = $_POST['radio6'.$z];
                    $points = $_POST['points_sl3'.$z];

                    mysql_query("INSERT INTO sosto_lathos (lesson, question, right_answer, points, team)
                        VALUES ('".$lesson."', '".$question."', '".$right."', '".$points."', 3)");
                }
            }

            for($w=1;$w<=$quest_numb;$w++){
                $quest_type = $_POST['quest_type4'.$w];

                if($quest_type==1){
                    $question = $_POST['quest_arithm_apotel4'.$w];
                    $right = $_POST['right_arithm_apotel4'.$w];
                    $points = $_POST['points_arithm_apotel4'.$w];

                    mysql_query("INSERT INTO arithm_apotel (lesson, question, right_answer, points, team)
                        VALUES ('".$lesson."', '".$question."', '".$right."', '".$points."', 4)");
                }

                else if($quest_type==2){
                    $question = $_POST['quest_pollaplis4'.$w];
                    $answer1 = $_POST['answer13'.$w];
                    $answer2 = $_POST['answer14'.$w];
                    $answer3 = $_POST['answer15'.$w];
                    $answer4 = $_POST['answer16'.$w];
                    $right = $_POST['radio7'.$w];
                    $points = $_POST['points_pollaplis4'.$w];

                    mysql_query("INSERT INTO pollaplis (lesson, question, answer1, answer2, answer3, answer4, right_answer, points, team)
                        VALUES ('".$lesson."', '".$question."', '".$answer1."', '".$answer2."', '".$answer3."', '".$answer4."', '".$right."', '".$points."', 4)");
                }

                else if ($quest_type==3){
                    $question = $_POST['quest_sl4'.$w];
                    $right = $_POST['radio8'.$w];
                    $points = $_POST['points_sl4'.$w];

                    mysql_query("INSERT INTO sosto_lathos (lesson, question, right_answer, points, team)
                        VALUES ('".$lesson."', '".$question."', '".$right."', '".$points."', 4)");
                }
            }            
        }

    echo "Τα θέματα σας ανέβηκαν επιτυχώς";
?>

<br><br><a href="index.php">Πίσω</a>
