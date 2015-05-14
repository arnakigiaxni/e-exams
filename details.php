<?php
    session_start();
    if($_SESSION['success_login']!=1){
        header('Location: login.php');
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <title></title>
    </head>
    <body>
        <button id='logout' onclick="location.href='logout.php'">Αποσύνδεση</button>
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
                    </select>
            <br /><br />
            
            <input type="submit" value="Επόμενο" />
            
        </form> <br /><br />   
        
    </body>
</html>
