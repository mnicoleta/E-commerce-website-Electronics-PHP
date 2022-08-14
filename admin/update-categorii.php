<?php
include('partials/navbar.php');
?>
 <div class="main-content pb-4">
            <div class="wrapper">
             
    
             

                    <?php
                    //1. get the id of selected  
                    $idCategorie=$_GET['idCategorie'];

                    //2.create sql query 
                    $sql="SELECT * FROM categorii WHERE idCategorie=$idCategorie";
                    $res=mysqli_query($conn,$sql);

                    //check if the query is executed or not
                    if($res==true){
                        $count= mysqli_num_rows($res);
                        if($count==1)
                        {
                            
                            $row=mysqli_fetch_assoc($res);

                            $numeCategorie=$row['numeCategorie'];
                            $activ=$row['activ'];
                            $imagineCurenta=$row['numeImagine'];


                        }else
                        {
                             if( ! headers_sent() ){
                                        header('location:'.SITEURL.'admin/manage-categorii.php');
                                    }else{
                                        echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-categorii";</script>';
                                    }
                        }

                    }

                                
                    ?>
<br><br>
                <form action="" method="POST" enctype="multipart/form-data" class="bg-light mb-4 py-4 pt-1" style="padding-left:1rem; margin-left:4px; box-shadow: 0 4px 8px 10px rgba(158, 201, 236, 0.874), 0 6px 20px 0 rgba(255, 241, 241, 0.951);" >
                    <table class="tbl-45 my-3">
                                    <h1 style="text-align:center">Update Categorie</h1>
                                    <hr>
                         <tr>
                            <td style="font-weight:bold; color:grey"> Titulu categorie:</td>
                            <td><input type="text" name="numeCategorie" value="<?php echo $numeCategorie; ?>" placeholder="Denumire"></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold; color:grey">Imagine Curenta:</td>
                            <td>
                                <?php
                                    if($imagineCurenta!=""){
                                        ?>
                                        <img src="<?php echo SITEURL; ?>Images/categorii/<?php echo $imagineCurenta ?>" width="100px" >

                                        <!-- //display curent image -->
                                 <?php


                                        }else{

                                            echo "<div class='error'>Image Not Add</div>";
                                        }
                   ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold; color:grey">Noua Imagine:</td>
                            <td><input type="file" name="numeImagine"></td>
                        </tr>
                         <tr>
                            <td style="font-weight:bold; color:grey">In Stoc:</td>
                            <td><input <?php if($activ=="Activ"){echo "checked";}  ?> type="radio" name="activ" value="Activ">Activ
                                <input <?php if($activ=="Inactiv"){echo "checked";}  ?> type="radio" name="activ" value="Inactiv">Inactiv
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="pb-4" >
                                <!-- <input type="hidden" name="imagineCurenta" value=""> -->
                                <input type="hidden" name="idCategorie" value="<?php echo $idCategorie;  ?>"  ><br>
                                
                            <input type="submit" name="submit" value="Update Categorii" class="btn-primary" style="cursor: pointer;">
                            </td>
                        </tr>
                        <a href="manage-categorii.php" class="btn btn-primary px-4 py-1 mx-4 my-4" style="float:right"><i class="fa fa-undo" aria-hidden="true"></i></a>
                    </table>
                </form>
            </div>
        </div>
<?php

//check if submit button is clicked or not
if(isset($_POST['submit']))
{
    // echo "clicked";
    $idCategorie=$_POST['idCategorie'];
    $numeCategorie=$_POST['numeCategorie'];
    $imagineCurenta=$_POST['imagineCurenta'];
    $activ=$_POST['activ'];

 if(isset($_FILES['numeImagine']['name'])){
        //get the details of image
        $numeImagine= $_FILES['numeImagine']['name'];

        //verifica daca imaginea este selectata sau nu 
        if($numeImagine!=""){
          
                $ext = end(explode('.',$numeImagine));

                //rename the image

                $numeImagine = "produsCategorie".rand(000, 999).'.'.$ext;


               $source_path =$_FILES['numeImagine']['tmp_name'];
               $destination_path = "../Images/categorii/".$numeImagine;

               //finally upload the image
               $upload = move_uploaded_file($source_path,$destination_path);

              if($upload==false)
              {
                 $_SESSION['upload']= "<div class='error'>Incarcarea imaginii nu a reusit</div>";
                  
                  if( ! headers_sent() )
                  {
                        header('location:'.SITEURL.'admin/manage-categorii.php');
                            }else{
                                echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-categorii.php";</script>';
                            }
                  //stop the procces;
                  die();

              }
            //B. remove the curent image if available
            if($imagineCurenta!="")
            {
                $remove_path= "../Images/categorii/".$imagineCurenta;
                $remove = unlink($remove_path);
    
               
                if($remove==false)
                {
                    //failed to remove image 
                    $_SESSION['failed-remove'] = "<div class='error'>Stergerea imaginii nu a reusit</div>";
                    if( ! headers_sent() )
                    {
                        header('location:'.SITEURL.'admin/manage-categorii.php');
                            }else
                            {
                                echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-categorii.php";</script>';
                            }
                  //stop the procces;
                  die();
                }
            }
        }else
        {
            $imagineCurenta=$numeImagine;
        }

    }else
    {
         $imagineCurenta=$numeImagine;
    }




    $sql2="UPDATE categorii SET
    numeCategorie='$numeCategorie',
    numeImagine='$numeImagine',
    activ='$activ'
    WHERE idCategorie='$idCategorie'
    ";

    $res2= mysqli_query($conn,$sql2);
    if($res2==true)
    {
        $_SESSION['update-categorie'] = "<div class='success'>Categoria a fost modificata cu success</div>";

        if( ! headers_sent() ){
            header('location:'.SITEURL.'admin/manage-categorii.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-categorii.php";</script>';
        }

    }else
    {
         $_SESSION['update-categorie'] = "<div class='error'>Categoria nu a fost modificata cu success.</div>";

        if( ! headers_sent() ){
             header('location:'.SITEURL.'admin/manage-categorii.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-categorii.php";</script>';
        }
}
}
?>





<?php
include('partials/footer.php');
?>