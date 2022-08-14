<?php
include('partials/navbar.php');
?>
 <div class="main-content pb-4">
            <div class="wrapper">
               
                    <?php
                        if(isset($_SESSION['update-produs']))
                            {
                                echo $_SESSION['update-produs'];
                                unset($_SESSION['update-produs']);
                            }     


                    ?>
                    <?php
                   
                    $idProdus=$_GET['idProdus'];

                    
                    $sql="SELECT * FROM produse WHERE idProdus=$idProdus";
                    $res=mysqli_query($conn,$sql);

                 
                    if($res==true){
                        $count= mysqli_num_rows($res);
                        if($count==1)
                        {
                            
                            $row=mysqli_fetch_assoc($res);

                          
                            $numeProdus=$row['numeProdus'];
                            $specificatiiProdus=$row['specificatiiProdus'];
                            $UM=$row['UM'];
                            $pretAchizitie=$row['pretAchizitie'];
                            $pretVanzare=$row['pretVanzare'];
                            $activ=$row['activ'];
                            $categorieCurenta =$row['idCategorie'];
                            $dataAchizitie=$row['dataAchizitie'];
                            $cantitateCurenta=$row['cantitateStoc'];
                             $imagineCurenta=$row['imgProd'];
                             

    
                        }else
                        {
                             if( ! headers_sent() ){
                                        header('location:'.SITEURL.'admin/manage-produse.php');
                                    }else{
                                        echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-produse";</script>';
                                    }
                        }

                    }

                                
                    ?>
<br><br>
                <form action="" method="POST" enctype="multipart/form-data" class="bg-light mb-4 py-4 pt-1" style="padding-left:1rem; margin-left:4px; box-shadow: 0 4px 8px 10px rgba(158, 201, 236, 0.874), 0 6px 20px 0 rgba(255, 241, 241, 0.951);" >
                    <table class="tbl-45 mx-4 rounded" >
                           <h1 style="text-align:center">Update Produs</h1>
                           <hr>
                          <tr>
                            <td > Denumire Proodus:</td>
                            <td ><input type="text" name="numeProdus" value="<?php echo $numeProdus; ?>"></td>
                        </tr>
                          <tr>
                            <td>Detalii Produs:</td>
                            <td>
                                <textarea name="specificatiiProdus"  cols="35" rows="3"> <?php echo $specificatiiProdus; ?> </textarea>
                               
                            </td>
                        </tr>
                         <tr>
                            <td >Imagine Curenta:</td>
                            <td>
                                <?php
                                   if($imagineCurenta !="")
                                        {
                                           ?>
                                                    <img src="<?php echo SITEURL; ?>Images/produse/<?php echo $imagineCurenta ?>" width="100px" >
                                            <?php

                                            }else{
                                            
                                                    echo "<div class='error'>Image Not Add</div>";
                                               
                                            }
                                        ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Noua Imagine:</td>
                            <td><input type="file" name="imgProd"></td>
                        </tr>
                        <tr>
                            <td>UM:</td>
                            <td><input type="text" name="UM" value="<?php echo $UM;  ?>"></td>
                        </tr>
                        <tr>
                        
                            <td> Numar Produse Stoc:</td>
                            <td><?php echo $cantitateCurenta; ?></td>
                        </tr>
                         <tr>
                        
                            <td>Introduceti noua Cantitate de Produse:</td>
                            <td><input type="number" name="cantitateStoc"></td>
                        </tr>

                          <tr>
                            <td>Pret Achizitie(lei):</td>
                            <td><input type="number" name="pretAchizitie"  value="<?php echo $pretAchizitie; ?>"></td>
                        </tr>
                        <tr>
                             <tr>
                            <td>Data Actualizare Stoc:</td>
                            <td><input type="date" name="dataAchizitie"  value="<?php echo $dataAchizitie; ?>"  ></td>
                        </tr>
                        
                            <td>Pret Vanzare:</td>
                            <td><input type="number" name="pretVanzare"  value="<?php echo $pretVanzare; ?>"></td>
                          
                        </tr>
                        <tr>
                             <tr>
                            <td>Status</td>
                            <td><input <?php if($activ=="Activ"){echo "checked";}  ?> type="radio" name="activ" value="Activ">Activ
                                <input <?php if($activ=="Inactiv"){echo "checked";}  ?> type="radio" name="activ" value="Inactiv">Inactiv
                            </td>
                        </tr>
                         <td>Categorie</td>
              <td>
                <select name="categorie">
                  <?php

                      //se iau datele din tabela category
                      $sql2 = "SELECT * FROM categorii  WHERE activ ='Activ'";
                      //executa query 
                      $res2=mysqli_query($conn,$sql2);
                      //verifica fiecare rand
                      $count2= mysqli_num_rows($res2);
                      //verifica daca sunt date in data de baza 
                      if($count2>0){
                        while($row2=mysqli_fetch_assoc($res2))
                        {
                        
                        $numeCategorie=$row2['numeCategorie'];
                        $idCategorie= $row2['idCategorie'];

                        //  echo "<option value='$id_category'>$category_id</option>";
                    ?>
                         <option <?php if($categorieCurenta==$idCategorie){echo "selected";}?> value="<?php echo $idCategorie;  ?>"><?php echo $numeCategorie; ?></option>

                    <?php
                          }
                        }else
                        {
                          echo "<option value='0'> Category not added</option>";
                        }
                  ?>
                              </select>
                              </td>
                            </tr>
                        
                        <tr>
                            <td colspan="2">
                                <input type="hidden" name="idProdus" value="<?php echo $idProdus;  ?>"><br>
                                 <input type="hidden" name="idCategorie" value="<?php echo $idCategorie;  ?>"><br>
                                <!-- <input type="hidden" name="imagineCurenta"  value=" "> -->
                            <input type="submit" name="submit" value="Update Produs" class="btn-primary" style="cursor: pointer;">
                            </td>
                        </tr>
                         <a href="manage-produse.php" class="btn btn-primary px-4 py-1 mx-4 my-4" style="float:right"><i class="fa fa-undo" aria-hidden="true"></i></a>
                    </table>
                </form>
            </div>
        </div>
