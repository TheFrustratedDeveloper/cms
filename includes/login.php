<?php
    include "db_connect.php";
    include "../admin/includes/functions.php";
    session_start();
?>
<?php
    if(isset($_POST['login'])){
        $username = escape($_POST['username']);
        $password = escape($_POST['password']);
        loginUser($username,$password);
    }
?>
