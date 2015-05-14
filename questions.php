<?php
    session_start();
    if($_SESSION['success_login']!=1){
        header('Location: login.php');
    }
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <meta charset="UTF-8">
    </head>

    <body>

<?php
       
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
        
        echo"<div><div id='teamA'>";
        echo"<h1>Ομάδα Α</h1>";
        
        echo"<form method='post' action='upload_questions.php'>
                <input type='text' style='visibility:hidden; display:none' name='hidden' value='$questions_number' />
                <input type='text' style='visibility:hidden; display:none' name='hidden3' value='$time' />
                <input type='text' style='visibility:hidden; display:none' name='hidden2' value='$lesson' />";
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
        
       
?>

            <a href="details.php">Πίσω</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" value="Ανέβασμα θεμάτων στη βάση" />
        </form>

    </body>
</html>    