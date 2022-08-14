<?php


include('partials/navbar.php');

?>

 <div class="main-content">
    <div class="wrapper">
               
         
  

                    <?php
                        if(isset($_SESSION['addA'])){
                            echo $_SESSION['addA'];// afiseaza mesajul
                            unset($_SESSION['addA']);//sterge mesajul la reactualizare pagina 
                        }
                        if(isset($_SESSION['delete-angajati'])){
                            echo $_SESSION['delete-angajati'];// afiseaza mesajul
                            unset($_SESSION['delete-angajati']);//sterge mesajul la reactualizare pagina 
                        }
                ?>

    <form action="" method="POST" class="bg-light px-5 py-3 mb-5 " style="box-shadow: 0 4px 8px 10px rgba(5, 20, 34, 0.874), 0 6px 20px 0 rgba(37, 32, 32, 0.951)">  
                    <table class="tbl-45  mb-4 rounded">
                             <h1 style="margin-bottom:-20px; text-align:center;margin-top:9px">Adauga un Angajat</h1>
                             <hr>
                        <tr>
                            <td>Nume:</td>
                            <td><input  class=" py-1 mx-auto" type="text" name="numeAngajat" placeholder="Introduceti numele..."></td>
                        </tr>
                          <tr>
                            <td>Prenume:</td>
                            <td><input  class=" py-1 mx-auto" type="text" name="prenumeAngajat" placeholder="Introduceti prenumele.."></td>
                        </tr>
                          <tr>
                            <td>Nume Utilizator:</td>
                            <td><input  class= " py-1 mx-auto" type="text" name="usernameAngajat" placeholder="username.."></td>
                        </tr>
                        <tr>
                            <td>Parola:</td>
                            <td><input type="password" name="password" placeholder="parola"></td>
                        </tr>
                          <tr>
                            <td>Rol:</td>

                            <td>
                                <select name="rol">
                                    
                                    <option  value="Administrator">Administrator</option>
                                    <option  value="Angajat">Angajat</option>
                                  
                                </select>
                            </td>
                        </tr>
                          <tr>
                            <td>Email:</td>
                            <td><input  class= "py-1 mx-auto" type="email" name="emailAngajat" placeholder="Email.."></td>
                        </tr>
                        <tr>
                            <td>Functie Angajat:</td>
                            <td><input  class= " py-1 mx-auto" type="text" name="functieAngajat" placeholder="functia.."></td>
                        </tr>
                        <tr>
                            <td>CNP:</td>
                            <td><input  class=" py-1 mx-auto" type="text" name="CNP" placeholder="CNP.."></td>
                        </tr>
                        <tr>
                            <td>Oras:</td>
                            <td><input  class=" py-1 mx-auto" type="text" name="orasAngajat" placeholder="Oras.."></td>
                        </tr>
                        <tr>
                            <td>Strada:</td>
                            <td><input class= " py-1 mx-auto" type="text" name="stradaAngajat" placeholder="strada.."></td>
                        </tr>
                        <tr>
                            <td>Numar de Telefon:</td>
                            <td><input  class=" py-1 mx-auto" type="text" name="telefonAngajat" placeholder="telefon.."></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                            <input type="submit" name="submit" value="Adauga Angajat" class="btn-primary">
                            </td>
                           
                        </tr>
                         <a href="manage-angajati.php" class="btn btn-primary  px-4 py-2 mx-2" style="float:right"><i class="fa fa-undo" aria-hidden="true"></i></a>
                    </table>
       </form>              

</div>
   
</div>
<?php

if(isset($_POST['submit'])){

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
    $password = md5($_POST['password']);

 $sql= "INSERT INTO angajati SET
    numeAngajat='$numeAngajat',
    prenumeAngajat='$prenumeAngajat',
    usernameAngajat='$usernameAngajat',
    emailAngajat='$emailAngajat',
    functieAngajat='$functieAngajat',
    CNP='$CNP',
    orasAngajat='$orasAngajat',
    stradaAngajat='$stradaAngajat',
    telefonAngajat='$telefonAngajat',
    rol='$rol',
    password='$password'

     ";

$res = mysqli_query($conn,$sql);

if($res==TRUE)
{
       $_SESSION['addA'] = "<div class='success'>Angajat adaugat cu succes</div>";
        //redirect 
        if( ! headers_sent() ){
            header('location:'.SITEURL.'admin/manage-angajati.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/manage-angajati.php";</script>';
        }
}else{

          $_SESSION['addA'] = "<div class='error'>Angajatul nu a fost adaugat</div>";
        //redirect
        if( ! headers_sent() ){
             header('location:'.SITEURL.'admin/adauga-angajat.php');
        }else{
            echo '<script type="text/javascript">window.location.href="http://localhost/Management/admin/adauga-angajat.php";</script>';
        }
    
}        
}
?>
<?php  include('partials/footer.php');?>
