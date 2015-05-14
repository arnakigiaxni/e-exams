<?php
    session_start();
    unset($_SESSION['success_login']);
    header('Location: login.php');
?>
