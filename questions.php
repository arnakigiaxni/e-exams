<?php
    session_start();
    mysql_query("SET NAMES utf8");
    if($_SESSION['success_login']!=1){
        header('Location: login.php');
    }
    error_reporting(0);
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <meta charset="UTF-8">
    </head>

    <body>

<?php
        $teams = $_POST['teams'];
        $questions_number = $_POST['questions_number'];
        $time = $_POST['time'];
        $lesson = $_POST['lesson'];
        
        if ($lesson==1){
            $lesson2='Προγραμματισμός Ι';
        }
        else if ($lesson==2){
            $lesson2='Προγραμματισμός ΙΙ';
        }
        else if ($lesson==3){
            $lesson2='Αριθμητικές μέθοδοι';
        }
        else if ($lesson==4){
            $lesson2='Γραμμικός προγραμματισμός';
        }

        echo"<center>Αριθμός ερωτήσεων: <b> $questions_number </b><br />";
        echo"Χρόνος εξέτασης: <b> $time λεπτά </b><br />";
        echo"Μάθημα: <b> $lesson2 </center></b></br />";
        
        echo"<form method='post' action='upload_questions.php'>";
        
        echo"
            <input type='text' style='visibility:hidden; display:none' name='hidden' value='$questions_number' />
            <input type='text' style='visibility:hidden; display:none' name='hidden3' value='$time' />
            <input type='text' style='visibility:hidden; display:none' name='hidden4' value='$teams' />
            <input type='text' style='visibility:hidden; display:none' name='hidden2' value='$lesson' />";
        
        if($teams==2){
            
        
                echo"<div><div id='teamA'>";
                echo"<h1>Ομάδα Α</h1>";

                
                for($i=1;$i<=$questions_number;$i++){
                    echo"<b>Ερώτηση $i </b> - Τύπος ερώτησης: 

                            <select id='question_type$i' name='quest_type$i' onchange='myFunction$i()'>
                                <option value='' selected disabled hidden></option>
                                <option value='1'>Αριθμητικού αποτελέσματος</option>
                                <option value='2'>Πολλαπλής επιλογής</option>
                                <option value='3'>Σωστό / Λάθος</option>
                            </select><br /><br />


                        <div id='div1$i' style='visibility:hidden; display:none'>
                            <textarea  rows='4' cols='65' name='quest_arithm_apotel$i' placeholder='Ερώτηση...'></textarea><br /><br />
                            <input type='text' name='right_arithm_apotel$i' placeholder='Σωστή απάντηση;'/><br /><br />
                            <input type='text' name='points_arithm_apotel$i' placeholder='Μονάδες (0-100)' /><br />
                        </div>  

                         <div id='div2$i' style='visibility:hidden; display:none'>
                            <textarea rows='4' cols='65' name='quest_pollaplis$i' placeholder='Ερώτηση...'></textarea><br /><br />
                            <input type='radio' name='radio1$i' value='1'/><textarea rows='2' name='answer1$i' cols='55' placeholder='Γράψτε τις πιθανές απαντήσεις και επιλέξτε τη σωστή'></textarea><br> 
                            <input type='radio' name='radio1$i' value='2'/><textarea rows='2' name='answer2$i' cols='55'></textarea><br>
                            <input type='radio' name='radio1$i' value='3'/><textarea rows='2' name='answer3$i' cols='55'></textarea><br>
                            <input type='radio' name='radio1$i' value='4'/><textarea rows='2' name='answer4$i' cols='55'></textarea><br><br />
                            <input type='text' name='points_pollaplis$i' placeholder='Μονάδες (0-100)' /><br />
                         </div>


                         <div id='div3$i' style='visibility:hidden; display:none'>
                             <textarea rows='4' cols='65' name='quest_sl$i' placeholder='Γράψτε την ερώτηση σας και επιλέξτε τη σωστή απάντηση'></textarea><br /><br />
                             <input type='radio' name='radio2$i' value='1'/>Σωστό<br>
                             <input type='radio' name='radio2$i' value='2'/>Λάθος<br><br>
                             <input type='text' name='points_sl$i' placeholder='Μονάδες (0-100)' /><br />
                         </div>

                        <script>
                            function myFunction$i() { 
                                var x = document.getElementById('question_type$i').value;

                                if(x==1){
                                    document.getElementById('div1$i').style.visibility = 'visible';
                                    document.getElementById('div1$i').style.display = 'inline';

                                    document.getElementById('div2$i').style.visibility = 'hidden';
                                    document.getElementById('div2$i').style.display = 'none';

                                    document.getElementById('div3$i').style.visibility = 'hidden';
                                    document.getElementById('div3$i').style.display = 'none';
                                }
                                else if(x==2){
                                    document.getElementById('div2$i').style.visibility = 'visible';
                                    document.getElementById('div2$i').style.display = 'inline';

                                    document.getElementById('div1$i').style.visibility = 'hidden';
                                    document.getElementById('div1$i').style.display = 'none';  

                                    document.getElementById('div3$i').style.visibility = 'hidden';
                                    document.getElementById('div3$i').style.display = 'none';
                                }
                                else{
                                    document.getElementById('div3$i').style.visibility = 'visible';
                                    document.getElementById('div3$i').style.display = 'inline';

                                    document.getElementById('div2$i').style.visibility = 'hidden';
                                    document.getElementById('div2$i').style.display = 'none';

                                    document.getElementById('div1$i').style.visibility = 'hidden';
                                    document.getElementById('div1$i').style.display = 'none';                        
                                }
                            }
                        </script>";
                    echo"<br /><br />";
                }
                echo"</div>";

                echo"<div id='teamB'>";
                echo"<h1>Ομάδα Β</h1>";

                for($j=1;$j<=$questions_number;$j++){
                    echo"<b>Ερώτηση $j </b> - Τύπος ερώτησης: 

                            <select id='question_type2$j' name='quest_type2$j' onchange='myFunction2$j()'>
                                <option value='' selected disabled hidden></option>
                                <option value='1'>Αριθμητικού αποτελέσματος</option>
                                <option value='2'>Πολλαπλής επιλογής</option>
                                <option value='3'>Σωστό / Λάθος</option>
                            </select><br /><br />


                        <div id='div4$j' style='visibility:hidden; display:none'>
                            <textarea  rows='4' cols='65' name='quest_arithm_apotel2$j' placeholder='Ερώτηση...'></textarea><br /><br />
                            <input type='text' name='right_arithm_apotel2$j' placeholder='Σωστή απάντηση;'/><br /><br>
                            <input type='text' name='points_arithm_apotel2$j' placeholder='Μονάδες (0-100)' /><br />
                        </div>  

                         <div id='div5$j' style='visibility:hidden; display:none'>
                            <textarea rows='4' cols='65' name='quest_pollaplis2$j' placeholder='Ερώτηση...'></textarea><br /><br />
                            <input type='radio' name='radio3$j' value='1'/><textarea rows='2' name='answer5$j' cols='55' placeholder='Γράψτε τις πιθανές απαντήσεις και επιλέξτε τη σωστή'></textarea><br> 
                            <input type='radio' name='radio3$j' value='2'/><textarea rows='2' name='answer6$j' cols='55'></textarea><br>
                            <input type='radio' name='radio3$j' value='3'/><textarea rows='2' name='answer7$j' cols='55'></textarea><br>
                            <input type='radio' name='radio3$j' value='4'/><textarea rows='2' name='answer8$j' cols='55'></textarea><br><br>
                            <input type='text' name='points_pollaplis2$j' placeholder='Μονάδες (0-100)' /><br />
                         </div>


                         <div id='div6$j' style='visibility:hidden; display:none'>
                             <textarea rows='4' cols='65' name='quest_sl2$j' placeholder='Γράψτε την ερώτηση σας και επιλέξτε τη σωστή απάντηση'></textarea><br /><br />
                             <input type='radio' name='radio4$j' value='1'/>Σωστό<br>
                             <input type='radio' name='radio4$j' value='2'/>Λάθος</textarea><br><br>
                             <input type='text' name='points_sl2$j' placeholder='Μονάδες (0-100)' /><br />
                         </div>

                        <script>
                            function myFunction2$j() { 
                                var x = document.getElementById('question_type2$j').value;

                                if(x==1){
                                    document.getElementById('div4$j').style.visibility = 'visible';
                                    document.getElementById('div4$j').style.display = 'inline';

                                    document.getElementById('div5$j').style.visibility = 'hidden';
                                    document.getElementById('div5$j').style.display = 'none';

                                    document.getElementById('div6$j').style.visibility = 'hidden';
                                    document.getElementById('div6$j').style.display = 'none';
                                }
                                else if(x==2){
                                    document.getElementById('div5$j').style.visibility = 'visible';
                                    document.getElementById('div5$j').style.display = 'inline';

                                    document.getElementById('div4$j').style.visibility = 'hidden';
                                    document.getElementById('div4$j').style.display = 'none';  

                                    document.getElementById('div6$j').style.visibility = 'hidden';
                                    document.getElementById('div6$j').style.display = 'none';
                                }
                                else{
                                    document.getElementById('div6$j').style.visibility = 'visible';
                                    document.getElementById('div6$j').style.display = 'inline';

                                    document.getElementById('div5$j').style.visibility = 'hidden';
                                    document.getElementById('div5$j').style.display = 'none';

                                    document.getElementById('div4$j').style.visibility = 'hidden';
                                    document.getElementById('div4$j').style.display = 'none';                        
                                }
                            }
                        </script>";
                    echo"<br /><br />";
                }
                    echo"</div><div><br />";     
        
                }   
                else {
                        echo"";
                        echo"<h1>Ομάδα Α</h1>";

                        for($i=1;$i<=$questions_number;$i++){
                            echo"<b>Ερώτηση $i </b> - Τύπος ερώτησης: 

                                    <select id='question_type$i' name='quest_type$i' onchange='myFunction$i()'>
                                        <option value='' selected disabled hidden></option>
                                        <option value='1'>Αριθμητικού αποτελέσματος</option>
                                        <option value='2'>Πολλαπλής επιλογής</option>
                                        <option value='3'>Σωστό / Λάθος</option>
                                    </select><br /><br />


                                <div id='div1$i' style='visibility:hidden; display:none'>
                                    <textarea  rows='4' cols='65' name='quest_arithm_apotel$i' placeholder='Ερώτηση...'></textarea><br /><br />
                                    <input type='text' name='right_arithm_apotel$i' placeholder='Σωστή απάντηση;'/><br /><br />
                                    <input type='text' name='points_arithm_apotel$i' placeholder='Μονάδες (0-100)' /><br />
                                </div>  

                                 <div id='div2$i' style='visibility:hidden; display:none'>
                                    <textarea rows='4' cols='65' name='quest_pollaplis$i' placeholder='Ερώτηση...'></textarea><br /><br />
                                    <input type='radio' name='radio1$i' value='1'/><textarea rows='2' name='answer1$i' cols='55' placeholder='Γράψτε τις πιθανές απαντήσεις και επιλέξτε τη σωστή'></textarea><br> 
                                    <input type='radio' name='radio1$i' value='2'/><textarea rows='2' name='answer2$i' cols='55'></textarea><br>
                                    <input type='radio' name='radio1$i' value='3'/><textarea rows='2' name='answer3$i' cols='55'></textarea><br>
                                    <input type='radio' name='radio1$i' value='4'/><textarea rows='2' name='answer4$i' cols='55'></textarea><br><br />
                                    <input type='text' name='points_pollaplis$i' placeholder='Μονάδες (0-100)' /><br />
                                 </div>


                                 <div id='div3$i' style='visibility:hidden; display:none'>
                                     <textarea rows='4' cols='65' name='quest_sl$i' placeholder='Γράψτε την ερώτηση σας και επιλέξτε τη σωστή απάντηση'></textarea><br /><br />
                                     <input type='radio' name='radio2$i' value='1'/>Σωστό<br>
                                     <input type='radio' name='radio2$i' value='2'/>Λάθος<br><br>
                                     <input type='text' name='points_sl$i' placeholder='Μονάδες (0-100)' /><br />
                                 </div>

                                <script>
                                    function myFunction$i() { 
                                        var x = document.getElementById('question_type$i').value;

                                        if(x==1){
                                            document.getElementById('div1$i').style.visibility = 'visible';
                                            document.getElementById('div1$i').style.display = 'inline';

                                            document.getElementById('div2$i').style.visibility = 'hidden';
                                            document.getElementById('div2$i').style.display = 'none';

                                            document.getElementById('div3$i').style.visibility = 'hidden';
                                            document.getElementById('div3$i').style.display = 'none';
                                        }
                                        else if(x==2){
                                            document.getElementById('div2$i').style.visibility = 'visible';
                                            document.getElementById('div2$i').style.display = 'inline';

                                            document.getElementById('div1$i').style.visibility = 'hidden';
                                            document.getElementById('div1$i').style.display = 'none';  

                                            document.getElementById('div3$i').style.visibility = 'hidden';
                                            document.getElementById('div3$i').style.display = 'none';
                                        }
                                        else{
                                            document.getElementById('div3$i').style.visibility = 'visible';
                                            document.getElementById('div3$i').style.display = 'inline';

                                            document.getElementById('div2$i').style.visibility = 'hidden';
                                            document.getElementById('div2$i').style.display = 'none';

                                            document.getElementById('div1$i').style.visibility = 'hidden';
                                            document.getElementById('div1$i').style.display = 'none';                        
                                        }
                                    }
                                </script>";
                            echo"<br /><br />";
                        }
                        echo"";

                        echo"";
                        echo"<h1>Ομάδα Β</h1>";

                        for($j=1;$j<=$questions_number;$j++){
                            echo"<b>Ερώτηση $j </b> - Τύπος ερώτησης: 

                                    <select id='question_type2$j' name='quest_type2$j' onchange='myFunction2$j()'>
                                        <option value='' selected disabled hidden></option>
                                        <option value='1'>Αριθμητικού αποτελέσματος</option>
                                        <option value='2'>Πολλαπλής επιλογής</option>
                                        <option value='3'>Σωστό / Λάθος</option>
                                    </select><br /><br />


                                <div id='div4$j' style='visibility:hidden; display:none'>
                                    <textarea  rows='4' cols='65' name='quest_arithm_apotel2$j' placeholder='Ερώτηση...'></textarea><br /><br />
                                    <input type='text' name='right_arithm_apotel2$j' placeholder='Σωστή απάντηση;'/><br /><br>
                                    <input type='text' name='points_arithm_apotel2$j' placeholder='Μονάδες (0-100)' /><br />
                                </div>  

                                 <div id='div5$j' style='visibility:hidden; display:none'>
                                    <textarea rows='4' cols='65' name='quest_pollaplis2$j' placeholder='Ερώτηση...'></textarea><br /><br />
                                    <input type='radio' name='radio3$j' value='1'/><textarea rows='2' name='answer5$j' cols='55' placeholder='Γράψτε τις πιθανές απαντήσεις και επιλέξτε τη σωστή'></textarea><br> 
                                    <input type='radio' name='radio3$j' value='2'/><textarea rows='2' name='answer6$j' cols='55'></textarea><br>
                                    <input type='radio' name='radio3$j' value='3'/><textarea rows='2' name='answer7$j' cols='55'></textarea><br>
                                    <input type='radio' name='radio3$j' value='4'/><textarea rows='2' name='answer8$j' cols='55'></textarea><br><br>
                                    <input type='text' name='points_pollaplis2$j' placeholder='Μονάδες (0-100)' /><br />
                                 </div>


                                 <div id='div6$j' style='visibility:hidden; display:none'>
                                     <textarea rows='4' cols='65' name='quest_sl2$j' placeholder='Γράψτε την ερώτηση σας και επιλέξτε τη σωστή απάντηση'></textarea><br /><br />
                                     <input type='radio' name='radio4$j' value='1'/>Σωστό<br>
                                     <input type='radio' name='radio4$j' value='2'/>Λάθος</textarea><br><br>
                                     <input type='text' name='points_sl2$j' placeholder='Μονάδες (0-100)' /><br />
                                 </div>

                                <script>
                                    function myFunction2$j() { 
                                        var x = document.getElementById('question_type2$j').value;

                                        if(x==1){
                                            document.getElementById('div4$j').style.visibility = 'visible';
                                            document.getElementById('div4$j').style.display = 'inline';

                                            document.getElementById('div5$j').style.visibility = 'hidden';
                                            document.getElementById('div5$j').style.display = 'none';

                                            document.getElementById('div6$j').style.visibility = 'hidden';
                                            document.getElementById('div6$j').style.display = 'none';
                                        }
                                        else if(x==2){
                                            document.getElementById('div5$j').style.visibility = 'visible';
                                            document.getElementById('div5$j').style.display = 'inline';

                                            document.getElementById('div4$j').style.visibility = 'hidden';
                                            document.getElementById('div4$j').style.display = 'none';  

                                            document.getElementById('div6$j').style.visibility = 'hidden';
                                            document.getElementById('div6$j').style.display = 'none';
                                        }
                                        else{
                                            document.getElementById('div6$j').style.visibility = 'visible';
                                            document.getElementById('div6$j').style.display = 'inline';

                                            document.getElementById('div5$j').style.visibility = 'hidden';
                                            document.getElementById('div5$j').style.display = 'none';

                                            document.getElementById('div4$j').style.visibility = 'hidden';
                                            document.getElementById('div4$j').style.display = 'none';                        
                                        }
                                    }
                                </script>";
                            echo"<br /><br />";
                        }
                    echo"<br />";

                        echo"";
                        echo"<h1>Ομάδα Γ</h1>";

                        for($x=1;$x<=$questions_number;$x++){
                            echo"<b>Ερώτηση $x </b> - Τύπος ερώτησης: 

                                    <select id='question_type3$x' name='quest_type3$x' onchange='myFunction3$x()'>
                                        <option value='' selected disabled hidden></option>
                                        <option value='1'>Αριθμητικού αποτελέσματος</option>
                                        <option value='2'>Πολλαπλής επιλογής</option>
                                        <option value='3'>Σωστό / Λάθος</option>
                                    </select><br /><br />


                                <div id='div7$x' style='visibility:hidden; display:none'>
                                    <textarea  rows='4' cols='65' name='quest_arithm_apotel3$x' placeholder='Ερώτηση...'></textarea><br /><br />
                                    <input type='text' name='right_arithm_apotel3$x' placeholder='Σωστή απάντηση;'/><br /><br />
                                    <input type='text' name='points_arithm_apotel3$x' placeholder='Μονάδες (0-100)' /><br />
                                </div>  

                                 <div id='div8$x' style='visibility:hidden; display:none'>
                                    <textarea rows='4' cols='65' name='quest_pollaplis3$x' placeholder='Ερώτηση...'></textarea><br /><br />
                                    <input type='radio' name='radio5$x' value='1'/><textarea rows='2' name='answer9$x' cols='55' placeholder='Γράψτε τις πιθανές απαντήσεις και επιλέξτε τη σωστή'></textarea><br> 
                                    <input type='radio' name='radio5$x' value='2'/><textarea rows='2' name='answer10$x' cols='55'></textarea><br>
                                    <input type='radio' name='radio5$x' value='3'/><textarea rows='2' name='answer11$x' cols='55'></textarea><br>
                                    <input type='radio' name='radio5$x' value='4'/><textarea rows='2' name='answer12$x' cols='55'></textarea><br><br />
                                    <input type='text' name='points_pollaplis3$x' placeholder='Μονάδες (0-100)' /><br />
                                 </div>


                                 <div id='div9$x' style='visibility:hidden; display:none'>
                                     <textarea rows='4' cols='65' name='quest_sl3$x' placeholder='Γράψτε την ερώτηση σας και επιλέξτε τη σωστή απάντηση'></textarea><br /><br />
                                     <input type='radio' name='radio6$x' value='1'/>Σωστό<br>
                                     <input type='radio' name='radio6$x' value='2'/>Λάθος<br><br>
                                     <input type='text' name='points_sl3$x' placeholder='Μονάδες (0-100)' /><br />
                                 </div>

                                <script>
                                    function myFunction3$x() { 
                                        var x = document.getElementById('question_type3$x').value;

                                        if(x==1){
                                            document.getElementById('div7$x').style.visibility = 'visible';
                                            document.getElementById('div7$x').style.display = 'inline';

                                            document.getElementById('div8$x').style.visibility = 'hidden';
                                            document.getElementById('div8$x').style.display = 'none';

                                            document.getElementById('div9$x').style.visibility = 'hidden';
                                            document.getElementById('div9$x').style.display = 'none';
                                        }
                                        else if(x==2){
                                            document.getElementById('div8$x').style.visibility = 'visible';
                                            document.getElementById('div8$x').style.display = 'inline';

                                            document.getElementById('div7$x').style.visibility = 'hidden';
                                            document.getElementById('div7$x').style.display = 'none';  

                                            document.getElementById('div9$x').style.visibility = 'hidden';
                                            document.getElementById('div9$x').style.display = 'none';
                                        }
                                        else{
                                            document.getElementById('div9$x').style.visibility = 'visible';
                                            document.getElementById('div9$x').style.display = 'inline';

                                            document.getElementById('div8$x').style.visibility = 'hidden';
                                            document.getElementById('div8$x').style.display = 'none';

                                            document.getElementById('div7$x').style.visibility = 'hidden';
                                            document.getElementById('div7$x').style.display = 'none';                        
                                        }
                                    }
                                </script>";
                            echo"<br /><br />";
                        }
                        echo"";

                        echo"";
                        echo"<h1>Ομάδα Δ</h1>";

                        for($y=1;$y<=$questions_number;$y++){
                            echo"<b>Ερώτηση $y </b> - Τύπος ερώτησης: 

                                    <select id='question_type4$y' name='quest_type4$y' onchange='myFunction4$y()'>
                                        <option value='' selected disabled hidden></option>
                                        <option value='1'>Αριθμητικού αποτελέσματος</option>
                                        <option value='2'>Πολλαπλής επιλογής</option>
                                        <option value='3'>Σωστό / Λάθος</option>
                                    </select><br /><br />


                                <div id='div10$y' style='visibility:hidden; display:none'>
                                    <textarea  rows='4' cols='65' name='quest_arithm_apotel4$y' placeholder='Ερώτηση...'></textarea><br /><br />
                                    <input type='text' name='right_arithm_apotel4$y' placeholder='Σωστή απάντηση;'/><br /><br>
                                    <input type='text' name='points_arithm_apotel4$y' placeholder='Μονάδες (0-100)' /><br />
                                </div>  

                                 <div id='div11$y' style='visibility:hidden; display:none'>
                                    <textarea rows='4' cols='65' name='quest_pollaplis4$y' placeholder='Ερώτηση...'></textarea><br /><br />
                                    <input type='radio' name='radio7$y' value='1'/><textarea rows='2' name='answer13$y' cols='55' placeholder='Γράψτε τις πιθανές απαντήσεις και επιλέξτε τη σωστή'></textarea><br> 
                                    <input type='radio' name='radio7$y' value='2'/><textarea rows='2' name='answer14$y' cols='55'></textarea><br>
                                    <input type='radio' name='radio7$y' value='3'/><textarea rows='2' name='answer15$y' cols='55'></textarea><br>
                                    <input type='radio' name='radio7$y' value='4'/><textarea rows='2' name='answer16$y' cols='55'></textarea><br><br>
                                    <input type='text' name='points_pollaplis4$y' placeholder='Μονάδες (0-100)' /><br />
                                 </div>


                                 <div id='div12$y' style='visibility:hidden; display:none'>
                                     <textarea rows='4' cols='65' name='quest_sl4$y' placeholder='Γράψτε την ερώτηση σας και επιλέξτε τη σωστή απάντηση'></textarea><br /><br />
                                     <input type='radio' name='radio8$y' value='1'/>Σωστό<br>
                                     <input type='radio' name='radio8$y' value='2'/>Λάθος</textarea><br><br>
                                     <input type='text' name='points_sl4$y' placeholder='Μονάδες (0-100)' /><br />
                                 </div>

                                <script>
                                    function myFunction4$y() { 
                                        var x = document.getElementById('question_type4$y').value;

                                        if(x==1){
                                            document.getElementById('div10$y').style.visibility = 'visible';
                                            document.getElementById('div10$y').style.display = 'inline';

                                            document.getElementById('div11$y').style.visibility = 'hidden';
                                            document.getElementById('div11$y').style.display = 'none';

                                            document.getElementById('div12$y').style.visibility = 'hidden';
                                            document.getElementById('div12$y').style.display = 'none';
                                        }
                                        else if(x==2){
                                            document.getElementById('div11$y').style.visibility = 'visible';
                                            document.getElementById('div11$y').style.display = 'inline';

                                            document.getElementById('div10$y').style.visibility = 'hidden';
                                            document.getElementById('div10$y').style.display = 'none';  

                                            document.getElementById('div12$y').style.visibility = 'hidden';
                                            document.getElementById('div12$y').style.display = 'none';
                                        }
                                        else{
                                            document.getElementById('div12$y').style.visibility = 'visible';
                                            document.getElementById('div12$y').style.display = 'inline';

                                            document.getElementById('div11$y').style.visibility = 'hidden';
                                            document.getElementById('div11$y').style.display = 'none';

                                            document.getElementById('div10$y').style.visibility = 'hidden';
                                            document.getElementById('div10$y').style.display = 'none';                        
                                        }
                                    }
                                </script>";
                            echo"<br /><br />";
                        }
                    echo"<br />";            
                }
        
       
?>

            <a href="details.php">Πίσω</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" value="Ανέβασμα θεμάτων στη βάση" />
        </form>

    </body>
</html>    
