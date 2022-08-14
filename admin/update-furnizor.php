<?php
include('partials/navbar.php');
?>
 <div class="main-content pb-4">
            <div class="wrapper">
                

                    <?php
                    //1. get the id of selected admin 
                    $idFurnizor=$_GET['idFurnizor'];

                    //2.create sql query 
                    $sql="SELECT * FROM furnizori WHERE idFurnizor=$idFurnizor";
                    $res=mysqli_query($conn,$sql);

                    //check if the query is executed or not
                    if($res==true){
                        $count= mysqli_num_rows($res);
                        if($count==1)
                        {
                            //echo "admin aviable";
                            $row=mysqli_fetch_assoc($res);

                           $denumireFirmaFurnizor=$row['denumireFirmaFurnizor'];
                            $CUI=$row['CUI'];
                            $numeFurnizor=$row['numeFurnizor'];
                            $adresaFurnizor=$row['adresaFurnizor'];
                            $orasFurnizor=$row['orasFurnizor'];
                            $telefonFurnizor=$row['telefonFurnizor'];
                            $emailFurnizor=$row['emailFurnizor'];


                        }else
                        {
                             if( ! headers_sent() ){
                                        header('location:'.SITEURL.'admin/manage-furnizor.php');
                                    }else{
                                        echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-furnizor";</script>';
                                    }
                        }

                    }

                                
                    ?>
<br><br>
                <form action="" method="POST" class="bg-light mb-4 py-4 pt-1" style="padding-left:1rem; margin-left:4px; box-shadow: 0 4px 8px 10px rgba(158, 201, 236, 0.874), 0 6px 20px 0 rgba(255, 241, 241, 0.951);" >
                    <table class="tbl-45">
                        <h1 style="text-align:center">Update Furnizor</h1>
                        <hr>
                         <tr>
                            <td>Nume Companie:</td>
                            <td><input type="text" name="denumireFirmaFurnizor" value="<?php echo $denumireFirmaFurnizor;?>" placeholder="Nume Companie"></td>
                        </tr>
                          <tr>
                            <td>CUI:</td>
                            <td><input type="text" name="CUI" value="<?php echo $CUI;?>" placeholder="CUI"></td>
                        </tr>
                          <tr>
                            <td>Persoana Contact:</td>
                            <td><input type="text" name="numeFurnizor" value="<?php echo $numeFurnizor;?>" placeholder="Persoana Concatct"></td>
                        </tr>
                          <tr>
                            <td>Adresa:</td>
                            <td><input type="text" name="adresaFurnizor" value="<?php echo $adresaFurnizor;?>" placeholder="Adresa"></td>
                        </tr>
                        <tr>
                            <td>Oras:</td>
                            <td><input type="text" name="orasFurnizor" value="<?php echo $orasFurnizor;?>" placeholder="Oras"></td>
                        </tr>
                        <tr>
                            <td>Telefon:</td>
                            <td><input type="text" name="telefonFurnizor" value="<?php echo $telefonFurnizor;?>" placeholder="Telefon"></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><input type="email" name="emailFurnizor" value="<?php echo $emailFurnizor;?>" placeholder="Email"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="hidden" name="idFurnizor" value="<?php echo $idFurnizor;  ?>"><br>
                            <input type="submit" name="submit" value="Update Furnizor" style="cursor: pointer;" class="btn-primary">
                            </td>
                        </tr>
                         <a href="manage-furnizor.php" class="btn btn-primary px-4 py-1 mx-4 my-4" style="float:right"><i class="fa fa-undo" aria-hidden="true"></i></a>
                    </table>
                </form>
            </div>
        </div>
<?php

//check if submit button is clicked or not
if(isset($_POST['submit']))
{
    // echo "clicked";
    $idFurnizor=$_POST['idFurnizor'];
   $denumireFirmaFurnizor=$_POST['denumireFirmaFurnizor'];
    $CUI=$_POST['CUI'];
    $numeFurnizor=$_POST['numeFurnizor'];
    $adresaFurnizor=$_POST['adresaFurnizor'];
    $orasFurnizor=$_POST['orasFurnizor'];
    $telefonFurnizor=$_POST['telefonFurnizor'];
    $emailFurnizor=$_POST['emailFurnizor'];


    $sql="UPDATE furnizori SET
    denumireFirmaFurnizor='$denumireFirmaFurnizor',
    CUI='$CUI',
    numeFurnizor='$numeFurnizor',
    adresaFurnizor='$adresaFurnizor',
    orasFurnizor='$orasFurnizor',
    telefonFurnizor='$telefonFurnizor',
    emailFurnizor='$emailFurnizor'
    WHERE idFurnizor='$idFurnizor'
    ";

    $res= mysqli_query($conn,$sql);
    if($res==true)
    {
        $_SESSION['update-furnizor'] = "<div class='success'>Furnizor Updated Succesfully.</div>";

        if( ! headers_sent() ){
            header('location:'.SITEURL.'admin/manage-furnizor.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-furnizor";</script>';
        }

    }else
    {
         $_SESSION['update-furnizor'] = "<div class='error'>Furnizor not Updated Succesfully.</div>";

        if( ! headers_sent() ){
             header('location:'.SITEURL.'admin/adauga-furnizor.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/adauga-furnizor";</script>';
        }
}
}
?>





<?php
include('partials/footer.php');
?>