<?php
// session_start();
try{
    $server = "localhost";
    $database = "snowdb";
    $DBusername = "root";
    $DBpassword = "";
    $dsn = "mysql:host=$server;dbname=$database;charset=utf8";
    
    $connect = new PDO($dsn,$DBusername,$DBpassword);
}
catch(PDOExeption $error)
{
    echo "there is an erorr is connecting";
}
?>