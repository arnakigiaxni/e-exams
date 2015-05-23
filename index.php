<?php
    session_start();
    if($_SESSION['success_login']!=1){
        header('Location: login.php');
    }
    error_reporting(0);
?>

<html>
    <head>
        <title>Αρχική</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="shortcut icon" href="images/favicon.ico"/>
    </head>
    
    <body>
        <div id="index">
            <br><a href="details.php">Καταχώρηση θεμάτων</a><br><br>

            <a href="view_questions.php">Προεπισκόπηση θεμάτων</a><br><br>

            <a href="view_results.php">Αποτελέσματα εξετάσεων</a><br><br>

            <a href="view_grades.php">Βαθμολογίες</a><br><br>

            <a href="clear_db_questions.php">Άδεισμα βάσης θεμάτων</a><br><br>

            <a href="clear_db_results.php">Άδεισμα βάσης αποτελεσμάτων</a><br><br>

            <a href="clear_db_grades.php">Άδεισμα βάσης βαθμολογιών</a><br><br>
            
            <button id='logout' onclick="location.href='logout.php'">Αποσύνδεση</button><br><br>
        </div>
    </body>
</html>
