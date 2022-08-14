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
 <div class="btn-group btn-group-lg  mb-0 mt-0 btn-center" >
        <a href="adauga-furnizor.php" class="btn btn-primary mx-4 " >Adauga Furnizor</a>
    </div>

<!-- Date angajati -->
<!-- SESSION -->

                <?php
                      if(isset($_SESSION['add-furnizor']))
                {
                    echo $_SESSION['add-furnizor'];
                    unset($_SESSION['add-furnizor']);
                }
                       if(isset($_SESSION['delete-furnizor']))
                {
                    echo $_SESSION['delete-furnizor'];
                    unset($_SESSION['delete-furnizor']);
                }
                ?>
<br><br>
    
<div class="container mx-4 my-4">
<table class="table table-responsive-sm table-striped table-bordered " style="margin-left:-20px">
                    <thead class="tbl">
                        <tr>
                            <th>S.N.</th>
                            <th>Nume Companie </th>
                            <th>CUI</th>
                            <th>Persoana Contact</th>
                            <th>Adresa</th>
                            <th>Oras</th>
                            <th>Telefon</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
<?php

      
      $sql = "SELECT *FROM furnizori";
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
                $idFurnizor=$rows['idFurnizor'];
                $denumireFirmaFurnizor=$rows['denumireFirmaFurnizor'];
                $CUI=$rows['CUI'];
                $numeFurnizor=$rows['numeFurnizor'];
                $adresaFurnizor=$rows['adresaFurnizor'];
                $orasFurnizor=$rows['orasFurnizor'];
                $telefonFurnizor=$rows['telefonFurnizor'];
                $emailFurnizor=$rows['emailFurnizor'];

?>

                    <tbody class="tbl" id="myTable">
                        <tr>
                            <th><?php echo $sn++;?></th>
                            <td><?php echo $denumireFirmaFurnizor;?></td>
                            <td><?php echo $CUI;?></td>
                            <td><?php echo $numeFurnizor;?></td>
                            <td><?php echo $adresaFurnizor;?></td>
                            <td><?php echo $orasFurnizor;?></td>
                            <td><?php echo $telefonFurnizor;?></td>
                            <td><?php echo $emailFurnizor;?></td>
                            
                                      <th> 
                                        <div class="btn-group btn-group-sm">
                                                <a href="<?php echo SITEURL ?>admin/update-furnizor.php?idFurnizor=<?php echo $idFurnizor;?>" class="btn btn-success py-3  px-4"><i class="fa fa-pencil-square-o"></i></a>
                                                <a href="<?php echo SITEURL ?>admin/delete-furnizor.php?idFurnizor=<?php echo $idFurnizor;?>"  class="btn btn-danger py-3 mx-1 px-4" ><i class="fa fa-trash-o"></i></a>
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