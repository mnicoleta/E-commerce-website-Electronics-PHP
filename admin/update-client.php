<?php
include('partials/navbar.php');
?>
 <div class="main-content">
            <div class="wrapper">
                <br><br><br>
                <h1 style="text-align:center">Update Client</h1>
                <br><br>

                    <?php
                    //1. get the id of selected admin 
                    $idClient=$_GET['idClient'];

                    //2.create sql query 
                    $sql="SELECT * FROM clienti WHERE idClient=$idClient";
                    $res=mysqli_query($conn,$sql);

                    //check if the query is executed or not
                    if($res==true){
                        $count= mysqli_num_rows($res);
                        if($count==1)
                        {
                            //echo "admin aviable";
                            $row=mysqli_fetch_assoc($res);

                            $numeFirmaCl=$row['numeFirmaCl'];
                            $CUI=$row['CUI'];
                            $numeCl=$row['numeCl'];
                            $stradaCl=$row['stradaCl'];
                            $numarStradaCl=$row['numarStradaCl'];
                            $orasCl=$row['orasCl'];
                            $codPostalCl=$row['codPostalCl'];
                            $telefonCl=$row['telefonCl'];
                            $emailCl=$row['emailCl'];

                        }else
                        {
                             if( ! headers_sent() ){
                                        header('location:'.SITEURL.'admin/manage-client.php');
                                    }else{
                                        echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-client";</script>';
                                    }
                        }

                    }

                                
                    ?>
<br><br>
                <form action="" method="POST" class="bg-light mb-4 py-4 pt-1" style="padding-left:1rem; margin-left:4px; box-shadow: 0 4px 8px 10px rgba(158, 201, 236, 0.874), 0 6px 20px 0 rgba(255, 241, 241, 0.951);" >
                    <table class="tbl-45">
                         <tr>
                            <td> Nume Firma:</td>
                            <td><input type="text" name="numeFirmaCl"  value="<?php echo $numeFirmaCl;?>" placeholder="Nume Companie"></td>
                        </tr>
                          <tr>
                            <td>CUI:</td>
                            <td><input type="text" name="CUI"  value="<?php echo $CUI;?>" placeholder="CUI"></td>
                        </tr>
                          <tr>
                            <td>Persoana Contact:</td>
                            <td><input type="text" name="numeCl"  value="<?php echo $numeCl;?>" placeholder="Persoana Concatct"></td>
                        </tr>
                          <tr>
                            <td>Strada:</td>
                            <td><input type="text" name="stradaCl"  value="<?php echo $stradaCl;?>" placeholder="Adresa"></td>
                        </tr>
                        <tr>
                            <td>Numar Strada:</td>
                            <td><input type="text" name="numarStradaCl"  value="<?php echo $numarStradaCl;?>" placeholder="Oras"></td>
                        </tr>
                        <tr>
                            <td>Oras:</td>
                            <td><input type="text" name="orasCl"  value="<?php echo $orasCl;?>" placeholder="Oras"></td>
                        </tr>
                        <tr>
                            <td>Cod Postal:</td>
                            <td><input type="text" name="codPostalCl"  value="<?php echo $codPostalCl;?>" placeholder="Cod Postal"></td>
                        </tr>
                        <tr>
                            <td>Telefon:</td>
                            <td><input type="text" name="telefonCl"  value="<?php echo $telefonCl;?>" placeholder="Telefon"></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><input type="email" name="emailCl"  value="<?php echo $emailCl;?>" placeholder="Email"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="hidden" name="idClient" value="<?php echo $idClient;  ?>"><br>
                            <input type="submit" name="submit" value="Update Client" class="btn-primary" style="cursor: pointer;">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
<?php

//check if submit button is clicked or not
if(isset($_POST['submit']))
{
    // echo "clicked";
    $idClient=$_POST['idClient'];
    $numeFirmaCl=$_POST['numeFirmaCl'];
    $CUI=$_POST['CUI'];
    $numeCl=$_POST['numeCl'];
    $stradaCl=$_POST['stradaCl'];
    $numarStradaCl=$_POST['numarStradaCl'];
    $orasCl=$_POST['orasCl'];
    $codPostalCl=$_POST['codPostalCl'];
    $telefonCl=$_POST['telefonCl'];
    $emailCl=$_POST['emailCl'];


    $sql="UPDATE clienti SET
    numeFirmaCl='$numeFirmaCl',
    CUI='$CUI',
    numeCl='$numeCl',
    stradaCl='$stradaCl',
    numarStradaCl='$numarStradaCl',
    orasCl='$orasCl',
    codPostalCl='$codPostalCl',
    telefonCl='$telefonCl',
    emailCl='$emailCl'
    WHERE idClient='$idClient'
    ";

    $res= mysqli_query($conn,$sql);
    if($res==true)
    {
        $_SESSION['update-client'] = "<div class='success'>Client Updated Succesfully.</div>";

        if( ! headers_sent() ){
            header('location:'.SITEURL.'admin/manage-client.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-client";</script>';
        }

    }else
    {
         $_SESSION['update-client'] = "<div class='error'>Client not Updated Succesfully.</div>";

        if( ! headers_sent() ){
             header('location:'.SITEURL.'admin/manage-client.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-client";</script>';
        }
}
}
?>





<?php
include('partials/footer.php');
?>