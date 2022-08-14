<?php
include('../config/constants.php');

if(isset($_GET['idAngajat'])){

 $idAngajat = $_GET['idAngajat'];


$sql1 = "DELETE FROM angajati WHERE idAngajat =$idAngajat";



$res = mysqli_query($conn,$sql1);
}

if($res==true){
  
$_SESSION['delete-angajati'] = "<div class='success'>Angajat deleted successfully</div>";
    //     //redirect page 
        if( ! headers_sent() ){
            header('location:'.SITEURL.'admin/manage-angajati.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-angajati.php";</script>';
        }
        
        
    }else{
        $_SESSION['delete-angajati'] = "<div class='error'>Angajat not deleted successfully</div>";
        //redirect page
        if( ! headers_sent() ){
             header('location:'.SITEURL.'admin/manage-angajati.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-angajati.php";</script>';
        }

    }
?>