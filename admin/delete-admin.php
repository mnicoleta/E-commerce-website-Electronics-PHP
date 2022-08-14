<?php
include('../config/constants.php');
//get the id of admin to be deleted 

 $idUser = $_GET['idUser'];
$sql = "DELETE FROM users WHERE idUser=$idUser";

//execute the query 

$res = mysqli_query($conn,$sql);


//check if the query executed successfully or not

if($res==true){
    //query exescuted successfully and admin deletedd 
// echo "admin Deleted";
//create session variable to display message
$_SESSION['delete'] = "<div class='success'>Admin deleted successfully</div>";
    //     //redirect page 
        if( ! headers_sent() ){
            header('location:'.SITEURL.'admin/manage-admin.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-admin";</script>';
        }
        
        
    }else{
        $_SESSION['delete'] = "<div class='error'>Admin not deleted successfully</div>";
        //redirect page
        if( ! headers_sent() ){
             header('location:'.SITEURL.'admin/manage-admin.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-admin";</script>';
        }

    }
?>