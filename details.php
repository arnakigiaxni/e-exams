<?php
    error_reporting(0);
    session_start();
    if($_SESSION['success_login']!=1){
        header('Location: login.php');
    }
?>

<html>
    <head>
        <title>Προεπιλογές</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <title></title>
    </head>
    <body>
        
        <form method="post" action='questions.php'>
            Αριθμός ερωτήσεων: <input type="text" maxlength="2" name="questions_number" size="1"/> 
            <br /><br />
            Χρόνος εξέτασης: <input type="text" maxlength="3" name="time" size="1"/> σε λεπτά της ώρας
            <br /><br />
            Μάθημα: <select name="lesson" >
                        <option value='' selected disabled hidden></option>
                        <option value='1'>Προγραμματισμός Ι</option>
                        <option value='2'>Προγραμματισμός ΙΙ</option>
                        <option value='3'>Αριθμητικές μέθοδοι</option>
                        <option value='4'>Γραμμικός προγραμματισμός</option>
            </select><br><br>
            Σειρές θεμάτων: <input type="radio" name="teams" value="2" checked/>2
                            <input type="radio" name="teams" value="4" />4
            <br /><br />
            
            <a href="index.php">Πίσω</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" value="Επόμενο" />
            
        </form> <br /><br />   
        
    </body>
</html>
