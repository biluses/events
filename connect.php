<?php
$connection = mysqli_connect('localhost', 'root', 'root');
//$connection = mysqli_connect('db415688671.db.1and1.com', 'dbo415688671', 'Yohagopasta13');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'testdb');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}