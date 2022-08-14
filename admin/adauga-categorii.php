<?php
include('partials/navbar.php');
?>


 <div class="main-content">
            <div class="wrapper">
            

                <?php
                        if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['uploadt']); 
                }   
                       if(isset($_SESSION['add-categorie']))
                {
                    echo $_SESSION['add-categorie'];
                    unset($_SESSION['add-categorie']); 
                }   
                ?>
<br><br>
                <form action="" method="POST" enctype="multipart/form-data" class="bg-light mb-4 py-4 pt-1" style="padding-left:1rem; margin-left:4px; box-shadow: 0 4px 8px 10px rgba(5, 20, 34, 0.874), 0 6px 20px 0 rgba(37, 32, 32, 0.951);" >
                    <table class="tbl-45 rounded">
                            <h1 style="text-align:center">Adauga Categorii de Produse</h1>
                            <hr>
                        <tr>
                            <td> Titulu categorie:</td>
                            <td><input type="text" name="numeCategorie" placeholder="Denumire"></td>
                        </tr>
                         <tr>
                            <td>Selecteaza Imagine:</td>
                            <td><input type="file" name="numeImagine"></td>
                        </tr>
                        <tr>
                            <td>In Stoc: </td>
                            <td><input type="radio" name="activ" value="Activ">Activ
                                <input type="radio" name="activ" value="Inactiv">Inactiv
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                            <input type="submit" name="submit" value="Adauga Categorie" class="btn-primary">
                            </td>
                        </tr>
                        <a href="manage-categorii.php" class="btn btn-primary  px-4 py-2 mx-5" style="float:right"><i class="fa fa-undo" aria-hidden="true"></i></a>
                    </table>
                </form>
            </div>
        </div>  


<?php
if(isset($_POST['submit']))
{
    
                $numeCategorie=$_POST['numeCategorie'];
                

                 if(isset($_FILES['numeImagine']['name']))
                 {
               
               //avem nevoie de o imagine cu nume si sursa path si destinatia path
               $numeImagine = $_FILES['numeImagine']['name'];
               
                //auto rename your image
                //get our extension of our image(jpg,png..)
                $ext = end(explode('.',$numeImagine));

                //rename the image

                $numeImagine = "produsCategorie".rand(000, 999).'.'.$ext;


               $source_path =$_FILES['numeImagine']['tmp_name'];
               $destination_path = "../Images/categorii/".$numeImagine;

               //finally upload the image
               $upload =move_uploaded_file($source_path,$destination_path);
            if($upload==false)
                {
                  $_SESSION['upload']= "<div class='error'>Incarcarea Imaginii A esuat</div>";
                  
                  if( ! headers_sent() ){
                        header('location:'.SITEURL.'admin/adauga-categorii.php');
                            }else{
                                echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/adauga-categorii";</script>';
                            }
                  //stop the procces;
                  die();
                }
                    }else
                    {
               
                               
                                $numeImagine="";
                  }
             $activ=$_POST['activ'];

            

       
    $sql = "INSERT INTO categorii SET
    numeCategorie='$numeCategorie',
    numeImagine='$numeImagine',
    activ='$activ'
    
    ";
    $res = mysqli_query($conn,$sql);

        if($res==TRUE)
        {

        $_SESSION['add-categorie'] = "<div class='alert alert-success' role='alert'>
                                            Categoria de produs a fost adaugata cu succes! </div>";
            //     //redirect page 
                if( ! headers_sent() ){
                    header('location:'.SITEURL.'admin/manage-categorii.php');
                }else{
                    echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-categorii.php";</script>';
                }
                
                
            }else
            {
                $_SESSION['add-categorie'] = "<div class='error'>Categorie not added successfully</div>";
                //redirect page
                if( ! headers_sent() ){
                    header('location:'.SITEURL.'admin/adauga-categorii.php');
                }else{
                    echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/adauga-categorii.php";</script>';
                }

            }
 }

?>



<?php
include('partials/footer.php');
?>