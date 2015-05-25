<?php
    include_once "db_connect.php";
    error_reporting(0);

    session_start();
    if($_SESSION['success_login']!=1){
        header('Location: login.php');
    }    
?>

<head>
    <title>Καθάρισμα βάσης βαθμολογιών</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="shortcut icon" href="images/favicon.ico"/>
</head>
    
<div class="center">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
        Μάθημα: <select name="lesson" >
                    <option value='' selected disabled hidden></option>
                    <option value='1'>Προγραμματισμός Ι</option>
                    <option value='2'>Προγραμματισμός ΙΙ</option>
                    <option value='3'>Αριθμητικές μέθοδοι</option>
                    <option value='4'>Γραμμικός προγραμματισμός</option>
                </select>
        <br /><br />

        <a href="index.php" class="back">Πίσω</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" value="Καθάρισμα" />

    </form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if (empty($_POST['lesson'])){
            echo "Παρακαλώ επιλέξτε μάθημα";
        }
        else {
            $lesson = $_POST['lesson'];

            mysql_query("DELETE FROM vathmologies WHERE lesson=$lesson");
            
            if (mysql_affected_rows()>=1){
                    echo "Επιτυχής καθαρισμός";
            }
            else {
                echo"Δεν υπάρχει τίποτα προς διαγραφή";
            }
            
        }
    }
?>
</div>