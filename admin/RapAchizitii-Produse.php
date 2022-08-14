<!-- 
  Acest raport va ajuta managerii sa vada care sunt produsele achizitionate intr o anumita perioada de timp 
IN acest raport voi afisa produsele care au fost achizitionate intr-o anumita perioada de timp -->
<!-- De asemenea in raport vor fi afisate numele codul produselor, numele produselor, cantitatea, 
pretul de cumparare si pretul total pentru fiecare tip de produs si de la care furnizori-->

<!--SELECT p.idProdus, p.numeProdus, p.pretAchizitie, p.cantitateStoc, p.dataAchizitie,
 f.idFurnizor, p.pretAchizitie * p.cantitateStoc AS pretTotal FROM produse p LEFT JOIN furnizori f ON p.idFurnizor=f.idFurnizor
 WHERE p.idProdus= 2 AND(p.dataAchizitie BETWEEN '2022-05-05' AND '2022-06-08')   -->



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
      <h2 class="text-center py-2" > Raport - Aprovizionare</h2>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="card mt-5 pb-3 mb-2">
              <div class="card-header " style="background-color: rgba(63, 2, 104, 0.1); font-weight:bold">
              <h4 class="text-center py-2 fst-italic"  style=" font-weight:bold; font-style: italic;" > Filtrează datele </h4>
              </div>
              <div class="card-body">
                <form action="" method="GET">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="div form-group">
                        <label class=" mx-1" style=" font-weight:bold;" >De la data</label>
                        <input type="date" name="start_date" class="form-control" value="<?php if(isset($_GET['start_date'])){  echo $_GET['start_date']; }  ?>"   >
                      </div>
                    </div>
                     <div class="col-md-4">
                      <div class="div form-group">
                        <label class=" mx-1" style=" font-weight:bold;">Pana la data</label>
                        <input type="date" name="end_date" class="form-control"  value="<?php if(isset($_GET['end_date'])){  echo $_GET['end_date']; }  ?>">
                      </div>
                    </div>
                     <div class="col-md-4">
                      <div class="div form-group my-2">
                        <br>
                        <button type="submit" class="btn btn-success ">Filtreaza</button>
                      </div>
                    </div>
                  </div>
                </form>
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
            <th scope="col">Nr.</th>
            <th scope="col">Cod produs</th>
            <th scope="col">Produs</th>
             <th scope="col">Furnizor</th>
            <th scope="col">Numar Produse</th>
            <th scope="col">Preț Produs</th>
             <th scope="col">Preț Total Produs</th>
             <th scope="col">Data</th>
          
          </tr>
        </thead>
        <tbody id="myTable" >
        <?php
        if(isset($_GET['start_date']) && isset($_GET['end_date'])){
          
          $start_date=$_GET['start_date'];
          $end_date=$_GET['end_date'];
          $sqlFilter="SELECT p.idProdus, p.numeProdus, p.pretAchizitie, p.cantitateStoc, p.dataAchizitie, 
                      f.idFurnizor, f.denumireFirmaFurnizor, p.pretAchizitie * p.cantitateStoc AS pretTotal FROM produse p LEFT JOIN furnizori f ON p.idFurnizor=f.idFurnizor
                      WHERE (p.dataAchizitie BETWEEN '$start_date' AND '$end_date')
                      ORDER BY p.dataAchizitie ASC
                      ";
                      
                $queryFilter=mysqli_query($conn,$sqlFilter);
                 $sn=1;
                if(mysqli_num_rows($queryFilter) > 0)
                {

                    foreach($queryFilter as $row)
                    {
                      
                     ?>
                          
                            
                              <th scope="row"><?php echo $sn++; ?> </th>
                               <th><?php echo $row['idProdus']; ?></th>
                              <th><?php echo $row['numeProdus']; ?></th>
                              <th><?php echo $row['denumireFirmaFurnizor']; ?></th>
                              <th><?php echo $row['cantitateStoc']; ?></th>
                              <th><?php echo $row['pretAchizitie']; ?></th>
                              <th><?php echo $row['pretTotal']; ?></th>
                                <th><?php echo $row['dataAchizitie']; ?></th>
                              
                         
                            
                            
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




        } 

?>

      </table>
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