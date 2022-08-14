<?php
include('../config/constants.php');
//get the id of admin to be deleted 

 $idClient = $_GET['idClient'];
$sql = "DELETE FROM clienti WHERE idClient=$idClient";

//execute the query 

$res = mysqli_query($conn,$sql);




if($res==true){

$_SESSION['delete-client'] = "<div class='success'>Client deleted successfully</div>";
    //     //redirect page 
        if( ! headers_sent() ){
            header('location:'.SITEURL.'admin/manage-client.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-client";</script>';
        }
        
        
    }else{
        $_SESSION['delete-client'] = "<div class='error'>Client not deleted successfully</div>";
        //redirect page
        if( ! headers_sent() ){
             header('location:'.SITEURL.'admin/manage-client.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-client";</script>';
        }

    }
?>