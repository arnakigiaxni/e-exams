<?php
    include_once "db_connect.php";
    mysql_query("SET NAMES utf8");
    
    error_reporting(0);
?>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <meta charset="utf8" >
    <script src="js/countdown.js" type="text/javascript"></script>
</head>

<div id="diss">    
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >

        ΑΕΜ: <input type="text" maxlength="5" name="aem" size="1"/><br><br>
        Μάθημα: <select name="lesson" >
                    <option value='' selected disabled hidden></option>
                    <option value='1'>Προγραμματισμός Ι</option>
                    <option value='2'>Προγραμματισμός ΙΙ</option>
                    <option value='3'>Αριθμητικές μέθοδοι</option>
                    <option value='4'>Γραμμικός προγραμματισμός</option>
                </select><br><br>

         <input type="submit" value="Επόμενο" />       

    </form>
</div>

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if(empty($_POST['aem']) || empty($_POST['lesson'])){
            echo "Παρακαλώ συμπληρώστε όλα τα πεδία";
        }
        else {            
            $aem = $_POST['aem'];
            $lesson = $_POST['lesson'];
            
            $time = mysql_query("SELECT * FROM xronos WHERE lesson=$lesson");
            
            while($time_row=mysql_fetch_array($time)) {
                $time2 = $time_row["time"];
            }
            
            echo"
                <script>
                    document.getElementById('diss').style.visibility = 'hidden';
                    document.getElementById('diss').style.display = 'none';
                    
                    function startTimer(duration, display) {
                        var timer = duration, minutes, seconds;
                        setInterval(function () {
                            minutes = parseInt(timer / 60, 10);
                            seconds = parseInt(timer % 60, 10);

                            minutes = minutes < 10 ? '0' + minutes : minutes;
                            seconds = seconds < 10 ? '0' + seconds : seconds;

                            display.textContent = minutes + ':' + seconds;

                            if (--timer < 0) {
                                document.getElementById('sub').click();
                            }
                        }, 1000);
                    }

                    window.onload = function () {
                        var Minutes = $time2 * 60,
                            display = document.querySelector('#time');
                        startTimer(Minutes, display);
                    };
                </script>
                ";
            
            $ip2 =  $_SERVER['REMOTE_ADDR'];
            $ip = substr($ip2, -1);
            
            echo"<form method='post' action='results.php' >
                <div><span id='time'></span></div>
                <input type='hidden' value='$aem' name='aem' />
                <input type='hidden' value='$lesson' name='lesson2' />
            ";
            if($ip==1 || $ip==3 || $ip==5 || $ip==7 || $ip==9){
                
                echo"<input type='hidden' value='1' name='team' />";
                $team = 1;
                echo"<h1><center>Ομάδα Α</center></h1>";
            }
            else {
                echo"<input type='hidden' value='2' name='team' />";
                $team = 2;
                echo"<h1><center>Ομάδα Β</center></h1>";
            }
            
                
                $questions1 = mysql_query("SELECT * FROM sosto_lathos where lesson=$lesson && team=$team");
                
                echo "<h2><u>Θέμα 1ο</u></h2>
                        Επιλέξτε τη σωστή απάντηση.<br><br><br>";
                $x=0;
                while($question1_row=mysql_fetch_array($questions1)) {
                    $x++;
                    echo"<b>$x) 
                        ".$question1_row["question"]."</b> (".$question1_row["points"]." μονάδες)<br><br>
                        <input type='radio' value='1' name='radio$x'>Σωστό
                        <input type='radio' value='2' name='radio$x'>Λάθος<br><br><br>
                    ";
                }
                
                
                $questions2 = mysql_query("SELECT * FROM pollaplis where lesson=$lesson && team=$team");
                
                echo "<h2><u>Θέμα 2ο</u></h2>
                        Επιλέξτε τη σωστή απάντηση.<br><br><br>";
                
                $y=0;
                while($question2_row=mysql_fetch_array($questions2)) {
                    $y++;
                    echo"<b>$y)
                        ".$question2_row["question"]."</b> (".$question2_row["points"]." μονάδες)<br><br>
                        <input type='radio' value='1' name='radio2$y'>".$question2_row["answer1"]."<br>
                        <input type='radio' value='2' name='radio2$y'>".$question2_row["answer2"]."<br>
                        <input type='radio' value='3' name='radio2$y'>".$question2_row["answer3"]."<br>
                        <input type='radio' value='4' name='radio2$y'>".$question2_row["answer4"]."<br><br><br>
                    ";
                }
                
                
                $questions3 = mysql_query("SELECT * FROM arithm_apotel where lesson=$lesson && team=$team");
                 
                echo "<h2><u>Θέμα 3ο</u></h2>
                        Γράψτε τη σωστή απάντηση.<br><br><br>";
                
                $z=0;
                while($question3_row=mysql_fetch_array($questions3)) {
                    $z++;
                    echo"<b>$z)
                        ".$question3_row["question"]."</b> (".$question3_row["points"]." μονάδες)<br><br>
                        <input type=text name='given$z' placeholder='Σωστή απάντηση;' /><br><br><br>
                    ";
                }
            }
            
            echo"<input type='submit' value='Τέλος' id='sub'/></form>";
        
        
    }
    
?>

