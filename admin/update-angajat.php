<?php
include('partials/navbar.php');
?>
  <?php
                 
                    $idAngajat=$_GET['idAngajat'];

                  
                    $sql="SELECT * FROM angajati WHERE idAngajat=$idAngajat";
                    $res=mysqli_query($conn,$sql);

                
                    if($res==true){
                        $count= mysqli_num_rows($res);
                        if($count==1)
                        {
                          
                            $row=mysqli_fetch_assoc($res);

                            $numeAngajat=$row['numeAngajat'];
                            $prenumeAngajat=$row['prenumeAngajat'];
                            $usernameAngajat=$row['usernameAngajat'];
                             $emailAngajat=$row['emailAngajat'];
                            $functieAngajat=$row['functieAngajat'];
                             $CNP=$row['CNP'];
                             $orasAngajat=$row['orasAngajat'];
                            $stradaAngajat=$row['stradaAngajat'];
                            $telefonAngajat=$row['telefonAngajat'];
                             $rol=$row['rol'];

                        }else
                        {
                            header('location:'.SITEURL.'admin/manage-angajati.php');
                        }

                    }

                                
                    ?>

 <div class="main-content">
            <div class="wrapper">
                
                <h4 style="text-align:center; font-weight:bold; color:grey">Modificati datele angajatului: <span class="text-success"><?php echo  $numeAngajat.''.$prenumeAngajat;    ?></span></h4>
                

                  
<br><br>
                <form action="" method="POST" class="bg-light mb-4 py-4 pt-1" style="padding-left:1rem; margin-left:4px; box-shadow: 0 4px 8px 10px rgba(158, 201, 236, 0.874), 0 6px 20px 0 rgba(255, 241, 241, 0.951);" >
                    
                    <table class="tbl-45 mx-4 rounded">
                        
                        <tr>
                            <td style="font-weight:bold; color:grey">Nume:</td>
                            <td><input type="text"  class="py-1 my-1 mx-auto" name="numeAngajat" value="<?php echo $numeAngajat;?>"></td>
                        </tr>
                          <tr>
                            <td style="font-weight:bold; color:grey" >Prenume:</td>
                            <td><input type="text" class="py-1 my-1  mx-auto" name="prenumeAngajat" value="<?php echo $prenumeAngajat;?>" ></td>
                        </tr>
                          <tr>
                            <td style="font-weight:bold; color:grey" >Nume Utilizator:</td>
                            <td><input type="text" class="py-1 my-1  mx-auto" name="usernameAngajat" value="<?php echo $usernameAngajat;?>"></td>
                        </tr>
                         <tr>
                            <td style="font-weight:bold; color:grey" >Statut:</td>
                            <td>
                            <select name="rol" class="py-1 my-1  mx-auto">
                                    
                                    <option <?php if($rol=="Administrator"){  echo "selected";}  ?> value="Administrator">Administrator</option>
                                    <option <?php if($rol=="Angajat"){ echo "selected";}  ?>  value="Angajat">Angajat</option>
                                  
                                </select>
                            </td>
                        </tr>
                          <tr>
                            <td style="font-weight:bold; color:grey" >Email:</td>
                            <td><input type="email" class="py-1 my- mx-auto" name="emailAngajat" value="<?php echo $emailAngajat;?>" ></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold; color:grey" >Functie Angajat:</td>
                            <td><input type="text" class="py-1 my-1 mx-auto" name="functieAngajat" value="<?php echo $functieAngajat;?>"></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold; color:grey" >CNP:</td>
                            <td><input type="text" class="py-1 my-1 mx-auto" name="CNP"  value="<?php echo $CNP;?>"placeholder="CNP.."></td>
                        </tr>
                      
                        <tr>
                            <td style="font-weight:bold; color:grey" >Oras:</td>
                            <td><input type="text" class="py-1 my-1 mx-auto" name="orasAngajat" value="<?php echo $orasAngajat;?>" placeholder="Oras.."></td>
                        </tr>
                        <tr>
                            <td>Strada:</td>
                            <td><input type="text" class="py-1 my-1  mx-auto" name="stradaAngajat" value="<?php echo $stradaAngajat;?>" placeholder="strada.."></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold; color:grey" >Numar de Telefon:</td>
                            <td><input type="text" class="py-1 my-1  mx-auto" name="telefonAngajat" value="<?php echo $telefonAngajat;?>" placeholder="telefon.."></td>
                        </tr>
                        
                        <tr>
                            <td colspan="2">
                                 <input type="hidden" name="idAngajat" value="<?php echo $idAngajat;  ?>"><br>
                            <input type="submit" name="submit" value="Update Angajat" class="btn-primary my-4" style="cursor: pointer;">
                            </td>
                            <a href="manage-angajati.php" class="btn btn-primary px-4 py-1 mx-4 my-4" style="float:right"><i class="fa fa-undo" aria-hidden="true"></i></a>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
<?php

//verific daca butonul functioneaza
if(isset($_POST['submit']))
{
    // echo "clicked";
    $numeAngajat = $_POST['numeAngajat'];
    $prenumeAngajat = $_POST['prenumeAngajat'];
    $usernameAngajat = $_POST['usernameAngajat'];
    $emailAngajat = $_POST['emailAngajat'];
    $functieAngajat = $_POST['functieAngajat'];
    $CNP = $_POST['CNP'];
    $orasAngajat = $_POST['orasAngajat'];
    $stradaAngajat = $_POST['stradaAngajat'];
    $telefonAngajat = $_POST['telefonAngajat'];
      $rol = $_POST['rol'];


    $sql2="UPDATE angajati SET
   numeAngajat='$numeAngajat',
    prenumeAngajat='$prenumeAngajat',
    usernameAngajat='$usernameAngajat',
    emailAngajat='$emailAngajat',
    functieAngajat='$functieAngajat',
    CNP='$CNP',
    orasAngajat='$orasAngajat',
    stradaAngajat='$stradaAngajat',
    telefonAngajat='$telefonAngajat',
     rol='$rol'
    WHERE idAngajat='$idAngajat'
     ";

    $res2= mysqli_query($conn,$sql2);
    if($res2==true)
    {
        $_SESSION['update-angajati'] = "<div class='success'>Angajat Updated Succesfully.</div>";

        if( ! headers_sent() ){
            header('location:'.SITEURL.'admin/manage-angajati.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-angajati";</script>';
        }

    }else
    {
         $_SESSION['update-angajati'] = "<div class='error'>Angajat not Updated Succesfully.</div>";

        if( ! headers_sent() ){
             header('location:'.SITEURL.'admin/adauga-angajati.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/adauga-angajati";</script>';
        }
}
}
?>





<?php
include('partials/footer.php');
?>