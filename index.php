<?php
    session_start();
    if($_SESSION['success_login']!=1){
        header('Location: login.php');
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
    </head>
    
    <body>
        <a href="details.php">Καταχώρηση θεμάτων</a><br><br>
        
        <a href="clear_db_questions.php">Άδεισμα βάσης θεμάτων</a><br><br>
        
        <a href="clear_db_results.php">Άδεισμα βάσης αποτελεσμάτων</a><br><br>
        
        <a href="clear_db_grades.php">Άδεισμα βάσης βαθμολογιών</a><br><br>
        
        <a href="view_grades.php">Βαθμολογίες</a><br><br>
        
        <a href="view_results.php">Δες τα αποτελέσματα</a><br><br>
        
        <a href="view_questions.php">Προεπισκόπηση θεμάτων</a>
    </body>
</html>
