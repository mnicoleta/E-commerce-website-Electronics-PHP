<!-- Raport cu numarul de comenzi dupa orasul din care se solicita comanda  -->



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
      <h2 class="text-center py-2" > Raport cu clientii dupa orasul din care comanda </h2>
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
                    <div class="col-md-6">
                      <div class="div form-group">
                        <label class=" mx-1" style=" font-weight:bold;" >Selectati un oras</label>
                        <select  class="form-control"  name="orasCl" >
                             <?php
                                $sql= " SELECT DISTINCT orasCl   FROM clienti  ";
                                $res=mysqli_query($conn,$sql);
                                $count=mysqli_num_rows($res);
                                if($count>0){
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        $idClient= $row['idClient'];
                                        $orasCl=$row['orasCl'];
                                        ?>
                                   
                                       
                                        <option  value="<?php echo $idClient;   ?>"> <?php echo  $orasCl;?></option>
                                       
                                        
                                           <?php
                                               
                                    }
                                    
                                }
                                 else
                                {
                                    ?>

                                    <option value="0">Nu exista clienti</option>

                                    <?php
                                }


                                ?>
                        </select>
                        
                      </div>
                    </div>
                     <div class="col-md-6">
                      <div class="div form-group pt-2 ">
                        <br>

                        <input type="submit" name="submit" class="btn btn-success " value="Filtreaza">
                         <input type="hidden" name="orasCl"  value="<?php echo $orasCl;  ?>">
                          <input type="hidden" name="idClient"  value="<?php echo $idClient;  ?>">
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
            <th scope="col">ID Comanda</th>
            <th scope="col">ID Client</th>
            <th scope="col">Oras</th>
            <th scope="col">Produs</th>
             <th scope="col">Cantitate</th>
            <th scope="col">Pret/Produs</th>
            <th scope="col">Total</th>
            <th scope="col">Data</th>
            
         
          
          </tr>
        </thead>
        <tbody id="myTable" >
        <?php
        if(isset($_GET['orasCl'])){
            $orasCl=$_GET['orasCl'];
      

         
          $sqlFilter="  SELECT  c.dataComanda,c.idComanda, cl.orasCl, p.numeProdus, p.pretAchizitie,dc.cantitate, p.pretAchizitie*dc.cantitate as pretTotal, 
          cl.idClient, cl.orasCl FROM comenzi c 
          LEFT JOIN clienti cl ON cl.idClient=c.idClient 
          LEft Join detaliicomenzi dc on dc.idComanda=c.idComanda 
          left join produse p ON p.idProdus=dc.idProdus 
          where orasCl='Bucuresti'
                      ";
                      
                $queryFilter=mysqli_query($conn,$sqlFilter);
                 $sn=1;
                if(mysqli_num_rows($queryFilter) > 0)
                {



                     foreach($queryFilter as $row)
                    {
                      
                      
                        $idComanda=$row['idComanda'];
                        $idClient=$row['idClient'];
                        $orasCl=$row['orasCl'];
                        $numeProdus=$row['numeProdus'];
                        $cantitate=$row['cantitate'];
                           $pretAchizitie=$row['pretAchizitie'];
                        $pretTotal=$row['pretTotal'];
                         $dataComanda=$row['dataComanda'];

                     ?>
    
                              <th scope="row"><?php echo $sn++; ?> </th>
                               <th><?php echo $idComanda; ?></th>
                                <th><?php echo $idClient; ?></th>
                                  <th><?php echo $orasCl; ?></th>
                              <th><?php echo $numeProdus; ?></th>
                              <th><?php echo $cantitate; ?></th>
                              <th><?php echo $pretAchizitie; ?></th>
                              <th><?php echo $pretTotal; ?></th>
                              <th><?php echo $dataComanda ?></th>
                               
                              
                          </tbody>
                            
                          
                         
                      <?php  
                        } 
                    }
  }
       
                else{
                    ?>

                    <div class="alert alert-danger pt-3 pb-4 text-center" role="alert">
                        Datele nu sunt disponibile in acest interval de timp!
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
<!-- </body>
</html> -->




<?php
include('partials/footer.php');
?>