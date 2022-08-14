<?php
include('../config/constants.php');
//get the id of admin to be deleted 

 $idFurnizor = $_GET['idFurnizor'];
$sql = "DELETE FROM furnizori WHERE idFurnizor=$idFurnizor";

//execute the query 

$res = mysqli_query($conn,$sql);


//check if the query executed successfully or not

if($res==true){
    //query exescuted successfully and admin deletedd 
// echo "admin Deleted";
//create session variable to display message
$_SESSION['delete-furnizor'] = "<div class='success'>Furnizor deleted successfully</div>";
    //     //redirect page 
        if( ! headers_sent() ){
            header('location:'.SITEURL.'admin/manage-furnizor.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-furnizor";</script>';
        }
        
        
    }else{
        $_SESSION['delete-furnizor'] = "<div class='error'>Furnizor not deleted successfully</div>";
        //redirect page
        if( ! headers_sent() ){
             header('location:'.SITEURL.'admin/manage-furnizor.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-furnizor";</script>';
        }

    }
?>