
<?php
include('partials/navbar.php');
include('partials/navSub1.php');
?>



<div class="container-lg">
  <div class="row">
      <div class="col-2 " style="background-color: rgba(63, 2, 104, 0.1);">
          <nav class="navbar">
            <div class="navbar-nav">
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
    <div class="col-10 pb-4 pt-2">
       <h2 class="text-center py-2" > Facturi Incasate</h2>
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
     
      <table class="table  table-bordered table-responsive " >
         <thead class="text-dark" style="background-color: rgba(63, 2, 104, 0.1);">
          <tr>
            <th scope="col">Nr.</th>
            <th scope="col">Serie Factura</th>
            <th scope="col">Data Factura</th>
             <th scope="col">ID Comanda</th>
            <th scope="col">Produs</th>
            <th scope="col">Client</th>
            <th scope="col">Cantitate</th>
             <th scope="col">Pret Total</th>
            
          </tr>
        </thead>
<?php

             if(isset($_GET['start_date']) && isset($_GET['end_date'])){
          if(strtotime($_GET['start_date']) < strtotime($_GET['end_date'])){
             
          $start_date=$_GET['start_date'];
          $end_date=$_GET['end_date'];

            $sql1="SELECT cl.idClient, fa.serieFact, fa.dataFact, cl.numeFirmaCl, cl.CUI, dc.cantitate, dc.pretTotalComanda, p.idProdus, p.numeProdus, 
            c.idComanda FROM comenzi c
             LEFT JOIN clienti cl ON c.idClient = cl.idClient
              LEFT JOIN detaliicomenzi dc ON dc.idComanda = c.idComanda 
            LEFT JOIN produse p ON p.idProdus= dc.idProdus 
            LEFT JOin facturi fa ON fa.idComanda= dc.idComanda 
            WHERE statusComanda='Livrata' and 
            (fa.dataFact BETWEEN '$start_date' AND '$end_date') ";

            $res1=mysqli_query($conn,$sql1);
            $count1=mysqli_num_rows($res1);
             $sn=1;
            if($count1 >0){
              while($row=mysqli_fetch_assoc($res1)){
                $serieFact=$row['serieFact'];
                $dataFact=$row['dataFact'];
                $idComanda=$row['idComanda'];
                $numeProdus=$row['numeProdus'];
                $numeFirmaCl=$row['numeFirmaCl'];
                $cantitate=$row['cantitate'];
                 $pretTotalComanda=$row['pretTotalComanda'];


          ?>
        <tbody id="myTable">
            
          <tr>
            <th scope="row"><?php echo $sn++;   ?></th>
            <th><?php echo $serieFact;   ?></th>
            <th><?php echo $dataFact;   ?></th>
            <th><?php echo $idComanda;   ?></th>
            <th><?php echo $numeProdus;   ?></th>
            <th><?php echo $numeFirmaCl;   ?></th>
            <th><?php echo $cantitate;   ?></th>
             <th><?php echo $pretTotalComanda;   ?></th>
                
          </tr>
          
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
    </div>
  </div>
</div>




<?php
include('partials/footer.php');
?>