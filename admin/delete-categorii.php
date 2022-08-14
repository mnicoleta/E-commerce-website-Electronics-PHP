<?php
include('../config/constants.php');
if(isset($_GET['idCategorie']) AND isset($_GET['numeImagine']))
{
 $idCategorie = $_GET['idCategorie'];
$numeImagine=$_GET['numeImagine'];

  if($numeImagine!="")
            {
        //romove image if is aviable. So remove it
        $path = "../Images/categorii/".$numeImagine;

        $remove = unlink($path);

        if($remove==false)
                    {
                         $_SESSION['failed-remove'] = "<div class='error'>Image not deleted successfully</div>";
                            //redirect page
                            if( ! headers_sent() ){
                                header('location:'.SITEURL.'admin/manage-categorii.php');
                            }else{
                                echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-categorii";</script>';
                            }
                    die();


                    }
            }

$sql = "DELETE FROM categorii WHERE idCategorie=$idCategorie";

//execute the query 

$res = mysqli_query($conn,$sql);


//check if the query executed successfully or not

if($res==true){
    //query exescuted successfully and admin deletedd 
// echo "admin Deleted";
//create session variable to display message
$_SESSION['delete-categorie'] = "<div class='success'>Produs deleted successfully</div>";
    //     //redirect page 
        if( ! headers_sent() ){
            header('location:'.SITEURL.'admin/manage-categorii.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-categorii";</script>';
        }
        
        
    }else{
        $_SESSION['delete-categorie'] = "<div class='error'>Produs not deleted successfully</div>";
        //redirect page
        if( ! headers_sent() ){
             header('location:'.SITEURL.'admin/manage-categorii.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-categorii";</script>';
        }

    }
    }else
{
     $_SESSION['delete-image'] = "<div class='error'>Image not deleted successfully</div>";
        //redirect page
        if( ! headers_sent() ){
             header('location:'.SITEURL.'admin/manage-categorii.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-categorii";</script>';
        }

}
?>