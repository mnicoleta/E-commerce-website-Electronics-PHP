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
      <h2 class="text-center py-2" > Raport - Incasari</h2>
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
             <th scope="col">Data Comanda</th>
             <th scope="col">Cod Produs</th>
            <th scope="col">Pret Cumparare(lei)</th>
             <th scope="col">Pret Vanzare(lei)</th>
             <th scope="col">Cantitate Vanduta</th>
             <th scope="col">Vanzari totale(lei)</th>
            <th scope="col">Profit/zi(lei)</th>
            
             
          
          </tr>
        </thead>
        <tbody id="myTable" >
        <?php
        if(isset($_GET['start_date']) && isset($_GET['end_date'])){
          if(strtotime($_GET['start_date']) < strtotime($_GET['end_date'])){

         
          $start_date=$_GET['start_date'];
          $end_date=$_GET['end_date'];
          $sqlFilter="SELECT c.idComanda, c.dataComanda, c.statusComanda, p.idProdus,p.numeProdus, p.pretAchizitie,
           p.pretVanzare, dc.cantitate ,(p.pretVanzare - p.pretAchizitie)*dc.cantitate AS profit,
           p.pretVanzare * dc.cantitate as VanzTotale
           
           FROM produse p 
          LEFT JOIN detaliicomenzi dc ON dc.idProdus=p.idProdus 
          LEFT JOIN comenzi c ON dc.idComanda=c.idComanda WHERE (c.dataComanda BETWEEN '$start_date' AND '$end_date') and c.statusComanda='Livrata' 
                     
                      ";
                      
                $queryFilter=mysqli_query($conn,$sqlFilter);
                 $sn=1;
                if(mysqli_num_rows($queryFilter) > 0)
                {
                   

                    foreach($queryFilter as $row)
                    {
                      
                     ?>
                          
                            
                              <th scope="row"><?php echo $sn++; ?> </th>
                               <th><?php echo $row['dataComanda']; ?></th>
                              <th><?php echo $row['idProdus']; ?></th>
                              <th><?php echo $row['pretAchizitie']; ?></th>
                              <th><?php echo $row['pretVanzare']; ?></th>
                              <th><?php echo $row['cantitate']; ?></th>
                              <th><?php echo $row['VanzTotale']; ?></th>

                               <th><?php echo $row['profit']; ?></th>
                                
                         
                            
                          
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




        } 

?>

      </table>
      <hr>
      <div class="row float-right rounded border " style="">
        <div class="col">
      <?php
      if(isset($_GET['start_date']) && isset($_GET['end_date'])){
          
          $start_date=$_GET['start_date'];
          $end_date=$_GET['end_date'];
          $sqlFilter1="SELECT c.idComanda, c.dataComanda, c.statusComanda, p.idProdus,p.numeProdus, p.pretAchizitie,
           p.pretVanzare, dc.cantitate ,sum((p.pretVanzare - p.pretAchizitie)*dc.cantitate) AS profitTotal,
           p.pretVanzare * dc.cantitate as VanzTotale
           
           FROM produse p 
          LEFT JOIN detaliicomenzi dc ON dc.idProdus=p.idProdus 
          LEFT JOIN comenzi c ON dc.idComanda=c.idComanda WHERE (c.dataComanda BETWEEN '$start_date' AND '$end_date') and c.statusComanda='Livrata' 
                     
                      ";
                      
                $queryFilter1=mysqli_query($conn,$sqlFilter1);
               
                if(mysqli_num_rows($queryFilter1) > 0)
                {
                   

                    foreach($queryFilter1 as $row)
                    {
                      
                     ?>
                          
                               <h6 class=" pt-2  pb-2 rounded"  style=" font-weight:bold; font-style: italic; ">Profit Total:  <?php echo $row['profitTotal']; ?> lei  
                                (<?php echo $start_date; ?> -  <?php echo $end_date; ?>)</h6>
                                
                                
                         
                          
                                






                           
                        
                      <?php  
                    }

                }else{
                    ?>

                    <div class="alert alert-danger pt-3 pb-4 text-center" role="alert">
                        Datele nu sunt disponibile in acest interval de timp!
                        </div>
                     </div>
                     <div class="col">
                      <?php
                      }


$start_date=$_GET['start_date'];
          $end_date=$_GET['end_date'];
          $sqlFilter2="SELECT c.idComanda, c.dataComanda, c.statusComanda, p.idProdus,p.numeProdus, p.pretAchizitie,
           p.pretVanzare, dc.cantitate ,sum((p.pretVanzare - p.pretAchizitie)*dc.cantitate) AS profitTotal,
           Sum(p.pretVanzare * dc.cantitate) as TotalVanzari
           
           FROM produse p 
          LEFT JOIN detaliicomenzi dc ON dc.idProdus=p.idProdus 
          LEFT JOIN comenzi c ON dc.idComanda=c.idComanda WHERE (c.dataComanda BETWEEN '$start_date' AND '$end_date') and c.statusComanda='Livrata' 
                      ";
   $queryFilter2=mysqli_query($conn,$sqlFilter2);
               
                if(mysqli_num_rows($queryFilter2) > 0)
                {
                  
                    foreach($queryFilter2 as $row)
                    {
                      
                     ?>
                          
                            <h6 class=" pt-2  pb-2  rounded"  style=" font-weight:bold; font-style: italic; ">Incasari Totale:  <?php echo $row['TotalVanzari']; ?> lei  
                                (<?php echo $start_date; ?> -  <?php echo $end_date; ?>)</h6>
                                
                                
                         
                          
                                






                           
                        
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