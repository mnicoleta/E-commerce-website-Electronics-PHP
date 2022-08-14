<?php
include('partials/navbar.php');
?>


 <div class="main-content">
            <div class="wrapper">
              
                <?php
                          if(isset($_SESSION['add-produs']))
                            {
                                echo $_SESSION['add-produs'];
                                unset($_SESSION['add-produs']);
                            }  
                             if(isset($_SESSION['upload']))
                            {
                                echo $_SESSION['upload'];
                                unset($_SESSION['upload']);
                            }      
                ?>
<br><br>
                <form action="" method="POST" enctype="multipart/form-data" class="bg-light mb-4 py-4 pt-1" style="padding-left:1rem; margin-left:4px; box-shadow: 0 4px 8px 10px rgba(5, 20, 34, 0.874), 0 6px 20px 0 rgba(37, 32, 32, 0.951);" >
                    <table class="tbl-45 rounded">
                              <h1 style="text-align:center">Adauga produse</h1>
                              <hr>
                        <tr>
                            <td> Denumire Proodus:</td>
                            <td><input type="text" name="numeProdus" placeholder="Nume Produs" required></td>
                        </tr>
                          <tr>
                            <td>Detalii Produs:</td>
                            <td>
                                <textarea  type="text" name="specificatiiProdus" cols="35" placeholder="Descrieti produsul" rows="4" required></textarea>
                               
                            </td>
                        </tr>
                          <tr>
                            <td>UM:</td>
                            <td><input type="text" name="UM" placeholder="UM" required></td>
                        </tr>
                        <tr>
                             <tr>
                            <td>Introduceti Cantitatea:</td>
                            <td><input type="text" name="cantitateStoc"required ></td>
                        </tr>
                          <tr>
                            <td>Pret Achizitie(lei):</td>
                            <td><input type="number" step='0.01' value='0.00' name="pretAchizitie" placeholder="" required></td>
                        </tr>
                        <tr>
                             <tr>
                            <td>Data Achizitie:</td>
                            <td><input type="date" name="dataAchizitie" required></td>
                        </tr>
                        <tr>
                        
                            <td>Pret Vanzare:</td>
                            <td><input type="number" step='0.01' value='0.00' name="pretVanzare" placeholder="" required></td>
                        </tr>
                        <tr>
                            <td>Selecteaza Imaginea dorita:</td>
                            <td><input type="file" name="imgProd" required></td>
                        </tr>
                        
                         <tr>
                             <td>Categorii:</td>
                            <td>
                            <select name="categorie" required >
                                <?php
                                $sql= "SELECT * FROM categorii";
                                $res=mysqli_query($conn,$sql);
                                $count=mysqli_num_rows($res);

                                if($count>0){
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        $idCategorie= $row['idCategorie'];
                                        $numeCategorie=$row['numeCategorie'];
                                        ?>
                                        <option value="<?php echo $idCategorie; ?> "><?php echo  $numeCategorie;  ?></option>

                                        <?php
                                    }
                                }else
                                {
                                    ?>

                                    <option value="0">Categoria nu a fost gasita</option>

                                    <?php
                                }

                                ?>

                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Furnizor:</td>
                            <td>
                            <select name="furnizor" required >
                                <?php
                                $sql1= "SELECT * FROM furnizori";
                                $res1=mysqli_query($conn,$sql1);

                                $count1=mysqli_num_rows($res1);

                                if($count1>0){
                                    while($row=mysqli_fetch_assoc($res1))
                                    {
                                        $idFurnizor= $row['idFurnizor'];
                                        $denumireFirmaFurnizor=$row['denumireFirmaFurnizor'];
                                        ?>
                                        <option value="<?php echo $idFurnizor; ?> "><?php echo  $denumireFirmaFurnizor;  ?></option>

                                        <?php
                                    }
                                }else
                                {
                                    ?>

                                    <option value="0">Furnizorul nu a fost gasit</option>

                                    <?php
                                }

                                ?>
                        
                        
                        
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Status:</td>
                            <td>
                                <input type="radio" name="activ" value="Activ">Activ
                                <input type="radio" name="activ" value="Inactiv">Inactiv
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                            <input type="submit" name="submit" value="Adauga Produs" style="cursor: pointer;" class="btn-primary">
                            </td>
                        </tr>
                            <a href="manage-admin.php" class="btn btn-primary  px-4 py-2 mx-5" style="float:right"><i class="fa fa-undo" aria-hidden="true"></i></a>
                    </table>
                </form>
            </div>
        </div>


<?php



if(isset($_POST['submit']))
{

     if(isset($_POST['activ'])){
               $activ = $_POST['activ'];

           }else{
               $activ = "NU";
           }
    
                $numeProdus=$_POST['numeProdus'];
                $specificatiiProdus=$_POST['specificatiiProdus'];
                $UM=$_POST['UM'];
                $pretAchizitie=$_POST['pretAchizitie'];
                $pretVanzare=$_POST['pretVanzare'];
                $activ=$_POST['activ'];
                $categorie =$_POST['categorie'];
                $furnizor=$_POST['furnizor'];
                $dataAchizitie=$_POST['dataAchizitie'];
                $cantitateStoc=$_POST['cantitateStoc'];

                 if(isset($_FILES['imgProd']['name']))
                 {
               
              
               $imgProd = $_FILES['imgProd']['name'];
               
                $ext = end(explode('.',$imgProd));

                $imgProd = "ProdImagine".rand(000, 999).'.'.$ext;


               $source_path =$_FILES['imgProd']['tmp_name'];
               $destination_path = "../Images/produse/".$imgProd;

               $upload =move_uploaded_file($source_path,$destination_path);
            if($upload==false)
                {
                  $_SESSION['upload']= "<div class='error'>Incarcarea Imaginii a esuat</div>";
                  
                  if( ! headers_sent() ){
                        header('location:'.SITEURL.'admin/manage-produse.php');
                            }else{
                                echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-produse";</script>';
                            }
                  //stop the procces;
                  die();
                }
                    }else
                    {
               
                               
                                $imgProd="";
                  }
                

    $sql2 = "INSERT INTO produse SET
    numeProdus='$numeProdus',
    specificatiiProdus='$specificatiiProdus',
    UM='$UM',
    pretAchizitie='$pretAchizitie',
    pretVanzare='$pretVanzare',
    activ='$activ',
    idCategorie='$categorie',
    idFurnizor='$furnizor',
    dataAchizitie='$dataAchizitie',
    cantitateStoc='$cantitateStoc',
    imgProd='$imgProd'
    ";
    $res2 = mysqli_query($conn,$sql2);

        if($res2==TRUE)
        {

        $_SESSION['add-produs'] = "<div class='success'>Produsul a fost adaugat cu success</div>";
            //     //redirect page 
                if( ! headers_sent() ){
                    header('location:'.SITEURL.'admin/manage-produse.php');
                }else{
                    echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-produse";</script>';
                }
                
                
            }else{
                $_SESSION['add-produs'] = "<div class='error'>Produsul nu a fost adaugat cu success</div>";
                //redirect page
                if( ! headers_sent() ){
                    header('location:'.SITEURL.'admin/adauga-produse.php');
                }else{
                    echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/adauga-produse";</script>';
                }

            }

}
?>



<?php
include('partials/footer.php');
?>