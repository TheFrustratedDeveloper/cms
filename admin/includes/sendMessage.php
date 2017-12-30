<?php 
include "../../includes/db_connect.php";
session_start();
    switch($_REQUEST['action']){
        case "message" : 
            $stmt = mysqli_prepare($connect,"INSERT INTO messages SET username = ? ,message = ?");
            mysqli_stmt_bind_param($stmt,"ss",$_SESSION['username'],$_REQUEST['message']);
            mysqli_stmt_execute($stmt);
        break;
        case "loadMessage" :
            echo "working";
        break;
    }
?>