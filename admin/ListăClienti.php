<!-- Acest raport ajuta firam sa vada profitul lunar sau anual -->
<!-- IN acest raport voi afisa veniturile firmei intr un anumit  interval de timp  -->
<!-- In raport vor va fi afisat codul comenzii factura pretul de cumparare, pretul de vanzare si profitul toatal pentru fiecare zi  -->





<?php
include('partials/navbar.php');
include('partials/navSub1.php');
?>

<div class="container-lg   ">
  <div class="row ">
      <div class="col-2" style="background-color: rgba(63, 2, 104, 0.1);">
          <nav class="navbar">
            <div class="navbar-nav ">
                            <a class="nav-link active" style="color: rgba(143, 20, 104, 1); font-weight:bold" href="Raport-Stoc-Disponibil.php">Stoc Disponibil</a>
               <a class="nav-link active" style="color: rgba(143, 20, 104, 1); font-weight:bold" href="RapAchizitii-Produse">Raport Aprovizionari</a>
                <a class="nav-link active" style="color: rgba(143, 20, 104, 1); font-weight:bold" href="ListăClienti.php">Lista clienti</a>
               <a class="nav-link active" style="color: rgba(143, 20, 104, 1); font-weight:bold" href="RapIncasari.php">Raport Incasari</a>
               <a class="nav-link active" style="color: rgba(143, 20, 104, 1); font-weight:bold" href="Raport-Numar-Comenzi-Orase.php">Comenzi in functie de oras</a>
               <a class="nav-link active" style="color: rgba(143, 20, 104, 1); font-weight:bold" href="RapFactIncasate.php">Lista cu facturile incasate</a>
               <a class="nav-link active" style="color: rgba(143, 20, 104, 1); font-weight:bold" href="ListăClienti.php">Lista cu clientii Firmei</a>
                <a class="nav-link active" style="color: rgba(143, 20, 104, 1); font-weight:bold" href="listaComenziPlasate.php">Lista comenzi plasate</a>
                <a class="nav-link active" style="color: rgba(143, 20, 104, 1); font-weight:bold" href="listaComenziAnulate.php">Lista comenzi anulate</a>
                 <a class="nav-link active" style="color: rgba(143, 20, 104, 1); font-weight:bold" href="listaComenziCursLivrare.php">Lista comenzi in curs de livrare</a>
               <a class="nav-link active" style="color: rgba(143, 20, 104, 1); font-weight:bold" href="listaComenziLivrate.php">Lista comenzi livrate</a>
            </div>
          </nav>
      </div>
    <div class="col-10  pb-4 pt-2">
      
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="card mt-5 pb-3 mb-2">
              <div class="card-header" style="background-color: rgba(63, 2, 104, 0.1); font-weight:bold">
              <h4 class="text-center py-2 fst-italic"  style=" font-weight:bold; font-style: italic;" > Clientii firmei</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
       <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
      <table class="table  table-bordered ">
        <thead class="  text-dark" style="background-color: rgba(63, 2, 104, 0.1);margin-left:20px">
          <tr class="text-center">
            <th>Nr.</th>
            <th>ID Client </th>
            <th>Nume Firma </th>
            <th>Persoana Contact</th>
            <th>Strada</th>
            <th>Numar Strada</th>
            <th>Oras</th>
            <th>Cod Postal</th>
            <th>Telefon</th>
            <th>Email</th>
           
            
             
          
          </tr>
        </thead>
         <?php
       $sql = "SELECT *FROM clienti";
   
      $res = mysqli_query($conn,$sql);

      
    if($res==TRUE)
    {

  
        $count = mysqli_num_rows($res);
        $sn=1; 
        if($count>0)
        {
    
            while($rows=mysqli_fetch_assoc($res))
            {
                $idClient=$rows['idClient'];
                $numeFirmaCl=$rows['numeFirmaCl'];
                $numeCl=$rows['numeCl'];
                $stradaCl=$rows['stradaCl'];
                $numarStradaCl=$rows['numarStradaCl'];
                $orasCl=$rows['orasCl'];
                $codPostalCl=$rows['codPostalCl'];
                $telefonCl=$rows['telefonCl'];
                $emailCl=$rows['emailCl'];

?>
          <tbody id="myTable">
       

            
                            
                             <th><?php echo $sn++;?></th>
                            <td><?php echo $idClient;?></td>
                            <td><?php echo $numeFirmaCl;?></td>
                            <td><?php echo $numeCl;?></td>
                            <td><?php echo $stradaCl;?></td>
                            <td><?php echo $numarStradaCl;?></td>
                            <td><?php echo $orasCl;?></td>
                            <td><?php echo $codPostalCl;?></td>
                            <td><?php echo $telefonCl;?></td>
                            <td><?php echo $emailCl;?></td>
                                
                         
                            
                          
                          </tbody>
                      <?php  
                    }

                }else{
                    ?>

                    <div class="alert alert-danger pt-3 pb-4 text-center" role="alert">
                        Datele nu sunt disponibile in acest interval de timp!
                        </div>
                     
                      <?php
                      }
                    }else{
                        ?>
                        <div class="alert alert-danger pt-3 pb-4 text-center" role="alert">
                        Data de inceput este mai mare decat data de sfarsit
                        </div>
                     <?php
                    }




      
?>

      </table>
     
</div>
</div>


        </div>
  </div>
</div>

    </div>
  </div>
</div>
<!-- </body>
</html> -->




<?php
include('partials/footer.php');
?>