<?php

//check if submit button is clicked or not
if(isset($_POST['submit']))
{
    // echo "clicked";
                $idProdus=$_POST['idProdus'];
                $numeProdus=$_POST['numeProdus'];
                $specificatiiProdus=$_POST['specificatiiProdus'];
                $UM=$_POST['UM'];
                $pretAchizitie=$_POST['pretAchizitie'];
                $pretVanzare=$_POST['pretVanzare'];
                $activ=$_POST['activ'];
                $categorie =$_POST['categorie'];
                $dataAchizitie=$_POST['dataAchizitie'];
                 $imagineCurenta =$_POST['imagineCurenta']; 
                $cantitateStoc =$_POST['cantitateStoc'];  

       $cantitateStoc = ((int)$cantitateCurenta + (int)$cantitateStoc);
              
         
if(isset($_FILES['imgProd']['name'])){
        //get the details of image
        $imgProd= $_FILES['imgProd']['name'];

        //verifica daca imaginea este selectata sau nu 
        if($imgProd!=""){
          
                $ext = end(explode('.',$imgProd));

                //rename the image

                $imgProd = "ProdImagine".rand(000, 999).'.'.$ext;


               $source_path =$_FILES['imgProd']['tmp_name'];
               $destination_path = "../Images/produse/".$imgProd;

               //finally upload the image
               $upload = move_uploaded_file($source_path,$destination_path);

              if($upload==false)
              {
                 $_SESSION['upload']= "<div class='error'>Incarcarea imaginii nu a reusit</div>";
                  
                  if( ! headers_sent() )
                  {
                        header('location:'.SITEURL.'admin/manage-produse.php');
                            }else{
                                echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-produse.php";</script>';
                            }
                  //stop the procces;
                  die();

              }
            //B. remove the curent image if available
            if($imagineCurenta!="")
            {
                $remove_path= "../Images/produse/".$imagineCurenta;
                $remove = unlink($remove_path);
    
               
                if($remove==false)
                {
                    //failed to remove image 
                    $_SESSION['remove-failed'] = "<div class='error'>Stergerea imaginii nu a reusit</div>";
                    if( ! headers_sent() )
                    {
                        header('location:'.SITEURL.'admin/manage-produse.php');
                            }else
                            {
                                echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-produse.php";</script>';
                            }
                  //stop the procces;
                  die();
                }
            }
        }else
        {
            $imgProd=$imagineCurenta;
        }

    }else
    {
         $imgProd=$imagineCurenta;
    }

 







    $sql3="UPDATE produse SET
    numeProdus='$numeProdus',
    specificatiiProdus='$specificatiiProdus',
    imgProd='$imgProd',
    UM='$UM',
    pretAchizitie='$pretAchizitie',
    pretVanzare='$pretVanzare',
    activ='$activ',
    idCategorie='$categorie',
    dataAchizitie='$dataAchizitie',
    cantitateStoc='$cantitateStoc'
    WHERE idProdus='$idProdus'
    ";

    $res3= mysqli_query($conn,$sql3);
    if($res3==true)
    {
        $_SESSION['update-produs'] = "<div class='success'>Produs Updated Succesfully.</div>";

        if( ! headers_sent() ){
            header('location:'.SITEURL.'admin/manage-produse.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-produse.php";</script>';
        }

    }else
    {
         $_SESSION['update-produs'] = "<div class='error'>Produs not Updated Succesfully.</div>";

        if( ! headers_sent() ){
             header('location:'.SITEURL.'admin/adauga-produse.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/adauga-produse.php";</script>';
        }
}
}
?>
<?php
include('partials/footer.php');
?>