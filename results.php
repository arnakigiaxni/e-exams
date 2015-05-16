<head>
    <meta charset="UTF-8">
</head>

<?php
    include_once "db_connect.php";
    mysql_query("SET NAMES utf8");
    error_reporting(0);

    $aem = $_POST['aem'];
    $lesson = $_POST['lesson2'];
    $team = $_POST['team'];
    
    $questions1 = mysql_query("SELECT * FROM sosto_lathos where lesson=$lesson && team=$team");
                
        $x=0;
        while($question1_row=mysql_fetch_array($questions1)) {
            $x++;
            
                $question = $question1_row["question"];
                $right = $question1_row["right_answer"];
                $points = $question1_row["points"]; 
            
                $given = $_POST['radio'.$x];
                
                if ($given==$right){
                    $apotel = 'ΣΩΣΤΟ';
                }
                else {
                    $apotel = 'ΛΑΘΟΣ';
                }
                
                mysql_query("INSERT INTO sosto_lathos_results (lesson, question, right_answer, points, team, aem, given_answer, succeeded_or_failed)
                VALUES ('".$lesson."', '".$question."', '".$right."', '".$points."', '".$team."', '".$aem."', '".$given."' , '".$apotel."')");
        }
        
     $questions2 = mysql_query("SELECT * FROM pollaplis where lesson=$lesson && team=$team");
                
        $y=0;
        while($question2_row=mysql_fetch_array($questions2)) {
            $y++;
            
                $question = $question2_row["question"];
                $right = $question2_row["right_answer"];
                $points = $question2_row["points"]; 
            
                $given = $_POST['radio2'.$y];
                
                if ($given==$right){
                    $apotel = 'ΣΩΣΤΟ';
                }
                else {
                    $apotel = 'ΛΑΘΟΣ';
                }
                
                mysql_query("INSERT INTO pollaplis_results (lesson, question, right_answer, points, team, aem, given_answer, succeeded_or_failed)
                VALUES ('".$lesson."', '".$question."', '".$right."', '".$points."', '".$team."', '".$aem."', '".$given."' , '".$apotel."')");
        }    
        
     $questions3 = mysql_query("SELECT * FROM arithm_apotel where lesson=$lesson && team=$team");
                
        $z=0;
        while($question3_row=mysql_fetch_array($questions3)) {
            $z++;
            
                $question = $question3_row["question"];
                $right = $question3_row["right_answer"];
                $points = $question3_row["points"]; 
            
                $given = $_POST['given'.$z];
                
                if ($given==$right){
                    $apotel = 'ΣΩΣΤΟ';
                }
                else {
                    $apotel = 'ΛΑΘΟΣ';
                }                
                
                mysql_query("INSERT INTO arithm_apotel_results (lesson, question, right_answer, points, team, aem, given_answer, succeeded_or_failed)
                VALUES ('".$lesson."', '".$question."', '".$right."', '".$points."', '".$team."', '".$aem."', '".$given."', '".$apotel."' )");
        }         
        
        $sl_apotel = mysql_query("SELECT * FROM sosto_lathos_results WHERE aem=$aem && lesson=$lesson");
        
        $vathm=0;
        while($apot=mysql_fetch_array($sl_apotel)) {
            if($apot["succeeded_or_failed"]=='ΣΩΣΤΟ'){
                $vathm+=$apot['points'];   
            }
        }
 
       $poll_apotel = mysql_query("SELECT * FROM pollaplis_results WHERE aem=$aem && lesson=$lesson");
        
       $vathm2=0;
       while($apot2=mysql_fetch_array($poll_apotel)) {
            if($apot2["succeeded_or_failed"]=='ΣΩΣΤΟ'){
                $vathm2+=$apot2['points'];   
            }
        }
        
       $ar_apotel = mysql_query("SELECT * FROM arithm_apotel_results WHERE aem=$aem && lesson=$lesson");
        
       $vathm3=0;
       while($apot3=mysql_fetch_array($ar_apotel)) {
            if($apot3["succeeded_or_failed"]=='ΣΩΣΤΟ'){
                $vathm3+=$apot3['points'];   
            }
        }
 
                
        $vathm_ol = $vathm+$vathm2+$vathm3;
        $vathm_ol2 = $vathm_ol/10;
        
        if($vathm_ol>=50){
            echo"πέρασες ($vathm_ol2/10)";
            $status = 'ΠΕΡΑΣΕ';
        }
        else {
            echo"κόπηκες ($vathm_ol2/10)";
            $status = 'ΚΟΠΗΚΕ';
        }
        
        mysql_query("INSERT INTO vathmologies (aem, lesson, grade, status)
            VALUES ('".$aem."', '".$lesson."', '".$vathm_ol2."', '".$status."')");
        
?>
