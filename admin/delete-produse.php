<?php
include('../config/constants.php');
//get the id of admin to be deleted 
if(isset($_GET['idProdus']) AND isset($_GET['imgProd']))
{
 $idProdus = $_GET['idProdus'];
$imgProd=$_GET['imgProd'];

  if($imgProd!="")
            {
        //romove image if is aviable. So remove it
        $path = "../Images/categorii/".$imgProd;

        $remove = unlink($path);

        if($remove==false)
                    {
                         $_SESSION['delete-image'] = "<div class='error'>Image not deleted successfully</div>";
                            //redirect page
                            if( ! headers_sent() ){
                                header('location:'.SITEURL.'admin/manage-produse.php');
                            }else{
                                echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-produse";</script>';
                            }
                    die();


                    }
            }

$sql = "DELETE FROM produse WHERE idProdus=$idProdus";

//execute the query 

$res = mysqli_query($conn,$sql);


//check if the query executed successfully or not

if($res==true){
    //query exescuted successfully and admin deletedd 
// echo "admin Deleted";
//create session variable to display message
$_SESSION['delete-produs'] = "<div class='success'>Produs deleted successfully</div>";
    //     //redirect page 
        if( ! headers_sent() ){
            header('location:'.SITEURL.'admin/manage-produse.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-produse";</script>';
        }
        
        
    }else{
        $_SESSION['delete-produs'] = "<div class='error'>Produs not deleted successfully</div>";
        //redirect page
        if( ! headers_sent() ){
             header('location:'.SITEURL.'admin/manage-produse.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-produse";</script>';
        }

    }
    }else
{
     $_SESSION['delete-image'] = "<div class='error'>Image not deleted successfully</div>";
        //redirect page
        if( ! headers_sent() ){
             header('location:'.SITEURL.'admin/manage-produse.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-produse";</script>';
        }

}
?>