<?php
session_start(); 
            $_SESSION['username'] = null;
            $_SESSION['first_name'] =  null;
            $_SESSION['last_name'] =  null;
            $_SESSION['role'] =  null;
            $_SESSION['user_id'] =  null;
            header("Location:../index.php");
?>