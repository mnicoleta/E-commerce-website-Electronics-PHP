<?php
//Start session
session_start();


define('SITEURL','http://localhost/Management/');
// am creat constante pentru a ma conecta la baza de date
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('PASSWORD','');
define('DB_NAME','licenta');

// $conn= mysqli_connect('localhost','root','','licenta');
 $conn = mysqli_connect(LOCALHOST,DB_USERNAME,PASSWORD) or die(mysqli_error());//conectare baza de date
 $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());//selectare baza de date


?>