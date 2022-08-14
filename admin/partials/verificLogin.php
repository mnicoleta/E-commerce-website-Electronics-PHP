<?php


if(!isset($_SESSION['user'])){

$_SESSION['no-login-message']= "<div class='error text-center' style='color:red'>Va rog sa va conectati prin acest formular</div>";

header('location:'.SITEURL.'admin/Autentificare.php');


// if(isset($_SESSION['angajat'])){
//     if($rol=="Angajat"){
//         header('location:'.SITEURL.'admin/adauga-comenzi.php');
//     }
// }

}


?>