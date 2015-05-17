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
    <link rel="stylesheet" type="text/css" href="css/style.css" /> 
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
    <input type="submit" value="Δες τα αποτελέσματα" />
</form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if (empty($_POST['lesson']) && empty($_POST['aem'])){
            echo "Παρακαλώ επιλέξτε μάθημα ή δώστε ΑΕΜ";
        }
        else if (isset($_POST['lesson']) && empty($_POST['aem'])){
        
            $lesson = $_POST['lesson'];

            $questions1 = mysql_query("SELECT * FROM sosto_lathos_results where lesson=$lesson");
            $questions2 = mysql_query("SELECT * FROM pollaplis_results where lesson=$lesson");
            $questions3 = mysql_query("SELECT * FROM arithm_apotel_results where lesson=$lesson");

            if (mysql_num_rows($questions3)==0 && mysql_num_rows($questions2)==0 && mysql_num_rows($questions1)==0){    
                echo"Δεν υπάρχουν καταχωρημένα αποτελέσματα";
            }
            else {
                echo"<table border=1>
                        <tr>
                            <th>Μάθημα</th>
                            <th>ΑΕΜ</th>
                            <th>Τύπος Ερώτησης</th>
                            <th>Ερώτηση</th>
                            <th>Απάντηση που δόθηκε</th>
                            <th>Σωστή απάντηση</th>
                            <th>Μονάδες</th>
                            <th>Ομάδα</th>
                            <th>Σωστό ή λάθος</th>
                        </tr>";

                    while($question1_row=mysql_fetch_array($questions1)) {
                        
                        if($question1_row["lesson"]==1){
                            $lesson = 'Προγραμματισμός Ι';
                        }
                        else if($question1_row["lesson"]==2){
                            $lesson = 'Προγραμματισμός ΙΙ';
                        }
                        else if($question1_row["lesson"]==3){
                            $lesson = 'Αριθμητικές μέθοδοι';
                        }
                        else {
                            $lesson = 'Γραμμικός προγραμματισμός';
                        }
                        
                        
                        if ($question1_row["succeeded_or_failed"]=='ΣΩΣΤΟ'){
                            echo"<tr id='green'>";
                        }
                        else {
                            echo"<tr id='red'>";
                        }
                            echo"
                                <td>$lesson</td>
                                <td>".$question1_row["aem"]."</td>
                                <td>Σωστό / Λάθος</td>
                                <td>".$question1_row["question"]."</td>
                                <td>".$question1_row["given_answer"]."</td>
                                <td>".$question1_row["right_answer"]."</td>
                                <td>".$question1_row["points"]."</td>
                                <td>".$question1_row["team"]."</td>
                                <td>".$question1_row["succeeded_or_failed"]."</td>
                            </tr>";
                    }


                    while($question2_row=mysql_fetch_array($questions2)) {
                        
                        if($question2_row["lesson"]==1){
                            $lesson = 'Προγραμματισμός Ι';
                        }
                        else if($question2_row["lesson"]==2){
                            $lesson = 'Προγραμματισμός ΙΙ';
                        }
                        else if($question2_row["lesson"]==3){
                            $lesson = 'Αριθμητικές μέθοδοι';
                        }
                        else {
                            $lesson = 'Γραμμικός προγραμματισμός';
                        }
                        
                        
                        if ($question2_row["succeeded_or_failed"]=='ΣΩΣΤΟ'){
                            echo"<tr id='green'>";
                        }
                        else {
                            echo"<tr id='red'>";
                        }
                            echo"
                                <td>$lesson</td>
                                <td>".$question2_row["aem"]."</td>
                                <td>Πολλαπλής επιλογής</td>
                                <td>".$question2_row["question"]."</td>
                                <td>".$question2_row["given_answer"]."</td>
                                <td>".$question2_row["right_answer"]."</td>
                                <td>".$question2_row["points"]."</td>
                                <td>".$question2_row["team"]."</td>
                                <td>".$question2_row["succeeded_or_failed"]."</td>
                            </tr>";
                    }     


                    while($question3_row=mysql_fetch_array($questions3)) {
                        
                        if($question3_row["lesson"]==1){
                            $lesson = 'Προγραμματισμός Ι';
                        }
                        else if($question3_row["lesson"]==2){
                            $lesson = 'Προγραμματισμός ΙΙ';
                        }
                        else if($question3_row["lesson"]==3){
                            $lesson = 'Αριθμητικές μέθοδοι';
                        }
                        else {
                            $lesson = 'Γραμμικός προγραμματισμός';
                        }
                        
                        
                        if ($question3_row["succeeded_or_failed"]=='ΣΩΣΤΟ'){
                            echo"<tr id='green'>";
                        }
                        else {
                            echo"<tr id='red'>";
                        }
                            echo"
                                <td>$lesson</td>
                                <td>".$question3_row["aem"]."</td>
                                <td>Αριθμητικού αποτελέσματος</td>
                                <td>".$question3_row["question"]."</td>
                                <td>".$question3_row["given_answer"]."</td>
                                <td>".$question3_row["right_answer"]."</td>
                                <td>".$question3_row["points"]."</td>
                                <td>".$question3_row["team"]."</td>
                                <td>".$question3_row["succeeded_or_failed"]."</td>
                            </tr>";
                    }     
                    echo"</table><br><br>"; 
            }
        }
        
        else if (empty($_POST['lesson']) && isset($_POST['aem'])){
            
            $aem = $_POST['aem'];

            $questions1 = mysql_query("SELECT * FROM sosto_lathos_results where aem=$aem");
            $questions2 = mysql_query("SELECT * FROM pollaplis_results where aem=$aem");
            $questions3 = mysql_query("SELECT * FROM arithm_apotel_results where aem=$aem");

            if (mysql_num_rows($questions3)==0 && mysql_num_rows($questions2)==0 && mysql_num_rows($questions1)==0){    
                echo"Δεν υπάρχουν καταχωρημένα αποτελέσματα";
            }
            else {
                echo"<table border=1>
                        <tr>
                            <th>Μάθημα</th>
                            <th>ΑΕΜ</th>
                            <th>Τύπος Ερώτησης</th>
                            <th>Ερώτηση</th>
                            <th>Απάντηση που δόθηκε</th>
                            <th>Σωστή απάντηση</th>
                            <th>Μονάδες</th>
                            <th>Ομάδα</th>
                            <th>Σωστό ή λάθος</th>
                        </tr>";

                    while($question1_row=mysql_fetch_array($questions1)) {
                        
                        if($question1_row["lesson"]==1){
                            $lesson = 'Προγραμματισμός Ι';
                        }
                        else if($question1_row["lesson"]==2){
                            $lesson = 'Προγραμματισμός ΙΙ';
                        }
                        else if($question1_row["lesson"]==3){
                            $lesson = 'Αριθμητικές μέθοδοι';
                        }
                        else {
                            $lesson = 'Γραμμικός προγραμματισμός';
                        }
                        
                        
                        if ($question1_row["succeeded_or_failed"]=='ΣΩΣΤΟ'){
                            echo"<tr id='green'>";
                        }
                        else {
                            echo"<tr id='red'>";
                        }
                            echo"
                                <td>$lesson</td>
                                <td>".$question1_row["aem"]."</td>
                                <td>Σωστό / Λάθος</td>
                                <td>".$question1_row["question"]."</td>
                                <td>".$question1_row["given_answer"]."</td>
                                <td>".$question1_row["right_answer"]."</td>
                                <td>".$question1_row["points"]."</td>
                                <td>".$question1_row["team"]."</td>
                                <td>".$question1_row["succeeded_or_failed"]."</td>
                            </tr>";
                    }


                    while($question2_row=mysql_fetch_array($questions2)) {
                        
                        if($question2_row["lesson"]==1){
                            $lesson = 'Προγραμματισμός Ι';
                        }
                        else if($question2_row["lesson"]==2){
                            $lesson = 'Προγραμματισμός ΙΙ';
                        }
                        else if($question2_row["lesson"]==3){
                            $lesson = 'Αριθμητικές μέθοδοι';
                        }
                        else {
                            $lesson = 'Γραμμικός προγραμματισμός';
                        }
                        
                        
                        if ($question2_row["succeeded_or_failed"]=='ΣΩΣΤΟ'){
                            echo"<tr id='green'>";
                        }
                        else {
                            echo"<tr id='red'>";
                        }
                            echo"
                                <td>$lesson</td>
                                <td>".$question2_row["aem"]."</td>
                                <td>Πολλαπλής επιλογής</td>
                                <td>".$question2_row["question"]."</td>
                                <td>".$question2_row["given_answer"]."</td>
                                <td>".$question2_row["right_answer"]."</td>
                                <td>".$question2_row["points"]."</td>
                                <td>".$question2_row["team"]."</td>
                                <td>".$question2_row["succeeded_or_failed"]."</td>
                            </tr>";
                    }     


                    while($question3_row=mysql_fetch_array($questions3)) {
                        
                        if($question3_row["lesson"]==1){
                            $lesson = 'Προγραμματισμός Ι';
                        }
                        else if($question3_row["lesson"]==2){
                            $lesson = 'Προγραμματισμός ΙΙ';
                        }
                        else if($question3_row["lesson"]==3){
                            $lesson = 'Αριθμητικές μέθοδοι';
                        }
                        else {
                            $lesson = 'Γραμμικός προγραμματισμός';
                        }
                        
                        
                        if ($question3_row["succeeded_or_failed"]=='ΣΩΣΤΟ'){
                            echo"<tr id='green'>";
                        }
                        else {
                            echo"<tr id='red'>";
                        }
                            echo"
                                <td>$lesson</td>
                                <td>".$question3_row["aem"]."</td>
                                <td>Αριθμητικού αποτελέσματος</td>
                                <td>".$question3_row["question"]."</td>
                                <td>".$question3_row["given_answer"]."</td>
                                <td>".$question3_row["right_answer"]."</td>
                                <td>".$question3_row["points"]."</td>
                                <td>".$question3_row["team"]."</td>
                                <td>".$question3_row["succeeded_or_failed"]."</td>
                            </tr>";
                    }     
                    echo"</table><br><br>";
            }
            
        }
        
        else {
            
            $lesson = $_POST['lesson'];
            $aem = $_POST['aem'];

            $questions1 = mysql_query("SELECT * FROM sosto_lathos_results where lesson=$lesson && aem=$aem");
            $questions2 = mysql_query("SELECT * FROM pollaplis_results where lesson=$lesson && aem=$aem");
            $questions3 = mysql_query("SELECT * FROM arithm_apotel_results where lesson=$lesson && aem=$aem");

            if (mysql_num_rows($questions3)==0 && mysql_num_rows($questions2)==0 && mysql_num_rows($questions1)==0){    
                echo"Δεν υπάρχουν καταχωρημένα αποτελέσματα";
            }
            else {
                echo"<table border=1>
                        <tr>
                            <th>Μάθημα</th>
                            <th>ΑΕΜ</th>
                            <th>Τύπος Ερώτησης</th>
                            <th>Ερώτηση</th>
                            <th>Απάντηση που δόθηκε</th>
                            <th>Σωστή απάντηση</th>
                            <th>Μονάδες</th>
                            <th>Ομάδα</th>
                            <th>Σωστό ή λάθος</th>
                        </tr>";

                    while($question1_row=mysql_fetch_array($questions1)) {
                        
                        if($question1_row["lesson"]==1){
                            $lesson = 'Προγραμματισμός Ι';
                        }
                        else if($question1_row["lesson"]==2){
                            $lesson = 'Προγραμματισμός ΙΙ';
                        }
                        else if($question1_row["lesson"]==3){
                            $lesson = 'Αριθμητικές μέθοδοι';
                        }
                        else {
                            $lesson = 'Γραμμικός προγραμματισμός';
                        }
                        
                        
                        if ($question1_row["succeeded_or_failed"]=='ΣΩΣΤΟ'){
                            echo"<tr id='green'>";
                        }
                        else {
                            echo"<tr id='red'>";
                        }
                            echo"
                                <td>$lesson</td>
                                <td>".$question1_row["aem"]."</td>
                                <td>Σωστό / Λάθος</td>
                                <td>".$question1_row["question"]."</td>
                                <td>".$question1_row["given_answer"]."</td>
                                <td>".$question1_row["right_answer"]."</td>
                                <td>".$question1_row["points"]."</td>
                                <td>".$question1_row["team"]."</td>
                                <td>".$question1_row["succeeded_or_failed"]."</td>
                            </tr>";
                    }


                    while($question2_row=mysql_fetch_array($questions2)) {
                        
                        if($question2_row["lesson"]==1){
                            $lesson = 'Προγραμματισμός Ι';
                        }
                        else if($question2_row["lesson"]==2){
                            $lesson = 'Προγραμματισμός ΙΙ';
                        }
                        else if($question2_row["lesson"]==3){
                            $lesson = 'Αριθμητικές μέθοδοι';
                        }
                        else {
                            $lesson = 'Γραμμικός προγραμματισμός';
                        }
                        
                        
                        if ($question1_row["succeeded_or_failed"]=='ΣΩΣΤΟ'){
                            echo"<tr id='green'>";
                        }
                        else {
                            echo"<tr id='red'>";
                        }
                            echo"
                                <td>$lesson</td>
                                <td>".$question2_row["aem"]."</td>
                                <td>Πολλαπλής επιλογής</td>
                                <td>".$question2_row["question"]."</td>
                                <td>".$question2_row["given_answer"]."</td>
                                <td>".$question2_row["right_answer"]."</td>
                                <td>".$question2_row["points"]."</td>
                                <td>".$question2_row["team"]."</td>
                                <td>".$question2_row["succeeded_or_failed"]."</td>
                            </tr>";
                    }     


                    while($question3_row=mysql_fetch_array($questions3)) {
                        
                        if($question3_row["lesson"]==1){
                            $lesson = 'Προγραμματισμός Ι';
                        }
                        else if($question3_row["lesson"]==2){
                            $lesson = 'Προγραμματισμός ΙΙ';
                        }
                        else if($question3_row["lesson"]==3){
                            $lesson = 'Αριθμητικές μέθοδοι';
                        }
                        else {
                            $lesson = 'Γραμμικός προγραμματισμός';
                        }
                        
                        
                        if ($question1_row["succeeded_or_failed"]=='ΣΩΣΤΟ'){
                            echo"<tr id='green'>";
                        }
                        else {
                            echo"<tr id='red'>";
                        }
                            echo"
                                <td>$lesson</td>
                                <td>".$question3_row["aem"]."</td>
                                <td>Αριθμητικού αποτελέσματος</td>
                                <td>".$question3_row["question"]."</td>
                                <td>".$question3_row["given_answer"]."</td>
                                <td>".$question3_row["right_answer"]."</td>
                                <td>".$question3_row["points"]."</td>
                                <td>".$question3_row["team"]."</td>
                                <td>".$question3_row["succeeded_or_failed"]."</td>
                            </tr>";
                    }     
                    echo"</table><br><br>";
            }
        }
    }
    
?>
