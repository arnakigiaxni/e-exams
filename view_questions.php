<?php
    include_once "db_connect.php";
    mysql_query("SET NAMES utf8");
    error_reporting(0);

    session_start();
    if($_SESSION['success_login']!=1){
        header('Location: login.php');
    }
?>

<head>
    <title>Προεπισκόπηση θεμάτων</title>
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

        <a href="index.php">Πίσω</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" value="Προεπισκόπηση" />
    </form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if (empty($_POST['lesson'])){
            echo "Παρακαλώ επιλέξτε μάθημα";
        }
        else {
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

           $time = mysql_query("SELECT time FROM xronos where lesson=$lesson");
           while($time_row=mysql_fetch_array($time)) {
               echo "<center>Χρόνος εξέτασης:<b> ".$time_row["time"]." λεπτά<br></b>";
           }
            echo"Μάθημα: <b> $lesson2 </center></b></br /><br />";
            
            $questions3 = mysql_query("SELECT * FROM sosto_lathos where lesson=$lesson");

            if (mysql_num_rows($questions3)==0){     
            }
            else {
                echo"<table border=1>
                        <tr>
                            <th>Τύπος Ερώτησης</th>
                            <th>Ερώτηση</th>
                            <th>Σωστή απάντηση (Σ=1 Λ=2)</th>
                            <th>Μονάδες</th>
                            <th>Ομάδα</th>
                        </tr>";

                    while($question3_row=mysql_fetch_array($questions3)) {
                        echo"<tr>
                                <td>Σωστό - Λάθος</td>
                                <td>".$question3_row["question"]."</td>
                                <td>".$question3_row["right_answer"]."</td>
                                <td>".$question3_row["points"]."</td>
                                <td>".$question3_row["team"]."</td>
                            </tr>";
                    }     
                    echo"</table><br><br>";    
            }


            $questions2 = mysql_query("SELECT * FROM pollaplis where lesson=$lesson");

            if (mysql_num_rows($questions2)==0){
            }
            else {
                echo"<table border=1>
                        <tr>
                            <th>Τύπος Ερώτησης</th>
                            <th>Ερώτηση</th>
                            <th>Απάντηση 1</th>
                            <th>Απάντηση 2</th>
                            <th>Απάντηση 3</th>
                            <th>Απάντηση 4</th>
                            <th>Σωστή απάντηση</th>
                            <th>Μονάδες</th>
                            <th>Ομάδα</th>
                        </tr>";

                    while($question2_row=mysql_fetch_array($questions2)) {
                        echo"<tr>
                                <td>Πολλαπλής επιλογής</td>
                                <td>".$question2_row["question"]."</td>
                                <td>".$question2_row["answer1"]."</td>
                                <td>".$question2_row["answer2"]."</td>
                                <td>".$question2_row["answer3"]."</td>
                                <td>".$question2_row["answer4"]."</td>
                                <td>".$question2_row["right_answer"]."</td>
                                <td>".$question2_row["points"]."</td>
                                <td>".$question2_row["team"]."</td>
                            </tr>";
                    }     
                    echo"</table><br><br>";
            }

            $questions1 = mysql_query("SELECT * FROM arithm_apotel where lesson=$lesson");

            if (mysql_num_rows($questions1)==0){
            }
            else {
                echo"<table border=1>
                        <tr>
                            <th>Τύπος Ερώτησης</th>
                            <th>Ερώτηση</th>
                            <th>Σωστή απάντηση</th>
                            <th>Μονάδες</th>
                            <th>Ομάδα</th>
                        </tr>";

                    while($question1_row=mysql_fetch_array($questions1)) {
                        echo"<tr>
                                <td>Αριθμητικού αποτελέσματος</td>
                                <td>".$question1_row["question"]."</td>
                                <td>".$question1_row["right_answer"]."</td>
                                <td>".$question1_row["points"]."</td>
                                <td>".$question1_row["team"]."</td>
                            </tr>";
                    }
                    echo"</table><br><br>";
            }
            
            if (mysql_num_rows($questions3)==0 && mysql_num_rows($questions2)==0 && mysql_num_rows($questions1)==0){    
                echo"Δεν υπάρχουν καταχωρημένες ερωτήσεις";
            }           
            
        }
    }
?>
</div>