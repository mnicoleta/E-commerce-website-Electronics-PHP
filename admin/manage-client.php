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
      
        <!-- <h1 style="text-align:center" class="card-d1">CLIENTI</h1> -->
       
         </div>

 <!-- <div class="btn-group btn-group-lg btn-center ">
        <a href="adauga-client.php" class="btn btn-primary ">Adauga Client</a>
    </div> -->
     <div class="btn-group btn-group-lg btn-center ">
        <a href="#" class="btn btn-primary "> Lista Clientilor</a>
    </div>

<!-- Date angajati -->
<!-- SESSION -->

                <?php
                          if(isset($_SESSION['add-client']))
                            {
                                echo $_SESSION['add-client'];// afiseaza mesajul
                                unset($_SESSION['add-client']);//refresh page and delete mesage 
                            }    
                             if(isset($_SESSION['update-client']))
                            {
                                echo $_SESSION['update-client'];// afiseaza mesajul
                                unset($_SESSION['update-client']);//refresh page and delete mesage 
                            }     
                ?>

    
<div class="container mx-4 my-4 ">
<table class="table table-responsive-sm table-striped table-bordered  bg-light " style="margin-left:25px">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>ID Client </th>
                            <th>Nume Firma </th>
                            <th>CUI</th>
                            <th>Persoana Contact</th>
                            <th>Strada</th>
                            <th>Numar Strada</th>
                            <th>Oras</th>
                            <th>Cod Postal</th>
                            <th>Telefon</th>
                            <th>Email</th>
                            <th>Actiuni</th>
                            
                        </tr>
                    </thead>
<?php

      
      $sql = "SELECT *FROM clienti";
      //execute the query
      $res = mysqli_query($conn,$sql);

      //check query  is executed or not
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
                $idClient=$rows['idClient'];
                $numeFirmaCl=$rows['numeFirmaCl'];
                $CUI=$rows['CUI'];
                $numeCl=$rows['numeCl'];
                $stradaCl=$rows['stradaCl'];
                $numarStradaCl=$rows['numarStradaCl'];
                $orasCl=$rows['orasCl'];
                $codPostalCl=$rows['codPostalCl'];
                $telefonCl=$rows['telefonCl'];
                $emailCl=$rows['emailCl'];

?>

                    <tbody class="tbl"  id="myTable">
                        <tr>
                            <th><?php echo $sn++;?></th>
                            <td><?php echo $idClient;?></td>
                            <td><?php echo $numeFirmaCl;?></td>
                            <td><?php echo $CUI;?></td>
                            <td><?php echo $numeCl;?></td>
                            <td><?php echo $stradaCl;?></td>
                            <td><?php echo $numarStradaCl;?></td>
                            <td><?php echo $orasCl;?></td>
                            <td><?php echo $codPostalCl;?></td>
                            <td><?php echo $telefonCl;?></td>
                            <td><?php echo $emailCl;?></td>
                            <td> 
                                <div class="btn-group btn-group-sm">
                                    <a href="<?php echo SITEURL ?>admin/update-client.php?idClient=<?php echo $idClient;?>"  class="btn btn-success py-3  px-4"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?php echo SITEURL ?>admin/delete-client.php?idClient=<?php echo $idClient;?>" class="btn btn-danger py-3 mx-1 px-4" ><i class="fa fa-trash-o"></i></a>
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
</div>

</body>
</html>






<?php
include('partials/footer.php');
?>