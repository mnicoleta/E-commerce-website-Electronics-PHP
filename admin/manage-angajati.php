<?php

include('partials/navbar.php');

include('partials/navSub1.php');
?>
<html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
     <link rel="stylesheet" href="../CSS/Admin1.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <script>
            $(document).ready(function(){
              $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
              });
            });
</script>
     <title>Depozit- Managementul angajatilor</title>
 </head>
 <body>
<div class="container-fluid main-content pb-4">
    <div class="wrapper">
       </div>

 <div class="btn-group btn-group-lg btn-center">
        <a href="<?php echo SITEURL; ?>/admin/adauga-angajat.php" class="btn btn-primary">Adauga un Angajat</a>
    </div>
  
     

<!-- Date angajati -->
<!-- SESSION -->

                <?php
                if(isset($_SESSION['addA'])){
                    echo $_SESSION['addA'];// afiseaza mesajul
                    unset($_SESSION['addA']);//sterge mesajul la reactualizare pagina 
                }
                 if(isset($_SESSION['delete-angajati'])){
                    echo $_SESSION['delete-angajati'];// afiseaza mesajul
                    unset($_SESSION['delete-angajati']);//sterge mesajul la reactualizare pagina 
                }
                if(isset($_SESSION['update-angajati'])){
                    echo $_SESSION['update-angajati'];// afiseaza mesajul
                    unset($_SESSION['update-angajati']);//sterge mesajul la reactualizare pagina 
                }

    
                ?>
<div class="container mx-0 my-4 pt-4" >
<table class="table table-responsive-md table-striped table-bordered bg-light" style="margin-left:-130px">
      <thead>
        <tr>
          <th>Nr</th>
          <th>ID Angajat</th>
          <th>Nume Angajat</th>
          <th>Nume Utilizator</th>
          <th>Rol</th>
          <th>Email</th>  
          <th>Functie</th>
          <th>CNP</th>
          <th>Oras</th>
          <th>Strada</th>
          <th>Telefon</th>
          <th>Actiuni</th>
          
        </tr>
      </thead>
          <?php

          $sql = "SELECT *FROM angajati";
           $res = mysqli_query($conn,$sql);

           if($res==TRUE)
           {

                //count rows to check if we have data in database
                $count = mysqli_num_rows($res);
                $sn=1; //create a variable and asign value

                if($count>0)
                {
                    //we have data in database
                    while($rows=mysqli_fetch_assoc($res))
                    {
                        $idAngajat=$rows['idAngajat'];
                        $numeAngajat=$rows['numeAngajat'];
                        $prenumeAngajat=$rows['prenumeAngajat'];
                        $usernameAngajat=$rows['usernameAngajat'];
                         $rol=$rows['rol'];
                         $emailAngajat=$rows['emailAngajat'];
                        $functieAngajat=$rows['functieAngajat'];
                        $CNP=$rows['CNP'];
                        $orasAngajat=$rows['orasAngajat'];
                         $stradaAngajat=$rows['stradaAngajat'];
                        $telefonAngajat=$rows['telefonAngajat'];
                        

                        ?>
                          <tbody id="myTable">
                            <tr>
                              <th><?php echo $sn++;?></th>
                               <th><?php echo $idAngajat;?></th>
                              <td><?php echo $numeAngajat.' '.$prenumeAngajat?></td>
                              <td><?php echo $usernameAngajat?></td>
                               <td><?php echo $rol; ?></td>
                              <td><?php echo $emailAngajat?></td>
                              <td><?php echo $functieAngajat?></td>
                              <td><?php echo $CNP?></td> 
                              <td><?php echo $orasAngajat?></td>
                              <td><?php echo $stradaAngajat?></td>
                              <td><?php echo $telefonAngajat?></td>
                              <td>
                                <div class="btn-group btn-group-sm">
                                    
                                <a href="<?php echo SITEURL ?>admin/update-password.php?idAngajat=<?php echo $idAngajat;?>" class="btn btn-warning py-3 mx-1 ">Schimba Parola</a>
                                <a href="<?php echo SITEURL; ?>admin/update-angajat.php?idAngajat=<?php echo $idAngajat;?>" class="btn btn-success py-3  px-4"><i class="fa fa-pencil-square-o"></i></a>
                            
                                <a href="<?php echo SITEURL; ?>admin/delete-angajati.php?idAngajat=<?php echo $idAngajat;?>" class="btn btn-danger py-3 mx-1 px-4" ><i class="fa fa-trash-o"></i></a>
                              </div>
                              </td>
                              
                            </tr>
                            </tbody>

                        <?php

                    }
                }
           }
           ?>
        </table>

 </div>
</div>
  </body>
</html>


<?php

include('partials/footer.php');
?>