<?php
    error_reporting(0);
    session_start();
    if($_SESSION['success_login']!=1){
        header('Location: login.php');
    }
?>

<html>
    <head>
        <title>Προεπιλογές θεμάτων</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="shortcut icon" href="images/favicon.ico"/>
        <title></title>
    </head>
    <body>
        <div id="details">
            <form method="post" action='questions.php'>
                Αριθμός ερωτήσεων: <input type="text" maxlength="2" name="questions_number" size="3" autocomplete="off"/> 
                <br /><br />
                Χρόνος εξέτασης: <input type="text" maxlength="3" name="time" size="4" autocomplete="off"/> σε λεπτά της ώρας
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

                <center><a href="index.php" class="back">Πίσω</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" value="Επόμενο" /></center>

            </form>
        </div>
    </body>
</html>
