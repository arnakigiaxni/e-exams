<html>
    <head>
        <meta charset="UTF-8">
    </head>
    
    <body><div id="login">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
            Όνομα χρήστη: <input type="text" name="username" /><br /><br />
            Κωδικός: <input type="password" name="password" /><br /><br />
                  
            
            <?php
                error_reporting(0);
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    
                    if($username=='admin' && $password=='g0mug0mun0'){
                        session_start();
                        $_SESSION['success_login'] = 1;    
                        header('Location: index.php');
                    }
                    else {
                        echo "Λάθος όνομα χρήστη ή κωδικός <br /><br />";
                    }
                }
            
            ?>
            
            <input type="submit" value="Σύνδεση" />
        </form></div>
    </body>
</html>

