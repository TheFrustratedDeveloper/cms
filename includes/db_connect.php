<?php 
    //more secure way of connecting
    $db['db_host'] = "localhost";$db['db_user'] = "root";$db['db_pswrd'] = "";$db['db_name'] = "cms";
    //made an array name db with all values
    foreach($db as $key => $value){
        define(strtoupper($key),$value);
        //transform to uppercase
    } 
    $connect = mysqli_connect(DB_HOST,DB_USER,DB_PSWRD,DB_NAME);
    //localhost,username,password,database_name
?>