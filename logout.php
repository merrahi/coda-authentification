<?php

    session_start();
    if(isset ($_SESSION['user'])) {
        unset($_SESSION['user']);
        
    }

    if(isset($_COOKIE['userCookie'])) {
        unset($_COOKIE['userCookie']);
        
    }

    header('location: login.php');

    ?>