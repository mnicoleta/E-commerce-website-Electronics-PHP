<?php
include('partials/navbar.php');
?>


 <div class="main-content">
            <div class="wrapper">
               
                <?php
                        if(isset($_SESSION['add-client']))
                {
                    echo $_SESSION['add-client'];
                    unset($_SESSION['add-client']); 
                }     
                ?>
<br><br>
                <form action="" method="POST" class="bg-light mb-3 px-5 py-3 rounded pt-3 mb-5" style="box-shadow: 0 4px 8px 10px rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"  >
                    <table class="tbl-45 mb-4 rounded">
                        <h1 style="margin-bottom:-20px">Adauga Client</h1>
                        <hr>
                        <tr>
                            <td> Nume Firma:</td>
                            <td><input type="text" name="numeFirmaCl" placeholder="Nume Companie"></td>
                        </tr>
                          <tr>
                            <td>CUI:</td>
                            <td><input type="text" name="CUI" placeholder="CUI"></td>
                        </tr>
                          <tr>
                            <td>Persoana Contact:</td>
                            <td><input type="text" name="numeCl" placeholder="Persoana Concatct"></td>
                        </tr>
                          <tr>
                            <td>Strada:</td>
                            <td><input type="text" name="stradaCl" placeholder="Adresa"></td>
                        </tr>
                        <tr>
                            <td>Numar Strada:</td>
                            <td><input type="text" name="numarStradaCl" placeholder="Oras"></td>
                        </tr>
                        <tr>
                            <td>Oras:</td>
                            <td><input type="text" name="orasCl" placeholder="Oras"></td>
                        </tr>
                        <tr>
                            <td>Cod Postal:</td>
                            <td><input type="text" name="codPostalCl" placeholder="Cod Postal"></td>
                        </tr>
                        <tr>
                            <td>Telefon:</td>
                            <td><input type="text" name="telefonCl" placeholder="Telefon"></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><input type="email" name="emailCl" placeholder="Email"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                            <input type="submit" name="submit" value="Adauga Client" class="btn-primary" style="cursor: grab;">
                            </td>
                        </tr>
                          <a href="manage-angajati.php" class="btn btn-primary  px-4 py-2 mx-2" style="float:right"><i class="fa fa-undo" aria-hidden="true"></i></a>
                    </table>
                </form>
            </div>
        </div>


<?php
if(isset($_POST['submit']))
{
    
                $numeFirmaCl=$_POST['numeFirmaCl'];
                $CUI=$_POST['CUI'];
                $numeCl=$_POST['numeCl'];
                $stradaCl=$_POST['stradaCl'];
                $numarStradaCl=$_POST['numarStradaCl'];
                $orasCl=$_POST['orasCl'];
                $codPostalCl=$_POST['codPostalCl'];
                $telefonCl=$_POST['telefonCl'];
                $emailCl=$_POST['emailCl'];

    $sql = "INSERT INTO clienti SET
    numeFirmaCl='$numeFirmaCl',
    CUI='$CUI',
    numeCl='$numeCl',
    stradaCl='$stradaCl',
    numarStradaCl='$numarStradaCl',
    orasCl='$orasCl',
    codPostalCl='$codPostalCl',
    telefonCl='$telefonCl',
    emailCl='$emailCl'
    ";
    $res = mysqli_query($conn,$sql);

        if($res==TRUE)
        {

        $_SESSION['add-client'] = "<div class='success'>Client added successfully</div>";
            //     //redirect page 
                if( ! headers_sent() ){
                    header('location:'.SITEURL.'admin/manage-client.php');
                }else{
                    echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-client";</script>';
                }
                
                
            }else{
                $_SESSION['add-client'] = "<div class='error'>Client not added successfully</div>";
                //redirect page
                if( ! headers_sent() ){
                    header('location:'.SITEURL.'admin/adauga-client.php');
                }else{
                    echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/adauga-client";</script>';
                }

            }

}
?>



<?php
include('partials/footer.php');
?>