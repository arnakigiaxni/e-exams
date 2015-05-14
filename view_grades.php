<?php
    include_once "db_connect.php";
    mysql_query("SET NAMES utf8");

    session_start();
    if($_SESSION['success_login']!=1){
        header('Location: login.php');
    }
?>

<head>
    <meta charset="UTF-8">
</head>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
    Αναζήτηση μέσω μαθήματος: <select name="lesson" >
                <option value='' selected disabled hidden></option>
                <option value='1'>Προγραμματισμός Ι</option>
                <option value='2'>Προγραμματισμός ΙΙ</option>
                <option value='3'>Αριθμητικές μέθοδοι</option>
                <option value='4'>Γραμμικός προγραμματισμός</option>
    </select><br><br>
    Αναζήτηση μέσω AEM: <input type="text" name="aem" maxlength="5" size="1" />
    <br /><br />
    
    <a href="index.php">Πίσω</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" value="Δες τις βαθμολογίες" />
</form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if (empty($_POST['lesson']) && empty($_POST['aem'])){
            echo "Παρακαλώ επιλέξτε μάθημα ή δώστε ΑΕΜ";
        }
        else if (isset($_POST['lesson']) && empty($_POST['aem'])){
        
            $lesson = $_POST['lesson'];

            $grades = mysql_query("SELECT * FROM vathmologies where lesson=$lesson");

                echo"<table border=1>
                    <tr>
                        <th>Μάθημα</th>
                        <th>ΑΕΜ</th>
                        <th>Βαθμός</th>
                        <th>Κατάσταση</th>
                    </tr>";

                    while($grade_row=mysql_fetch_array($grades)) {
                        if($grade_row["lesson"]==1){
                            $lesson = 'Προγραμματισμός Ι';
                        }
                        else if($grade_row["lesson"]==2){
                            $lesson = 'Προγραμματισμός ΙΙ';
                        }
                        else if($grade_row["lesson"]==3){
                            $lesson = 'Αριθμητικές μέθοδοι';
                        }
                        else {
                            $lesson = 'Γραμμικός προγραμματισμός';
                        }
                            
                        echo"<tr>
                            <td>$lesson</td>
                            <td>".$grade_row["aem"]."</td>
                            <td>".$grade_row["grade"]."</td>
                            <td>".$grade_row["status"]."</td>
                        </tr>";
                    }
                echo"</table><br><br>";
        }
        
        else if (empty($_POST['lesson']) && isset($_POST['aem'])){
            
            $aem = $_POST['aem'];

            $grades = mysql_query("SELECT * FROM vathmologies where aem=$aem");

                echo"<table border=1>
                    <tr>
                        <th>Μάθημα</th>
                        <th>ΑΕΜ</th>
                        <th>Βαθμός</th>
                        <th>Κατάσταση</th>
                    </tr>";

                    while($grade_row=mysql_fetch_array($grades)) {
                        if($grade_row["lesson"]==1){
                            $lesson = 'Προγραμματισμός Ι';
                        }
                        else if($grade_row["lesson"]==2){
                            $lesson = 'Προγραμματισμός ΙΙ';
                        }
                        else if($grade_row["lesson"]==3){
                            $lesson = 'Αριθμητικές μέθοδοι';
                        }
                        else {
                            $lesson = 'Γραμμικός προγραμματισμός';
                        }
                            
                        echo"<tr>
                            <td>$lesson</td>
                            <td>".$grade_row["aem"]."</td>
                            <td>".$grade_row["grade"]."</td>
                            <td>".$grade_row["status"]."</td>
                        </tr>";
                    }
                echo"</table><br><br>";
        }
        
        else {
            $aem = $_POST['aem'];
            $lesson = $_POST['lesson'];

            $grades = mysql_query("SELECT * FROM vathmologies where aem=$aem && lesson=$lesson");

                echo"<table border=1>
                    <tr>
                        <th>Μάθημα</th>
                        <th>ΑΕΜ</th>
                        <th>Βαθμός</th>
                        <th>Κατάσταση</th>
                    </tr>";

                    while($grade_row=mysql_fetch_array($grades)) {
                        if($grade_row["lesson"]==1){
                            $lesson = 'Προγραμματισμός Ι';
                        }
                        else if($grade_row["lesson"]==2){
                            $lesson = 'Προγραμματισμός ΙΙ';
                        }
                        else if($grade_row["lesson"]==3){
                            $lesson = 'Αριθμητικές μέθοδοι';
                        }
                        else {
                            $lesson = 'Γραμμικός προγραμματισμός';
                        }
                            
                        echo"<tr>
                            <td>$lesson</td>
                            <td>".$grade_row["aem"]."</td>
                            <td>".$grade_row["grade"]."</td>
                            <td>".$grade_row["status"]."</td>
                        </tr>";
                    }
                echo"</table><br><br>";
        }
    }
    
?>
