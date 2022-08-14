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
       <h2 class="text-center py-2" > Listă - Stoc disponibil</h2>
      <table class="table  table-bordered table-responsive " >
         <thead class="text-dark" style="background-color: rgba(63, 2, 104, 0.1);">
          <tr>
            <th scope="col">Nr.</th>
            <th scope="col">Cod produs</th>
            <th scope="col">Nume Produs</th>
            <th scope="col">Descriere Produs</th>
            <th scope="col">Cantitate Disponibila Stoc</th>
             <th scope="col">Data Actualizare Stoc</th>
            <th scope="col">Preț Produs</th>
          </tr>
        </thead>
        <?php
            $sql1="SELECT * FROM produse ORDER BY idProdus, numeProdus ASC";

            $res1=mysqli_query($conn,$sql1);
            $count1=mysqli_num_rows($res1);
             $sn=1;
            if($count1 >0){
              while($row=mysqli_fetch_assoc($res1)){
                $idProdus=$row['idProdus'];
                $numeProdus=$row['numeProdus'];
                $cantitateStoc=$row['cantitateStoc'];
                $specificatiiProdus=$row['specificatiiProdus'];
                $pretVanzare=$row['pretVanzare'];
                $dataAchizitie=$row['dataAchizitie'];

           

?>
        <tbody id="myTable">
          <tr>
            <th scope="row"><?php echo $sn++;   ?></th>
            <th><?php echo $idProdus;   ?></th>
            <th><?php echo $numeProdus;   ?></th>
            <th><?php echo $specificatiiProdus;   ?></th>
            <th><?php echo $cantitateStoc;   ?></th>
            <th><?php echo $dataAchizitie;   ?></th>
            <th><?php echo $pretVanzare;   ?></th>
          </tr>
          
        </tbody>
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