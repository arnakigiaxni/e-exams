<head>
    <meta charset="UTF-8">
</head>

<?php
    include_once 'db_connect.php';
    mysql_query("SET NAMES utf8");
    
    session_start();
    if($_SESSION['success_login']!=1){
        header('Location: login.php');
    }

    
    $quest_numb = $_POST['hidden'];
    $lesson = $_POST['hidden2'];
    $time = $_POST['hidden3'];
    
    mysql_query("UPDATE xronos SET time='".$time."' WHERE lesson=$lesson");
    
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


?>
