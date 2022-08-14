<?php
include('partials/navbar.php');
?>


 <div class="main-content">
            <div class="wrapper">
               
                
              

<?php
                if(isset($_SESSION['add-furnizor']))
                {
                    echo $_SESSION['add-furnizor'];
                    unset($_SESSION['add-furnizor']);
                }
?>
<br><br>
                <form action="" method="POST"  class="bg-light mb-3 px-5 py-3 rounded pt-3 mb-5" style="box-shadow: 0 4px 8px 10px rgba(5, 20, 34, 0.874), 0 6px 20px 0 rgba(37, 32, 32, 0.951);" >
                    <table class="tbl-45 mb-4 rounded">
                        <h1 style="position:relative;text-align:center;margin-top:10px;margin-bottom:-30px" class="btn-center">Adauga Furnizori</h1>
                        
                        <hr>
                        <div class="clearfix"></div>
                        <tr>
                            <td>Nume Companie:</td>
                            <td><input type="text" name="denumireFirmaFurnizor" placeholder="Nume Companie"></td>
                        </tr>
                          <tr>
                            <td>CUI:</td>
                            <td><input type="text" name="CUI" placeholder="CUI"></td>
                        </tr>
                          <tr>
                            <td>Persoana Contact:</td>
                            <td><input type="text" name="numeFurnizor" placeholder="Persoana Concatct"></td>
                        </tr>
                          <tr>
                            <td>Adresa:</td>
                            <td><input type="text" name="adresaFurnizor" placeholder="Adresa"></td>
                        </tr>
                        <tr>
                            <td>Oras:</td>
                            <td><input type="text" name="orasFurnizor" placeholder="Oras"></td>
                        </tr>
                        <tr>
                            <td>Telefon:</td>
                            <td><input type="text" name="telefonFurnizor" placeholder="Telefon"></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><input type="email" name="emailFurnizor" placeholder="Email"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><br>
                            <input type="submit" name="submit" value="Adauga Furnizor" style="cursor: pointer;" class="btn-primary">
                            </td>
                        </tr>
                         <a href="manage-furnizor.php" class="btn btn-primary px-4 py-2 mx-2" style="float:right"><i class="fa fa-undo" aria-hidden="true"></i></a>
                    </table>
                </form>
            </div>
        </div>


<?php
if(isset($_POST['submit']))
{
    $denumireFirmaFurnizor=$_POST['denumireFirmaFurnizor'];
    $CUI=$_POST['CUI'];
    $numeFurnizor=$_POST['numeFurnizor'];
    $adresaFurnizor=$_POST['adresaFurnizor'];
    $orasFurnizor=$_POST['orasFurnizor'];
    $telefonFurnizor=$_POST['telefonFurnizor'];
    $emailFurnizor=$_POST['emailFurnizor'];

    $sql = "INSERT INTO furnizori SET
    denumireFirmaFurnizor='$denumireFirmaFurnizor',
    CUI='$CUI',
    numeFurnizor='$numeFurnizor',
    adresaFurnizor='$adresaFurnizor',
    orasFurnizor='$orasFurnizor',
    telefonFurnizor='$telefonFurnizor',
    emailFurnizor='$emailFurnizor'
    ";
    $res = mysqli_query($conn,$sql);

        if($res==TRUE)
        {

        $_SESSION['add-furnizor'] = "<div class='success'>Furnizor added successfully</div>";
            //     //redirect page 
                if( ! headers_sent() ){
                    header('location:'.SITEURL.'admin/manage-furnizor.php');
                }else{
                    echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-furnizor";</script>';
                }
                
                
            }else{
                $_SESSION['add-furnizor'] = "<div class='error'>Furnizor not added successfully</div>";
                //redirect page
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